<h2>All Projects</h2>
<br>
<div class="list-group projects">
    @if(count($projects) > 0)
        @foreach($projects as $project)
            <a href="{{ route('admin.projects.showProjectInfo', $project->id) }}" class="list-group-item">
                <div class="list-item-info">
                    <h5 class="item-header">{{$project->name}}</h5>
                </div>
            </a>
        @endforeach
    @else
        <p>There is no projects defined!</p>
    @endif
</div>
