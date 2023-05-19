<h2>Team: {{$team->name}}</h2>
<br>
<div class="list-group">
        <h4>Team manager: {{$team->leader->username}}</h4>
        <h4>Team members:</h4>
        @foreach($team->members as $member)
        <div class="list-group-item team-members">
            <div class="item-info">
                <h5 class="team-member-name">{{$member->username}}</h5>
            </div>
            @if($employee->id == $team->leader->id && $member->id != $team->leader->id)
            <a href="{{ route('myTeams.deleteTeamMember', [$team->id, $member->id]) }}">
                <img class="btn-delete-member" alt="Delete icon" src="{{ asset('delete.png') }}">
            </a>
            @endif
        </div>
        @endforeach
</div>
