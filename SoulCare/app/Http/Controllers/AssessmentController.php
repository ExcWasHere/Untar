<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\AssessmentQuestion;
use App\Models\AssessmentAnswer;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    /**
     * Display a listing of assessments.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $assessments = Assessment::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        $assessmentTypes = [
            'anxiety' => 'Kecemasan',
            'depression' => 'Depresi',
            'stress' => 'Stres',
            'wellbeing' => 'Kesejahteraan',
        ];
            
        return view('assessments.index', compact('assessments', 'assessmentTypes'));
    }

    /**
     * Show the form to start a specific assessment type.
     *
     * @param  string  $type
     * @return \Illuminate\View\View
     */
    public function startAssessment($type)
    {
        $validTypes = ['anxiety', 'depression', 'stress', 'wellbeing'];
        
        if (!in_array($type, $validTypes)) {
            return redirect()->route('assessments')->with('error', 'Tipe asesmen tidak valid!');
        }
        
        $questions = $this->getQuestionsByType($type);
        $assessmentTitle = $this->getAssessmentTitle($type);
        
        return view('assessments.start', compact('type', 'questions', 'assessmentTitle'));
    }

    /**
     * Store a completed assessment.
     *
     * @param  string  $type
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitAssessment($type, Request $request)
    {
        $validTypes = ['anxiety', 'depression', 'stress', 'wellbeing'];
        
        if (!in_array($type, $validTypes)) {
            return redirect()->route('assessments')->with('error', 'Tipe asesmen tidak valid!');
        }
        
        $questions = $this->getQuestionsByType($type);
        
        // Validate all answers are provided
        $validationRules = [];
        foreach ($questions as $index => $question) {
            $validationRules['answers.' . $index] = 'required|integer|min:0|max:3';
        }
        
        $request->validate($validationRules);
        
        // Calculate score
        $totalScore = array_sum($request->answers);
        $interpretation = $this->interpretScore($type, $totalScore);
        
        // Save assessment
        $assessment = Assessment::create([
            'user_id' => auth()->id(),
            'type' => $type,
            'score' => $totalScore,
            'interpretation' => $interpretation,
        ]);
        
        // Save individual answers
        foreach ($request->answers as $questionIndex => $answerValue) {
            AssessmentAnswer::create([
                'assessment_id' => $assessment->id,
                'question_index' => $questionIndex,
                'answer_value' => $answerValue,
            ]);
        }
        
        return redirect()->route('assessments')->with('success', 'Asesmen berhasil diselesaikan!');
    }

    /**
     * Display the specified assessment result.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $assessment = Assessment::where('user_id', auth()->id())
            ->with('answers')
            ->findOrFail($id);
            
        $questions = $this->getQuestionsByType($assessment->type);
        $assessmentTitle = $this->getAssessmentTitle($assessment->type);
        
        return view('assessments.show', compact('assessment', 'questions', 'assessmentTitle'));
    }

    /**
     * Get the title for an assessment type.
     *
     * @param  string  $type
     * @return string
     */
    protected function getAssessmentTitle($type)
    {
        $titles = [
            'anxiety' => 'Asesmen Tingkat Kecemasan',
            'depression' => 'Asesmen Tingkat Depresi',
            'stress' => 'Asesmen Tingkat Stres',
            'wellbeing' => 'Asesmen Kesejahteraan Mental',
        ];
        
        return $titles[$type] ?? 'Asesmen Kesehatan Mental';
    }

    /**
     * Get questions for a specific assessment type.
     *
     * @param  string  $type
     * @return array
     */
    protected function getQuestionsByType($type)
    {
        $questions = [];
        
        switch ($type) {
            case 'anxiety':
                $questions = [
                    'Saya merasa cemas tanpa alasan yang jelas',
                    'Saya merasa tegang atau gelisah',
                    'Saya merasa takut sesuatu yang buruk akan terjadi',
                    'Saya sulit berkonsentrasi karena kekhawatiran',
                    'Saya mengalami gejala fisik seperti jantung berdebar atau berkeringat',
                    'Saya menghindari situasi yang membuat saya cemas',
                    'Saya sulit menenangkan diri ketika merasa cemas',
                ];
                break;
                
            case 'depression':
                $questions = [
                    'Saya merasa sedih atau tertekan',
                    'Saya kehilangan minat pada aktivitas yang biasanya saya nikmati',
                    'Saya mengalami perubahan nafsu makan',
                    'Saya mengalami kesulitan tidur atau tidur berlebihan',
                    'Saya merasa lelah atau kekurangan energi',
                    'Saya merasa buruk tentang diri sendiri atau merasa gagal',
                    'Saya sulit berkonsentrasi',
                ];
                break;
                
            case 'stress':
                $questions = [
                    'Saya merasa sulit untuk bersantai',
                    'Saya bereaksi berlebihan terhadap situasi',
                    'Saya merasa mudah tersinggung',
                    'Saya merasa sulit untuk menenangkan diri',
                    'Saya merasa tidak sabar ketika mengalami penundaan',
                    'Saya merasa sulit mentolerir gangguan pada apa yang saya lakukan',
                    'Saya merasa sangat gugup',
                ];
                break;
                
            case 'wellbeing':
                $questions = [
                    'Saya merasa optimis tentang masa depan',
                    'Saya merasa berguna',
                    'Saya merasa rileks',
                    'Saya tertarik pada orang lain',
                    'Saya memiliki energi yang cukup',
                    'Saya dapat mengatasi masalah dengan baik',
                    'Saya merasa dekat dengan orang lain',
                ];
                break;
        }
        
        return $questions;
    }

    /**
     * Interpret the score for a specific assessment type.
     *
     * @param  string  $type
     * @param  int  $score
     * @return string
     */
    protected function interpretScore($type, $score)
    {
        if ($type == 'wellbeing') {
            if ($score <= 7) {
                return 'Sangat rendah';
            } elseif ($score <= 14) {
                return 'Rendah';
            } elseif ($score <= 21) {
                return 'Sedang';
            } else {
                return 'Tinggi';
            }
        } else {
            if ($score <= 7) {
                return 'Normal';
            } elseif ($score <= 14) {
                return 'Ringan';
            } elseif ($score <= 21) {
                return 'Sedang';
            } else {
                return 'Berat';
            }
        }
    }
}