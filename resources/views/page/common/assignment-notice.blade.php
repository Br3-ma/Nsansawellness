@php
    $currRequest = App\Models\AssignCounselor::currrentAssignReq();
@endphp
<div id="new-assignment-modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl intro-y" id="payment-modal-dialog">
        <div class="modal-content">
            <a href="{{ route('home') }}" class="modal-header">
                <h3 class="font-medium text-base mr-auto">You have a new patient</h3> 
            </a>
            <div class="modal-body text-left text-sm"> 
                <span class="items-center justify-center">
                    <img class="w-52 h-52" src="https://img.freepik.com/premium-vector/man-working-armchair-laptop-with-cat-his-arms-freelance-work-home-concept-hand-drawn-flat-vector-illustration_528592-655.jpg">
                </span>
                <small>
                <b>Hi {{ Auth::user()->fname.' '.Auth::user()->lname }},</b>
                <br>
                
                <p>You have a new patient {{ $currRequest->patient->fname.' '.$currRequest->patient->lname }} </p>
               
                <a href="{{ route('users.show', $currRequest->patient->id) }}" >
                    View details
                </a>    
                </small>
            </div>
            <div class="w-full flex text-white px-4">
                <form action="{{ route('accept-assign') }}" method="post">
                    @csrf
                    <input type="hidden" name="assign_id" >
                    <button type="submit" class="btn btn-warning btn-sm shadow-md text-white"> 
                        <i data-lucide="wallet" class="w-4 h-4 "></i> &nbsp; 
                        <small>Accept</small>
                    </button> 
                </form>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <button type="button" onclick="deleteCurrentRequest('{{ $currRequest->id }}')" target="_blank" href="#" class="text-primary py-2"> 
                    <small>Delete</small>
                </button> 
            </div>
        </div>
    </div>
</div>