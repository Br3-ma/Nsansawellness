@extends('layouts.app-settings')
@section('content')
<div class="content">
    <div class="flex mt-6">
        <h2 class="text-lg font-medium mr-auto flex space-x-6 mt-8">
            <i data-lucide="package" class="w-6 h-6"></i>
            &nbsp;
            @hasrole('admin')
            <span>Subscription Plans</span>
            @endhasrole
        </h2>
        <a href="{{ route('settings.plan.create') }}" class="intro-x btn btn-primary shadow-md mr-2">
            <i data-lucide="plus" class="w-6 h-6"></i>Create Plan
        </a>
    </div>
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
        <!-- BEGIN: Users Layout -->
        <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4">
            <div class="box">
                <div class="flex items-start px-5 pt-5">
                    <div class="w-full flex flex-col lg:flex-row items-center">
                        <div class="w-16 h-16 image-fit">
                            <div class="font-bolder capitalize text-xs text-white w-4 h-4 sm:w-10 sm:h-10 rounded-full flex items-center justify-center text-slate-400 zoom-in tooltip">
                                B
                            </div>
                        </div>
                        <div class="lg:ml-4 text-center lg:text-left mt-3 lg:mt-0">
                            <a target="_blank" href="" class="capitalize font-medium">Basic Plan</a> 
                            <div class="text-slate-500 text-xs mt-0.5">Patient</div>
                        </div>
                    </div>
                </div>
                <div class="text-center lg:text-left p-5">

                </div>
                <div class="text-center w-full lg:text-right p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                  
                    <button title="View more" data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview" class="tooltip btn btn-info py-1 px-2">
                        <i data-lucide="eye" class="w-3 h-3"></i>
                        {{-- Re-assign --}}
                    </button>
                    <button title="Update details" data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview" class="tooltip btn btn-success py-1 px-2">
                        <i data-lucide="edit" class="w-3 h-3 text-white"></i>
                        {{-- Re-assign --}}
                    </button>
                    <button title="Permanently delete" data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview" class="tooltip btn btn-danger py-1 px-2">
                        <i data-lucide="trash-2" class="w-3 h-3"></i>
                        {{-- Re-assign --}}
                    </button>
                </div>
            </div>
        </div>
        
        <div class="intro-y col-span-12 md:col-span-12 lg:col-span-12">
            <div class="items-center justify-center centered" style="text-align: center">
                <img class="intro-y mx-auto" width="300" src="https://cdni.iconscout.com/illustration/free/thumb/empty-box-4085812-3385481.png">
                <h3>No Profiles Yet</h3>
            </div>
        </div>
        
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <nav class="w-full sm:w-auto sm:mr-auto">
                <ul class="pagination">
                    
                </ul>
            </nav>
        </div>
        <!-- END: Pagination -->
    </div>
</div>
@endsection