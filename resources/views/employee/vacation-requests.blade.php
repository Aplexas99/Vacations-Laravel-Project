
<h2>Vacation Requests</h2>
    <br>
                <div class="list-group vacation-requests">
                    @foreach($vacationRequests as $vacationRequest)
                    <div class="list-group-item">
                        <div class="request-info">
                            <h5 class="request-user">{{$vacationRequest->employee->username}}</h5>
                            <p>Start Date: <span class="start-date">{{$vacationRequest->start_date}}</span></p>
                            <p>End Date: <span class="end-date">2023-06-10</span></p>
                        </div>
                        <span class="status-indicator bg-success"></span>
                    </div>
                    @endforeach
                </div>