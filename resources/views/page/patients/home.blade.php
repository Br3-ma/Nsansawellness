@extends('layouts.app')
@section('content')
<div class="chatPage" style="">
    <div class="intro-y">
        <!-- BEGIN: Chat Side Menu -->
        <div id="chatList" class="chatList col-span-12 w-full" style="margin-bottom:4px; padding-bottom:0px;">
            {{-- @hasanyrole(['patient', 'counselor']) --}}
            <div class="py-6 lg:py-8">
                <div class="">
                </div>
            </div>
            {{-- @endhasanyrole --}}
            <div class="tab-content h-full">

                <div id="chats" class="tab-pane active h-full" role="tabpanel" aria-labelledby="chats-tab">
                    <div style="margin-bottom:0px; padding-bottom:0px;" class="chat__chat-list h-full overflow-y-auto scrollbar-hidden pr-1 pt-1 mt-4 px-4">
                       
                        <h2 class="text-lg font-medium mr-auto flex space-x-6 mt-10 py-autox">
                            <i data-lucide="message-square" class="mt-1 w-6 h-6"></i>
                            &nbsp;
                            <span>Therapy Sessions</span>
                        </h2>
                        
                        @forelse($chats as $chat)
                            {{-- If I Started the Chat --}}
                            @if($chat->sender_id == auth()->user()->id)
                                <div onclick="startChat('{{ $chat->id }}', 'sender', '{{ $chat->receiver->fname.' '.$chat->receiver->lname }}', '{{ $chat->receiver->roles->pluck('name') }}')"
                                    class="intro-x chat-list-item cursor-pointer rounded-lg bg-white mr-10 relative flex items-center p-5">

                                    <div class="w-12 h-12 flex-none image-fit mr-1">
                                        @if($chat->sender->image_path != null) 
                                            <img width="56" onerror="handleError(this);" height="5" src="{{ asset('public/storage/'.$chat->receiver->image_path) }}" class="attachment-full rounded-full size-full" alt="" loading="lazy" />
                                        @else
                                            <div class="font-bolder text-xs text-white w-10 h-10 bg-primary rounded-full flex items-center justify-center zoom-in tooltip" title="{{ Auth::user()->fname.' '.Auth::user()->lname  }}">
                                                {{ $chat->receiver->fname[0].' '.$chat->receiver->lname[0] }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="ml-2 overflow-hidden">
                                        <div class="flex items-center">
                                            <a href="javascript:;" class="font-medium">{{ $chat->receiver->fname.' '.$chat->receiver->lname }}</a> 
                                        </div>
                                        <div class="w-full truncate text-slate-500 mt-0.5">{{ $chat->name}}</div>
                                        <small>{{ $chat->created_at->toFormattedDateString() }}</small>
                                    </div>
                                    {{-- <img width="56" height="5" src="uploads/sites/304/2022/06/logos.svg" class="attachment-full size-full" alt="" loading="lazy" /> --}}
                                </div>
                            @else 
                            {{-- If They Started the Chat --}}
                                <div onclick="startChat('{{ $chat->id }}', 'receiver', '{{ $chat->sender->fname.' '.$chat->sender->lname }}', '{{ $chat->sender->roles->pluck('name') }}')" 
                                    class="intro-x cursor-pointer rounded-lg bg-white mr-10 chat-list-item relative flex items-center p-5 mt-3">
                                    <div class="w-12 h-12 flex-none image-fit mr-1">
                                        @if($chat->sender->image_path != null)
                                            <img width="56" onerror="handleError(this);" height="5" src="{{ asset('public/storage/'.$chat->sender->image_path) }}" class="rounded-full attachment-full size-full" alt="" loading="lazy" />
                                        @else
                                            <div class="font-bolder text-xs text-white w-10 h-10 bg-warning rounded-full flex items-center justify-center zoom-in tooltip" title="{{ Auth::user()->fname.' '.Auth::user()->lname  }}">
                                                {{ $chat->sender->fname[0].' '.$chat->sender->lname[0] }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="ml-2 overflow-hidden">
                                        <div class="flex items-center">
                                            <a href="javascript:;" class="font-medium">{{ $chat->sender->fname.' '.$chat->sender->lname }}</a> 
                                        </div>
                                        <div class="w-full truncate text-slate-500 mt-0.5">{{ $chat->name}}</div>
                                        <small>{{ $chat->created_at->toFormattedDateString() }}</small>
                                    </div>
                                    {{-- <img width="56" height="5" src="uploads/sites/304/2022/06/logos.svg" class="attachment-full size-full" alt="" loading="lazy" /> --}}
                                </div>
                            @endif
                        @empty

                        @hasrole('counselor')
                        <div class="intro-x px-6 w-full mb-2">
                            <div class="lg:flex ">
                                <div class="box w-full lg:mb-0 mb-2 lg:pb-4 lg:w-1/2 p-4" style="padding:6%; background-image:url('{{ asset("/public/dist/memes/no-patients.jpg") }}'); background-size:cover; background-color:#9374AD;">
                                    <h4 class="text-lg font-medium mr-auto flex space-x-6 py-autox">
                                        No Patients Assigned to You
                                    </h4>
                                    
                                    <p>Make Online and Live Consultation Easily Easily with Nsansa Wellness</p>
    
                                    <button class="mt-10 btn btn-primary btn-sm">Request for a Patient</button>
                                </div>
                                <div class="lg:w-1/2 lg:px-2 sm:px-2">
                                    <div class="w-full">
                                        <div class="flex box w-full py-8 p-3 lg:m-3 text-white" style="background-color:#9374AD">
                                            <span class="mr-2">
                                                <img width="30px" src="https://cdn.iconscout.com/icon/free/png-256/ecosystem-2871958-2383613.png">
                                            </span>
                                            <span>
                                                A Complete mental health ecosystem
                                                <br>
                                                <small>
                                                    Earn ZMW 3000 as an online therapist
                                                </small>
                                            </span>
                                            <i data-lucide="chevron-right"></i>
                                        </div>
                                        <div class="box flex mt-2 py-8 p-3 m-3 text-white" style="background-color:#22A89C">
                                            <span class="mr-2">
                                                <img width="30px" class="rounded-full" src="https://cdn.iconscout.com/icon/premium/png-256-thumb/files-1433950-1211984.png?f=avif">
                                            </span>
                                            <span>
                                                Patient Record Management
                                                <br>
                                                <small>
                                                    Manage your patient medical information
                                                </small>
                                            </span>
                                            <i data-lucide="chevron-right"></i>
                                        </div>
                                        <div class="box flex mt-2 py-8 p-3 m-3" style="background-color:#e9f7ff">
                                            <span class="mr-2">
                                                <img width="30px" src="https://cdn.iconscout.com/icon/premium/png-256-thumb/activity-4-185786.png?f=avif">
                                            </span>
                                            <span>
                                                Assign Homework Activities and Actions
                                                <br>
                                                <small>
                                                    Create and assign homework activities for your patients.s
                                                </small>
                                            </span>
                                            <i data-lucide="chevron-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endhasrole

                        @hasrole('patient')
                            <div class="intro-x px-6">
                                <div class="my-6">
                                    <h2 class="text-lg font-medium mr-auto flex space-x-6 py-autox">
                                        <span>Get Help. Get Better</span>
                                    </h2>
                                    <div class="w-full">Get the Guidance you need from top Exprts right away.</div>
                                </div>
                                <div class="lg:flex ">
                                    <div class="lg:w-1/2 lg:px-2 sm:px-2">
                                        <div class="w-full">
                                            <div class="flex box w-full py-6 p-3 lg:m-3 text-white" style="background-color:#9374AD">
                                                <span class="mr-2">
                                                    <img width="30px" src="https://cdn.iconscout.com/icon/free/png-256/chatting-418-530377.png?f=avif">
                                                </span>
                                                <span>
                                                    Online Chat Sessions
                                                    <br>
                                                    <small>
                                                        Chat anonymously with an expert 
                                                    </small>
                                                </span>
                                                <i data-lucide="chevron-right"></i>
                                            </div>
                                            <div class="box flex mt-2 py-6 p-3 m-3 text-white" style="background-color:#AE04B4">
                                                <span class="mr-2">
                                                    <img width="30px" class="rounded-full" src="https://cdn.iconscout.com/icon/premium/png-256-thumb/video-call-103-772229.png?f=avif">
                                                </span>
                                                <span>
                                                    Voice and Video Calls
                                                    <br>
                                                    <small>
                                                        Speak to an expert or get on a call with them
                                                    </small>
                                                </span>
                                                <i data-lucide="chevron-right"></i>
                                            </div>
                                            <div class="box flex mt-2 py-6 p-3 m-3" style="background-color:#05C3E5">
                                                <span class="mr-2">
                                                    <img width="30px" src="https://cdn.iconscout.com/icon/premium/png-256-thumb/doctor-615-1178523.png?f=avif">
                                                </span>
                                                <span>
                                                    Face to Face Sessions
                                                    <br>    
                                                    <small>
                                                        Connect to 1-on-1 in-person with an expert.
                                                    </small>
                                                </span>
                                                <i data-lucide="chevron-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-white box w-full lg:mb-0 mb-2 lg:w-1/2 p-4" style="padding:6%; background-image:url('{{ asset("/public/dist/memes/remote.jpg") }}'); background-size:cover; background-color:#9374AD;">

                                        
                                        <h3>Making through life's toughest times. Together.</h3>
        
                                        <button class="mt-20 btn btn-warning btn-sm">Take a Quiz</button>
                                    </div>
                                </div>
                            </div>
                        @endhasrole
                        
                        @hasanyrole(['admin', 'administrator'])
                            <div class="intro-x cursor-pointer box relative flex items-center p-5 ">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img width="56" height="5" src="uploads/sites/304/2022/06/logos.svg" class="attachment-full rounded-full size-full" alt="" loading="lazy" />
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium">No Chat Available</a> 
                                    </div>
                                    <div class="w-full truncate text-slate-500 mt-0.5">Please wait while we process your files</div>
                                    {{-- <small>yyy</small> --}}
                                </div>
                                {{-- <img width="56" height="5" src="uploads/sites/304/2022/06/logos.svg" class="attachment-full size-full" alt="" loading="lazy" /> --}}
                            </div>
                        @endhasanyrole
                        @endforelse
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- END: Chat Side Menu -->
        <!-- BEGIN: Chat Content -->
        <div id="chatContent" class="convoBody invisible intro-y col-span-12 w-full">
            <div class="chat__box box xl:mx-6 mx-0">
                <!-- BEGIN: Chat Active -->
                {{-- @include('page.patients._partials.chat.chat_body') --}}
                <div class="hidden flex flex-col">
                    <div class="flex flex-col sm:flex-row border-b border-slate-200/60 dark:border-darkmode-400 px-5 py-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 sm:w-12 sm:h-12 flex-none image-fit relative">
                                <img alt="" class="rounded-full" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR4n4D5jth4fm4GE7ut7lWW-04lnDO2OkD-sg&usqp=CAU">
                            </div>
                            <div class="ml-3 mr-auto">
                                <div id="chat_receiver_name" class="font-medium text-base"></div>
                                <small id="chat_receiver_role" class="text-slate-500 text-xs sm:text-sm"><span class="mx-1">•</span> Online</small>
                            </div>

                            <button id="btnback2" onclick="back()">
                                <i data-lucide="undo" class="w-5 h-5"></i>
                            </button>
                        </div>
                        <div class="flex items-center sm:ml-auto mt-5 sm:mt-0 border-t sm:border-0 border-slate-200/60 pt-3 sm:pt-0 -mx-5 sm:mx-0 px-5 sm:px-0">
                            
                            <button class="mr-2" id="btnback" onclick="back()">
                                <i data-lucide="undo" class="w-5 h-5"></i>
                            </button>
                            {{-- startChat('{{ $chat->id }}', 'sender', '{{ $chat->receiver->fname.' '.$chat->receiver->lname }}', '{{ $chat->receiver->roles->pluck('name') }}' --}}
                            @hasanyrole(['admin', 'counselor'])
                                @if(!empty($chats->toArray()))
                                <a target="_blank" onclick="startVideoSession()" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal" class="btn btn-danger shadow-md mr-2">
                                    <i data-lucide="video" class="w-5 h-5"></i>
                                </a>
                                {{-- <a target="_blank" href="{{ route('phone-call', ['id'=> auth()->user()->id, 'chat_id' => $chats->first()->id, 'receiver' => $chats->first()->receiver->fname.' '.$chats->first()->receiver->lname, 'role' => preg_replace('/[^A-Za-z0-9. -]/', '', $chats->first()->receiver->roles->pluck('name')) ]) }}" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal" class="btn btn-success shadow-md mr-2">
                                    <i data-lucide="phone" class="w-5 h-5"></i>
                                </a> --}}
                                @endif
                            @else
                                <span id="patient_video_btn">
                                    
                                </span>
                                <span id="patient_phone_btn">
                                    
                                </span>
                            @endhasanyrole
                            
                        </div>
                    </div>

                    <div id="message_thread" style="height: 500; padding-bottom:100" class="overflow-y-scroll px-0 pb-30 lg:px-5 pt-5"></div>  
                    
                    <div class="bg-white w-full flex space-x-4 px-4 pt-4 items-center border-t border-slate-200/60 dark:border-darkmode-400" style="
                        position: absolute;
                        bottom: 10;
                        z-index:100;
                    ">

                        <textarea id="message_textbox" class="chat__box__input form-control dark:bg-darkmode-600 h-16 resize-none border-transparent px-5 py-3 shadow-sm focus:border-primary focus:ring-1" rows="1" placeholder="Type your message..."></textarea>

                        <a onclick="send()" href="javascript:;"  class="w-8 h-8 sm:w-10 p-6 sm:h-10 block bg-primary text-white rounded-full flex-none flex items-center justify-center mr-5"> 
                            <i data-lucide="send" class="w-4 h-4"></i> 
                        </a>
                    </div>
                </div>
                <!-- END: Chat Active -->
                <!-- BEGIN: Chat Default -->
                <div class="h-full flex items-center hidden">
                    <div class="mx-auto text-center">
                        {{-- <div class="w-16 h-16 flex-none image-fit rounded-full overflow-hidden mx-auto">
                            @if(Auth::User()->image_path == null)
                            <div class="font-bolder bg-primary text-white w-8 h-8 sm:w-10 sm:h-10 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip" title="{{ Auth::User()->fname.' '.Auth::User()->lname  }}">
                                {{ Auth::User()->fname[0].' '.Auth::User()->lname[0] }}
                            </div>
                            @else
                            <img alt="{{ Auth::User()->fname.' '.Auth::User()->lname }}" src="{{ asset('public/storage/'.Auth::user()->image_path) }}">
                            @endif
                        </div> --}}
                        {{-- <div class="mt-3">
                            <div class="font-medium">Hey, {{ Auth::User()->fname.' '.Auth::User()->lname }}</div>
                            @hasanyrole('patient')
                            <div class="text-slate-500 mt-1">Welcome back.</div>
                            @endhasanyrole
                            @hasanyrole('counselor')
                            <div class="text-slate-500 mt-1">{{ date("D M d, Y G:i") }}</div>
                            @endhasanyrole
                            @hasanyrole('admin')
                            <div class="text-slate-500 mt-1">{{ date("D M d, Y G:i") }}</div>
                            @endhasanyrole
                        </div> --}}
                    </div>
                </div>
                <!-- END: Chat Default -->
            </div>
        </div>
        <!-- END: Chat Content -->
    </div>
</div>

<div id="sessionPreloader" class="fixed top-0 left-0 right-0 bottom-0 w-full h-screen z-50 overflow-hidden bg-white flex flex-col items-center justify-center">
    {{-- <div class="loader ease-linear rounded-full border-4 border-t-4 border-gray-200 h-12 w-12 mb-4"></div> --}}
    <img src="{{ asset('public/img/1.gif') }}">
    <h2 class="text-center text-primary text-xl mt-10 font-semibold">Setting Up Session</h2>
    @hasanyrole(['admin', 'counselor'])
    <p id="hint1" class="w-1/3 text-center text-gray-200">Checking last conversations, please wait..</p>
    @else
    <p id="hint1" class="w-1/3 text-center text-gray-200">Notifying the counselor, please wait..</p>
    @endhasanyrole
</div>
@endsection

<?php
    $u_paid = auth()->user()->has_paid;    
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
<script>
    $(document).ready(function() {
        $('#sessionPreloader').hide();
        $('.convoBody').hide();
        const chatPage = document.querySelector('.chatPage');
        const h = window.innerHeight;
        const ht = window.screen.availHeight;
        const dh = window.screen.height;
        if (window.matchMedia("(max-width: 767px)").matches)
        {
            // The viewport is less than 768 pixels wide
            console.log("This is a mobile device.");
            chatPage.style.cssText += "height: "+h+"px; min-height:"+h+"px; device-height:"+h+"px; padding-top:6px; padding-left:0px; padding-right:0px;; padding-bottom:0px; margin:0px;"
        }else{
            chatPage.style.cssText += "height:100%; min-height:100%; device-height: 100%; padding-top:6px; padding-left:0px; padding-right:0px;; padding-bottom:0px; margin:0px;"
        }
    });

    var APP_URL = {!! json_encode(url('/')) !!};
    var user = {!! auth()->user()->toJson() ?? '' !!};
    var hasPaid = "{{ $u_paid }}"
    var user_role = "{{ preg_replace('/[^A-Za-z0-9. -]/', '',  auth()->user()->roles->pluck('name')) }}";

    var chat_id; 
    var count = 0; 
    var owner = null; 
    var receiver_role = null; 
    var receiver_name = null; 
    var aDay = 24*60*60*1000;
    var msgFeild = document.getElementById("message_textbox");

  
    function startChat(id, who, names, role){
        // if(hasPaid){
        // $('#nsansa_app').hide();
        $('#sessionPreloader').show();
        open_chat(id, who, names, role);

        // }else{
        //     if(user_role === 'counselor'){
        //         open_chat(id, who, names, role);
        //     }else{
        //         const pay_notice = tailwind.Modal.getInstance(document.querySelector("#payment-remainder-modal"));
        //         pay_notice.show();
        //     }
        // }
    }

    function open_chat(id, who, names, role){
        chat_id = id;
        // alert(chat_id);
        owner = who;
        receiver_role = role.toString().replace(/[^a-zA-Z ]/g, "");
        receiver_name = names;
        $('#chat_receiver_name').text(names);
        $('#chat_receiver_role').text(role.toString().replace(/[^a-zA-Z ]/g, "").toUpperCase());
        $('#message_thread').empty();
        $.ajax({
                type:'GET',
                url:'{{ route("chat.index") }}',
                data: {
                    id,owner
                },
                success:function(data) {
                    // State changes
                    $('.convoBody').show();
                    $('#chatList').hide(); 

                    let messages = data.chat_session.chat_messages;
                    
                    // UPDATED
                    for (const message of messages){

                        if(user['id'] != message.user_id){
                            $('#message_thread').append('<div class="intro-y chat__box__text-box flex justify-start float-left mb-4">\
                                <div class="w-10 h-10 hidden sm:block flex-none image-fit relative mr-5">\
                                    <img alt="'+ message.user.fname +'" class="rounded-full"  onerror="handleError(this);" src="">\
                                    </div>\
                                <div class="bg-slate-100 mt-2 dark:bg-darkmode-400 px-4 py-3 text-dark rounded-r-md rounded-t-md">\
                                                '+ message.message +'\
                                    <div class="mt-1 text-xs text-slate-500">'+timeSince(new Date(message.created_at))+'</div>\
                                            </div>\
                                            <div class="hidden sm:block dropdown ml-3 my-auto">\
                                        <a href="javascript:;" class="dropdown-toggle w-4 h-4 text-slate-500" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-4 h-4"></i> </a>\
                                        <div class="dropdown-menu w-40">\
                                            <ul class="dropdown-content">\
                                                <li>\
                                                    <a href="" class="dropdown-item"> <i data-lucide="corner-up-left" class="w-4 h-4 mr-2"></i> Reply </a>\
                                                </li>\
                                                <li>\
                                                    <a href="" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete </a>\
                                                </li>\
                                            </ul>\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="clear-both"></div>\
                            ');
                        }else{
                            $('#message_thread').append('<div class="intro-y chat__box__text-box flex items-end float-right mb-4">\
                            <div  style="background-color:#9ABCC3;" class="mt-2 dark:bg-darkmode-400 px-4 py-3 text-slate-500 rounded-r-md rounded-t-md">\
                                            '+ message.message +'\
                                <div class="mt-1 text-xs text-slate-500">'+timeSince(new Date(message.created_at))+'</div>\
                                        </div>\
                                        <div class="hidden sm:block dropdown ml-3 my-auto">\
                                    <a href="javascript:;" class="dropdown-toggle w-4 h-4 text-dark" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-4 h-4"></i> </a>\
                                    <div class="dropdown-menu w-40">\
                                        <ul class="dropdown-content">\
                                            <li>\
                                                <a href="" class="dropdown-item"> <i data-lucide="corner-up-left" class="w-4 h-4 mr-2"></i> Reply </a>\
                                            </li>\
                                            <li>\
                                                <a href="" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete </a>\
                                            </li>\
                                        </ul>\
                                    </div>\
                                </div>\
                                <div class="w-10 h-10 hidden sm:block flex-none image-fit relative mr-5">\
                                    <img alt="'+ message.user.fname +'" class="rounded-full"  onerror="handleError(this);" src="">\
                                </div>\
                            </div>\
                            <div class="clear-both"></div>\
                            ');
                        }
                    } 
                    $('#message_thread').scrollTop($('#message_thread')[0].scrollHeight);
                    $('#sessionPreloader').hide();
                    $('#nsansa_app').show();
                },
                
                error: function (msg) {
                    console.log(msg);
                    var errors = msg.responseJSON;
                }
            });
    }

    function send(){
        var message = $('#message_textbox').val();
        // alert(chat_id);
        // alert(message_id);
        let user_id = user['id'];
        let status = 1;
        // $('#message_thread').empty();
        // $('#message_thread div').empty();
        // {{-- Get chat message thread --}}
        $.ajax({
            type:'POST',
            url:'{{ route("chat.store") }}',
            data: {
                user_id,
                message,
                chat_id,
                status,
            },
            success:function(data) {    
                update();
                $('#message_textbox').val(''); 
                $('#message_thread').scrollTop($('#message_thread')[0].scrollHeight);
                
            },
            
            error: function (msg) {
                console.log(msg);
                var errors = msg.responseJSON;
            }
        });


    }

    // // Execute a function when the user presses a key on the keyboard
    // msgFeild.addEventListener("keypress", function(event) {
    // // If the user presses the "Enter" key on the keyboard
    //     if (event.key === "Enter") {
    //         // Cancel the default action, if needed
    //         event.preventDefault();
    //         // Trigger the button element with a click
    //         send();
    //     }
    // });

    function update(){
        let user_id = user['id'];
        if(chat_id !== undefined){
            $.ajax({    
                type:'GET',
                url:'{{ route("chat.stream") }}',
                data: { 
                    chat_id,owner
                },
                success:function(data) {
                    let messages = data.chat_messages;
                    console.log('Messages Thread Below');

                    try {
                        // console.log(Object.keys(messages).length);
                        // console.log(messages);
                        if(Object.keys(messages).length > 0){
                            for (const message of messages){
                                console.log(message);
                                if(user['id'] != message.user_id){
                                    $('#message_thread').append('<div class="chat__box__text-box flex justify-start float-left mb-4">\
                                        <div class="w-10 h-10 hidden sm:block flex-none image-fit relative mr-5">\
                                                <img alt="'+ message.user.fname +'" class="rounded-full"  onerror="handleError(this);" src="">\
                                            </div>\
                                        <div class="bg-slate-100 mt-2 dark:bg-darkmode-400 px-4 py-3 text-dark rounded-r-md rounded-t-md">\
                                                        '+ message.message +'\
                                            <div class="mt-1 text-xs text-slate-500">'+timeSince(new Date(message.created_at))+'</div>\
                                                    </div>\
                                                    <div class="hidden sm:block dropdown ml-3 my-auto">\
                                                <a href="javascript:;" class="dropdown-toggle w-4 h-4 text-slate-500" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-4 h-4"></i> </a>\
                                                <div class="dropdown-menu w-40">\
                                                    <ul class="dropdown-content">\
                                                        <li>\
                                                            <a href="" class="dropdown-item"> <i data-lucide="corner-up-left" class="w-4 h-4 mr-2"></i> Reply </a>\
                                                        </li>\
                                                        <li>\
                                                            <a href="" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete </a>\
                                                        </li>\
                                                    </ul>\
                                                </div>\
                                            </div>\
                                        </div>\
                                        <div class="clear-both"></div>\
                                    ');
                                    $('#message_thread').scrollTop($('#message_thread')[0].scrollHeight);
                                }else{
                                    $('#message_thread').append('<div class="chat__box__text-box flex items-end float-right mb-4">\
                                    <div  style="background-color:#9ABCC3;" class="mt-2 dark:bg-darkmode-400 px-4 py-3 text-dark rounded-r-md rounded-t-md">\
                                                    '+ message.message +'\
                                        <div class="mt-1 text-xs text-slate-500">'+timeSince(new Date(message.created_at))+'</div>\
                                                </div>\
                                                <div class="hidden sm:block dropdown ml-3 my-auto">\
                                            <a href="javascript:;" class="dropdown-toggle w-4 h-4 text-slate-500" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-4 h-4"></i> </a>\
                                            <div class="dropdown-menu w-40">\
                                                <ul class="dropdown-content">\
                                                    <li>\
                                                        <a href="" class="dropdown-item"> <i data-lucide="corner-up-left" class="w-4 h-4 mr-2"></i> Reply </a>\
                                                    </li>\
                                                    <li>\
                                                        <a href="" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete </a>\
                                                    </li>\
                                                </ul>\
                                            </div>\
                                        </div>\
                                        <div class="w-10 h-10 hidden sm:block flex-none image-fit relative mr-5">\
                                            <img alt="'+ message.user.fname +'" class="rounded-full"  onerror="handleError(this);" src="">\
                                        </div>\
                                    </div>\
                                    <div class="clear-both"></div>\
                                    ');

                                    $('#message_thread').scrollTop($('#message_thread')[0].scrollHeight);
                                }
                            }
                        } 
                    }catch(err){
                        console.log('Not updates yet');
                    }         
                },
                
                error: function (msg) {
                    console.log(msg);
                    var errors = msg.responseJSON;
                }
            });
        }
    }

    function init(){
        $('#message_thread').empty();
    }

    var default_avatar = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR4n4D5jth4fm4GE7ut7lWW-04lnDO2OkD-sg&usqp=CAU';
    
    function handleError(image) {
        image.src = default_avatar;
    }

    function back(){
        $('.convoBody').hide();
        $('.chatList').show();
    }
    function timeSince(timeStamp) {
        var now = new Date(), secondsPast = (now.getTime() - timeStamp) / 1000;
        if (secondsPast < 60) {
            return parseInt(secondsPast) + 's ago';
        }
        if (secondsPast < 3600) {
            return parseInt(secondsPast / 60) + 'min ago';
        }
        if (secondsPast <= 86400) {
            return parseInt(secondsPast / 3600) + 'h ago';
        }
        if (secondsPast > 86400) {
            day = timeStamp.getDate();
            month = timeStamp.toDateString().match(/ [a-zA-Z]*/)[0].replace(" ", "");
            year = timeStamp.getFullYear() == now.getFullYear() ? "" : " " + timeStamp.getFullYear();
            return day + " " + month + year;
        }
    }


    function startVideoSession(){
        var url = '/video-session/' + user['id'] + '/' + chat_id+'/'+receiver_name+'/'+receiver_role; 
        window.location.href = url;
    }

    
    function getVideoCallLink(){
        $.ajax({
            type:'GET',
            url:'{{ route("get.remote_id") }}',
            data: {
                chat_id
            },
            success:function(data) {
              console.log("======== VIDEO LiNk  =========");
              console.log(data.data);
              if(data.data !== null){
                count = 1;
                $('#patient_video_btn').empty();
                $('#patient_video_btn').append('\
                    <a target="_blank" href="'+APP_URL+'/therapy-session/'+ user['id']+'/'+ chat_id +'/receiver/patient/'+data.data.value+'" class="btn btn-danger shadow-md mr-2">\
                        <i data-lucide="video" class="w-5 h-5"></i>\
                    </a>');
                $('#patient_phone_btn').append('\
                    <a target="_blank" href="'+APP_URL+'/therapy-session/'+ user['id']+'/'+ chat_id +'/receiver/patient/'+data.data.value+'" class="btn btn-success shadow-md mr-2">\
                        <i data-lucide="phone" class="w-5 h-5"></i>\
                    </a>');
              }
            }
        });
    }

    var intervalId = window.setInterval(function(){
        update();
        console.log(chat_id !== undefined);
        console.log(count == 1);
        if(chat_id !== undefined){

            if(count == 0 && user_role == 'patient'){
                getVideoCallLink();
            }
        }
    }, 1000);

</script>