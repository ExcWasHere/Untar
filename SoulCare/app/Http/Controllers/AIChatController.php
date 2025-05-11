<?php

namespace App\Http\Controllers;

use App\Models\AIChat;
use App\Models\AIChatReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AIChatController extends Controller
{
    /**
     * Display a listing of AI chats.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $chats = AIChat::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('ai-chats.index', compact('chats'));
    }

    /**
     * Show the form for creating a new AI chat.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('ai-chats.create');
    }

    /**
     * Store a newly created AI chat in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'topic' => 'nullable|string|max:100',
        ]);

        $chat = AIChat::create([
            'user_id' => auth()->id(),
            'message' => $request->message,
            'topic' => $request->topic,
        ]);

        // Process AI response if needed
        $this->processAIResponse($chat);

        return redirect()->route('ai-chats')->with('success', 'Pesan berhasil dikirim ke AI!');
    }

    /**
     * Display the specified AI chat.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $chat = AIChat::where('user_id', auth()->id())
            ->with('replies')
            ->findOrFail($id);
            
        return view('ai-chats.show', compact('chat'));
    }

    /**
     * Process a reply to the AI chat.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAIReply($id)
    {
        $chat = AIChat::where('user_id', auth()->id())->findOrFail($id);
        
        // Here you would typically call an AI service API
        // For demo purposes, we'll just create a mock response
        $reply = AIChatReply::create([
            'ai_chat_id' => $chat->id,
            'message' => $this->generateMockAIResponse($chat->message),
            'is_ai' => true,
        ]);

        return response()->json([
            'success' => true,
            'reply' => $reply,
        ]);
    }

    /**
     * Store a user reply to an AI chat.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeReply($id, Request $request)
    {
        $chat = AIChat::where('user_id', auth()->id())->findOrFail($id);
        
        $request->validate([
            'message' => 'required|string',
        ]);

        AIChatReply::create([
            'ai_chat_id' => $chat->id,
            'message' => $request->message,
            'is_ai' => false,
        ]);

        // Process AI response if needed
        $this->processAIResponse($chat, $request->message);

        return redirect()->route('ai-chats.show', $chat->id)->with('success', 'Balasan terkirim!');
    }

    /**
     * Delete an AI chat.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $chat = AIChat::where('user_id', auth()->id())->findOrFail($id);
        $chat->replies()->delete();
        $chat->delete();

        return redirect()->route('ai-chats')->with('success', 'Percakapan berhasil dihapus!');
    }

    /**
     * Process an AI response for the chat message.
     *
     * @param  \App\Models\AIChat  $chat
     * @param  string|null  $message
     * @return void
     */
    protected function processAIResponse($chat, $message = null)
    {
        // Here you would typically call an AI service API
        // For demo purposes, we'll just create a mock response
        $content = $message ?? $chat->message;
        
        AIChatReply::create([
            'ai_chat_id' => $chat->id,
            'message' => $this->generateMockAIResponse($content),
            'is_ai' => true,
        ]);
    }

    /**
     * Generate a mock AI response.
     *
     * @param  string  $message
     * @return string
     */
    protected function generateMockAIResponse($message)
    {
        $responses = [
            'Terima kasih telah berbagi. Bagaimana perasaan Anda tentang hal itu?',
            'Saya mengerti situasi yang Anda hadapi. Apakah ada hal lain yang ingin Anda ceritakan?',
            'Itu pasti sulit bagi Anda. Apakah Anda sudah mencoba berbicara dengan seseorang tentang ini?',
            'Anda tidak sendirian dalam perasaan ini. Banyak orang mengalami hal serupa.',
            'Terkadang menuliskan pikiran kita dapat membantu melihat situasi dengan lebih jelas.',
        ];
        
        return $responses[array_rand($responses)];
    }
}