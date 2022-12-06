<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PhpJunior\LaravelVideoChat\Facades\Chat;
use PhpJunior\LaravelVideoChat\Models\File\File;
use PhpJunior\LaravelVideoChat\Models\Conversation\Conversation;
use PhpJunior\LaravelVideoChat\Models\Group\Conversation\GroupConversation;

class VideoCallController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Chat::getAllGroupConversations();
        $threads = Chat::getAllConversations();

        return view('home')->with([
            'threads' => $threads,
            'groups'  => $groups
        ]);
    }

    public function chat($id)
    {
        $conversation = Chat::getConversationMessageById($id);


        return view('page.chat.chat')->with([
            'conversation' => $conversation
        ]);
    }

    public function startVideo($id){
        $conversation = Chat::getConversationMessageById($id);

        return view('page.common.video-call')->with([
            'conversation' => $conversation
        ]);
    }

    public function startVideoCall($id){
        $conversation = Chat::getConversationMessageById($id);
        // dd($conversation['conversationId']);
        return redirect()->route('video-call-runner', ['conversation'=> $conversation['conversationId'], 'id'=> auth()->user()]);
    }

    public function activeVideoCall(){
        return view('page.chat.video_chat');
    }

    public function getConversationDetails($conversation_id, $user_id){
        $conversation = Chat::getConversationMessageById($conversation_id);
        $user = User::where('id', $user_id)->first();
        return response()->json($conversation);
    }


    public function groupChat($id)
    {
        $conversation = Chat::getGroupConversationMessageById($id);

        return view('page.chat.group_chat')->with([
            'conversation' => $conversation
        ]);
    }

    public function send(Request $request)
    {
        try {
            Chat::sendConversationMessage($request->input('conversationId'), $request->input('text'));

        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function groupSend(Request $request)
    {
        Chat::sendGroupConversationMessage($request->input('groupConversationId'), $request->input('text'));
    }

    public function sendFilesInConversation(Request $request)
    {
        Chat::sendFilesInConversation($request->input('conversationId') , $request->file('files'));
    }

    public function sendFilesInGroupConversation(Request $request)
    {
        Chat::sendFilesInGroupConversation($request->input('groupConversationId') , $request->file('files'));
    }

    public function store(){
        $conversation = new Conversation();
        $conversation->first_user_id = 1;
        $conversation->second_user_id = 2;
        $conversation->save();

        $conversation->messages()->create([
            'user_id'   => 1,
            'text'      => 'Hello'
        ]);

        $group = new GroupConversation();
        $group->name = 'Test';
        $group->save();

        $group->users()->attach([ 1,2,3,4 ]);
    }
}
