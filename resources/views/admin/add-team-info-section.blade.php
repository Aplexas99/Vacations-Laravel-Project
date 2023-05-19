<h2>Add new team</h2>
<br>


<div>
    <form action="{{ route('admin.teams.addTeam') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="team_name">Team Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Team Name">
        </div>
        <div class="form-group">
        <label for="team_leader">Team Leader: </label>
            <select name="leader_id" id="leader_id">
                <option value="">Choose Team Leader</option>
                @foreach($employees as $employee)
                <option value="{{$employee->id}}">{{$employee->username}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary btn-submit">Add</button>
</div>

