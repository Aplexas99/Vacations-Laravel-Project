<h2>Project info</h2>
<br>
<div class="list-group">
    <form action="{{ route('admin.projects.updateProject', $project->id) }}" method="POST" id="project-input">
        @csrf
        @method('PUT')
        <h4>Project Name: <input type="text" name="name" value="{{ $project->name }}"></h4>
        <h4>Project Description:</h4>
        <textarea type="text" rows="4" name="description">{{ $project->description }}</textarea>
        <h4>Project Start Date: <input type="date" name="start_date" value="{{ $project->start_date }}"></h4>
        <h4>Project End Date: <input type="date" name="end_date" value="{{ $project->end_date }}"></h4>
        <h4>Project manager: 
            <select name="project_manager_id" id="project_manager">
                <option value="">Choose Project Manager</option>
                @foreach($employees as $employee)
                <option value="{{ $employee->id }}" {{ $project->project_manager_id == $employee->id ? 'selected' : '' }}>{{ $employee->username }}</option>
                @endforeach
            </select>
        </h4>
        <h4>Team: 
            <select name="team_id" id="team_id">
                <option value="">Choose Team</option>
                @foreach($teams as $team)
                <option value="{{ $team->id }}" {{ $project->team_id == $team->id ? 'selected' : '' }}>{{ $team->name }}</option>
                @endforeach
            </select>
        </h4>
        <button type="submit" class="btn btn-primary btn-submit">Update</button>
    </form>
</div>
