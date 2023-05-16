<h2>My Projects</h2>
<br>
<div class="list-group projects">
    @if(count($projects) > 0)
        @foreach($projects as $project)
            <a href="{{ route('myProjects.showProjectInfo', $project->id) }}" class="list-group-item">
                <div class="list-item-info">
                    <h5 class="item-header">{{$project->name}}</h5>
                </div>
            </a>
        @endforeach
    @else
        <p>You have no projects</p>
    @endif
</div>
