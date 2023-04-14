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
                                <div onclick="startChat('{{ $chat->id }}', 'sender', '{{ $chat->receiver->fname.' '.$chat->receiver->lname }}', '{{ $chat->receiver->roles->pluck('name') }}')" class="intro-x chat-list-item cursor-pointer relative flex items-center p-5">
                                    <div class="w-12 h-12 flex-none image-fit mr-1">
                                        @if($chat->sender->image_path != null) 
                                        <img width="56" onerror="handleError(this);" height="5" src="{{ asset('public/storage/'.$chat->receiver->image_path) }}" class="attachment-full rounded-full size-full" alt="" loading="lazy" />
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
                                <div onclick="startChat('{{ $chat->id }}', 'receiver', '{{ $chat->sender->fname.' '.$chat->sender->lname }}', '{{ $chat->sender->roles->pluck('name') }}')" class="intro-x cursor-pointer chat-list-item relative flex items-center p-5 mt-3">
                                    <div class="w-12 h-12 flex-none image-fit mr-1">
                                        @if($chat->sender->image_path != null)
                                        <img width="56" onerror="handleError(this);" height="5" src="{{ asset('public/storage/'.$chat->sender->image_path) }}" class="rounded-full attachment-full size-full" alt="" loading="lazy" />
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
            <div class="chat__box box">
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
                            {{-- <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal" class="btn btn-primary shadow-md mr-2">Video Call</a> --}}
                            {{-- <button class="btn btn-success shadow-md text-white mr-2"><i data-lucide="phone" class="w-5 h-5"></i></button> --}}
                            {{-- <a href="javascript:;" class="w-5 h-5 text-slate-500"> <i data-lucide="search" class="w-5 h-5"></i> </a>
                            <a href="javascript:;" class="w-5 h-5 text-slate-500 ml-5"> <i data-lucide="user-plus" class="w-5 h-5"></i> </a>
                            <div class="dropdown ml-auto sm:ml-3">
                                <a href="javascript:;" class="dropdown-toggle w-5 h-5 text-slate-500" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-5 h-5"></i> </a>
                                <div class="dropdown-menu w-40">
                                    <ul class="dropdown-content">
                                        <li>
                                            <a href="" class="dropdown-item"> <i data-lucide="share-2" class="w-4 h-4 mr-2"></i> Share Contact </a>
                                        </li>
                                        <li>
                                            <a href="" class="dropdown-item"> <i data-lucide="settings" class="w-4 h-4 mr-2"></i> Settings </a>
                                        </li>
                                        <li>
                                            <a href="" class="dropdown-item"> <i data-lucide="pause" class="w-4 h-4 mr-2"></i> Pause </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item"> <i data-lucide="users" class="w-4 h-4 mr-2"></i> Invite Someone </a>
                                        </li>
                                        <li>
                                            <a href="" class="dropdown-item"> <i data-lucide="stop" class="w-4 h-4 mr-2"></i> End Chat </a>
                                        </li>
                                    </ul>
                                </div>
                            </div> --}}
                        </div>
                    </div>

                    <div id="message_thread" style="height: 45%" class="overflow-y-scroll scrollbar-hidden px-0 lg:px-5 pt-5 flex-1">

                        {{-- <div class="chat__box__text-box flex items-end float-right mb-4">
                            <div class="hidden sm:block dropdown mr-3 my-auto">
                                <a href="javascript:;" class="dropdown-toggle w-4 h-4 text-slate-500" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-4 h-4"></i> </a>
                                <div class="dropdown-menu w-40">
                                    <ul class="dropdown-content">
                                        <li>
                                            <a href="" class="dropdown-item"> <i data-lucide="corner-up-left" class="w-4 h-4 mr-2"></i> Reply </a>
                                        </li>
                                        <li>
                                            <a href="" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="bg-primary px-4 py-3 text-white rounded-l-md rounded-t-md">
                                Lorem ipsum sit amen dolor, lorem ipsum sit amen dolor 
                                <div class="mt-1 text-xs text-white text-opacity-80">1 mins ago</div>
                            </div>
                            <div class="w-10 h-10 hidden sm:block flex-none image-fit relative ml-5">
                                <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-2.jpg">
                            </div>
                        </div>
                        <div class="clear-both"></div>
                        <div class="chat__box__text-box flex items-end float-right mb-4">
                            <div class="hidden sm:block dropdown mr-3 my-auto">
                                <a href="javascript:;" class="dropdown-toggle w-4 h-4 text-slate-500" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-4 h-4"></i> </a>
                                <div class="dropdown-menu w-40">
                                    <ul class="dropdown-content">
                                        <li>
                                            <a href="" class="dropdown-item"> <i data-lucide="corner-up-left" class="w-4 h-4 mr-2"></i> Reply </a>
                                        </li>
                                        <li>
                                            <a href="" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="bg-primary px-4 py-3 text-white rounded-l-md rounded-t-md">
                                Lorem ipsum sit amen dolor, lorem ipsum sit amen dolor 
                                <div class="mt-1 text-xs text-white text-opacity-80">59 secs ago</div>
                            </div>
                            <div class="w-10 h-10 hidden sm:block flex-none image-fit relative ml-5">
                                <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-2.jpg">
                            </div>
                        </div>
                        <div class="clear-both"></div>
                        <div class="text-slate-400 dark:text-slate-500 text-xs text-center mb-10 mt-5">12 June 2020</div>
                        <div class="chat__box__text-box flex items-end float-left mb-4">
                            <div class="w-10 h-10 hidden sm:block flex-none image-fit relative mr-5">
                                <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-2.jpg">
                            </div>
                            <div class="bg-slate-100 dark:bg-darkmode-400 px-4 py-3 text-slate-500 rounded-r-md rounded-t-md">
                                Lorem ipsum sit amen dolor, lorem ipsum sit amen dolor 
                                <div class="mt-1 text-xs text-slate-500">10 secs ago</div>
                            </div>
                            <div class="hidden sm:block dropdown ml-3 my-auto">
                                <a href="javascript:;" class="dropdown-toggle w-4 h-4 text-slate-500" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-4 h-4"></i> </a>
                                <div class="dropdown-menu w-40">
                                    <ul class="dropdown-content">
                                        <li>
                                            <a href="" class="dropdown-item"> <i data-lucide="corner-up-left" class="w-4 h-4 mr-2"></i> Reply </a>
                                        </li>
                                        <li>
                                            <a href="" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="clear-both"></div>
                        <div class="chat__box__text-box flex items-end float-right mb-4">
                            <div class="hidden sm:block dropdown mr-3 my-auto">
                                <a href="javascript:;" class="dropdown-toggle w-4 h-4 text-slate-500" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-4 h-4"></i> </a>
                                <div class="dropdown-menu w-40">
                                    <ul class="dropdown-content">
                                        <li>
                                            <a href="" class="dropdown-item"> <i data-lucide="corner-up-left" class="w-4 h-4 mr-2"></i> Reply </a>
                                        </li>
                                        <li>
                                            <a href="" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="bg-primary px-4 py-3 text-white rounded-l-md rounded-t-md">
                                Lorem ipsum 
                                <div class="mt-1 text-xs text-white text-opacity-80">1 secs ago</div>
                            </div>
                            <div class="w-10 h-10 hidden sm:block flex-none image-fit relative ml-5">
                                <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-2.jpg">
                            </div>
                        </div>
                        <div class="clear-both"></div>
                        <div class="chat__box__text-box flex items-end float-left mb-4">
                            <div class="w-10 h-10 hidden sm:block flex-none image-fit relative mr-5">
                                <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-2.jpg">
                            </div>
                            <div class="bg-slate-100 dark:bg-darkmode-400 px-4 py-3 text-slate-500 rounded-r-md rounded-t-md">
                                Kate Winslet is typing 
                                <span class="typing-dots ml-1"> <span>.</span> <span>.</span> <span>.</span> </span>
                            </div>
                        </div> --}}
                        {{-- <span>No internet connection</span> --}}
                    </div>  
                    <div class="pt-4 pb-10 sm:py-4 flex items-center border-t border-slate-200/60 dark:border-darkmode-400">
                        <textarea id="message_textbox" class="chat__box__input form-control dark:bg-darkmode-600 h-16 resize-none border-transparent px-5 py-3 shadow-none focus:border-transparent focus:ring-0" rows="1" placeholder="Type your message..."></textarea>
                        <div class="flex absolute sm:static left-0 bottom-0 ml-5 sm:ml-0 mb-5 sm:mb-0">
                            <div class="dropdown mr-3 sm:mr-5">
                                {{-- <a href="javascript:;" class="dropdown-toggle w-4 h-4 sm:w-5 sm:h-5 block text-slate-500" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="smile" class="w-full h-full"></i> </a> --}}
                                <div class="chat-dropdown dropdown-menu">
                                    <div class="dropdown-content">
                                        <div class="chat-dropdown__box flex flex-col">
                                            <div class="px-1 pt-1">
                                                <div class="relative text-slate-500">
                                                    <input type="text" class="form-control border-transparent bg-slate-100 pr-10" placeholder="Search emojis...">
                                                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i> 
                                                </div>
                                            </div>
                                            <ul class="chat-dropdown__box__tabs nav nav-pills px-1 mt-5" role="tablist">
                                                <li id="history-tab" class="nav-item flex-1" role="presentation">
                                                    <button data-tw-toggle="tab" data-tw-target="#history" class="nav-link border-0 w-full px-0 py-2 hover:bg-slate-100 dark:hover:bg-darkmode-400" role="tab" aria-controls="history" aria-selected="false">
                                                        <svg class="w-4 h-4 mx-auto" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="currentColor" d="M504 255.531c.253 136.64-111.18 248.372-247.82 248.468-59.015.042-113.223-20.53-155.822-54.911-11.077-8.94-11.905-25.541-1.839-35.607l11.267-11.267c8.609-8.609 22.353-9.551 31.891-1.984C173.062 425.135 212.781 440 256 440c101.705 0 184-82.311 184-184 0-101.705-82.311-184-184-184-48.814 0-93.149 18.969-126.068 49.932l50.754 50.754c10.08 10.08 2.941 27.314-11.313 27.314H24c-8.837 0-16-7.163-16-16V38.627c0-14.254 17.234-21.393 27.314-11.314l49.372 49.372C129.209 34.136 189.552 8 256 8c136.81 0 247.747 110.78 248 247.531zm-180.912 78.784l9.823-12.63c8.138-10.463 6.253-25.542-4.21-33.679L288 256.349V152c0-13.255-10.745-24-24-24h-16c-13.255 0-24 10.745-24 24v135.651l65.409 50.874c10.463 8.137 25.541 6.253 33.679-4.21z"></path>
                                                        </svg>
                                                    </button>
                                                </li>
                                                <li id="smile-tab" class="nav-item flex-1" role="presentation">
                                                    <button data-tw-toggle="tab" data-tw-target="#smile" class="nav-link border-0 w-full px-0 py-2 hover:bg-slate-100 dark:hover:bg-darkmode-400 active" role="tab" aria-controls="smile" aria-selected="true">
                                                        <svg class="w-4 h-4 mx-auto" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                                                            <path fill="currentColor" d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 448c-110.3 0-200-89.7-200-200S137.7 56 248 56s200 89.7 200 200-89.7 200-200 200zm-80-216c17.7 0 32-14.3 32-32s-14.3-32-32-32-32 14.3-32 32 14.3 32 32 32zm160 0c17.7 0 32-14.3 32-32s-14.3-32-32-32-32 14.3-32 32 14.3 32 32 32zm4 72.6c-20.8 25-51.5 39.4-84 39.4s-63.2-14.3-84-39.4c-8.5-10.2-23.7-11.5-33.8-3.1-10.2 8.5-11.5 23.6-3.1 33.8 30 36 74.1 56.6 120.9 56.6s90.9-20.6 120.9-56.6c8.5-10.2 7.1-25.3-3.1-33.8-10.1-8.4-25.3-7.1-33.8 3.1z"></path>
                                                        </svg>
                                                    </button>
                                                </li>
                                                <li id="cat-tab" class="nav-item flex-1" role="presentation">
                                                    <button data-tw-toggle="tab" data-tw-target="#cat" class="nav-link border-0 w-full px-0 py-2 hover:bg-slate-100 dark:hover:bg-darkmode-400" role="tab" aria-controls="cat" aria-selected="false">
                                                        <svg class="w-4 h-4 mx-auto" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="currentColor" d="M290.59 192c-20.18 0-106.82 1.98-162.59 85.95V192c0-52.94-43.06-96-96-96-17.67 0-32 14.33-32 32s14.33 32 32 32c17.64 0 32 14.36 32 32v256c0 35.3 28.7 64 64 64h176c8.84 0 16-7.16 16-16v-16c0-17.67-14.33-32-32-32h-32l128-96v144c0 8.84 7.16 16 16 16h32c8.84 0 16-7.16 16-16V289.86c-10.29 2.67-20.89 4.54-32 4.54-61.81 0-113.52-44.05-125.41-102.4zM448 96h-64l-64-64v134.4c0 53.02 42.98 96 96 96s96-42.98 96-96V32l-64 64zm-72 80c-8.84 0-16-7.16-16-16s7.16-16 16-16 16 7.16 16 16-7.16 16-16 16zm80 0c-8.84 0-16-7.16-16-16s7.16-16 16-16 16 7.16 16 16-7.16 16-16 16z"></path>
                                                        </svg>
                                                    </button>
                                                </li>
                                                <li id="coffee-tab" class="nav-item flex-1" role="presentation">
                                                    <button data-tw-toggle="tab" data-tw-target="#coffee" class="nav-link border-0 w-full px-0 py-2 hover:bg-slate-100 dark:hover:bg-darkmode-400" role="tab" aria-controls="coffee" aria-selected="false">
                                                        <svg class="w-4 h-4 mx-auto" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                                            <path fill="currentColor" d="M192 384h192c53 0 96-43 96-96h32c70.6 0 128-57.4 128-128S582.6 32 512 32H120c-13.3 0-24 10.7-24 24v232c0 53 43 96 96 96zM512 96c35.3 0 64 28.7 64 64s-28.7 64-64 64h-32V96h32zm47.7 384H48.3c-47.6 0-61-64-36-64h583.3c25 0 11.8 64-35.9 64z"></path>
                                                        </svg>
                                                    </button>
                                                </li>
                                                <li id="futbol-tab" class="nav-item flex-1" role="presentation">
                                                    <button data-tw-toggle="tab" data-tw-target="#futbol" class="nav-link border-0 w-full px-0 py-2 hover:bg-slate-100 dark:hover:bg-darkmode-400" role="tab" aria-controls="futbol" aria-selected="false">
                                                        <svg class="w-4 h-4 mx-auto" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zm-48 0l-.003-.282-26.064 22.741-62.679-58.5 16.454-84.355 34.303 3.072c-24.889-34.216-60.004-60.089-100.709-73.141l13.651 31.939L256 139l-74.953-41.525 13.651-31.939c-40.631 13.028-75.78 38.87-100.709 73.141l34.565-3.073 16.192 84.355-62.678 58.5-26.064-22.741-.003.282c0 43.015 13.497 83.952 38.472 117.991l7.704-33.897 85.138 10.447 36.301 77.826-29.902 17.786c40.202 13.122 84.29 13.148 124.572 0l-29.902-17.786 36.301-77.826 85.138-10.447 7.704 33.897C442.503 339.952 456 299.015 456 256zm-248.102 69.571l-29.894-91.312L256 177.732l77.996 56.527-29.622 91.312h-96.476z"></path>
                                                        </svg>
                                                    </button>
                                                </li>
                                                <li id="building-tab" class="nav-item flex-1" role="presentation">
                                                    <button data-tw-toggle="tab" data-tw-target="#building" class="nav-link border-0 w-full px-0 py-2 hover:bg-slate-100 dark:hover:bg-darkmode-400" role="tab" aria-controls="building" aria-selected="false">
                                                        <svg class="w-4 h-4 mx-auto" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                            <path fill="currentColor" d="M128 148v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12zm140 12h40c6.6 0 12-5.4 12-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12zm-128 96h40c6.6 0 12-5.4 12-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12zm128 0h40c6.6 0 12-5.4 12-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12zm-76 84v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm76 12h40c6.6 0 12-5.4 12-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12zm180 124v36H0v-36c0-6.6 5.4-12 12-12h19.5V24c0-13.3 10.7-24 24-24h337c13.3 0 24 10.7 24 24v440H436c6.6 0 12 5.4 12 12zM79.5 463H192v-67c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v67h112.5V49L80 48l-.5 415z"></path>
                                                        </svg>
                                                    </button>
                                                </li>
                                                <li id="lightbulb-tab" class="nav-item flex-1" role="presentation">
                                                    <button data-tw-toggle="tab" data-tw-target="#lightbulb" class="nav-link border-0 w-full px-0 py-2 hover:bg-slate-100 dark:hover:bg-darkmode-400" role="tab" aria-controls="lightbulb" aria-selected="false">
                                                        <svg class="w-4 h-4 mx-auto" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512">
                                                            <path fill="currentColor" d="M176 80c-52.94 0-96 43.06-96 96 0 8.84 7.16 16 16 16s16-7.16 16-16c0-35.3 28.72-64 64-64 8.84 0 16-7.16 16-16s-7.16-16-16-16zM96.06 459.17c0 3.15.93 6.22 2.68 8.84l24.51 36.84c2.97 4.46 7.97 7.14 13.32 7.14h78.85c5.36 0 10.36-2.68 13.32-7.14l24.51-36.84c1.74-2.62 2.67-5.7 2.68-8.84l.05-43.18H96.02l.04 43.18zM176 0C73.72 0 0 82.97 0 176c0 44.37 16.45 84.85 43.56 115.78 16.64 18.99 42.74 58.8 52.42 92.16v.06h48v-.12c-.01-4.77-.72-9.51-2.15-14.07-5.59-17.81-22.82-64.77-62.17-109.67-20.54-23.43-31.52-53.15-31.61-84.14-.2-73.64 59.67-128 127.95-128 70.58 0 128 57.42 128 128 0 30.97-11.24 60.85-31.65 84.14-39.11 44.61-56.42 91.47-62.1 109.46a47.507 47.507 0 0 0-2.22 14.3v.1h48v-.05c9.68-33.37 35.78-73.18 52.42-92.16C335.55 260.85 352 220.37 352 176 352 78.8 273.2 0 176 0z"></path>
                                                        </svg>
                                                    </button>
                                                </li>
                                                <li id="music-tab" class="nav-item flex-1" role="presentation">
                                                    <button data-tw-toggle="tab" data-tw-target="#music" class="nav-link border-0 w-full px-0 py-2 hover:bg-slate-100 dark:hover:bg-darkmode-400" role="tab" aria-controls="music" aria-selected="false">
                                                        <svg class="w-4 h-4 mx-auto" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="currentColor" d="M511.99 32.01c0-21.71-21.1-37.01-41.6-30.51L150.4 96c-13.3 4.2-22.4 16.5-22.4 30.5v261.42c-10.05-2.38-20.72-3.92-32-3.92-53.02 0-96 28.65-96 64s42.98 64 96 64 96-28.65 96-64V214.31l256-75.02v184.63c-10.05-2.38-20.72-3.92-32-3.92-53.02 0-96 28.65-96 64s42.98 64 96 64 96-28.65 96-64l-.01-351.99z"></path>
                                                        </svg>
                                                    </button>
                                                </li>
                                            </ul>
                                            <div class="tab-content overflow-hidden mt-5">
                                                <div id="history" class="h-full tab-pane" role="tabpanel" aria-labelledby="history-tab">
                                                    <div class="font-medium px-1">Recent Emojis</div>
                                                    <div class="h-full pb-10 overflow-y-auto scrollbar-hidden mt-2">
                                                        <div class="grid grid-cols-8 text-2xl">
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😀</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😁</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😂</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="smile" class="h-full tab-pane active" role="tabpanel" aria-labelledby="smile-tab">
                                                    <div class="font-medium px-1">Smileys & People</div>
                                                    <div class="h-full pb-10 overflow-y-auto scrollbar-hidden mt-2">
                                                        <div class="grid grid-cols-8 text-2xl">
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😀</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😁</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😂</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤣</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😃</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😄</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😅</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😆</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😉</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😊</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😋</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😎</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😍</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😘</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😗</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😙</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😚</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">☺️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🙂</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤗</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤩</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤔</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤨</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😐</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😑</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😶</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🙄</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😏</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😣</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😥</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😮</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤐</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😯</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😪</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😫</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😴</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😌</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😛</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😜</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😝</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤤</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😒</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😓</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😔</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😕</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🙃</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤑</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😲</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">☹️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🙁</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😖</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😞</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😟</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😤</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😢</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😭</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😦</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😧</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😨</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😩</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤯</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😬</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😰</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😱</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😳</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤪</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😵</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😡</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😠</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤬</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😷</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤒</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤕</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤢</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤮</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤧</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😇</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤠</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤡</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤥</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤫</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤭</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧐</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤓</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😈</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👿</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👹</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👺</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💀</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">☠️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👻</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👽</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👾</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤖</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💩</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😺</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😸</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😹</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😻</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😼</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😽</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🙀</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😿</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">😾</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🙈</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🙉</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🙊</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👶</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧒</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👦</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👧</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧑</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👨</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👩</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧓</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👴</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👵</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👨&zwj;⚕️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👩&zwj;⚕️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👨&zwj;🎓</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👩&zwj;🎓</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👨&zwj;🏫</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👩&zwj;🏫</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👨&zwj;⚖️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👩&zwj;⚖️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👨&zwj;🌾</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👩&zwj;🌾</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👨&zwj;🍳</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👩&zwj;🍳</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👨&zwj;🔧</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👩&zwj;🔧</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👨&zwj;🏭</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👩&zwj;🏭</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👨&zwj;💼</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👩&zwj;💼</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👨&zwj;🔬</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👩&zwj;🔬</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👨&zwj;💻</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👩&zwj;💻</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👨&zwj;🎤</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👩&zwj;🎤</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👨&zwj;🎨</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👩&zwj;🎨</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👨&zwj;✈️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👩&zwj;✈️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👨&zwj;🚀</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👩&zwj;🚀</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👨&zwj;🚒</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👩&zwj;🚒</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👮</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👮&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👮&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕵️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕵️&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕵️&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💂</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💂&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💂&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👷</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👷&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👷&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤴</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👸</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👳</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👳&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👳&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👲</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧕</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧔</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👱</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👱&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👱&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤵</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👰</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤰</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤱</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👼</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎅</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤶</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧙</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧙&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧙&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧚</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧚&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧚&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧛</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧛&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧛&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧜</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧜&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧜&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧝</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧝&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧝&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧞</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧞&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧞&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧟</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧟&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧟&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🙍</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🙍&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🙍&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🙎</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🙎&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🙎&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🙅</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🙅&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🙅&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🙆</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🙆&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🙆&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💁</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💁&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💁&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🙋</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🙋&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🙋&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🙇</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🙇&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🙇&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤦</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤦&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤦&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤷</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤷&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤷&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💆</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💆&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💆&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💇</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💇&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💇&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚶</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚶&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚶&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏃</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏃&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏃&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💃</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕺</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👯</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👯&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👯&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧖</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧖&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧖&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧗</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧗&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧗&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧘</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧘&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧘&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🛀</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🛌</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕴️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🗣️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👤</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👥</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤺</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏇</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⛷️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏂</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏌️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏌️&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏌️&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏄</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏄&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏄&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚣</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚣&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚣&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏊</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏊&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏊&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⛹️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⛹️&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⛹️&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏋️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏋️&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏋️&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚴</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚴&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚴&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚵</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚵&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚵&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏎️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏍️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤸</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤸&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤸&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤼</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤼&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤼&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤽</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤽&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤽&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤾</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤾&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤾&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤹</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤹&zwj;♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤹&zwj;♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👫</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👬</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👭</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💏</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👩&zwj;❤️&zwj;💋&zwj;👨</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👨&zwj;❤️&zwj;💋&zwj;👨</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👩&zwj;❤️&zwj;💋&zwj;👩</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💑</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👩&zwj;❤️&zwj;👨</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👨&zwj;❤️&zwj;👨</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👩&zwj;❤️&zwj;👩</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👪</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👨&zwj;👩&zwj;👦</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👨&zwj;👩&zwj;👧</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👨&zwj;👩&zwj;👧&zwj;👦</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👨&zwj;👩&zwj;👦&zwj;👦</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👨&zwj;👩&zwj;👧&zwj;👧</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👨&zwj;👨&zwj;👦</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👨&zwj;👨&zwj;👧</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👨&zwj;👨&zwj;👧&zwj;👦</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👨&zwj;👨&zwj;👦&zwj;👦</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👨&zwj;👨&zwj;👧&zwj;👧</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👩&zwj;👩&zwj;👦</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👩&zwj;👩&zwj;👧</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👩&zwj;👩&zwj;👧&zwj;👦</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👩&zwj;👩&zwj;👦&zwj;👦</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👩&zwj;👩&zwj;👧&zwj;👧</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👨&zwj;👦</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👨&zwj;👦&zwj;👦</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👨&zwj;👧</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👨&zwj;👧&zwj;👦</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👨&zwj;👧&zwj;👧</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👩&zwj;👦</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👩&zwj;👦&zwj;👦</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👩&zwj;👧</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👩&zwj;👧&zwj;👦</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👩&zwj;👧&zwj;👧</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤳</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💪</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👈</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👉</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">☝️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👆</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🖕</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👇</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">✌️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤞</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🖖</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤘</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤙</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🖐️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">✋</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👌</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👍</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👎</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">✊</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👊</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤛</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤜</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤚</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👋</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤟</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">✍️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👏</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👐</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🙌</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤲</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🙏</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🤝</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💅</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👂</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👃</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👣</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👀</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👁️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👁️&zwj;🗨️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧠</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👅</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👄</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💋</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💘</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">❤️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💓</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💔</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💕</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💖</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💗</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💙</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💚</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💛</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧡</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💜</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🖤</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💝</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💞</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💟</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">❣️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💌</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💤</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💢</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💣</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💥</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💦</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💨</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💫</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💬</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🗨️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🗯️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💭</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕳️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👓</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕶️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👔</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👕</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👖</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧣</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧤</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧥</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧦</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👗</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👘</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👙</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👚</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👛</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👜</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👝</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🛍️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎒</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👞</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👟</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👠</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👡</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👢</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👑</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">👒</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎩</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎓</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧢</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⛑️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📿</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💄</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💍</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💎</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="cat" class="h-full tab-pane" role="tabpanel" aria-labelledby="cat-tab">
                                                    <div class="font-medium px-1">Animals & Nature</div>
                                                    <div class="h-full pb-10 overflow-y-auto scrollbar-hidden mt-2">
                                                        <div class="grid grid-cols-8 text-2xl">
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐵</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐒</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🦍</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐶</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐕</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐩</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐺</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🦊</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐱</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐈</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🦁</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐯</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐅</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐆</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐴</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐎</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🦄</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🦓</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🦌</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐮</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐂</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐃</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐄</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐷</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐖</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐗</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐽</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐏</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐑</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐐</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐪</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐫</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🦒</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐘</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🦏</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐭</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐁</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐀</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐹</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐰</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐇</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐿️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🦔</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🦇</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐻</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐨</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐼</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐾</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🦃</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐔</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐓</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐣</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐤</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐥</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐦</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐧</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕊️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🦅</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🦆</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🦉</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐸</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐊</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐢</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🦎</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐍</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐲</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐉</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🦕</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🦖</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐳</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐋</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐬</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐟</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐠</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐡</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🦈</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐙</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐚</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🦀</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🦐</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🦑</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐌</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🦋</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐛</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐜</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐝</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🐞</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🦗</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕷️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕸️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🦂</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💐</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌸</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💮</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏵️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌹</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥀</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌺</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌻</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌼</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌷</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌱</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌲</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌳</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌴</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌵</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌾</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌿</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">☘️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍀</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍁</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍂</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍃</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="coffee" class="h-full tab-pane" role="tabpanel" aria-labelledby="coffee-tab">
                                                    <div class="font-medium px-1">Food & Drink</div>
                                                    <div class="h-full pb-10 overflow-y-auto scrollbar-hidden mt-2">
                                                        <div class="grid grid-cols-8 text-2xl">
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍇</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍈</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍉</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍊</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍋</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍌</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍍</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍎</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍏</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍐</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍑</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍒</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍓</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥝</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍅</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥥</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥑</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍆</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥔</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥕</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌽</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌶️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥒</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥦</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍄</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥜</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌰</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍞</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥐</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥖</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥨</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥞</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🧀</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍖</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍗</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥩</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥓</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍔</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍟</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍕</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌭</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥪</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌮</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌯</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥙</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥚</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍳</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥘</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍲</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥣</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥗</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍿</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥫</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍱</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍘</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍙</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍚</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍛</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍜</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍝</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍠</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍢</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍣</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍤</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍥</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍡</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥟</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥠</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥡</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍦</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍧</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍨</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍩</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍪</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎂</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍰</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥧</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍫</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍬</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍭</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍮</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍯</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍼</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥛</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">☕</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍵</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍶</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍾</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍷</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍸</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍹</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍺</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍻</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥂</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥃</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥤</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥢</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍽️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🍴</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥄</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔪</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏺</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="futbol" class="h-full tab-pane" role="tabpanel" aria-labelledby="futbol-tab">
                                                    <div class="font-medium px-1">Activities</div>
                                                    <div class="h-full pb-10 overflow-y-auto scrollbar-hidden mt-2">
                                                        <div class="grid grid-cols-8 text-2xl">
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎃</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎄</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎆</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎇</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">✨</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎈</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎉</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎊</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎋</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎍</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎎</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎏</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎐</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎑</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎀</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎁</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎗️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎟️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎫</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎖️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏆</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏅</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥇</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥈</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥉</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⚽</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⚾</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏀</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏐</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏈</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏉</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎾</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎱</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎳</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏏</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏑</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏒</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏓</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏸</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥊</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥋</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥅</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎯</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⛳</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⛸️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎣</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎽</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎿</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🛷</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥌</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎮</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕹️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎲</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">♠️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">♥️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">♦️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">♣️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🃏</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🀄</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎴</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="building" class="h-full tab-pane" role="tabpanel" aria-labelledby="building-tab">
                                                    <div class="font-medium px-1">Travel & Places</div>
                                                    <div class="h-full pb-10 overflow-y-auto scrollbar-hidden mt-2">
                                                        <div class="grid grid-cols-8 text-2xl">
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌍</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌎</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌏</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌐</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🗺️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🗾</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏔️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⛰️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌋</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🗻</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏕️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏖️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏜️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏝️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏞️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏟️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏛️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏗️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏘️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏙️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏚️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏠</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏡</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏢</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏣</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏤</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏥</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏦</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏨</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏩</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏪</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏫</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏬</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏭</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏯</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏰</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💒</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🗼</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🗽</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⛪</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕌</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕍</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⛩️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕋</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⛲</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⛺</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌁</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌃</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌄</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌅</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌆</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌇</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌉</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">♨️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌌</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎠</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎡</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎢</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💈</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎪</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎭</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🖼️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎨</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎰</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚂</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚃</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚄</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚅</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚆</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚇</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚈</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚉</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚊</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚝</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚞</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚋</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚌</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚍</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚎</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚐</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚑</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚒</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚓</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚔</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚕</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚖</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚗</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚘</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚙</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚚</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚛</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚜</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚲</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🛴</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🛵</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚏</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🛣️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🛤️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⛽</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚨</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚥</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚦</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚧</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🛑</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⚓</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⛵</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🛶</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚤</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🛳️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⛴️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🛥️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚢</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">✈️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🛩️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🛫</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🛬</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💺</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚁</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚟</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚠</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚡</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🛰️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚀</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🛸</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🛎️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚪</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🛏️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🛋️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚽</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚿</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🛁</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⌛</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⏳</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⌚</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⏰</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⏱️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⏲️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕰️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕛</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕧</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕐</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕜</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕑</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕝</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕒</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕞</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕓</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕟</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕔</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕠</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕕</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕡</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕖</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕢</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕗</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕣</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕘</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕤</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕙</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕥</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕚</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕦</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌑</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌒</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌓</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌔</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌕</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌖</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌗</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌘</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌙</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌚</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌛</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌜</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌡️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">☀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌝</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌞</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⭐</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌟</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌠</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">☁️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⛅</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⛈️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌤️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌥️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌦️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌧️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌨️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌩️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌪️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌫️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌬️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌀</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌈</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌂</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">☂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">☔</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⛱️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⚡</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">❄️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">☃️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⛄</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">☄️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔥</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💧</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🌊</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="lightbulb" class="h-full tab-pane" role="tabpanel" aria-labelledby="lightbulb-tab">
                                                    <div class="font-medium px-1">Objects</div>
                                                    <div class="h-full pb-10 overflow-y-auto scrollbar-hidden mt-2">
                                                        <div class="grid grid-cols-8 text-2xl">
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔇</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔈</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔉</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔊</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📢</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📣</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📯</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔔</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔕</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎼</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎵</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎶</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎙️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎚️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎛️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎤</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎧</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📻</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎷</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎸</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎹</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎺</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎻</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🥁</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📱</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📲</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">☎️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📞</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📟</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📠</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔋</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔌</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💻</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🖥️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🖨️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⌨️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🖱️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🖲️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💽</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💾</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💿</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📀</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎥</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎞️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📽️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎬</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📺</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📷</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📸</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📹</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📼</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔍</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔎</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔬</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔭</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📡</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕯️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💡</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔦</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏮</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📔</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📕</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📖</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📗</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📘</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📙</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📚</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📓</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📒</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📃</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📜</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📄</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📰</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🗞️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📑</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔖</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏷️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💰</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💴</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💵</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💶</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💷</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💸</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💳</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💹</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💱</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💲</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">✉️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📧</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📨</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📩</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📤</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📥</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📦</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📫</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📪</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📬</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📭</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📮</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🗳️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">✏️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">✒️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🖋️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🖊️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🖌️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🖍️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📝</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💼</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📁</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📂</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🗂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📅</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📆</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🗒️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🗓️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📇</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📈</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📉</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📊</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📋</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📌</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📍</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📎</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🖇️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📏</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📐</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">✂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🗃️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🗄️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🗑️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔒</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔓</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔏</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔐</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔑</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🗝️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔨</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⛏️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⚒️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🛠️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🗡️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⚔️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔫</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏹</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🛡️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔧</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔩</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⚙️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🗜️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⚗️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⚖️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔗</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⛓️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💉</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💊</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚬</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⚰️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⚱️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🗿</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🛢️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔮</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🛒</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="music" class="h-full tab-pane" role="tabpanel" aria-labelledby="music-tab">
                                                    <div class="font-medium px-1">Symbols</div>
                                                    <div class="h-full pb-10 overflow-y-auto scrollbar-hidden mt-2">
                                                        <div class="grid grid-cols-8 text-2xl">
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🏧</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚮</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚰</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">♿</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚹</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚺</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚻</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚼</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚾</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🛂</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🛃</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🛄</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🛅</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⚠️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚸</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⛔</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚫</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚳</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚭</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚯</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚱</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🚷</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📵</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔞</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">☢️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">☣️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⬆️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">↗️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">➡️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">↘️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⬇️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">↙️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⬅️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">↖️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">↕️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">↔️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">↩️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">↪️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⤴️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⤵️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔃</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔄</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔙</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔚</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔛</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔜</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔝</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🛐</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⚛️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕉️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">✡️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">☸️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">☯️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">✝️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">☦️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">☪️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">☮️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🕎</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔯</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">♈</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">♉</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">♊</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">♋</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">♌</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">♍</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">♎</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">♏</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">♐</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">♑</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">♒</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">♓</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⛎</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔀</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔁</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔂</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">▶️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⏩</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⏭️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⏯️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">◀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⏪</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⏮️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔼</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⏫</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔽</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⏬</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⏸️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⏹️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⏺️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⏏️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🎦</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔅</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔆</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📶</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📳</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📴</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">♀️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">♂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⚕️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">♻️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⚜️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔱</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">📛</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔰</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⭕</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">✅</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">☑️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">✔️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">✖️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">❌</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">❎</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">➕</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">➖</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">➗</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">➰</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">➿</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">〽️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">✳️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">✴️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">❇️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">‼️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⁉️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">❓</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">❔</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">❕</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">❗</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">〰️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">©️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">®️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">™️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">#️⃣</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">*️⃣</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">0️⃣</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">1️⃣</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">2️⃣</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">3️⃣</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">4️⃣</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">5️⃣</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">6️⃣</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">7️⃣</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">8️⃣</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">9️⃣</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔟</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💯</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔠</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔡</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔢</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔣</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔤</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🅰️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🆎</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🅱️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🆑</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🆒</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🆓</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">ℹ️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🆔</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">Ⓜ️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🆕</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🆖</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🅾️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🆗</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🅿️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🆘</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🆙</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🆚</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🈁</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🈂️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🈷️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🈶</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🈯</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🉐</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🈹</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🈚</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🈲</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🉑</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🈸</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🈴</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🈳</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">㊗️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">㊙️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🈺</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🈵</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">▪️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">▫️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">◻️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">◼️</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">◽</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">◾</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⬛</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⬜</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔶</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔷</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔸</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔹</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔺</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔻</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">💠</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔘</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔲</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔳</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⚪</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">⚫</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔴</button>
                                                            <button class="rounded focus:outline-none hover:bg-slate-100 dark:hover:bg-darkmode-400">🔵</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="w-4 h-4 sm:w-5 sm:h-5 relative text-slate-500 mr-3 sm:mr-5">
                                <i data-lucide="paperclip" class="w-full h-full"></i> 
                                <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0">
                            </div> --}}
                        </div>
                        <a onclick="send()" href="javascript:;" class="w-8 h-8 sm:w-10 sm:h-10 block bg-primary text-white rounded-full flex-none flex items-center justify-center mr-5"> 
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
@endsection

<?php
    $u_paid = auth()->user()->has_paid;    
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
<script>
    $(document).ready(function() {
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
            chatPage.style.cssText += "height:500px; min-height:500px; device-height: 500px; padding-top:6px; padding-left:0px; padding-right:0px;; padding-bottom:0px; margin:0px;"
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