@extends('layouts.app')
@section('content')
<div class="content">
    <div class="intro-y mt-8">
        <h2 class="text-lg font-medium mr-auto flex space-x-6">
            <i data-lucide="calendar" class="w-6 h-6"></i>
            &nbsp;
            <span>Appointments</span>
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
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            {{-- <button class="btn btn-primary shadow-md mr-2">Print Schedule</button> --}}
            {{-- <div class="dropdown ml-auto sm:ml-0">
                <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="plus"></i> </span>
                </button>
                <div class="dropdown-menu w-40">
                    <ul class="dropdown-content">
                        <li>
                            <a href="" class="dropdown-item"> <i data-lucide="share-2" class="w-4 h-4 mr-2"></i> Share </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item"> <i data-lucide="settings" class="w-4 h-4 mr-2"></i> Settings </a>
                        </li>
                    </ul>
                </div>
            </div> --}}
        </div>
    </div>
    <div class="grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Calendar Side Menu -->
        <div class="col-span-12 xl:col-span-4 2xl:col-span-3">
            <div class="box p-5 intro-y">
                <a href="{{ route('appointment.create', ['type' => 'video']) }}" class="btn btn-primary w-full mt-2"> <i class="w-4 h-4 mr-2" data-lucide="video"></i> Add New Video Call Appointment </a>
                <a href="{{ route('appointment.create', ['type' => 'phone']) }}" class="btn btn-primary w-full mt-2"> <i class="w-4 h-4 mr-2" data-lucide="phone-call"></i> Add New Phone Call Appointment </a>
                <div class="border-t border-b border-slate-200/60 dark:border-darkmode-400 mt-6 mb-5 py-3" id="calendar-events">
                    
                    @forelse ($appointments as $appointment)
                    @if (!empty($appointments->toArray()))
                    <div class="items-center flex transition rounded-md p-2 duration-300 ease-in-out hover:bg-slate-100 dark:hover:bg-darkmode-400">
                        <div class="event p-3 -mx-3 {{  $appointment->status == 0 ? 'disabled bg-slate-200 italic' : 'cursor-pointer' }} flex items-center">
                            {{-- @if($appointment->status !== 0)
                            <div class="w-2 h-2 bg-pending rounded-full"></div>
                            @endif --}}
                            <a href="{{ route('appointment.show', ['id' => $appointment->id ]) }}">
                                <div class="pr-10">
                                    <div class="event__title">
                                        {{ $appointment->title }}
                                        @if($appointment->status == 0)
                                        (<span class="text-danger">Cancelled</span>)
                                        @endif
                                    </div>
                                
                                    <small class="text-slate-500 text-xs mt-0.5"> 
                                         {{ $appointment->start_date }} 
                                        <span class="mx-1">•</span>{{ $appointment->start_time ?? '' }}
                                    </small>
                                    {{-- <a title="view" href="{{ route('appointment.activate', ['id' => $appointment->id ]) }}" class="flex items-center absolute top-0 bottom-0 my-auto right-0" href=""> <i data-lucide="eye" class="w-4 h-4 text-slate-500"></i> </a> --}}
                                </div>
                            </a>
                        </div>
                        {{-- <a class="flex items-center absolute top-0 bottom-0 right-2" href=""> <i data-lucide="edit" class="w-4 h-4 text-slate-500"></i> </a> --}}
                        
                        <div class="flex items-center space-x-3 justify-end">
                            {{-- @if($appointment->status == 0)
                            <a title="Reactivate" href="{{ route('appointment.activate', ['id' => $appointment->id ]) }}" class="flex zoom-in tooltip items-center absolute top-0 bottom-0 my-auto right-0" href=""> <i data-lucide="redo" class="w-4 h-4 text-slate-500"></i> </a>
                            @else
                            <a title="Cancel"  href="{{ route('appointment.deactivate', ['id' => $appointment->id ]) }}" class="flex zoom-in tooltip items-center absolute top-0 bottom-0 my-auto right-0" href=""> 
                                <i data-lucide="x" class="w-4 h-4 text-slate-500"></i> 
                            </a>
                            @endif --}}
                            <a title="Delete Permanently"  href="{{ route('appointment.destroy', ['id' => $appointment->id ]) }}" class="btn btn-secondary text-white">
                                <i data-lucide="trash" class="w-4 h-4 text-danger"></i> 
                            </a>
                            <a title="Edit" href="{{ route('appointment.edit', ['id' => $appointment->id ]) }}" class="btn mx-1">
                                <i data-lucide="edit-2" class="w-4 h-4 text-green-500"></i> 
                            </a>
                            <a href="nsansawellness/therapy-session-appointment/{{ auth()->user()->id }}/{{ $appointment->id }}/receiver/patient/{{ $appointment->video_link }}" title="Join Video Call" class="btn btn-danger text-white">
                                <i data-lucide="video" class="w-4 h-4 text-white"></i> 
                            </a>
                        </div>
                    </div>
                    @endif
                    @empty
                    <div class="text-slate-500 p-3 text-center hidden" id="calendar-no-events">No Appointments Made</div>
                    @endforelse

                    @forelse ($incoming_appointments as $app)
                    @if($app->appointment != null)
                    <div class="relative items-center flex transition rounded-md p-2">
                        <div class="event p-3 -mx-3 {{  $app->appointment->status == 0 ? 'disabled bg-slate-200 italic' : 'cursor-pointer' }} flex items-center">
                            {{-- @if($app->appointment->status != 0)
                            <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                            @endif --}}
                            <a href="{{ route('appointment.show', ['id' => $app->appointment->id ]) }}">
                                <div class="pr-10">
                                    <div class="event__title">
                                        {{ $app->appointment->title }}
                                        @if($app->appointment->status == 0)
                                        (<span class="text-danger">Cancelled</span>)
                                        @endif
                                    </div>
                                
                                    <div class="text-slate-500 text-xs mt-0.5"> 
                                        <!-- <span class="event__days">2</span>--> 
                                        {{ $app->appointment->start_date }} <span class="mx-1">•</span>{{ $app->appointment->start_time ?? '' }}
                                    </div>
                                    {{-- <a title="view" href="{{ route('appointment.activate', ['id' => $appointment->id ]) }}" class="flex items-center absolute top-0 bottom-0 my-auto right-0" href=""> <i data-lucide="eye" class="w-4 h-4 text-slate-500"></i> </a> --}}
                                </div>
                            </a>
                        </div>                        
                        <div class="flex items-center space-x-3 justify-end">
                            {{-- @if($appointment->status == 0)
                            <a title="Reactivate" href="{{ route('appointment.activate', ['id' => $appointment->id ]) }}" class="flex zoom-in tooltip items-center absolute top-0 bottom-0 my-auto right-0" href=""> <i data-lucide="redo" class="w-4 h-4 text-slate-500"></i> </a>
                            @else
                            <a title="Cancel"  href="{{ route('appointment.deactivate', ['id' => $appointment->id ]) }}" class="flex zoom-in tooltip items-center absolute top-0 bottom-0 my-auto right-0" href=""> 
                                <i data-lucide="x" class="w-4 h-4 text-slate-500"></i> 
                            </a>
                            @endif --}}
                            <a title="Delete Permanently"  href="{{ route('appointment.destroy', ['id' => $app->appointment->id ]) }}" class="btn btn-secondary text-white">
                                <i data-lucide="trash" class="w-4 h-4 text-danger"></i> 
                            </a>
                            <a title="Edit" href="{{ route('appointment.edit', ['id' => $app->appointment->id ]) }}" class="btn mx-1">
                                <i data-lucide="edit-2" class="w-4 h-4 text-green-500"></i> 
                            </a>
                            <a href="nsansawellness/therapy-session-appointment/{{ auth()->user()->id }}/{{ $app->appointment->id }}/receiver/patient/{{ $app->appointment->video_link }}" title="Join Video Call" class="btn btn-danger text-white">
                                <i data-lucide="video" class="w-4 h-4 text-white"></i> 
                            </a>
                        </div>
                    </div>
                    @endif
                    @empty
                    <div class="text-slate-500 p-3 text-center hidden" id="calendar-no-events">No Appointments Made</div>
                    
                    @endforelse
                    
                </div>
                <div class="form-check form-switch flex">
                    <label class="form-check-label" for="checkbox-events">Notify me</label>
                    <input class="show-code form-check-input ml-auto" type="checkbox" id="checkbox-events">
                </div>
            </div>
        </div>
        <!-- END: Calendar Side Menu -->
        <!-- BEGIN: Calendar Content -->
        <div class="col-span-12 xl:col-span-8 2xl:col-span-9">
            <div class="box p-5">
                <div class="full-calendar" id="calendar"></div>
            </div>
        </div>
        <!-- END: Calendar Content -->
    </div>
</div>
{{-- @include('page.modals.create-appointment-modal') --}}

<script>
    var evnt = @json($calendar);
    
</script>
@endsection