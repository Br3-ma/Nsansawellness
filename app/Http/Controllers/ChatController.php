<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\ChatMessages;
use App\Traits\ChatTrait;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    use ChatTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        //get my thread for chat
        $id = $req->toArray()['id'];
        $owner = $req->toArray()['owner'];

        $chat_session = Chat::with('chat_messages.user')->where('id', $id)->get()->toArray()[0];
        if($owner == 'sender'){
            // The sender has seen the message
            ChatMessages::where('chat_id', $id)
            ->update([
                'status' => 0
            ]);
        }elseif($owner == 'receiver'){
            // The receiver has seen the message
            ChatMessages::where('chat_id', $id)
            ->update([
                'status_received' => 1
            ]);
        }
        return response()->json(['chat_session' => $chat_session], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Save the new message
        ChatMessages::create($request->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //get my thread for chat
        // $id = $request->toArray()['id'];
        // $chat_session = Chat::with('chat_messages')->whereHas("chat_messages",function($q) use($id){
        //     $q->where("status","=", 1);
        // })->where('id', $id)->get()->toArray()[0];
        // dd($chat_session);
        // return response()->json(['chat_session' => $chat_session], 200);
    }

    public function stream(Request $req){
        $chat_id = $req->toArray()['chat_id'];
        $owner = $req->toArray()['owner'];
        
        if($owner == 'sender'){
            
            $chat_session = ChatMessages::with('user')->where('chat_id', $chat_id)->where('status', 1)->get();
            
            if($chat_session->isNotEmpty()){
                
                // The sender has seen the message
                ChatMessages::where('chat_id', $chat_id)
                ->update([
                    'status' => 0
                ]);
                return response()->json(['chat_messages' => $chat_session->toArray()], 200);
            }
            return response()->json(['chat_messages' => 0], 200);

        }elseif($owner == 'receiver'){
            
            $chat_session = ChatMessages::with('user')->where('chat_id', $chat_id)->where('status_received', 0)->get();
            
            if($chat_session->isNotEmpty()){
                // The receiver has seen the message
                ChatMessages::where('chat_id', $chat_id)
                ->update([
                    'status_received' => 1
                ]);

                return response()->json(['chat_messages' => $chat_session->toArray()], 200);
            }
            return response()->json(['chat_messages' => 0], 200);

        }       
    }

    // public function stream(Request $req){
    //     //get my thread for chat
    //     $chat_id = $req->toArray()['chat_id'];
    //     $owner = $req->toArray()['owner'];

    //     $chat_session = ChatMessages::with('user')->where('chat_id', $chat_id)->orWhere('status', 1)->orWhere('status_received', 0)->get();

    //     if($chat_session->isNotEmpty()){

    //         if($owner == 'sender'){
    //             // The sender has seen the message
    //             ChatMessages::where('chat_id', $chat_id)
    //             ->update([
    //                 'status' => 0
    //             ]);
    //         }elseif($owner == 'receiver'){
    //             // The receiver has seen the message
    //             ChatMessages::where('chat_id', $chat_id)
    //             ->update([
    //                 'status_received' => 1
    //             ]);
    //         }

    //         return response()->json(['chat_messages' => $chat_session->toArray()], 200);
    //     }else{
    //         return response()->json(['chat_messages' => 0], 200);
    //     }
        
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
