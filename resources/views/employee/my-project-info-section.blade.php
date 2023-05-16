<h2>My project info</h2>
<br>
<div class="list-group">
        <h4>Project Name: {{$project->name}}</h4>
        <h4>Project Description: {{$project->description}}</h4>
        <h4>Project Start Date: {{$project->start_date}}</h4>
        <h4>Project End Date: {{$project->end_date}}</h4>
        <h4>Project manager: {{$project->projectManager->username}}</h4>
</div>
