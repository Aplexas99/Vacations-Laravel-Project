<h2>Add member</h2>
<br>
<div class="list-group">
        <h4>Team manager: {{$team->leader->username}}</h4>
        <h4>Team members:</h4>
        @foreach($team->members as $member)
        <div class="list-group-item team-members">
            <div class="item-info">
                <h5 class="team-member-name">{{$member->username}}</h5>
            </div>
            @if($member->id != $team->leader->id)
            <a href="{{ route('myTeams.deleteTeamMember', [$team->id, $member->id]) }}">
                <img class="btn-delete-member" alt="Delete icon" src="{{ asset('delete.png') }}">
            </a>
            @endif
        </div>
        @endforeach
        <button type="submit" class="btn btn-primary btn-submit" id="add-btn">Add</button>
        
</div>

<form action="{{ route('admin.teams.addMemberToTeam', ['memberId' => ':employeeId', 'teamId' => ':teamId']) }}" method="post" id="add-member-form">
    @csrf 
    <div class="form-group">
        <label for="member_id">Member</label>
        <select name="member_id" id="member_id">
            <option value="">Choose Member</option>
            @foreach($employees as $member)
                <option value="{{ $member->id }}">{{ $member->username }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary btn-submit">Add</button>
</form>

<script>
    let form = document.getElementById('add-member-form');
    form.style.display = 'none';
    
    let addBtn = document.getElementById('add-btn');
    addBtn.addEventListener('click', function() {
        form.style.display = 'block';
        addBtn.style.display = 'none';
    });
    document.getElementById('member_id').addEventListener('change', function() {
        var memberId = this.value;
        var teamId = "{{ $team->id }}";

        var form = document.getElementById('add-member-form');
        form.action = form.action.replace(':employeeId', memberId).replace(':teamId', teamId);
    });
</script>
