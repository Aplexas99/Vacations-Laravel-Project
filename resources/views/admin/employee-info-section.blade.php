<h2>Employee name: {{$employee->username}}</h2>
<br>
    <h4>Role: {{$employee->role->name}}</h4>
    @if ($employee->teams()->count() > 0)
        <h4>Teams:</h4>
        <div class="list-group small">
            @foreach ($employee->teams as $team)
            <a href="{{ route('admin.teams.showTeamInfo', $team->id) }}" class="list-group-item">
                <div class="list-item-info">
                    <h5 class="item-header">{{$team->name}}</h5>
                </div>
            </a>
            @endforeach
    @endif
    @if ($employee->vacationRequests()->count() > 0)
        <br>
        <h4>Vacation Requests:</h4>
            <div class="list-group small">
            @foreach ($employee->vacationRequests as $vacationRequest)
            <a href="{{ route('admin.vacationRequests.showVacationInfo', $vacationRequest->id) }}" class="list-group-item">
            <div class="item-info">
                            <h5 class="item-header">{{$vacationRequest->employee->username}}</h5>
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
            </a>
            @endforeach
            </div>
    @endif
</div>
