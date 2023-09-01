<!-- Check Availability Sidebar -->
<div class="sidebar sm:w-full w-1/2" id="check-time-sidebar">
    <!-- Close button for the sidebar -->
    <div class="">
        <button class="btn btn-primary" id="close-sidebar2">Close</button>
    </div>
    <!-- Sidebar content goes here -->
    <div class="px-10 container mt-10 pt-8">
        <h2 class="text-lg font-semibold mb-4">Setup An Appointment</h2>
        <h6 class="text-xs mb-4">Fill up all the fields below:</h6>
        <form action="{{ route('appointment.save') }}" method="POST" id="formAvailability">
            @csrf
            
            <div class="w-full mt-3 xl:mt-0 flex-1">
                <input id="appointment-name" name="title" type="text" class="form-control" placeholder="Appointment Title">
                <div class="form-help text-right">Maximum character 0/70</div>
                <input type="hidden" id="_peer_link_id" name="video_link" />
            </div>
            <br>
            <label for="timepicker" class="block text-sm font-medium text-gray-700">Pick Date and Time:</label>

            <div class="w-full py-4">
                @if(!empty($av_dates))
                    @forelse ($av_dates as $index => $adate)
                    <div class="flex gap-2">
                        <label class="w-1/4 relative inline-flex items-center cursor-pointer">
                            <label for="date_picked{{ $adate->id }}" class="block text-sm font-medium text-gray-700">Date</label>
                            <input id="date_picked{{ $adate->id }}" type="checkbox" name="setdate[]" value="{{ $adate->id }}" class="hidden absolute h-5 w-5 appearance-none bg-white border border-gray-300 rounded-md checked:bg-blue-500 checked:border-transparent focus:outline-none">
                            <span class="pl-2 w-full transition-colors duration-300" id="thur-text">
                                <h3 class="font-bold">
                                    @php 
                                        $humanReadableDate = date("F j, Y", strtotime($adate->av_date));
                                        echo $humanReadableDate;
                                    @endphp
                                </h3>
                            </span>
                        </label>
                
                        <div id="date_selector{{ $adate->id }}" class="w-1/4 mt-3 xl:mt-0 flex-1">
                            <label for="timepicker" class="block text-sm font-medium text-gray-700">Start Time</label>
                            <select id="start_time_{{ $adate->id }}" name="setstarttym[]" class="form-control w-full">
                                <!-- 
                                JavaScript will populate options dynamically based on selected date's time range.
                                <option value="14:00">14:00</option>
                                -->
                            </select>
                        </div>
                
                        <div id="date_selector2{{ $adate->id }}" class="w-1/4 mt-3 xl:mt-0 flex-1">
                            <label for="timepicker" class="block text-sm font-medium text-gray-700">End Time</label>
                            <select id="stop_time_{{ $adate->id }}" name="setstoptym[]" class="form-control w-full">
                                <!-- 
                                JavaScript will populate options dynamically based on selected date's time range.
                                -->
                            </select>
                        </div>
                    </div>
                    <br>
                    @empty
                        <p>Seems the counselor is a bit preoccupied at the moment. </p>
                    @endforelse
                    <br><br>
                @else
                    <p>You have not been assigned to any counselor yet. </p>
                @endif
            </div>
            <br>
            <br>
            <div class="w-full">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>

        <ul id="checkAvailabilityList" class="mt-4 space-y-2">

        </ul>
    </div>
</div>