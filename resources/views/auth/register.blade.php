<!DOCTYPE html>
<!--
Template Name: Enigma - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" class="light">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="dist/images/logo.svg" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Enigma admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Enigma Admin Template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
        <title>Register - Nsansa Wellness</title>
        <link rel="icon" type="image/png" href="{{ asset('favicon.svg') }}">
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="dist/css/app.css" />
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="bg-white">
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <!-- BEGIN: Register Info -->
                <div class="hidden xl:flex flex-col min-h-screen">
                    <a href="{{ route('welcome') }}" class="-intro-x flex items-center pt-5">
                        <img width="70" height="70" src="uploads/sites/304/2022/06/logos.svg" class="attachment-full size-full rounded-full" alt="" loading="lazy" />
                        <span class="text-info text-lg ml-3"> Nsansa Wellness </span> 
                    </a>
                    <div class="my-auto">
                        {{-- <img class="-intro-x w-1/2 -mt-16" src="dist/images/illustration.svg"> --}}
                        <div class="-intro-x text-primary font-bold text-5xl leading-tight mt-5">
                            Create your account
                        </div>
                        @if(request()->get('role') != 'patient')
                        <small class="-intro-x text-lg text-info text-opacity-70 dark:text-slate-400">
                            Private practice with no doors & no overhead.
                        </small>
                        @else
                        <small class="-intro-x text-lg text-success text-opacity-70 dark:text-slate-400">
                            Join online therapy with a licensed therapist
                        </small>
                        @endif
                    </div>
                </div>
                <!-- END: Register Info -->
                <!-- BEGIN: Register Form -->
                <form method="POST" action="{{ route('register') }}" >
                    @csrf
                    <div style="box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 2px 0px;" class="lg:mt-5 mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 px-5 sm:px-8 py-8 xl:p-4 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                         <h6 class="intro-x text-default text-xs xl:text-sm text-center xl:text-left">
                            Fill up all the Application Form
                        </h6> 
                        {{--
                        <div class="intro-x mt-2 text-slate-400 dark:text-slate-400 xl:hidden text-center">Thank you for your interest! Please create your <span class="text-success">{{ $role ?? 'therapist' }}</span> account so we can start processing your application.</div> --}}
                        <div class="intro-x mt-8">
                            <input type="text" id="fname" name="fname" class="intro-x login__input form-control py-3 px-4 block" placeholder="First Name">
                            <br>
                            <input type="text" id="lname" name="lname" class="intro-x login__input form-control py-3 px-4 block" placeholder="Last Name">
                            @if(request()->get('role') != 'patient')
                            <input type="hidden" id="type" name="type" value="counsellor">
                            @else
                            <input type="hidden" id="type" name="type" value="patient">
                            @endif
                            <input type="hidden" id="role" name="role" value="{{ request()->get('role') }}">
                            <input type="hidden" name="guest_id" value="{{ request()->get('guest_id') }}">
                            @if (request()->get('role') != 'patient')
                            <input type="text" id="liecense" name="liecense" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Liecense">
                            @endif
                            <input type="email" id="email" name="email" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Email Address">

                            <input type="password" id="password" name="password" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            {{-- <div class="intro-x w-full grid grid-cols-12 gap-4 h-1 mt-3">
                                <div class="col-span-3 h-full rounded bg-success"></div>
                                <div class="col-span-3 h-full rounded bg-success"></div>
                                <div class="col-span-3 h-full rounded bg-success"></div>
                                <div class="col-span-3 h-full rounded bg-slate-100 dark:bg-darkmode-800"></div>
                            </div>
                            <a href="" class="intro-x text-slate-500 block mt-2 text-xs sm:text-sm">What is a secure password?</a>  --}}
                            <input type="password" id="password-confirm" name="password" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Password Confirmation">
                        </div>
                        <div class="intro-x flex items-center text-slate-600 dark:text-slate-500 mt-4 text-xs sm:text-sm">
                            <input id="remember-me" type="checkbox" class="form-check-input border mr-2">
                            <label class="cursor-pointer select-none" for="remember-me">I agree to the Nsansa Wellness</label>
                            <a class="text-primary dark:text-slate-200 ml-1" href="">Privacy Policy</a>. 
                        </div>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button type="submit" class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">
                                Register
                            </button>
                            <a href="{{ route('login') }}" class="btn btn-outline-secondary py-3 px-1 w-full xl:w-32 mt-3 xl:mt-0 align-top">Sign In</a>
                        </div>
                    </div>
                </form>
                <!-- END: Register Form -->
            </div>
        </div>
        
        <!-- BEGIN: JS Assets-->
        <script src="dist/js/app.js"></script>
        <!-- END: JS Assets-->
    </body>
</html>