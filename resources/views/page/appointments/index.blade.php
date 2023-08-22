@extends('layouts.app')
@section('content')
<div class="content">
    <div class="intro-y mt-8 flex justify-content-between justify-center">
        <h2 class="text-lg font-medium mr-auto flex space-x-6">
            <i data-lucide="calendar" class="w-6 h-6"></i>
            &nbsp;
            <span>Appointments</span>
        </h2>
        
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <button class="btn btn-primary shadow-md mr-2">Free Schedule</button>
            <div class="dropdown ml-auto sm:ml-0">
                <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="plus"></i> </span>
                </button>
                <div class="dropdown-menu w-40">
                    <ul class="dropdown-content">
                        <li style="z-index: 600;">
                            <a href="#" class="dropdown-item add-time-trigger" data-sidebar="add-time-sidebar">
                                <i data-lucide="share-2" class="w-4 h-4 mr-2"></i> Add Available Time
                            </a>                        
                        </li>
                        {{-- <li>
                            <a href="" class="dropdown-item"> <i data-lucide="settings" class="w-4 h-4 mr-2"></i> Settings </a>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @if (Session::has('attention'))
    <div class="intro-x alert alert-secondary w-full alert-dismissible justify-center show flex items-center mb-2" role="alert"> 
        <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> 
        {{ Session::get('attention') }}
        <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close"> 
            <i data-lucide="x" class="w-4 h-4"></i> 
        </button> 
    </div>
    @elseif (Session::has('error_msg'))
    <div class="intro-x alert alert-danger w-full alert-dismissible justify-center show flex items-center mb-2" role="alert"> 
        <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> 
        {{ Session::get('error_msg') }}
        <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close"> 
            <i data-lucide="x" class="w-4 h-4"></i> 
        </button> 
    </div>
    @endif
    <div class="grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Calendar Side Menu -->
        <div class="col-span-12 xl:col-span-4 2xl:col-span-3">
            <div class="box p-5 intro-y">
                @hasanyrole(['counselor', 'admin'])
                <a href="{{ route('appointment.create', ['type' => 'video']) }}" class="btn btn-primary w-full mt-2"> <i class="w-4 h-4 mr-2" data-lucide="video"></i> Add New Video Call Appointment </a>
                {{-- <a href="{{ route('appointment.create', ['type' => 'phone']) }}" class="btn btn-primary w-full mt-2"> <i class="w-4 h-4 mr-2" data-lucide="phone-call"></i> Add New Phone Call Appointment </a> --}}
                @endhasanyrole
                <div class="border-t border-b border-slate-200/60 dark:border-darkmode-400 mt-6 mb-5 py-3" id="calendar-events">
                    
                    @forelse ($appointments as $appointment)
                    
                        @if (!empty($appointments->toArray()))
                        <div class="items-center flex transition rounded-md p-2 duration-300 ease-in-out hover:bg-slate-100 dark:hover:bg-darkmode-400">
                            <div class="event p-3 -mx-3 flex items-center">
                                {{-- @if($appointment->status !== 0)
                                <div class="w-2 h-2 bg-pending rounded-full"></div>
                                @endif --}}
                                <a target="_blank" href="{{ route('appointment.show', ['id' => $appointment->id ]) }}">
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
                                @if($appointment->status !== 0)
                                    <a title="Delete Permanently"  href="{{ route('appointment.destroy', ['id' => $appointment->id ]) }}" class="tooltip btn btn-secondary text-white">
                                        <i data-lucide="trash" class="w-4 h-4 text-danger"></i> 
                                    </a>
                                    <a title="Edit Appointment" href="{{ route('appointment.edit', ['id' => $appointment->id ]) }}" class="tooltip btn mx-1">
                                        <i data-lucide="edit-2" class="w-4 h-4 text-green-500"></i> 
                                    </a>
                                    @if($appointment->guests !== null)
                                    <a href="/therapy-session-appointment/{{ auth()->user()->id }}/{{ $appointment->guests->first()->chat_id ?? 0 }}/sender/patient/{{ $appointment->video_link }}" title="Join Video Call" class="tooltip btn btn-danger text-white">
                                        <i data-lucide="video" class="w-4 h-4 text-white"></i> 
                                    </a>
                                    @endif
                                @endif
                            </div>
                        </div>
                        @endif
                    @empty
                    <div class="text-slate-500 p-3 text-center hidden" id="calendar-no-events">No Appointments Made</div>
                    @endforelse

                    
                    @if(!empty($incoming_appointments->toArray()))
                    @forelse ($incoming_appointments as $app)
                    @if($app->appointment != null)
                    <div class="relative items-center flex transition rounded-md p-2">
                        <div class="event p-3 -mx-3 {{  $app->appointment->status == 0 ? 'disabled bg-slate-200 italic' : 'cursor-pointer' }} flex items-center">
                            {{-- @if($app->appointment->status != 0)
                            <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                            @endif --}}
                            <a target="_blank" href="{{ route('appointment.show', ['id' => $app->appointment->id ]) }}">
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
                            @if($app->appointment->status == 1)
                            {{-- <a title="Delete Permanently"  href="{{ route('appointment.destroy', ['id' => $app->appointment->id ]) }}" class="btn btn-secondary text-white">
                                <i data-lucide="trash" class="w-4 h-4 text-danger"></i> 
                            </a> --}}
                            {{-- <a title="Edit" href="{{ route('appointment.edit', ['id' => $app->appointment->id ]) }}" class="btn mx-1">
                                <i data-lucide="edit-2" class="w-4 h-4 text-green-500"></i> 
                            </a> --}}
                            <a href="/therapy-session-appointment/{{ auth()->user()->id }}/{{ $app->chat_id ?? 0 }}/receiver/patient/{{ $app->appointment->video_link }}" title="Join Video Call" class="btn btn-danger text-white">
                                <i data-lucide="video" class="w-4 h-4 text-white"></i> 
                            </a>
                            @endif
                        </div>
                    </div>
                    @endif
                    @empty
                    <div class="text-slate-500 p-3 text-center hidden" id="calendar-no-events">No Appointments Made</div>
                    
                    @endforelse
                    @else 
                    <div class="items-center justify-center centered" style="text-align: center">
                            {{-- <img class="intro-y mx-auto" width="300" src="https://cdni.iconscout.com/illustration/free/thumb/empty-box-4085812-3385481.png">
                            <h3>No Appointments</h3> --}}
                    </div>
                    @endif
                    
                </div>
                {{-- <div class="form-check form-switch flex">
                    <label class="form-check-label" for="checkbox-events">Notify me</label>
                    <input class="show-code form-check-input ml-auto" type="checkbox" id="checkbox-events">
                </div> --}}
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
<!-- Sidebar -->
<div class="sidebar" id="add-time-sidebar">
    <!-- Close button for the sidebar -->
    <div class="close-sidebar">
        <button class="btn btn-primary" id="close-sidebar">Close</button>
    </div>
    <!-- Sidebar content goes here -->
    <div class="container">
        <h2 class="text-lg font-semibold mb-4">Add Available Time</h2>
        <form>
            <div class="mb-4">
                <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                <input type="text" name="start_date" id="start_date" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <!-- Add more form fields as needed -->
            <!-- For example, you can add fields for end date and time -->
            <div class="mb-4">
                <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                <input type="text" name="end_date" id="end_date" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <!-- Add more fields as needed -->
            <!-- Example: Time, Description, etc. -->
            <div class="flex justify-end">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
    
    <!-- Add your form or content for adding available time here -->
</div>
{{-- @include('page.modals.create-appointment-modal') --}}
<script>
    var evnt = @json($calendar);
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Open the sidebar when clicking "Add Available Time"
        $(".add-time-trigger").on("click", function (e) {
            e.preventDefault();
            var sidebarId = $(this).data("sidebar");
            $("#" + sidebarId).css("transform", "translateX(0)");
        });

        // Close the sidebar when clicking the close button
        $("#close-sidebar").on("click", function () {
            var sidebarId = $(this).closest(".sidebar").attr("id");
            $("#" + sidebarId).css("transform", "translateX(100%)");
        });
    });
</script>
@endsection