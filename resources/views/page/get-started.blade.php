@include('layouts.head')
<div class="container" style="padding-top:10%; text-align:center">
    <div data-elementor-type="wp-page" data-elementor-id="6" class="elementor elementor-6">
        <section class="elementor-section elementor-top-section elementor-element elementor-element-f8c0f27 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="f8c0f27" data-element_type="section">
           
                  <div style="padding-bottom: 5%">
                    <h2>Find your personalized therapist match</h2>
                    <p style="font-size: 16px">We know how important it is to have the right therapist who understands you. 
                      By answering questions about yourself, we’ll provide you with a tailored match to a 
                      therapist who is best suited to help you.</p>                
                  </div>  

                    <div style="padding:2%; margin-left: auto; margin-right: auto; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; width:80%" class="card-body">
                      <form onsubmit="gotToRegister()" id="getStartedForm">
                        <!-- One "tab" for each step in the form: -->
                          <div class="tab">
                            <h4>What type of therapy are you looking for?</h4>
                            <label>
                              <input type="radio" name="radio"/>
                              <span  onclick="nextPrev(1)">Individual (For myself)</span>
                            </label>
                            <label>
                              <input type="radio" name="radio"/>
                              <span  onclick="nextPrev(1)">Couples (For me and my partner)</span>
                            </label>
                            <label>
                              <input type="radio" name="radio"/>
                              <span  onclick="nextPrev(1)">Teen (For my child)</span>
                            </label>

                          </div>



                          <div class="tab">
                            <h4>What is your Gender?</h4>
                            <label>
                              <input type="radio" name="radio"/>
                              <span onclick="nextPrev(1)">Male</span>
                            </label>
                            <label>
                              <input type="radio" name="radio"/>
                              <span onclick="nextPrev(1)">Female</span>
                            </label>                       
                          </div>  

                        
                          <div class="tab">
                            <h4>Have you ever been in therapy before?</h4>
                            <label>
                              <input type="radio" name="radio"/>
                              <span onclick="nextPrev(1)">Yes</span>
                            </label>
                            <label>
                              <input type="radio" name="radio"/>
                              <span onclick="nextPrev(1)">No</span>
                            </label>
                          </div>

                        
                          <div class="tab">
                            <h4>What is your relationship status?</h4>
                            <label>
                              <input type="radio" name="radio" checked/>
                              <span onclick="nextPrev(1)">Single</span>
                            </label>
                            <label>
                              <input type="radio" name="radio"/>
                              <span onclick="nextPrev(1)">In a relationship</span>
                            </label>
                            <label>
                              <input type="radio" name="radio"/>
                              <span onclick="nextPrev(1)">Married</span>
                            </label>
                            <label>
                              <input type="radio" name="radio"/>
                              <span onclick="nextPrev(1)">Divorced</span>
                            </label>
                            <label>
                              <input type="radio" name="radio"/>
                              <span onclick="nextPrev(1)">Widowed</span>
                            </label>
                            <label>
                              <input type="radio" name="radio"/>
                              <span onclick="nextPrev(1)">Other</span>
                            </label>
                          </div>

                        
                          <div class="tab">
                            <h4>Do you consider yourself religious?</h4>
                            <label>
                              <input type="radio" name="radio" checked/>
                              <span onclick="nextPrev(1)">Yes</span>
                            </label>
                            <label>
                              <input type="radio" name="radio"/>
                              <span onclick="nextPrev(1)">No</span>
                            </label>
                          </div>

                        
                          <div class="tab">
                            <h4>Would you like to be matched with a therapist who provides Christian-based therapy?</h4>
                            <label>
                              <input type="radio" name="radio" checked/>
                              <span onclick="nextPrev(1)">Yes</span>
                            </label>
                            <label>
                              <input type="radio" name="radio"/>
                              <span onclick="nextPrev(1)">No</span>
                            </label>
                          </div>
                        
                          <div class="tab">
                            <h4>What led you to consider therapy today?</h4>
                            <label>
                              <input type="checkbox" name="radio" checked/>
                              <span onclick="nextPrev(1)">I've been feeling depressed</span>
                            </label>
                            <label>
                              <input type="checkbox" name="radio"/>
                              <span>I am feeling anxious or overwhelmed</span>
                            </label>
                            <label>
                              <input type="checkbox" name="radio"/>
                              <span onclick="nextPrev(1)">My mood is interfering with my job/school performance</span>
                            </label>
                            <label>
                              <input type="checkbox" name="radio"/>
                              <span>I can't find purpose and meaning in my life</span>
                            </label>
                            <label>
                              <input type="checkbox" name="radio"/>
                              <span  onclick="nextPrev(1)">I am grieving</span>
                            </label>
                            <label>
                              <input type="checkbox" name="radio"/>
                              <span onclick="nextPrev(1)">I am experiencing trauma</span>
                            </label>
                            <label>
                              <input type="checkbox" name="radio"/>
                              <span onclick="nextPrev(1)">Just exploring</span>
                            </label>
                            <label>
                              <input type="checkbox" name="radio"/>
                              <span onclick="nextPrev(1)">Other</span>
                            </label>
                          </div>

                        {{-- <div style="overflow:auto;">
                          <div style="float:right;">
                            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                            <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                          </div>
                        </div> --}}
                        <!-- Circles which indicates the steps of the form: -->
                        <div style="text-align:center;margin-top:40px;display:none">
                          <span class="step"></span>
                          <span class="step"></span>
                          <span class="step"></span>
                          <span class="step"></span>
                          <span class="step"></span>
                          <span class="step"></span>
                          <span class="step"></span>
                          <span class="step"></span>
                        </div>


                      </form>
                      <div class="card text-primary flex" style="margin-top:4%; margin-left: auto;
                      margin-right: auto; background:#FEE6BD; color: #FF7C00; max-width: 100%;">
                        <span style="color: #FF7C00; font-size:13px">
                          <span class="fa fa-info-circle"></span>
                          Let's walk the process of finding the best therapist for you! We'll
                          start off with some basic questions
                        </span>
                      </div>
                    </div>
                

        </section>
        <section style="padding: 5%">

        </section>
    </div>
</div>

@include('layouts.footer')
<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab
    var patientAnswer2 = document.getElementById("patientAnswer2");
    patientAnswer2.onclick = function() {
        
        nextPrev();
        alert('am here');
    }
    function showTab(n) {
      // This function will display the specified tab of the form...
      var x = document.getElementsByClassName("tab");
      x[n].style.display = "block";
      //... and fix the Previous/Next buttons:
      if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
      } else {
        document.getElementById("prevBtn").style.display = "inline";
      }
      if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
      } else {
        document.getElementById("nextBtn").innerHTML = "Next";
      }
      //... and run a function that will display the correct step indicator:
      fixStepIndicator(n)
    }
    
    function nextPrev(n) {
      // This function will figure out which tab to display
      var x = document.getElementsByClassName("tab");
      // Exit the function if any field in the current tab is invalid:
      if (n == 1 && !validateForm()) return false;
      // Hide the current tab:
      x[currentTab].style.display = "none";
      // Increase or decrease the current tab by 1:
      currentTab = currentTab + n;
      // if you have reached the end of the form...
      if (currentTab >= x.length) {
        // ... the form gets submitted:
        let url = "{{ route('register', ['role' => 'patient', 'type' => 'patient'])}}";
        document.location.href=url;
        // document.getElementById("getStartedForm").submit(function(e){
        //     alert('here');
        //     e.preventDefault();
        //     let url = "{{ route('register', ['role' => 'patient', 'type' => 'patient'])}}";
        //     document.location.href=url;
        // });

        return false;
      }
      // Otherwise, display the correct tab:
      showTab(currentTab);
    }
    
    function validateForm() {
      // This function deals with validation of the form fields
      var x, y, i, valid = true;
      x = document.getElementsByClassName("tab");
      y = x[currentTab].getElementsByTagName("input");
      // A loop that checks every input field in the current tab:
      for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
          // add an "invalid" class to the field:
          y[i].className += " invalid";
          // and set the current valid status to false
          valid = false;
        }
      }
      // If the valid status is true, mark the step as finished and valid:
      if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
      }
      return valid; // return the valid status
    }
    
    function fixStepIndicator(n) {
      // This function removes the "active" class of all steps...
      var i, x = document.getElementsByClassName("step");
      for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
      }
      //... and adds the "active" class on the current step:
      x[n].className += " active";
    }

    function gotToRegister(){
        alert('yeas');
    }

    $('#getStartedForm').submit(function(e){
        alert('yeas');
        e.preventDefault();
        let url = "{{ route('register', ['role' => 'patient', 'type' => 'patient'])}}";
        document.location.href=url;
    });
    </script>