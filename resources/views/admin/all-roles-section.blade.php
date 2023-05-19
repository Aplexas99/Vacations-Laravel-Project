
<h2>All Roles</h2>
    <br>
        <div class="list-group teams">
            @if(count($roles) > 0)
            @foreach($roles as $role)
            <a href="{{ route('admin.roles.showRoleInfo', $role->id) }}" class="list-group-item">
                <div class="list-item-info">
                    <h5 class="item-header">{{$role->name}}</h5>
                </div>
            </a>
            @endforeach
            
            @else
                <p>Currently there is no roles defined</p>
            @endif
        </div>