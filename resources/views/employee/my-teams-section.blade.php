
<h2>My Teams</h2>
    <br>
        <div class="list-group teams">
            @foreach($teams as $team)
            <div class="list-group-item">
                <div class="team-info">
                    <h5 class="team-name">{{$team->name}}</h5>
                </div>
            </div>
            @endforeach
        </div>