@extends('layouts.app')
@section('content')

<div class="content">
    <div class="flex items-center mt-8">
        <h2 class="intro-y text-lg font-medium mr-auto">
            Create a Questionaire
        </h2>
    </div>
    <!-- BEGIN: Wizard Layout -->
    <div class="intro-y box py-4 sm:py-20 mt-2">
        <div class="flex justify-center">
            <button class="intro-y w-10 h-10 rounded-full btn btn-primary mx-2">1</button>
            <button class="intro-y w-10 h-10 rounded-full btn bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400 text-slate-500 mx-2">2</button>
            {{-- <button class="intro-y w-10 h-10 rounded-full btn bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400 text-slate-500 mx-2">3</button> --}}
        </div>
        <div class="px-5 mt-5">
            <div class="font-medium text-center text-lg">Setup Your Account</div>
            <div class="text-slate-500 text-center mt-2">To start off, set the questionaire preferences.</div>
        </div>
        <form id="wiz-questionaire"class="wizard">
            <ul class="wizard-steps" role="tablist">
            <li class="active" role="tab">
            <div class=" px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                <div class="font-medium text-base">Questionaire Settings</div>
                <div class="grid grid-cols-12 gap-4 gap-y-5 mt-5">
                    <div class="intro-y col-span-12 sm:col-span-6">
                        <label for="input-wizard-1" class="form-label">Questionaire Description</label>
                        <input id="input-wizard-1" name="description" type="text" class="form-control" placeholder="Description">
                        <small>For example, Patient Registration Survey</small>
                    </div>
                    <div class="intro-y col-span-12 sm:col-span-6">
                        <label for="input-wizard-6" class="form-label">Group to Survey</label>
                        <select name="group_assigned" id="input-wizard-6" class="form-select">
                            <option>Patients</option>
                            <option>Counselors</option>
                            <option>Therapists</option>
                            <option>Psychologists</option>
                        </select>
                    </div>
                    <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                        <button class="btn btn-secondary w-24">Previous</button>
                        <button onclick="nextPrev(1)" class="btn btn-primary w-24 ml-2">Next</button>
                    </div>
                </div>
            </div>
            </li>

            <li role="tab">
            <div class=" px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                <div class="font-medium text-base font-bold">Question List</div>
                <div class="grid grid-cols-12 gap-4 gap-y-5 mt-5">
                    <div class="intro-y col-span-12 sm:col-span-6">
                        <label for="input-wizard-1" class="form-label">Question 1</label>
                        <input id="input-wizard-1" name="description" type="text" class="form-control" placeholder="Description">
                        <small>For example, Patient Registration Survey</small>
                    </div>
                    <div class="intro-y col-span-2 sm:col-span-2">
                        <label for="input-wizard-6" class="form-label">Type</label>
                        <select name="group_assigned" id="input-wizard-6" class="form-select">
                            <option>Select One</option>
                            <option>Select Many</option>
                        </select>
                    </div>
                    <div class="intro-y col-span-3 sm:col-span-2 mt-5">
                        <button class="btn btn-secondary w-20 text-xs">Add Question</button>
                    </div>


                    {{-- Dynamic input field javascript --}}
                    <div class="intro-y col-span-12 sm:col-span-6">
                        <label for="input-wizard-1" class="form-label font-bold">Answers</label>
                        <input id="input-wizard-1" name="description" type="text" class="form-control" placeholder="Description">
                        
                    </div>
                    <div class="intro-y col-span-4 sm:col-span-3 md: mt-5">
                        <button class="btn btn-secondary w-20 text-xs">Add Answer</button>
                    </div>
                    {{-- End inputs --}}

                    <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                        <button class="btn btn-primary w-24 ml-2">Submit</button>
                    </div>
                </div>
            </div>
            </li>
            </ul>
        </form>
    </div>
    <!-- END: Wizard Layout -->
</div>
<script>
    $('.wiz-questionaire').wizard(); 
    
</script>
@endsection
