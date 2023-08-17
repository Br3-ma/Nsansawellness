
<!DOCTYPE html> 
<html lang="en" id="rootApp" style="" class="light overflow-auto">
    <!-- BEGIN: Head -->

    <head>
        <meta charset="utf-8">
        <link href="{{ asset('dist/images/logo.svg') }}" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Enigma admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Enigma Admin Template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
        <title> Nsansa Wellness - Dashboard</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- BEGIN: CSS Assets-->
        <link rel="icon" type="image/png" href="{{ asset('favicon.svg') }}">
        {{-- <link rel="stylesheet" href="dist/css/app.css" /> --}}
        <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}" />
        <link rel="stylesheet" href="{{ asset('dist/css/wizard.min.css') }}">
        {{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css"> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      
        
        
        <link rel="stylesheet" href="https://unpkg.com/@sjmc11/tourguidejs/dist/css/tour.min.css">
        @livewireStyles
        <!-- END: CSS Assets-->
        <style>
            .modal {
                position: fixed;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                opacity: 0;
                visibility: hidden;
                transform: scale(1.1);
                transition: visibility 0s linear 0.25s, opacity 0.25s 0s, transform 0.25s;
            }

            .modal-content {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background-color: white;
                padding: 1rem 1.5rem;
                width: 24rem;
                border-radius: 0.5rem;
            }

            .close-button {
                float: right;
                width: 1.5rem;
                line-height: 1.5rem;
                text-align: center;
                cursor: pointer;
                border-radius: 0.25rem;
                background-color: lightgray;
            }

            .close-button:hover {
                background-color: darkgray;
            }

            .show-modal {
                opacity: 1;
                visibility: visible;
                transform: scale(1.0);
                transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
            }
            #desktopchat, 
            #deskPersonalDetails,
            #btnback{
                    display: block;
            } 
            #mobilechat,
            #mobilePersonalDetails,
            #btnback2{
                display: none;
            }
            #chatContent{
                margin-top:8%;
            }            
            .chat-list-tiem{
                border: 1px solid #024A64;
                border-radius:2%;
            }

            #payment-modal-dialog{
                margin-top:25%;
            }
            @media only screen and (max-width:600px){
                #mobilechat, 
                #mobilePersonalDetails,
                #btnback2{
                    display: block;
                }        
                #desktopchat,
                #btnback{
                    display: none;
                } 
                #onChatMenu,#usersIndexControls, #deskPersonalDetails{
                    display: none;
                }
                #modalMobile{
                    margin-top:50%;
                }
                #chatContent{
                    margin-top:12%;
                }
                #rootApp{
                    background-color:#fff;
                }
                .contentCanvas{
                    background-color:rgb(255, 255, 255);
                    border-radius: 0%; 
                
                }
                .chat-list-tiem{
                    border: 1px solid #024A64;
                }
                #payment-modal-dialog{
                    margin-top:70%;
                }
            }

                main {
                    display: grid;
                    place-items: center;
                    min-height: 100vh;
                    padding: 2em;
                }
                
                form > h1 {
                    text-align: center;
                    font-weight: 900;
                    color: #443c68;
                }
                form > p {
                    text-align: center;
                    margin-bottom: 2.4em;
                    line-height: 1.8;
                    font-weight: 600;
                }
                form > .textarea-group {
                    margin-top: 2.4em;
                }
                form > .textarea-group > label {
                    display: block;
                    width: 100%;
                }
                form > .textarea-group > label > span {
                    display: block;
                    font-size: 0.9em;
                    font-weight: 600;
                    margin-bottom: 0.8em;
                }
                form > .textarea-group > label > textarea {
                    box-sizing: border-box;
                    display: block;
                    padding: 1em;
                    font-family: "Mulish", sans-serif;
                    line-height: 1.8;
                    width: 100%;
                    resize: none;
                    border: none;
                    background-color: #ebebeb;
                }
                form > div.action-group {
                    margin-top: 2em;
                    display: flex;
                    flex-direction: column;
                    row-gap: 1em;
                }
                form > div.action-group > input[type="reset"] {
                    padding: 1em 2em;
                    border: none;
                    background: none;
                    cursor: pointer;
                    font-size: 0.9em;
                    font-weight: 600;
                    opacity: 0.8;
                }
                @media (hover: hover) {
                    form > div.action-group > input[type="reset"]:hover {
                        text-decoration: underline;
                    }
                }
                form > div.action-group > input[type="button"] {
                    border: 2px solid transparent;
                    padding: 1em 2em;
                    border-radius: 12px;
                    cursor: pointer;
                    font-weight: 700;
                    color: white;
                    background-color: #443c68;
                    transition: all 0.1s ease-in-out;
                }
                @media (hover: hover) {
                    form > div.action-group > input[type="button"]:hover {
                        background-color: #534485;
                        border: 2px solid #443c68;
                    }
                }
                /* Input Rating */
                .rating {
                    user-select: none;
                }
                .rating > input[type="radio"] {
                    position: absolute;
                    opacity: 0;
                    z-index: -999;
                }
                .rating__box {
                    display: flex;
                    justify-content: center;
                    gap: 1em;
                }
                .rating__star {
                    font-size: 3.2em;
                    color: #d3d3d3;
                    transition: all 0.1s ease-in-out;
                }
                .rating__star:active {
                    color: #4a4a4a !important;
                    text-shadow: 1px 0 5px rgba(0, 0, 0, 0.2);
                }
                @media (hover: hover) {
                    .rating__star:hover {
                        transform: scale(1.3);
                    }
                }
                .rating > input[type="radio"]:nth-child(1):checked ~ .rating__box > .rating__star:nth-child(-n + 1) {
                    color: orange;
                }
                .rating > input[type="radio"]:nth-child(1):focus-visible ~ .rating__box > .rating__star:nth-child(1) {
                    outline: solid 1px black;
                }
                .rating > input[type="radio"]:nth-child(2):checked ~ .rating__box > .rating__star:nth-child(-n + 2) {
                    color: orange;
                }
                .rating > input[type="radio"]:nth-child(2):focus-visible ~ .rating__box > .rating__star:nth-child(2) {
                    outline: solid 1px black;
                }
                .rating > input[type="radio"]:nth-child(3):checked ~ .rating__box > .rating__star:nth-child(-n + 3) {
                    color: orange;
                }
                .rating > input[type="radio"]:nth-child(3):focus-visible ~ .rating__box > .rating__star:nth-child(3) {
                    outline: solid 1px black;
                }
                .rating > input[type="radio"]:nth-child(4):checked ~ .rating__box > .rating__star:nth-child(-n + 4) {
                    color: orange;
                }
                .rating > input[type="radio"]:nth-child(4):focus-visible ~ .rating__box > .rating__star:nth-child(4) {
                    outline: solid 1px black;
                }
                .rating > input[type="radio"]:nth-child(5):checked ~ .rating__box > .rating__star:nth-child(-n + 5) {
                    color: orange;
                }
                .rating > input[type="radio"]:nth-child(5):focus-visible ~ .rating__box > .rating__star:nth-child(5) {
                    outline: solid 1px black;
                }
                /* End Input Rating */
                
        </style>
        <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <?php
            $paid = auth()->user()->has_paid;   
            // var_dump($paid); 
        ?>
        <script>
            
            $(document).ready(function(){
                $('#main_preloader').hide();
                var user = {!! auth()->user()->toJson() ?? '' !!};
                var user_role = "{{ preg_replace('/[^A-Za-z0-9. -]/', '',  auth()->user()->roles->pluck('name')) }}";
                var paid = "{{ auth()->user()->has_paid }}";

                console.log(paid);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // Enable pusher logging - don't include this in production
                Pusher.logToConsole = false;

                var pusher = new Pusher('033c1fdbd94861470759', {
                    cluster: 'ap2'
                });
                var channel = pusher.subscribe('popup-channel');

                channel.bind('new-activity', function(data) {
                    if(data == user['id']){
                        
                        Toastify({ 
                            node: $("#basic-non-sticky-notification-content-three").clone().removeClass("hidden")[0], 
                            duration: 9000, 
                            newWindow: true, 
                            close: true,
                            gravity: "top", 
                            position: "right", 
                            backgroundColor: "white", 
                            stopOnFocus: true, 
                        }).showToast(); 

                    }
                });
                channel.bind('new-appointment', function(data) {
                    if(data == user['id']){
                        
                        Toastify({ 
                            node: $("#basic-non-sticky-notification-content-two").clone().removeClass("hidden")[0], 
                            duration: 9000, 
                            newWindow: true, 
                            close: true,
                            gravity: "top", 
                            position: "right", 
                            backgroundColor: "white", 
                            stopOnFocus: true, 
                        }).showToast(); 

                    }
                });
    
                setTimeout(function() {
                    if(user['id'] == 1){
                        channel.bind('user-register', function(data) {
                            Toastify({ 
                                node: $("#basic-non-sticky-notification-content").clone().removeClass("hidden")[0], 
                                duration: 9000, 
                                newWindow: true, 
                                close: true,
                                gravity: "top", 
                                position: "right", 
                                backgroundColor: "white", 
                                stopOnFocus: true, 
                            }).showToast(); 
                        });
                    }
                    
                }, 3000);


                // ******* Custom Methods 
                // *** Checks payment status
                // console.log("Have you paid: "+paid);
                let rand1 = Math.floor(Math.random() * 21);
                let rand2 = Math.floor(Math.random() * 21);
                if(user_role === 'patient'){
                    if(rand1 % 2 != 0 && rand2 % 2 != 0){
                        if(paid){
                            const myModal = tailwind.Modal.getInstance(document.querySelector("#payment-remainder-modal"));
                            myModal.show();
                        }
                    }
                }

            });
        </script>

    </head>
    <!-- END: Head -->
    {{-- @if (Request::route()->uri)
        
    @else
        
    @endif --}}
    @if(Request::route()->uri === 'counseling-center' || Request::route()->uri === 'home')
    <body style="height: 100%; min-height:100%; device-height:100%; overflow:hidden" id="nsansa_app" class="lg:py-5 py-0 md:py-0">
    @else
    <body id="nsansa_app" class="lg:py-5 py-0 md:py-0">
    @endif    
        <!-- BEGIN: Mobile Menu -->

        <div class="mobile-menu md:hidden">
            <div class="mobile-menu-bar">
                <a href="{{ route('home') }}" class="flex mr-auto">
                    <img alt="Nsansa wellness" class="w-6 rounded-full" src="{{ asset('uploads/sites/304/2022/06/logos.svg') }}">
                </a>
                <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
            </div>
            <div class="scrollable">
                <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="x-circle" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
                <ul class="scrollable__content py-2">
                    <li class="flex py-4 text-white">
                        <div class="ml-6 p-4 w-12 h-12 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                            @if(Auth::user()->image_path == null)
                            <div class="font-bolder text-lg text-white ml-4 w-4 h-4 sm:w-10 sm:h-10 rounded-full flex items-center justify-center text-slate-400 zoom-in tooltip" title="{{ Auth::user()->fname.' '.Auth::user()->lname  }}">
                                {{ Auth::user()->fname[0].'-'.Auth::user()->lname[0] }}
                            </div>
                            @else
                            <img alt="Profile" src="{{ asset('public/storage/'.Auth::user()->image_path) }}">
                            @endif
                        </div>
                        <hr>
                        <div>
                            <div class="font-medium">{{ Auth::User()->fname.' '.Auth::User()->lname }}</div>
                            @hasanyrole(['admin', 'administrator', 'manager', 'staff'])
                            <div class="capitalize flex justify-start space-x-4 text-xs text-white/60 mt-0.5 dark:text-slate-500">
                                <i class="w-4 w-4" data-lucide="shield"></i>
                                <span class="mt-1 ml-1">{{ preg_replace('/[^A-Za-z0-9. -]/', '',  Auth::user()->roles->pluck('name'))}}</span>
                            </div>
                            @endhasanyrole
                            @hasanyrole(['patient', 'user', 'users'])
                            <div class="capitalize flex space-xart text-xs text-white/60 mt-0.5 dark:text-slate-500">
                                <i class="w-4 w-4" data-lucide="user"></i>
                                <span class="mt-1 ml-1">{{ preg_replace('/[^A-Za-z0-9. -]/', '',  Auth::user()->roles->pluck('name'))}}</span>
                            </div>
                            @endhasanyrole
                            @hasanyrole(['counselor', 'therapist'])
                            <div class="capitalize flex space-x-2 justify-start text-xs text-white/60 mt-0.5 dark:text-slate-500">
                                <i class="w-4 w-4" data-lucide="verified"></i>
                                <span class="mt-1 ml-1">{{ preg_replace('/[^A-Za-z0-9. -]/', '',  Auth::user()->roles->pluck('name'))}}</span>
                            </div>
                            @endhasanyrole
                        </div>
                        <div>
                            <div class="flex justify-start space-x-4 text-xs text-white/60 mt-0.5 dark:text-slate-500">
                                <i class="w-4 w-4" data-lucide="at-sign"></i>
                                <span class="mt-1 ml-1">{{ Auth::user()->email }}</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="{{ route('home') }}" class="menu">
                            <div class="menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="menu__title"> Dashboard </div>
                        </a>
                    </li>
                    
                    @can('patient')
                    <li>
                        <a href="{{ route('patient') }}" class="menu">
                            <div class="menu__icon"> <i data-lucide="message-square"></i> </div>
                            <div class="menu__title"> Counseling Sessions </div>
                        </a>
                    </li>
                    @endcan

                    
                    @can('actions')
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon"> <i data-lucide="box"></i> </div>
                            <div class="menu__title"> Homework <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="{{ route('activities.index')}}"  class="menu">
                                    <div class="menu__icon"> <i data-lucide="person-standing"></i> </div>
                                    <div class="menu__title"> Activities & Actions </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endcan
                    @can('appointment')
                    <li>
                        <a href="{{  route('appointment') }}" class="menu">
                            <div class="menu__icon"> <i data-lucide="calendar"></i> </div>
                            <div class="menu__title"> Appointments </div>
                        </a>
                    </li>
                    @endcan
                    @can('billing')
                    {{-- <li>
                        <a href="{{  route('billing') }}" class="menu">
                            <div class="menu__icon"> <i data-lucide="wallet"></i> </div>
                            <div class="menu__title"> Billing</div>
                        </a>
                    </li> --}}
                    @endcan

                    @can('patient-files')
                    <li>
                        <a href="{{ route('patient-files') }}"  class="menu">
                            <div class="menu__icon"> <i data-lucide="files"></i> </div>
                            <div class="menu__title"> Profiles </div>
                        </a>
                    </li>
                    @endcan
                    @can('questionaires.index')
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon"> <i data-lucide="clipboard-list"></i> </div>
                            <div class="menu__title"> Survey Questionnaires  <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="{{ route('questionaires.index') }}" class="menu">
                                    <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="menu__title"> Questionnaires </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('questionaire-user-feedback') }}" class="menu">
                                    <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="menu__title"> User Feedback </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endcan
                    @can('notification')
                    <li>
                        <a href="{{ route('notification') }}" class="menu">
                            <div class="menu__icon"> <i data-lucide="bell"></i> </div>
                            <div class="menu__title"> Notifications </div>
                        </a>
                    </li>
                    @endcan
                    @can('users.index')
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon"> <i data-lucide="users"></i> </div>
                            <div class="menu__title"> Users <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                        </a>
                        <ul class="">
                            @can('users.index')
                            <li>
                                <a href="{{ route('users.index') }}"class="menu">
                                    <div class="menu__icon"> <i data-lucide="user-check"></i> </div>
                                    <div class="menu__title"> Registered Users </div>
                                </a>
                            </li>
                            @endcan
                            @can('roles.index')
                            <li>
                                <a href="{{ route('roles.index') }}"class="menu">
                                    <div class="menu__icon"> <i data-lucide="user-x"></i> </div>
                                    <div class="menu__title"> Roles and Permissions </div>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                    <li class="py-4"></li>
                    <li>
                        <a class="menu" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" 
                            class="dropdown-item hover:bg-white/5"> 
                            <div class="menu__icon"> <i data-lucide="toggle-right"></i> </div>
                            <div class="menu__title"> Logout</div>
                        </a>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <!-- END: Mobile Menu -->
        <!-- BEGIN: Top Bar -->
        @include('layouts._partials.dash_menu')
        <!-- END: Top Bar -->

        
        <div class="flex overflow-hidden">
            <!-- BEGIN: Side Menu -->
            <nav class="side-nav">
                <ul>
                    @hasanyrole(['admin', 'counselor'])
                    <li>
                        <a href="{{ route('home') }}" class="side-menu side-menu--active">
                            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="side-menu__title">
                                Dashboard 
                            </div>
                        </a>
                    </li>
                    @endhasanyrole

                    @can('patient')
                    <li data-tg-tour="Chat with your counselor"
                    data-tg-title="Counseling Session"
                    data-tg-group="my-first-tour"
                    data-tg-scroll-margin="0"
                    data-tg-fixed>
                        <a href="{{ route('patient') }}" class="side-menu">
                            <div class="side-menu__icon"> <i data-lucide="message-square"></i> </div>
                            <div class="side-menu__title"> Counseling Sessions </div>
                        </a>
                    </li>
                    @endcan
                    

                    @can('actions')
                    <li data-tg-tour="Check your homework, activities, and questionnaires."
                    data-tg-title="Activities & Questionnaires"
                    data-tg-group="my-second-tour"
                    data-tg-scroll-margin="0"
                    data-tg-fixed>
                        <a href="javascript:;" class="side-menu">
                            <div class="side-menu__icon"> <i data-lucide="box"></i> </div>
                            <div class="side-menu__title">
                                    Homework
                                <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="{{ route('activities.index')}}" class="side-menu">
                                    <div class="side-menu__icon"> <i data-lucide="person-standing"></i> </div>
                                    <div class="side-menu__title"> Activities </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('my-patient-questionnaires')}}" class="side-menu">
                                    <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="side-menu__title"> Questionnaires </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endcan

                    @can('appointment')
                    <li data-tg-tour="View video call appointments."
                    data-tg-title="Video Call Appointments"
                    data-tg-group="my-third-tour"
                    data-tg-scroll-margin="0"
                    data-tg-fixed>
                        <a href="{{  route('appointment') }}" class="side-menu">
                            <div class="side-menu__icon"> <i data-lucide="calendar"></i> </div>
                            <div class="side-menu__title"> Appointments </div>
                        </a>
                    </li>
                    @endcan

                    @can('billing')
                        @hasanyrole(['admin','administrator','patient'])
                        <li data-tg-tour="Check your billing history."
                            data-tg-title="Billing"
                            data-tg-group="my-fourth-tour"
                            data-tg-scroll-margin="0"
                            data-tg-fixed>
                            <a href="{{  route('billing') }}" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="wallet"></i> </div>
                                <div class="side-menu__title"> Billing </div>
                            </a>
                        </li>
                        @endhasanyrole
                    @endcan
                    
                    @can('settings')
                    <li>
                        <a href="javascript:;" class="side-menu">
                            <div class="side-menu__icon"> <i data-lucide="trello"></i> </div>
                            <div class="side-menu__title">
                                Settings
                                <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="{{ route('settings.index') }}" class="side-menu">
                                    <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="side-menu__title"> General Settings </div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-light-profile-overview-2.html" class="side-menu">
                                    <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="side-menu__title"> Commissions & Profits </div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-light-profile-overview-3.html" class="side-menu">
                                    <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="side-menu__title"> Departments </div>
                                </a>
                            </li>
                        </ul>
                    </li> 
                    @endcan



                    @can('patient-files')
                   
                    <li data-tg-tour="View patient records, such as therapy notes, survey feedback, and medical conditions."
                    data-tg-title="Patient Records & Profiles"
                    data-tg-group="my-fifth-tour"
                    data-tg-scroll-margin="0"
                    data-tg-fixed>
                        <a href="javascript:;" class="side-menu">
                            <div class="side-menu__icon"> <i data-lucide="files"></i> </div>
                            <div class="side-menu__title">
                                Profiles
                                <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="{{ route('patient-files') }}" class="side-menu">
                                    <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="side-menu__title"> Patient Profiles </div>
                                </a>
                            </li>
                            @hasrole('admin')
                            <li>
                                <a href="{{ route('counselor-files') }}" class="side-menu">
                                    <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="side-menu__title"> Counselors </div>
                                </a>
                            </li>
                            @endhasrole
                        </ul>
                    </li>
                    <li data-tg-tour="View recent recorded video call sessions."
                    data-tg-title="Video Call Recordings"
                    data-tg-group="my-sixth-tour"
                    data-tg-scroll-margin="0"
                    data-tg-fixed>
                        <a href="{{ route('recordings') }}" class="side-menu">
                            <div class="side-menu__icon"> <i data-lucide="video"></i> </div>
                            <div class="side-menu__title">
                                Patient Recordings
                                <div class="side-menu__sub-icon "> </div>
                            </div>
                        </a>
                    </li>
                    @endcan
                    @can('questionaires.index')
                    <li data-tg-tour="Create and view onboarding questionnaire for patients & counselors."
                    data-tg-title="Onboarding Questionnaires"
                    data-tg-group="my-seventh-tour"
                    data-tg-scroll-margin="0"
                    data-tg-fixed>
                        <a href="javascript:;" class="side-menu ">
                            <div {{ Route::currentRouteName() == 'questionaires.index' ? 'style="color:#F65B08"' : '' }}  class="side-menu__icon"> <i data-lucide="clipboard-list"></i> </div>
                            <div class="side-menu__title">
                                Survey Questionnaires 
                                <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="{{ route('questionaires.index') }}" class="side-menu">
                                    <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="side-menu__title"> Questionnaires </div>
                                </a>
                            </li>
                            <li>    
                                <a href="{{ route('questionaire-user-feedback') }}" class="side-menu">
                                    <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="side-menu__title">User Feedback</div>
                                </a>
                            </li>
                            <li>    
                                <a href="{{ route('reviews.manage') }}" class="side-menu">
                                    <div class="side-menu__icon"> <i data-lucide="star"></i> </div>
                                    <div class="side-menu__title">User Reviews</div>
                                </a>
                            </li>
                            {{-- 
                            <li>
                                <a href="javascript:;" class="side-menu">
                                    <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="side-menu__title">
                                        Transactions 
                                        <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                                    </div>
                                </a>
                                <ul class="">
                                    <li>
                                        <a href="side-menu-light-transaction-list.html" class="side-menu">
                                            <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                                            <div class="side-menu__title">Transaction List</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="side-menu-light-transaction-detail.html" class="side-menu">
                                            <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                                            <div class="side-menu__title">Transaction Detail</div>
                                        </a>
                                    </li>
                                </ul>
                            </li> 
                            --}}
                        </ul>
                    </li>
                    @endcan

                    @can('notification')
                    <li
                    >
                        <a href="{{ route('notification') }}" class="side-menu">
                            <div class="side-menu__icon"> <i data-lucide="bell"></i> </div>
                            <div class="side-menu__title"> Notifications </div>
                        </a>
                    </li>
                    @endcan
                    @can('users.index')
                    <li>
                        <a href="javascript:;" class="side-menu">
                            <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                            <div class="side-menu__title">
                                Users 
                                <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul class="">
                            {{-- @can('view', Auth::user(), App\User::class) --}}
                            @can('users.index')
                            <li>
                                <a href="{{ route('users.index') }}" class="side-menu">
                                    <div class="side-menu__icon"> <i data-lucide="user-check"></i> </div>
                                    <div class="side-menu__title"> Registered Users </div>
                                </a>
                            </li>
                            @endcan
                            @can('roles.index')
                            <li>
                                <a href="{{ route('roles.index') }}" class="side-menu">
                                    <div class="side-menu__icon"> <i data-lucide="user-plus"></i> </div>
                                    <div class="side-menu__title">  Roles and Permissions </div>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                    @endcan


                </ul>
                <span class="card btn" style="
                    border-radius: 38px;
                    background: linear-gradient(145deg, #ffffff, #e6e6e6);
                    box-shadow:  6px 6px 98px #ededed, -6px -6px 98px #ffffff;
                ">
                    <div class="card-body">
                        <a href="#rating" onclick="startRating()">
                            <p>Help Us Improve</p>
                            <small>Add your rating</small>
                        </a>
                    </div>
                </span>
            </nav>
            <div class="mt-5">

                
            </div>
            <!-- END: Side Menu -->
            <div class="w-full sm:pt-3 pt-2" style="">
                @yield('content')
            </div>

    </div>
    <!-- The Modal -->
    {{-- @if(auth()->user()->id == 1) --}}
        <div id="basic-non-sticky-notification-content" class="toastify-content hidden">
            <div class="font-medium">A new Patient has signed up.</div>
            <div class="text-slate-500 mt-1">
                Check your notifications
            </div>
        </div>
        <div id="basic-non-sticky-notification-content-two" class="toastify-content hidden">
            <div class="font-medium">You have a new Appointment.</div>
            <div class="text-slate-500 mt-1">
                Check your notifications
            </div>
        </div>
        <div id="basic-non-sticky-notification-content-two" class="toastify-content hidden">
            <div class="font-medium">You have a new Homework Activity.</div>
            <div class="text-slate-500 mt-1">
                Check your notifications
            </div>
        </div>
        {{-- <div class="text-center"> <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#static-backdrop-modal-preview" class="btn btn-primary">Show Modal</a> </div> <!-- END: Modal Toggle --> --}}
        <!-- BEGIN: Modal Content -->
         
        @hasanyrole('patient')
        @if(App\Models\Billing::has_no_bill())
            @include('page.common.payment-notice')
        @endif
        @endhasanyrole
    {{-- @endif --}}
    <!-- BEGIN: Dark Mode Switcher-->
    {{-- <div data-url="side-menu-dark-dashboard-overview-2.html" class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 right-0 box dark:bg-dark-2 border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10">
        <a href="side-menu-light-chat.html">
            <div class="side-menu__icon"> <i data-lucide="message-square"></i> </div>
        </a>
    </div> --}}

    {{-- <div data-url="side-menu-dark-dashboard-overview-2.html" class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 right-0 box dark:bg-dark-2 border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10">
        <div class="mr-4 text-gray-700 dark:text-gray-300">Dark Mode</div>
        <div class="dark-mode-switcher__toggle border"></div>
    </div> --}}
    <!-- END: Dark Mode Switcher-->
    <div id="rating_preloader" class="fixed hide top-0 left-0 right-0 bottom-0 w-full h-screen z-50 overflow-hidden bg-white flex flex-col items-center justify-center">
        {{-- <div class="loader ease-linear rounded-full border-4 border-t-4 border-gray-200 h-12 w-12 mb-4"></div> --}}
            <main id="showmain">
                <form id="myRatingForm" action="{{ route('rating.store') }}" method="POST" style="
                    border-radius: 21px;
                    background: linear-gradient(145deg, #e6e6e6, #ffffff);
                    box-shadow:  24px 24px 49px #e0e0e0,
                    -24px -24px 49px #ffffff;
                    max-width: 420px;
                    padding: 2em;
                    background-color: white;
                    box-shadow: 2px 0 15px -2px rgba(0, 0, 0, 0.2);
                    border-radius: 15px;
                ">
                @csrf
                <h1>Rate Us</h1>
                <p>How was your experience using our application? Your rating matter!</p>
            
                <div class="rating">
                    <input type="radio" name="rating" id="rating-1" value="1">
                    <input type="radio" name="rating" id="rating-2" value="2">
                    <input type="radio" name="rating" id="rating-3" value="3">
                    <input type="radio" name="rating" id="rating-4" value="4">
                    <input type="radio" name="rating" id="rating-5" value="5">
            
                    <div class="rating__box">
                    <label for="rating-1" class="rating__star">&starf;</label>
                    <label for="rating-2" class="rating__star">&starf;</label>
                    <label for="rating-3" class="rating__star">&starf;</label>
                    <label for="rating-4" class="rating__star">&starf;</label>
                    <label for="rating-5" class="rating__star">&starf;</label>
            
                    </div>
                </div>
            
                <div class="textarea-group">
                    <label>
                    <span>Comment : </span>
                    <textarea id="comment-rating" placeholder="Additional feedback ..." name="feedback"></textarea>
                    </label>
                </div>
            
                <div class="action-group">
                    <button type="button" onclick="submitRatingForm()">Submit</button>
                    <input type="reset" onclick="closeRating()" value="Cancel">
                </div>
                </form>
            </main>
            <img id="showspina" src="{{ asset('public/img/1.gif') }}">
            <h1 class="text-lg font-bold text-success" id="flash"></h1>
            <a href="#" class="btn btn-primary item-center" id="doneRating" onclick="reloadPage()">Back</a>
    </div>
    {{-- <div id="main_preloader" class="fixed top-0 left-0 right-0 bottom-0 w-full h-screen z-50 overflow-hidden bg-white flex flex-col items-center justify-center">
        <img src="{{ asset('public/img/1.gif') }}">
    </div> --}}
    
    @livewireScripts 
    <script src="https://unpkg.com/@sjmc11/tourguidejs/dist/tour.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const tg = new tourguide.TourGuideClient()
        function startYourTour(){
            tg.start();
        }
    </script>
    <!-- BEGIN: JS Assets-->
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
    <script src="{{ asset('public/app.js') }}"></script>
    <script src="{{ asset('dist/js/app.js') }}"></script>
    <script src="{{ asset('dist/preloader.js') }}"></script>
    <script src="{{ asset('dist/jquery.js') }}"></script>
    <script src="{{ asset('dist/jquery-wizard.min.js') }}"></script>
    <script>
        let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

        elems.forEach(function(html) {
            let switchery = new Switchery(html,  { size: 'small' });
        });
    </script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        const a = document.getElementById('showmain');
        const b = document.getElementById('showspina');
        const c = document.getElementById('flash');
        const d = document.getElementById('doneRating');
        b.style.display = "none";
        c.style.display = "none";
        d.style.display = "none";

        function startRating(){
            const element = document.querySelector('.fixed.hide');
            element.classList.remove('hide');
        }
        function closeRating(){
            const element = document.getElementById('rating_preloader');
            element.classList.add('hide');
        }
        function submitRatingForm() {
            a.style.display = "none";
            b.style.display = "block";
            // Get the form element
            var form = document.getElementById('myRatingForm');

            // Create a new FormData object
            var formData = new FormData(form);

            // Create a new XMLHttpRequest object
            var xhr = new XMLHttpRequest();

            // Set the HTTP method and URL
            xhr.open('POST', form.action);

            // Set the request header
            xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

            // Handle the response
            xhr.onload = function() {

                if (xhr.status === 200) {
                    data = JSON.parse(xhr.response);
                    b.style.display = "none";
                    c.style.display = "block";
                    d.style.display = "block";
                    c.textContent += data['msg'];
                    // console.log(xhr);
                    // Handle success
                    
                    // const element = document.getElementById('rating_preloader');
                    // element.classList.add('hide');

                } else {
                // Handle error
                console.log(xhr.statusText);
                }
            };

            // Send the request
            xhr.send(formData);
        }

        function reloadPage(){
            location.reload();
        }

        // displayPusherNotifications();
    </script>
    <script src="{{ asset('dist/js/ckeditor-classic.js') }}"></script>
    <script>
        if (!("Notification" in window) || Notification.permission === "denied") {
            // Fallback mechanism
            // For example, use postMessage() to communicate or inform the user in a different way
            alert("Notifications are not supported or permission is denied.");
        } else if (Notification.permission === "granted") {
            // If the notification permission is already granted, show the notification
            
            // showNotification();
        } else {
            // Request permission from the user to show notifications
            Notification.requestPermission().then(function (permission) {
                if (permission === "granted") {
                    showNotification();
                } else {
                    alert("Permission for notifications was denied.");
                }
            });
        }

        // Function to show the notification
        function showNotification() {
            var user = {!! auth()->user()->toJson() ?? '' !!}
            // Send a POST request to add the product to the cart

            // Send an AJAX request to add the product to the cart
            $.ajax({
            url: "{{ route('notify')}}",
            method: 'POST',
            data: {
                user_id: user['id']
            },
            success: function(response) {
                const elements = response.data;
                elements.forEach((element) => {
                    var notification = new Notification(element['message']);
                });
                // notification.onclick = function () {
                //     alert("Notification clicked.");
                //     // Handle the notification click event here
                // };
                // notification.onclose = function () {
                //     alert("Notification closed.");
                //     // Handle the notification close event here
                // };
            },
            error: function(xhr, status, error) {
                // Handle any errors that occur during the AJAX request
                // console.error('Error Getting Notification:', error);
            }
            });


        }

        function handleExpiredToken() {
            // Refresh the page when the CSRF token has expired
            location.reload();
        }

        // Attach an event listener for AJAX errors
        window.addEventListener('error', function(event) {
            if (event.target instanceof XMLHttpRequest && event.target.status === 419) {
                handleExpiredToken();
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
