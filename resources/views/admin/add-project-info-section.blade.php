<h2> Add Project</h2>
<br>

<div>
    <form action="{{ route('admin.projects.addProject') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="project_name">Project Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Project Name">
        </div>
        <div class="form-group">
            <label for="project_description">Project Description</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="Project Description">
        </div>
        <div class="form-group">
            <label for="project_start_date">Project Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" placeholder="Project Start Date">
        </div>
        <div class="form-group">
            <label for="project_end_date">Project End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date" placeholder="Project End Date">
        </div>

        <div class="form-group">
            <label for="project_manager">Project Manager</label>
            <select name="project_manager_id" id="project_manager_id">
                <option value="">Choose Project Manager</option>
                @foreach($employees as $employee)
                <option value="{{$employee->id}}">{{$employee->username}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="project_team">Project Team</label>
            <select name="team_id" id="team_id">
                <option value="">Choose Team</option>
                @foreach($teams as $team)
                <option value="{{$team->id}}">{{$team->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary btn-submit">Add</button>
    </form>
</div>

