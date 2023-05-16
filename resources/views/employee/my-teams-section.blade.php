
<h2>My Teams</h2>
    <br>
        <div class="list-group teams">
            @if(count($teams) > 0)
            @foreach($teams as $team)
            <div class="list-group-item">
                <div class="list-item-info">
                    <h5 class="item-header">{{$team->name}}</h5>
                </div>
            </div>
            @endforeach
            
            @else
                <p>You have no vacation requests</p>
            @endif
        </div>