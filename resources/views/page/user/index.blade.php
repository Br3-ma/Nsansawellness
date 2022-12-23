@extends('layouts.app')
@section('content')
<div class="content">
    <h2 class="intro-y text-lg font-medium mt-10">
        Users 
    </h2>
    @if (Session::has('attention'))
    <div class="intro-x alert alert-secondary w-1/2 alert-dismissible justify-center show flex items-center mb-2" role="alert"> 
        <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> 
        {{ Session::get('attention') }}
        <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close"> 
            <i data-lucide="x" class="w-4 h-4"></i> 
        </button> 
    </div>
    @elseif (Session::has('error_msg'))
    <div class="intro-x alert alert-danger w-1/2 alert-dismissible justify-center show flex items-center mb-2" role="alert"> 
        <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> 
        {{ Session::get('error_msg') }}
        <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close"> 
            <i data-lucide="x" class="w-4 h-4"></i> 
        </button> 
    </div>
    @endif
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">

            <a  href="{{ route('users.create') }}" class="btn btn-primary shadow-md mr-2">Add New User</a>
            <div class="dropdown">
                <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="plus"></i> </span>
                </button>
                <div class="dropdown-menu w-40">
                    <ul class="dropdown-content">
                        <li>
                            <a  href="{{ route('roles.create') }}" class="dropdown-item"> <i data-lucide="users" class="w-4 h-4 mr-2"></i> Add User Role </a>
                        </li>
                        {{-- <li>
                            <a  href="javascript:;" data-tw-toggle="modal" data-tw-target="#create-permission-modal" class="dropdown-item"> <i data-lucide="users" class="w-4 h-4 mr-2"></i> Add Permissions </a>
                        </li> --}}
                        {{-- <li>
                            <a href="" class="dropdown-item"> <i data-lucide="message-circle" class="w-4 h-4 mr-2"></i> Send Message </a>
                        </li> --}}
                    </ul>
                </div>
            </div>
            <div class="hidden md:block mx-auto text-slate-500">Showing {{ $users->count() }} entries</div>
            <div class="flex w-full sm:w-auto">
                {{-- <select class="form-select box ml-2">
                    <option>All</option>
                    @foreach($roles as $role)
                    <option>{{  $role->name }}</option>
                    @endforeach
                </select> --}}
            </div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                {{-- <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i> 
                </div> --}}
            </div>
        </div>
        <!-- BEGIN: Users Layout -->
        @forelse($users as $user)
        {{-- @dd($user->roles) --}}
        <div class="intro-y col-span-12 md:col-span-6">
            <div class="box">
                <div class="flex flex-col lg:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                        @if($user->image_path == null)
                            <div class="font-bolder bg-primary text-white w-8 h-8 sm:w-10 sm:h-10 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip" title="{{ $user->fname.' '.$user->lname  }}">
                                {{ $user->fname[0].' '.$user->lname[0] }}
                            </div>
                        @else
                            <img alt="User" class="rounded-full" src="{{ asset('public/storage/'.$user->image_path) }}">
                        @endif
                        {{-- <img alt="User" class="rounded-full" src="{{ asset('public/storage/'.$user->image_path) }}"> --}}
                    </div>
                    <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                        <a href="{{ route('users.show', $user->id) }}" class="capitalize font-medium">{{ $user->fname.' '.$user->lname }}</a> 
                        <div class="text-slate-500 text-xs mt-0.5">
                            @foreach($user->roles as $role)
                                <span class="capitalize">{{ $role->name }}</span>
                            @endforeach
                            <br>
                            <span class="capitalize">{{ $user->department ?? '' }}</span>
                        </div>
                    </div>
                    <div class="flex -ml-2 lg:ml-0 lg:justify-end mt-3 lg:mt-0">
                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip" title="Facebook"> <i class="w-3 h-3 fill-current" data-lucide="facebook"></i> </a>
                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip" title="Twitter"> <i class="w-3 h-3 fill-current" data-lucide="twitter"></i> </a>
                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip" title="Linked In"> <i class="w-3 h-3 fill-current" data-lucide="linkedin"></i> </a>
                    </div>
                </div>
                <div class="flex flex-wrap lg:flex-nowrap items-center justify-center p-5">
                    <div class="w-full lg:w-1/2 mb-4 lg:mb-0 mr-auto">
                        <div class="flex text-slate-500 text-xs">
                            <div class="mr-auto">
                                {{ $user->email_verified_at == null ? 'Unverified Account' : 'Verified Account'}}
                            </div>
                            {{-- <div>20%</div> --}}
                        </div>
                    </div>
                    {{-- <div class="w-20 h-10"> --}} 
                    <a href={{ url('auto-assign/'.$user->guest_id) }} class="btn btn-warning text-white py-1 px-2 mr-2">Auto Assign</a>
                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-outline-secondary py-1 px-2">Profile</a>
                    
                </div>
            </div>
        </div>
        @empty
        <div class="intro-y col-span-12 md:col-span-6">
            <div class="box text-center">
                <p>No User Found</p>
            </div>
        </div>
        @endforelse
        
        <!-- END: Users Layout -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center"></div>
            <nav class="w-full sm:w-1/2 sm:mr-auto">
                <ul class="pagination w-1/2">
                    {!! $users->links('pagination::tailwind') !!}
                </ul>
            </nav>
            {{-- <select class="w-20 form-select box mt-3 sm:mt-0">
                <option>10</option>
                <option>25</option>
                <option>35</option>
                <option>50</option>
            </select> --}}
        </div>
        <!-- END: Pagination -->
    </div>
</div>
<!-- BEGIN: Delete Confirmation Modal -->
@include('page.modals.delete-confirmation')
<!-- END: Delete Confirmation Modal -->

<!-- BEGIN: Delete Confirmation Modal -->
@include('page.modals.create-user-permission')
<!-- END: Delete Confirmation Modal -->

<!-- BEGIN: Delete Confirmation Modal -->
@include('page.modals.create-user-role')
<!-- END: Delete Confirmation Modal -->

<!-- BEGIN: Delete Confirmation Modal -->
@include('page.modals.create-user')
<!-- END: Delete Confirmation Modal -->
@endsection