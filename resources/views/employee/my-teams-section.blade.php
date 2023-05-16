
<h2>My teams</h2>
    <br>
        <div class="list-group teams">
            @if(count($teams) > 0)
            @foreach($teams as $team)
            <a href="{{ route('myTeams.showTeamInfo', $team->id) }}" class="list-group-item">
                <div class="list-item-info">
                    <h5 class="item-header">{{$team->name}}</h5>
                </div>
            </a>
            @endforeach
            
            @else
                <p>Currently you are not member of any team</p>
            @endif
        </div>