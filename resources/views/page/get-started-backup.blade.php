@include('layouts.head')
<div class="container" style="padding-top:10%; text-align:center">
    <div data-elementor-type="wp-page" data-elementor-id="6" class="elementor elementor-6">
        <section class="elementor-section elementor-top-section elementor-element elementor-element-f8c0f27 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="f8c0f27" data-element_type="section">
           
    
                <h4>Find your personalized therapist match</h4>
                
    
                <div style="box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px; padding:2%" class="card-body">
                      <form onsubmit="gotToRegister()" id="getStartedForm">
                        <!-- One "tab" for each step in the form: -->
                          <div class="tab">
                            <h4>What type of therapy are you looking for?</h4>
                            <div class="container">
                              <div class="radio">
                                <input id="radio-1" name="radio" type="radio" checked>
                                <label for="radio-1" class="radio-label">Individual (For myself)</label>
                              </div>
                            
                              <div class="radio">
                                <input id="radio-2" name="radio" type="radio">
                                <label  for="radio-2" class="radio-label">Couples (For me and my partner)</label>
                              </div>

                              <div class="radio">
                                <input id="radio-3" name="radio" type="radio">
                                <label  for="radio-3" class="radio-label">Teen (For my child)</label>
                              </div>
                            </div>
                          </div>



                          <div class="tab">
                            <h4>What is your Gender?</h4>
                            <div class="container">
                              <div class="radio">
                                <input id="radio-4" name="radio" type="radio" checked>
                                <label for="radio-4" class="radio-label">Male</label>
                              </div>
                              <div class="radio">
                                <input id="radio-4" name="radio" type="radio">
                                <label  for="radio-4" class="radio-label">Female</label>
                              </div>
                            </div>                        
                          </div>  

                        
                          <div class="tab">
                            <h4>Have you ever been in therapy before?</h4>
                            <div class="container">
                              <div class="radio">
                                <input id="radio-5" name="radio" type="radio" checked>
                                <label for="radio-5" class="radio-label">Yes</label>
                              </div>
                            
                              <div class="radio">
                                <input id="radio-6" name="radio" type="radio">
                                <label  for="radio-6" class="radio-label">No</label>
                              </div>
                            </div> 
                          </div>

                        
                          <div class="tab">
                            <h4>Select your age.</h4>
                            <div class="container">
                              <div class="radio">
                                <select class="form-control">
                                    <optgroup>
                                      <option>15</option>
                                      <option>16</option>
                                      <option>17</option>
                                      <option>18</option>
                                      <option>19</option>
                                      <option>20</option>
                                      <option>21</option>
                                      <option>22</option>
                                      <option>24</option>
                                      <option>25</option>
                                      <option>26</option>
                                      <option>27</option>
                                      <option>30</option>
                                      <option>33</option>
                                      <option>35</option>
                                    </optgroup>
                                </select>
                              </div>
                            </div> 
                          </div>

                        
                          <div class="tab">
                            <h4>What is your relationship status?</h4>
                            <div class="container">
                              <div class="radio">
                                <input id="radio-7" name="radio" type="radio" checked>
                                <label for="radio-7" class="radio-label">Single</label>
                              </div>
                            
                              <div class="radio">
                                <input id="radio-8" name="radio" type="radio">
                                <label  for="radio-8" class="radio-label">In a relationship</label>
                              </div>
                            
                              <div class="radio">
                                <input id="radio-9" name="radio" type="radio">
                                <label  for="radio-9" class="radio-label">Married</label>
                              </div>
                            
                              <div class="radio">
                                <input id="radio-10" name="radio" type="radio">
                                <label  for="radio-10" class="radio-label">Divorced</label>
                              </div>
                            
                              <div class="radio">
                                <input id="radio-11" name="radio" type="radio">
                                <label  for="radio-11" class="radio-label">Widowed </label>
                              </div>
                            
                              <div class="radio">
                                <input id="radio-12" name="radio" type="radio">
                                <label  for="radio-12" class="radio-label">Other</label>
                              </div>
                            </div> 
                          </div>

                        
                          <div class="tab">
                            <h4>Do you consider yourself religious?</h4>
                            <div class="container">
                              <div class="radio">
                                <input id="radio-13" name="radio" type="radio" checked>
                                <label for="radio-13" class="radio-label">Yes</label>
                              </div>
                            
                              <div class="radio">
                                <input id="radio-14" name="radio" type="radio">
                                <label  for="radio-14" class="radio-label">No</label>
                              </div>
                            </div> 
                          </div>

                        
                          <div class="tab">
                            <h4>Would you like to be matched with a therapist who provides Christian-based therapy?</h4>
                            <div class="container">
                              <div class="radio">
                                <input id="radio-15" name="radio" type="radio" checked>
                                <label for="radio-15" class="radio-label">Yes</label>
                              </div>
                            
                              <div class="radio">
                                <input id="radio-16" name="radio" type="radio">
                                <label  for="radio-16" class="radio-label">No</label>
                              </div>
                            </div> 
                          </div>
                        
                          <div class="tab">
                            <h4>What led you to consider therapy today?</h4>
                            <div class="container">
                              <div class="radio">
                                <input id="radio-15" name="radio" type="checkbox" checked>
                                <label for="radio-15" class="radio-label">Yes</label>
                              </div>
                            
                              <div class="radio">
                                <input id="radio-16" name="radio" type="checkbox">
                                <label  for="radio-16" class="radio-label">No</label>
                              </div>
                            </div> 
                          </div>

                        <div style="overflow:auto;">
                          <div style="float:right;">
                            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                            <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                          </div>
                        </div>
                        <!-- Circles which indicates the steps of the form: -->
                        <div style="text-align:center;margin-top:40px;">
                          <span class="step"></span>
                          <span class="step"></span>
                          <span class="step"></span>
                          <span class="step"></span>
                          <span class="step"></span>
                          <span class="step"></span>
                          <span class="step"></span>
                          <span class="step"></span>
                        </div>

                        <div>
                          Let's walk the process of finding the best therapist for you! We'll
                          start off with some basic questions
                        </div>
                      </form>
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