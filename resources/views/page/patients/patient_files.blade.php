@extends('layouts.app')
@section('content')
<!-- BEGIN: Modal Content -->
<div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" id="modalMobile" style="margin-top:20%">
        <div class="modal-content">
            <!-- BEGIN: Modal Header -->
            <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">Assign Counselor</h2> 
                {{-- <button class="btn btn-outline-secondary hidden sm:flex"> <i data-lucide="file" class="w-4 h-4 mr-2"></i> Download Docs </button> --}}
                
            </div> <!-- END: Modal Header -->
            <!-- BEGIN: Modal Body -->
            <form method="POST" action="{{ route('manual.assign.counselor') }}">
                @csrf
            <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                {{-- <div class="col-span-12 sm:col-span-6"> <label for="modal-form-1" class="form-label">From</label> <input id="modal-form-1" type="text" class="form-control" placeholder="example@gmail.com"> </div>
                <div class="col-span-12 sm:col-span-6"> <label for="modal-form-2" class="form-label">To</label> <input id="modal-form-2" type="text" class="form-control" placeholder="example@gmail.com"> </div>
                <div class="col-span-12 sm:col-span-6"> <label for="modal-form-3" class="form-label">Subject</label> <input id="modal-form-3" type="text" class="form-control" placeholder="Important Meeting"> </div>
                <div class="col-span-12 sm:col-span-6"> <label for="modal-form-4" class="form-label">Has the Words</label> <input id="modal-form-4" type="text" class="form-control" placeholder="Job, Work, Documentation"> </div> --}}
                <div class="col-span-12 sm:col-span-6"> 
                    <label for="modal-form-6" class="form-label">Profession</label> 
                    <select onchange="getval(this);" id="personel" class="form-select">
                        <option value="None">None</option>
                        <option value="Clinical Social Worker">Clinical Social Worker</option>
                        <option value="Marriage & Family Therapist">Marriage & Family Therapist</option>
                        <option value="Mental Health Counselor">Mental Health Counselor</option>
                        <option value="Professional Counselor">Professional Counselor</option>
                        <option value="Psychologist">Psychologist</option>
                    </select>
                </div>
                <div class="col-span-12 sm:col-span-6"> 
                    <label for="modal-form-5" class="form-label">Counselor/ Therapist</label> 
                    <select name="counselor_id" id="these_counselors" data-search="true" class="form-select w-full">
                    </select>               
                    <input id="inputID" name="patient_id" type="hidden" /> 
                </div>

            </div> <!-- END: Modal Body -->
            <!-- BEGIN: Modal Footer -->
            <div class="modal-footer"> 
                {{-- <div id="this_patient"></div> --}}
                <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button> 
                <button type="submit" class="btn btn-primary w-20">Assign</button> 
            </div> <!-- END: Modal Footer -->
        
        </div></form>
    </div>
</div> <!-- END: Modal Content -->
<div class="content">
    <h2 class="intro-y text-lg font-medium mt-10">
        Manage Patient Files
    </h2>
    @if (Session::has('attention'))
    <div class="intro-x alert alert-secondary w-1/2 alert-dismissible justify-center show flex items-center mb-2" role="alert"> 
        <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> 
        {{ Session::get('attention') }}
        <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close"> 
            <i data-lucide="x" class="w-4 h-4"></i> 
        </button> 
    </div>
    @elseif (Session::has('err_msg'))
    <div class="intro-x alert alert-danger w-1/2 alert-dismissible justify-center show flex items-center mb-2" role="alert"> 
        <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> 
        {{ Session::get('err_msg') }}
        <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close"> 
            <i data-lucide="x" class="w-4 h-4"></i> 
        </button> 
    </div>
    @endif
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            {{-- <button class="btn btn-primary shadow-md mr-2">Record Patient File</button>
            <div class="dropdown">
                <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="plus"></i> </span>
                </button>
                <div class="dropdown-menu w-40">
                    <ul class="dropdown-content">
                        <li>
                            <a href="" class="dropdown-item"> <i data-lucide="users" class="w-4 h-4 mr-2"></i> Add Group </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item"> <i data-lucide="message-circle" class="w-4 h-4 mr-2"></i> Send Message </a>
                        </li>
                    </ul>
                </div>
            </div> --}}
            {{-- <div class="hidden md:block mx-auto text-slate-500">Showing 1 to 3 of {{ sizeOf($my_patients) }} patients</div> --}}
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i> 
                </div>
            </div>
        </div>
        <!-- BEGIN: Users Layout -->
        @forelse($my_patients as $file)
        <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4">
            <div class="box">
                <div class="flex items-start px-5 pt-5">
                    <div class="w-full flex flex-col lg:flex-row items-center">
                        <div class="w-16 h-16 image-fit">
                            @if($file->image_path == null)
                            <div class="font-bolder capitalize text-xs text-white w-4 h-4 sm:w-10 sm:h-10 rounded-full flex items-center justify-center text-slate-400 zoom-in tooltip" title="{{ $file->fname.' '.$file->lname  }}">
                                {{ $file->fname[0].' '.$file->lname[0] }}
                            </div>
                            @else
                            <img alt="{{$file->fname.' '.$file->lname}}" class="rounded-full" src="{{ asset('public/storage/'.$file->image_path) }}">
                            @endif
                        </div>
                        <div class="lg:ml-4 text-center lg:text-left mt-3 lg:mt-0">
                            <a href="" class="capitalize font-medium">{{$file->fname.' '.$file->lname}}</a> 
                            <div class="text-slate-500 text-xs mt-0.5">Patient</div>
                        </div>
                    </div>
                    <div class="absolute right-0 top-0 mr-5 mt-3 dropdown">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i> </a>
                        <div class="dropdown-menu w-40">
                            <div class="dropdown-content">
                                <a href="{{ route('all-patient-files', $file->id) }}" class="dropdown-item"> <i data-lucide="edit-2" class="w-4 h-4 mr-2"></i> Manage Records </a>
                                @hasanyrole('admin')
                                    @if($file->assignedCounselor != null)
                                    <a href="{{ route('manual.remove.counselor', $file->id) }}" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Remove Counselor </a>
                                    @endif
                                @endhasanyrole
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center lg:text-left p-5">
                    {{-- <div>Condition</div> --}}
                    <div class="flex items-center justify-center lg:justify-start text-slate-500 mt-5"> <i data-lucide="mail" class="w-3 h-3 mr-2"></i> {{ $file->email }}</div>
                    <div class="flex items-center justify-center lg:justify-start text-slate-500 mt-1"> <i data-lucide="calendar" class="w-3 h-3 mr-2"></i> {{ $file->created_at }} </div>
                </div>
                <div class="text-center lg:text-right p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                    <a href="{{ route('all-patient-files', $file->id) }}" class="btn btn-warning text-white py-1 px-2 mr-2">
                        <i data-lucide="folder-open" class="w-3 h-3 mr-2"></i>
                        View All Files
                    </a>
                    @hasanyrole('admin')
                        @if($file->assignedCounselor == null)
                        <button onclick="getId('{{ $file->id }}')" data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview" class="btn btn-outline-secondary py-1 px-2">
                            <i data-lucide="shield-check" class="w-3 h-3 mr-2"></i>
                            Assign Counselor
                        </button>
                        @else
                        <button onclick="getId('{{ $file->id }}')" data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview" class="btn btn-outline-secondary py-1 px-2">
                            <i data-lucide="refresh-cw" class="w-3 h-3 mr-2"></i>
                            Re-assign
                        </button>
                        @endif
                    @endhasanyrole
                </div>
            </div>
        </div>
        @empty
        <div class="intro-y col-span-12 md:col-span-12 lg:col-span-12">
            <div class="items-center justify-center centered" style="text-align: center">
                <img class="intro-y mx-auto" width="300" src="https://cdni.iconscout.com/illustration/free/thumb/empty-box-4085812-3385481.png">
                <h3>No Profiles Yet</h3>
            </div>
        </div>
        @endforelse 

        
        <!-- END: Users Layout -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <nav class="w-full sm:w-auto sm:mr-auto">
                <ul class="pagination">
                    {!! $my_patients->links('pagination::tailwind') !!}
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

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    var counselor_id = 0;
    var patient_id = 0;
    function getId(id){
        // alert(id);
        $('#inputID').val(id);
        $('#this_patient').empty();
        $('#these_counselors').empty();
        $('#this_patient').append('<p>'+id+'</p>');
    }

    function getval(sel)
    {
        $('#these_counselors').empty();
        counselor_id = sel.value;
        // Get counselor with this specialty
        $.ajax({
            type:'GET',
            url:'{{ route("counselors-by-dept") }}',
            data: {
                counselor_id
            },
            success:function(data) {    
                console.log(data.result);
                if(Object.keys(data.result).length > 0){
                    for (const counselor of data.result){
                        console.log(counselor)
                        $('#these_counselors').append('<option value="'+counselor.id+'">'+counselor.fname+' '+counselor.lname+'</option>')
                    }
                }
                
            },
            
            error: function (msg) {
                console.log(msg);
                var errors = msg.responseJSON;
            }
        });
    }
</script>