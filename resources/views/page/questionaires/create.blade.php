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
        <form method="POST" action="{{ route('questionaires.store') }}" id="wiz-questionaire" class="wizard">
            @csrf
            <ul class="wizard-steps" role="tablist">
                <li class="tab1" role="tab">
                    <div class=" px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                        <div class="font-medium text-base">Questionaire Settings</div>
                        <div class="grid grid-cols-12 gap-4 gap-y-5 mt-5">
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <label for="input-wizard-1" class="form-label">Questionaire Description</label>
                                <input id="input-wizard-1" name="name" type="text" class="form-control" placeholder="Description">
                                <small>For example, Patient Registration Survey</small>
                            </div>
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <label for="input-wizard-6" class="form-label">Group to Survey</label>
                                <select name="group_assigned" id="input-wizard-6" class="form-select">
                                    <option value="patient">Patients</option>
                                    <option value="counselor">Counselors</option>
                                </select>
                            </div>
                            <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                                <a class="btn btn-secondary w-24 prevStep">Previous</a>
                                <a onclick="nextPrev(1)" class="btn nextStep btn-primary w-24 ml-2">Next</a>
                            </div>
                        </div>
                    </div>
                </li>

                <li role="tab">
                    <div class="tab2 px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                        <div class="font-medium text-base font-bold">Question List</div>
                        <div class="field_wrapper grid grid-cols-12 gap-4 gap-y-5 mt-5">
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <label for="input-wizard-1" class="form-label">Question 1</label>
                                <input id="input-wizard-1" name="question[]" type="text" class="form-control" placeholder="Description">
                                <small>For example, Patient Registration Survey</small>
                            </div>
                            <div class="intro-y col-span-2 sm:col-span-2">
                                <label for="input-wizard-6" class="form-label">Type</label>
                                <select name="type[]" id="input-wizard-6" class="form-select">
                                    <option>Select One</option>
                                    <option>Select Many</option>
                                </select>
                            </div>
                            <div class="intro-y col-span-3 sm:col-span-2 mt-5">
                                <a href="javascript:void(0)" class="btn btn-secondary w-20 text-xs add_button">Add Question</a>
                            </div>
                        </div>
                        
                        <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                            <a class="btn btn-secondary w-24 prevStep">Previous</a>
                            <button type="submit" class="btn btn-primary w-24 ml-2">Submit</button>
                        </div>
                    </div>
                </li>
            </ul>
        </form>
    </div>
    <!-- END: Wizard Layout -->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

    $('.tab1').show();
    $('.tab2').hide();
    $('.wiz-questionaire').wizard(); 
   
    $('.nextStep').click(function(){
        $('.tab1').hide();
        $('.tab2').show();
    });   
    $('.prevStep').click(function(){
        $('.tab1').show();
        $('.tab2').hide();
    });

    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var addAnsButton = $('.add_ans_button');
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var ansWrapper = $('.ans_wrapper'); //Input field wrapper
    // var fieldWRPPR ='';
    var ansNewField = '<div class="intro-y col-span-6 sm:col-span-6"><label for="input-wizard-1" class="form-label font-bold">Answers</label><input id="input-wizard-1" name="answer[]" type="text" class="form-control" placeholder="Description"></div><div class="intro-y col-span-3 sm:col-span-3 md: mt-5"><a href="javascript:void(0)" class="add_ans_button btn btn-secondary w-20 text-xs">Add Answer</a></div>';
    var ansField = '<div class="intro-y col-span-6 sm:col-span-6"><label for="input-wizard-1" class="form-label font-bold">Answers</label><input id="input-wizard-1" name="answer[]" type="text" class="form-control" placeholder="Description"></div><div class="intro-y col-span-3 sm:col-span-3 md: mt-5"><a href="javascript:void(0)" class="remove_ans_button btn btn-secondary w-20 text-xs">Remove Answer</a></div>';
    var fieldHTML ='<div class="intro-y col-span-4 sm:col-span-6"><label for="input-wizard-1" class="form-label">Question 1</label><input id="input-wizard-1" name="question[]" type="text" class="form-control" placeholder="Description"></div><div class="intro-y col-span-2 sm:col-span-2"><label for="input-wizard-6" class="form-label">Type</label><select name="type[]" id="input-wizard-6" class="form-select"><option>Select One</option><option>Select Many</option></select></div><div class="intro-y col-span-3 sm:col-span-2 mt-5"><a href="javascript:void(0)" class="btn btn-secondary w-20 text-xs remove_button">Remove Question</a></div>';
    var x = 1; //Initial field counter is 1
    
    //Once add sub answer
    $(addAnsButton).click(function(){
        alert('here');
        $(this).closest('div').append(ansField);
        // $(ansWrapper).append(ansField); //Add field html
    });       
    //Once add button is clicked
    // $(addAnsButton).click(function(){
    //     // alert('here');
    //     $(this).closest('div').append(ansField);
    //     $(ansWrapper).append(ansField); //Add field html
    // });    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    // var div = document.getElementById("myLI").closest('section');
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        
        $(this).closest('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>
@endsection
