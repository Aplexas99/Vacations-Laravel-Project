<h2>My project info</h2>
<br>
<div class="list-group">
        @if($employee->id != $project->projectManager->id)
        <h4>Project Name: {{$project->name}}</h4>
        <h4>Project Description:</h4>
        <p>{{$project->description}}</p>
        <h4>Project Start Date: {{$project->start_date}}</h4>
        <h4>Project End Date: {{$project->end_date}}</h4>
        @else
        <form action="{{route('projects.update',$project->id)}}" method="POST" id="project-input">
                <h4>Project Name: <input type="text" name="name" value="{{$project->name}}"></h4>
                <h4>Project Description:</h4> <textarea type="text" rows="4" name="description">{{$project->description}}</textarea>
                <h4>Project Start Date: <input type="date" name="start_date" value="{{$project->start_date}}"></h4>
                <h4>Project End Date: <input type="date" name="end_date" value="{{$project->end_date}}"></h4>
        </form>
        @endif
        <h4>Project manager: {{$project->projectManager->username}}</h4>

</div>
