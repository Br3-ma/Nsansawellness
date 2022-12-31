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
        #desktopchat, #deskPersonalDetails{
                display: block;
        } 
        #mobilechat,
        #mobilePersonalDetails{
            display: none;
        }
        @media only screen and (max-width:600px){
            #mobilechat, 
            #mobilePersonalDetails{
                display: block;
            }        
            #desktopchat{
                display: none;
            } 
            #onChatMenu,#usersIndexControls, #deskPersonalDetails{
                display: none;
            }
            #modalMobile{
                margin-top:50%;
            }
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
            });
        </script>
    </head>
    <!-- END: Head -->
    <body class="py-5 md:py-0">
        <!-- BEGIN: Mobile Menu -->
        <div class="mobile-menu md:hidden">
            <div class="mobile-menu-bar">
                <a href="" class="flex mr-auto">
                    <img alt="Nsansa wellness" class="w-6 rounded-full" src="{{ asset('uploads/sites/304/2022/06/logos.svg') }}">
                </a>
                <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
            </div>
            <div class="scrollable">
                <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="x-circle" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
                <ul class="scrollable__content py-2">
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
                                    <div class="menu__icon"> <i data-lucide="box"></i> </div>
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
                    <li>
                        <a href="{{  route('billing') }}" class="menu">
                            <div class="menu__icon"> <i data-lucide="wallet"></i> </div>
                            <div class="menu__title"> Billing</div>
                        </a>
                    </li>
                    @endcan

                    @can('patient-files')
                    <li>
                        <a href="{{ route('patient-files') }}"  class="menu">
                            <div class="menu__icon"> <i data-lucide="files"></i> </div>
                            <div class="menu__title"> Patient Profiles </div>
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
                            <div class="side-menu__icon"> <i data-lucide="calendar"></i> </div>
                            <div class="side-menu__title"> Appointments </div>
                        </a>
                    </li>
                    @endcan

                    @can('billing')
                    <li>
                        <a href="{{  route('billing') }}" class="side-menu">
                            <div class="side-menu__icon"> <i data-lucide="wallet"></i> </div>
                            <div class="side-menu__title"> Billing </div>
                        </a>
                    </li>
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
            <div class="w-full sm:pt-3 pt-2">
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
