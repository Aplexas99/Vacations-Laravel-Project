<h2>Team: {{$team->name}}</h2>
<br>
<div class="list-group">
        <h4>team manager: {{$team->leader->username}}</h4>
        <h4>team members:</h4>
        @foreach($team->members as $employee)
        <div class="list-group-item team-members">
            <div class="item-info">
                <h5 class="team-member-name">{{$employee->username}}</h5>
            </div>
        </div>
        @endforeach
</div>
