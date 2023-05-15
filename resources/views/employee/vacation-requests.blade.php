
<h2>Vacation Requests</h2>
    <br>
                <div class="list-group vacation-requests">
                    @if(count($vacationRequests) > 0)
                    @foreach($vacationRequests as $vacationRequest)
                    <div class="list-group-item">
                        <div class="request-info">
                            <h5 class="request-user">{{$vacationRequest->employee->username}}</h5>
                            <p>Start Date: <span class="start-date">{{$vacationRequest->start_date}}</span></p>
                            <p>End Date: <span class="end-date">{{$vacationRequest->end_date}}</span></p>
                        </div>
                        @if($vacationRequest->status == "PENDING")
                        <span class="status-indicator bg-warning"></span>
                        @elseif($vacationRequest->status == "ACCEPTED")
                        <span class="status-indicator bg-success"></span>
                        @else
                        <span class="status-indicator bg-danger"></span>
                        @endif
                    </div>
                    @endforeach
                    @else
                        <p>You have no vacation requests</p>
                    @endif
                </div>