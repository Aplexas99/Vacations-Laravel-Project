
<h2>All teams</h2>
    <br>
        <div class="list-group teams">
            @if(count($teams) > 0)
            @foreach($teams as $team)
            <a href="{{ route('admin.teams.showTeamInfo', $team->id) }}" class="list-group-item">
                <div class="list-item-info">
                    <h5 class="item-header">{{$team->name}}</h5>
                </div>
            </a>
            @endforeach
            
            @else
                <p>Currently there is no team defined</p>
            @endif
        </div>