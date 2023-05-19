
<h2>Vacation Requests</h2>
    <br>
    <h3>Pending Requests:</h3>
                <div class="list-group project-manager">
                    @if(count($vacationRequestsToApprove) > 0)
                    @foreach($vacationRequestsToApprove as $vacationRequest)
                    <a href="{{ route('vacationRequests.showValidateVacationRequest', $vacationRequest->id) }}" class="list-group-item">
                        <div class="item-info">
                            <h5 class="item-header">{{$vacationRequest->vacationRequest->employee->username}}</h5>
                            <p>Start Date: <span class="start-date">{{$vacationRequest->vacationRequest->start_date}}</span></p>
                            <p>End Date: <span class="end-date">{{$vacationRequest->vacationRequest->end_date}}</span></p>
                        </div>
                        @if($vacationRequest->vacationRequest->status == "PENDING")
                        <span class="status-indicator bg-warning"></span>
                        @elseif($vacationRequest->vacationRequest->status == "ACCEPTED")
                        <span class="status-indicator bg-success"></span>
                        @else
                        <span class="status-indicator bg-danger"></span>
                        @endif
                    </a>
                    @endforeach
                    @else
                        <p>You have no vacation requests to approve</p>
                    @endif 

                </div>
                <br>
    <h3>Completed Requests:</h3>
                <div class="list-group project-manager">
                    @if(count($completedVacationRequests) > 0)
                    @foreach($completedVacationRequests as $vacationRequest)
                    <a href="{{ route('vacationRequests.showCompletedVacationRequest', $vacationRequest->id) }}" class="list-group-item">
                        <div class="item-info">
                            <h5 class="item-header">{{$vacationRequest->vacationRequest->employee->username}}</h5>
                            <p>Start Date: <span class="start-date">{{$vacationRequest->vacationRequest->start_date}}</span></p>
                            <p>End Date: <span class="end-date">{{$vacationRequest->vacationRequest->end_date}}</span></p>
                        </div>
                        @if($vacationRequest->status == "PENDING")
                        <span class="status-indicator bg-warning"></span>
                        @elseif($vacationRequest->status == "ACCEPTED")
                        <span class="status-indicator bg-success"></span>
                        @else
                        <span class="status-indicator bg-danger"></span>
                        @endif
                    </a>
                    @endforeach
                    @else
                        <p>You have no completed vacation requests</p>
                    @endif 

                </div>
           