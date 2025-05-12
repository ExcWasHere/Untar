<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Emotion;
use App\Models\SocialInteraction;
use App\Models\Consultation;
use App\Models\AIChat;
use App\Models\Assessment;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index() {
        // Get data for current authenticated user
        $user = Auth::user();
        $user = auth()->user();
        
        // Get emotion data for the last 7 days
        $emotionData = Emotion::where('user_id', $user->id)
            ->whereBetween('date', [Carbon::now()->subDays(7), Carbon::now()])
            ->orderBy('date', 'asc')
            ->get();
            
        // Calculate average emotion score
        $averageEmotion = $emotionData->avg('score') ?? 0;
        
        // Get previous week's average for comparison
        $previousWeekEmotion = Emotion::where('user_id', $user->id)
            ->whereBetween('date', [Carbon::now()->subDays(14), Carbon::now()->subDays(7)])
            ->avg('score') ?? 0;
        
        $emotionChange = $averageEmotion - $previousWeekEmotion;
        
        // Get recent social interactions
        $socialInteractions = SocialInteraction::where('user_id', $user->id)
            ->orderBy('interaction_date', 'desc')
            ->take(3)
            ->get();
            
        // Count weekly social interactions
        $weeklyInteractions = SocialInteraction::where('user_id', $user->id)
            ->whereBetween('interaction_date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->count();
            
        // Previous week's social interactions for comparison
        $previousWeekInteractions = SocialInteraction::where('user_id', $user->id)
            ->whereBetween('interaction_date', [
                Carbon::now()->subWeek()->startOfWeek(), 
                Carbon::now()->subWeek()->endOfWeek()
            ])
            ->count();
            
        $interactionChange = $weeklyInteractions - $previousWeekInteractions;
        
        // Get upcoming consultations
        $upcomingConsultation = Consultation::where('user_id', $user->id)
            ->where('schedule_date', '>=', Carbon::now())
            ->orderBy('schedule_date', 'asc')
            ->first();
            
        // Count monthly consultations
        $monthlyConsultations = Consultation::where('user_id', $user->id)
            ->whereBetween('schedule_date', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
            ->count();
            
        // Get recent AI chat sessions
        $aiChats = AIChat::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->take(2)
            ->get();
            
        // Count weekly AI chat sessions
        $weeklyAIChats = AIChat::where('user_id', $user->id)
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->count();
            
        // Previous week's AI chats for comparison
        $previousWeekAIChats = AIChat::where('user_id', $user->id)
            ->whereBetween('created_at', [
                Carbon::now()->subWeek()->startOfWeek(), 
                Carbon::now()->subWeek()->endOfWeek()
            ])
            ->count();
            
        $aiChatChange = $weeklyAIChats - $previousWeekAIChats;
        
        // Get latest assessment results
        $latestAssessment = Assessment::where('user_id', $user->id)
            ->orderBy('assessment_date', 'desc')
            ->first();
            
        /*return view('dashboard', compact(
            'averageEmotion',
            'emotionChange',
            'socialInteractions',
            'weeklyInteractions',
            'interactionChange',
            'upcomingConsultation',
            'monthlyConsultations',
            'aiChats',
            'weeklyAIChats',
            'aiChatChange',
            'latestAssessment'
        ));*/
    }
}