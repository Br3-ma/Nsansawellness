@extends('layouts.app')
<link rel="stylesheet" href="dist/css/app.css" />
@section('content')

<div class="content">
    <h2 class="intro-y text-lg font-medium mt-10">
        Edit User Information 
    </h2>
    <div class="container py-6 mx-auto">

        <form method="post" class="w-full" action="{{ route('users.update', $user->id) }}">
            @method('patch')
            @csrf
            <div class="grid grid-cols-12 gap-2 mt-5">
                @if($user->id == auth()->user()->id)
                <div class="intro-y col-span-4 md:col-span-4 lg:col-span-4 xl:col-span-4">
                    <div class="w-full">
                        <h1 class="text-lg ">Personal Information</h1>
                        <small>Carefully edit your persnoal information details</small>
                    </div>
                </div>


                <div class="intro-y col-span-8 md:col-span-8 lg:col-span-8 xl:col-span-8">
                    <div class="mb-3">
                        <label for="name" class="form-label">First Name</label>
                        <input value="{{ $user->fname }}" 
                            type="text" 
                            class="form-control" 
                            name="fname" 
                            placeholder="First Name" required>
        
                        @if ($errors->has('name'))
                            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Last Name</label>
                        <input value="{{ $user->lname }}" 
                            type="text" 
                            class="form-control" 
                            name="lname" 
                            placeholder="Last Name" required>
        
                        @if ($errors->has('lname'))
                            <span class="text-danger text-left">{{ $errors->first('lname') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input value="{{ $user->email }}"
                            type="email" 
                            class="form-control" 
                            name="email" 
                            placeholder="Email address" required>
                        @if ($errors->has('email'))
                            <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="nrc_id" class="form-label">ID No</label>
                        <input value="{{ $user->nrc_id }}"
                            type="text" 
                            class="form-control" 
                            name="nrc_id" 
                            placeholder="NRC ID" required>
                            @if ($errors->has('nrc_id'))
                                <span class="text-danger text-left">{{ $errors->first('nrc_id') }}</span>
                            @endif
                    </div>
                    <div class="mb-3">
                        <label for="mobile_no" class="form-label">Mobile No</label>
                        <input value="{{ $user->mobile_no }}"
                            type="text" 
                            class="form-control" 
                            name="mobile_no" 
                            placeholder="+260 888 8888 88" required>
                            @if ($errors->has('mobile_no'))
                                <span class="text-danger text-left">{{ $errors->first('mobile_no') }}</span>
                            @endif
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input value="{{ $user->address }}"
                            type="text" 
                            class="form-control" 
                            name="address" 
                            placeholder="Address" required>
                            @if ($errors->has('address'))
                                <span class="text-danger text-left">{{ $errors->first('address') }}</span>
                            @endif
                    </div>
                    <div class="mb-3">
                        <label for="country" class="form-label">Country</label>
                        <input value="{{ $user->email }}"
                            type="text" 
                            class="form-control" 
                            name="country" 
                            placeholder="Country" required>
                        @if ($errors->has('country'))
                            <span class="text-danger text-left">{{ $errors->first('country') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="state" class="form-label">State</label>
                        <input value="{{ $user->state }}"
                            type="text" 
                            class="form-control" 
                            name="state" 
                            placeholder="Sate" required>
                        @if ($errors->has('state'))
                            <span class="text-danger text-left">{{ $errors->first('state') }}</span>
                        @endif
                    </div>
                </div>

                <div class="intro-y col-span-4 md:col-span-4 lg:col-span-4 xl:col-span-4">
                    <div class="w-full">
                        <h1 class="text-lg ">Medical Information</h1>
                        <small>Carefully edit your medical information details for better therapy diagnosis</small>
                    </div>
                </div>

                <div class="intro-y col-span-8 md:col-span-8 lg:col-span-8 xl:col-span-8">
                    <div class="mb-3">
                        <label for="date_of_birth" class="form-label">Date of Birth</label>
                        <input value="{{ $user->date_of_birth ?? ''}}" 
                            type="text" 
                            class="form-control datepicker" 
                            data-single-mode="true" 
                            name="date_of_birth" 
                            placeholder="" required>
        
                        @if ($errors->has('date_of_birth'))
                            <span class="text-danger text-left">{{ $errors->first('date_of_birth') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="place_of_birth" class="form-label">Place of Birth</label>
                        <input value="{{ $user->place_of_birth ?? '' }}"
                            type="text" 
                            class="form-control" 
                            name="place_of_birth" 
                            placeholder="" required>
                        @if ($errors->has('place_of_birth'))
                            <span class="text-danger text-left">{{ $errors->first('place_of_birth') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="father_name" class="form-label">Father's Name</label>
                        <input value="{{ $user->father_name ?? '' }}"
                            type="text" 
                            class="form-control" 
                            name="father_name" 
                            placeholder="" required>
                        @if ($errors->has('father_name'))
                            <span class="text-danger text-left">{{ $errors->first('father_name') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="mother_name" class="form-label">Mother's Name</label>
                        <input value="{{ $user->mother_name ?? ''}}"
                            type="text" 
                            class="form-control" 
                            name="mother_name" 
                            placeholder="" required>
                        @if ($errors->has('mother_name'))
                            <span class="text-danger text-left">{{ $errors->first('mother_name') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="blood_group" class="form-label">Blood Group</label>
                        <select class="form-control" 
                            name="blood_group" required>
                            <option selected>{{ $user->blood_group ?? '' }}</option>
                            <option value="A">A</option>
                            <option value="A+">A+</option>
                            <option value="B">B</option>
                            <option value="B+">B+</option>
                            <option value="O">O</option>
                            <option value="AB">AB</option>
                            <option value="OB">OB</option>
                            <option value="OA">OA</option>
                        </select>
                    </div>
                </div>

                {{-- @hasanyrole('counselor') --}}
                <div class="intro-y col-span-4 md:col-span-4 lg:col-span-4 xl:col-span-4">
                    <div class="w-full">
                        <h1 class="text-lg ">Professional Information</h1>
                        <small>Carefully edit your professional information details for better therapy diagnosis</small>
                    </div>
                </div>
                <div class="intro-y col-span-8 md:col-span-8 lg:col-span-8 xl:col-span-8">
                    <div class="mb-3">
                        <label for="occupation" class="form-label">Occupation</label>
                        <input value="{{ $user->occupation }}" 
                            type="text" 
                            class="form-control" 
                            name="occupation" 
                            placeholder="First Name" required>
        
                        @if ($errors->has('occupation'))
                            <span class="text-danger text-left">{{ $errors->first('occupation') }}</span>
                        @endif
                    </div>
                    
                    <div class="mb-3">
                        <label for="department" class="form-label">Area of Expertise</label>
                        <select class="form-control" 
                            name="department" required>
                            <option value="None">None</option>
                            <option value="Clinical Social Worker">Clinical Social Worker</option>
                            <option value="Marriage & Family Therapist">Marriage & Family Therapist</option>
                            <option value="Mental Health Counselor">Mental Health Counselor</option>
                            <option value="Professional Counselor">Professional Counselor</option>
                            <option value="Psychologist">Psychologist</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="hourly_charge" class="form-label">Hourly Charge</label>
                        <small>Your charge per hour</small>
                        <input value="{{ old('hourly_charge') }}" 
                            type="text" 
                            class="form-control" 
                            name="hourly_charge" 
                            placeholder="Hourly Charge Amount (ZMK)" required>
    
                        @if ($errors->has('hourly_charge'))
                            <span class="text-danger text-left">{{ $errors->first('hourly_charge') }}</span>
                        @endif
                    </div>
                </div>
                {{-- @endhasanyrole --}}
                @endif

                @hasanyrole('admin')
                <div class="intro-y col-span-4 md:col-span-4 lg:col-span-4 xl:col-span-4">
                    <div class="w-full">
                        <h1 class="text-lg ">Assign Role</h1>
                        <small>Assign a user role for privacy & access control</small>
                    </div>
                </div>
                <div class="intro-y col-span-8 md:col-span-8 lg:col-span-8 xl:col-span-8">
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-control" 
                            name="role" required>
                            <option value="">Select role</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}"
                                    {{ in_array($role->name, $userRole) 
                                        ? 'selected'
                                        : '' }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('role'))
                            <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                        @endif
                    </div>
                </div>
                @endhasanyrole

            </div>

            <button type="submit" class="btn btn-primary">Update user</button>
            <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</button>
        </form>

    </div>
</div>
<!-- END: Delete Confirmation Modal -->
@endsection