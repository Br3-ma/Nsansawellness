<!DOCTYPE html> 
<html lang="en" class="light">
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
        {{-- <link rel="stylesheet" href="dist/css/app.css" /> --}}
        <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}" />
        <link rel="stylesheet" href="{{ asset('dist/css/wizard.min.css') }}">
        {{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css"> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
        
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
        </style>
        <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

        <script>
            $(document).ready(function(){
                var user = {!! auth()->user()->toJson() ?? '' !!};
                // console.log();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // Enable pusher logging - don't include this in production
                Pusher.logToConsole = true;

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
            });
        </script>
    </head>
    <!-- END: Head -->
    <body class="py-5 md:py-0">
        <!-- BEGIN: Mobile Menu -->
        <div class="mobile-menu md:hidden">
            <div class="mobile-menu-bar">
                <a href="" class="flex mr-auto">
                    <img src="https://cdn.hswstatic.com/gif/play/0b7f4e9b-f59c-4024-9f06-b3dc12850ab7-1920-1080.jpg" class="w-6" alt="" loading="lazy" />
                </a>
                <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
            </div>
            <div class="scrollable">
                <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="x-circle" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
                <ul class="scrollable__content py-2">
                    @can('home')
                    <li>
                        <a href="{{ route('home') }}" class="side-menu side-menu--active">
                            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="side-menu__title">
                                Dashboard 
                                <div class="side-menu__sub-icon transform rotate-180"> <i data-lucide="chevron-down"></i> </div>
                            </div>
                        </a>
                    </li>
                    @endcan

                    @can('patient')
                    <li>
                        <a href="{{ route('patient') }}" class="side-menu">
                            <div class="side-menu__icon"> <i data-lucide="message-square"></i> </div>
                            <div class="side-menu__title"> Counseling Sessions </div>
                        </a>
                    </li>
                    @endcan
                    

                    @can('actions')
                    <li>
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
                                    <div class="side-menu__icon"> <i data-lucide="calendar"></i> </div>
                                    <div class="side-menu__title"> Activities </div>
                                </a>
                            </li>
                            {{-- <li>
                                <a href="{{ route('actions')}}" class="side-menu">
                                    <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="side-menu__title"> Actions </div>
                                </a>
                            </li> --}}
                        </ul>
                    </li>
                    @endcan

                    @can('appointment')
                    <li>
                        <a href="{{  route('appointment') }}" class="side-menu">
                            <div class="side-menu__icon"> <i data-lucide="hard-drive"></i> </div>
                            <div class="side-menu__title"> Appointments </div>
                        </a>
                    </li>
                    @endcan

                    @can('billing')
                    <li>
                        <a href="{{  route('billing') }}" class="side-menu">
                            <div class="side-menu__icon"> <i data-lucide="hard-drive"></i> </div>
                            <div class="side-menu__title"> Billings </div>
                        </a>
                    </li>
                    @endcan

                    @can('notification')
                    <li>
                        <a href="{{ route('notification') }}" class="side-menu">
                            <div class="side-menu__icon"> <i data-lucide="file-text"></i> </div>
                            <div class="side-menu__title"> Notifications </div>
                        </a>
                    </li>
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
                                <a href="side-menu-light-profile-overview-1.html" class="side-menu">
                                    <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="side-menu__title"> Manage Appointments </div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-light-profile-overview-2.html" class="side-menu">
                                    <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="side-menu__title"> Manage Licences </div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-light-profile-overview-3.html" class="side-menu">
                                    <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="side-menu__title"> Manage Finances </div>
                                </a>
                            </li>
                        </ul>
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
                                    <div class="side-menu__title"> User Roles </div>
                                </a>
                            </li>
                            @endcan
                            @can('permissions.index')
                            <li>
                                <a href="{{ route('permissions.index') }}" class="side-menu">
                                    <div class="side-menu__icon"> <i data-lucide="user-x"></i> </div>
                                    <div class="side-menu__title"> Permissions </div>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                    @endcan

                    @can('patient-files')
                    <li>
                        <a href="{{ route('patient-files') }}" class="side-menu">
                            <div class="side-menu__icon"> <i data-lucide="hard-drive"></i> </div>
                            <div class="side-menu__title"> Patient Files </div>
                        </a>
                    </li>
                    @endcan
                    @can('questionaires.index')
                    <li>
                        <a href="javascript:;" class="side-menu ">
                            <div class="side-menu__icon"> <i data-lucide="shopping-bag"></i> </div>
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
                            {{-- <li>
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
                            </li>                                                 --}}
                        </ul>
                    </li>
                    @endcan
                </ul>
            </div>
        </div>
        <!-- END: Mobile Menu -->
        <!-- BEGIN: Top Bar -->
        <div class="top-bar-boxed h-[70px] md:h-[65px] z-[51] border-b border-white/[0.08] mt-12 md:mt-0 -mx-3 sm:-mx-8 md:-mx-0 px-3 md:border-b-0 relative md:fixed md:inset-x-0 md:top-0 sm:px-8 md:px-10 md:pt-10 md:bg-gradient-to-b md:from-slate-100 md:to-transparent dark:md:from-darkmode-700">
            <div class="h-full flex items-center">
                <!-- BEGIN: Logo -->
                <a href="{{ route('welcome')}}" class="logo -intro-x hidden md:flex xl:w-[180px] block">
                    <img style="border-radius: 100%" src="{{ asset('uploads/sites/304/2022/06/logos.svg') }}" class="logo__image w-6" alt="" loading="lazy" />
                    {{-- <img alt="Midone - HTML Admin Template" class="logo__image w-6" src="dist/images/logo.svg"> --}}
                    <span class="logo__text text-white text-lg ml-3"> Nsansa </span> 
                </a>
                <!-- END: Logo -->
                <!-- BEGIN: Breadcrumb -->
                <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
                    <ol class="breadcrumb breadcrumb-light">
                        <li class="breadcrumb-item"><a href="#">Nsansa Wellness</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                        @hasanyrole('admin')
                            Administration
                        @endhasanyrole
                        @hasanyrole('counselor')
                            Counselor
                        @endhasanyrole
                        @hasanyrole('patient')
                            Patient
                        @endhasanyrole
                            Dashboard
                        </li>
                    </ol>
                </nav>
                <!-- END: Breadcrumb -->
                <!-- BEGIN: Search -->
                <div class="intro-x relative mr-3 sm:mr-6">
                    {{-- <div class="search hidden sm:block">
                        <input type="text" class="search__input form-control border-transparent" placeholder="Search...">
                        <i data-lucide="search" class="search__icon dark:text-slate-500"></i> 
                    </div> --}}
                    <a class="notification notification--light sm:hidden" href=""> <i data-lucide="search" class="notification__icon dark:text-slate-500"></i> </a>
                    <div class="search-result">
                        <div class="search-result__content">
                            <div class="search-result__content__title">Pages</div>
                            <div class="mb-5">
                                <a href="" class="flex items-center">
                                    <div class="w-8 h-8 bg-success/20 dark:bg-success/10 text-success flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-lucide="inbox"></i> </div>
                                    <div class="ml-3">Mail Settings</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 bg-pending/10 text-pending flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-lucide="users"></i> </div>
                                    <div class="ml-3">Users & Permissions</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 bg-primary/10 dark:bg-primary/20 text-primary/80 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-lucide="credit-card"></i> </div>
                                    <div class="ml-3">Transactions Report</div>
                                </a>
                            </div>
                            <div class="search-result__content__title">Users</div>
                            <div class="mb-5">
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-1.jpg">
                                    </div>
                                    <div class="ml-3">{{ Auth::User()->lname }}</div>
                                    <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">alpacino@left4code.com</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-4.jpg">
                                    </div>
                                    <div class="ml-3">Robert De Niro</div>
                                    <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">robertdeniro@left4code.com</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-4.jpg">
                                    </div>
                                    <div class="ml-3">Kevin Spacey</div>
                                    <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">kevinspacey@left4code.com</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-4.jpg">
                                    </div>
                                    <div class="ml-3">Kevin Spacey</div>
                                    <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">kevinspacey@left4code.com</div>
                                </a>
                            </div>
                            <div class="search-result__content__title">Products</div>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/preview-6.jpg">
                                </div>
                                <div class="ml-3">Samsung Q90 QLED TV</div>
                                <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">Electronic</div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/preview-14.jpg">
                                </div>
                                <div class="ml-3">Oppo Find X2 Pro</div>
                                <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">Smartphone &amp; Tablet</div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/preview-13.jpg">
                                </div>
                                <div class="ml-3">Sony A7 III</div>
                                <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">Photography</div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/preview-2.jpg">
                                </div>
                                <div class="ml-3">Sony A7 III</div>
                                <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">Photography</div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- END: Search -->
                
                <!-- BEGIN: Notifications -->
                <div class="intro-x dropdown mr-4 sm:mr-6">
                    <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="bell" class="notification__icon dark:text-slate-500"></i> </div>
                    <div class="notification-content pt-2 dropdown-menu">
                        <div class="notification-content__box dropdown-content">
                            <div class="notification-content__title">Notifications</div>
                            @isset($notifications)
                                @forelse ($notifications as $note)
                                <div class="cursor-pointer relative flex items-center py-2">
                                    <div class="w-12 h-12 flex-none image-fit mr-1">
                                        @switch($note->data['type'])
                                        @case('new-user')
                                            <img alt="{{ $note->data['name'] }}" class="rounded-full" src="https://t4.ftcdn.net/jpg/03/29/84/99/360_F_329849933_edMwOcbReWmPdo7VaB0nIgg4Wlyt0aDU.jpg">
                                            @break
                                        @case('welcome')
                                            <img alt="{{ $note->data['name'] }}" class="rounded-full" src="https://img.freepik.com/free-vector/hand-drawn-colorful-groovy-psychedelic-background_23-2149083917.jpg?w=2000">
                                            @break
                                        @case('welcome-counselor')
                                            <img alt="{{ $note->data['name'] }}" class="rounded-full" src="https://www.kindpng.com/picc/m/2-21158_euclidean-line-vector-rainbow-png-file-hd-clipart.png">
                                            @break
                                        @case('new-appointment')
                                            <img alt="{{ $note->data['name'] }}" class="rounded-full" src="https://thumbs.dreamstime.com/b/deadline-calendar-date-appointment-agenda-business-plan-schedule-events-month-online-meeting-symbol-reminder-187031403.jpg">
                                            @break
                                        @default
                                            <img alt="{{ $note->data['name'] }}" class="rounded-full" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRQ00PRm15u1lOv65dmayn_Y3UX2szglLK-3A&usqp=CAU">
                
                                    @endswitch                                        {{-- <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white"></div> --}}
                                    </div>
                                    <div class="ml-2 overflow-hidden">
                                        <div class="flex items-center">
                                            <a href="javascript:;" class="font-medium truncate mr-5">{{ $note->data['sender'] }}</a> 
                                            <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">{{ $note->created_at->toFormattedDateString() }}</div>
                                        </div>
                                        <div class="w-full truncate text-slate-500 mt-0.5">{{ $note->data['message'] }}</div>
                                    </div>
                                </div>
                                @empty
                                @endforelse
                            @endisset
                        </div>
                    </div>
                </div>
                <!-- END: Notifications -->

                <!-- BEGIN: Account Menu -->
                <div class="intro-x dropdown w-8 h-8">
                    <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                        @if(Auth::user()->image_path == null)
                        <div class="font-bolder bg-primary text-white w-8 h-8 sm:w-10 sm:h-10 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip" title="{{ $user->fname.' '.$user->lname  }}">
                            {{ Auth::user()->fname[0].' '.Auth::user()->lname[0] }}
                        </div>
                        @else
                        <img alt="Profile" src="{{ asset('public/storage/'.Auth::user()->image_path) }}">
                        @endif
                    </div>
                    <div class="dropdown-menu w-56">
                        <ul class="dropdown-content bg-primary/80 before:block before:absolute before:bg-black before:inset-0 before:rounded-md before:z-[-1] text-white">
                            <li class="p-2">
                                <div class="font-medium">{{ Auth::User()->fname.' '.Auth::User()->lname }}</div>
                                
                                <div class="text-xs text-white/60 mt-0.5 dark:text-slate-500">{{ Auth::User()->role }}</div>
                            </li>
                            <li>
                                <hr class="dropdown-divider border-white/[0.08]">
                            </li>

                            <li>
                                <a href="{{ route('profile') }}" class="dropdown-item hover:bg-white/5"> <i data-lucide="user" class="w-4 h-4 mr-2"></i>Profile</a>
                            </li>
                            @can('users.create')
                            <li>
                                <a href="{{ route('users.create')}}" class="dropdown-item hover:bg-white/5"> <i data-lucide="edit" class="w-4 h-4 mr-2"></i> Add Account </a>
                            </li>
                            @endcan
                            <li>
                                <a disabled href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="lock" class="w-4 h-4 mr-2"></i> Reset Password </a>
                            </li>
                            <li>
                                <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="help-circle" class="w-4 h-4 mr-2"></i> Help </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider border-white/[0.08]">
                            </li>
                            <li>
                                <a  href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();" class="dropdown-item hover:bg-white/5"> <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END: Account Menu -->
            </div>
        </div>
        <!-- END: Top Bar -->

        
        <div class="flex overflow-hidden">
            <!-- BEGIN: Side Menu -->
            <nav class="side-nav">
                <ul>
                    @can('home')
                    {{-- <li>
                        <a href="{{ route('home') }}" class="side-menu side-menu--active">
                            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="side-menu__title">
                                Dashboard 
                                <div class="side-menu__sub-icon transform rotate-180"> <i data-lucide="chevron-down"></i> </div>
                            </div>
                        </a>
                    </li> --}}
                    @endcan

                    @can('patient')
                    {{-- <li>
                        <a href="{{ route('patient') }}" class="side-menu">
                            <div class="side-menu__icon"> <i data-lucide="message-square"></i> </div>
                            <div class="side-menu__title"> Counseling Sessions </div>
                        </a>
                    </li> --}}
                    @endcan
                    

                    @can('actions')
                    <li>
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
                                    <div class="side-menu__icon"> <i data-lucide="calendar"></i> </div>
                                    <div class="side-menu__title"> Activities </div>
                                </a>
                            </li>
                            {{-- <li>
                                <a href="{{ route('actions')}}" class="side-menu">
                                    <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="side-menu__title"> Actions </div>
                                </a>
                            </li> --}}
                        </ul>
                    </li>
                    @endcan

                    @can('appointment')
                    <li>
                        <a href="{{  route('appointment') }}" class="side-menu">
                            <div class="side-menu__icon"> <i data-lucide="calendar"></i> </div>
                            <div class="side-menu__title"> Appointments </div>
                        </a>
                    </li>
                    @endcan

                    @can('billing')
                    {{-- <li>
                        <a href="{{  route('billing') }}" class="side-menu">
                            <div class="side-menu__icon"> <i data-lucide="hard-drive"></i> </div>
                            <div class="side-menu__title"> Billings </div>
                        </a>
                    </li> --}}
                    @endcan
                    
                    @can('settings')
                    {{-- <li>
                        <a href="javascript:;" class="side-menu">
                            <div class="side-menu__icon"> <i data-lucide="trello"></i> </div>
                            <div class="side-menu__title">
                                Settings
                                <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="side-menu-light-profile-overview-1.html" class="side-menu">
                                    <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="side-menu__title"> Manage Appointments </div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-light-profile-overview-2.html" class="side-menu">
                                    <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="side-menu__title"> Manage Licences </div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-light-profile-overview-3.html" class="side-menu">
                                    <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="side-menu__title"> Manage Finances </div>
                                </a>
                            </li>
                        </ul>
                    </li> --}}
                    @endcan



                    @can('patient-files')
                   
                    <li>
                        <a href="javascript:;" class="side-menu">
                            <div class="side-menu__icon"> <i data-lucide="files"></i> </div>
                            <div class="side-menu__title">
                                Patient Profiles
                                <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="{{ route('patient-files') }}" class="side-menu">
                                    <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="side-menu__title"> All Profiles </div>
                                </a>
                            </li>
                            {{-- @forelse(App\Models\User::role('patient')->get() as $my_patient)
                            <li>
                                <a href="{{ route('all-patient-files', $my_patient->id ) }}" class="side-menu">
                                    <div class="side-menu__icon"> <i data-lucide="user"></i> </div>
                                    <div class="side-menu__title"> {{ $my_patient->fname.' '.$my_patient->lname }} </div>
                                </a>
                            </li>
                            @empty
                            <li>
                                <a href="#" class="side-menu">
                                    <div class="side-menu__title text-xs"> No Assigned Patients</div>
                                </a>
                            </li>
                            @endforelse --}}
                        </ul>
                    </li>
                    @endcan
                    @can('questionaires.index')
                    <li>
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
                    <li>
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
                                    <div class="side-menu__title"> User Roles </div>
                                </a>
                            </li>
                            @endcan
                            @can('permissions.index')
                            <li>
                                <a href="{{ route('permissions.index') }}" class="side-menu">
                                    <div class="side-menu__icon"> <i data-lucide="user-x"></i> </div>
                                    <div class="side-menu__title"> Permissions </div>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                </ul>
            </nav>
            <div class="mt-5">

                
            </div>
            <!-- END: Side Menu -->
            <div class="w-full">
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
    
    <!-- BEGIN: JS Assets-->
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
    <script src="{{ asset('public/app.js') }}"></script>
    <script src="{{ asset('dist/js/app.js') }}"></script>
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
        function displayPusherNotifications() {
            return $.ajax("{{ route('pop-notifications') }}", {
                method: 'GET'
            });
        }
        displayPusherNotifications();
    </script>
    <script src="{{ asset('dist/js/ckeditor-classic.js') }}"></script>
</body>
</html>
