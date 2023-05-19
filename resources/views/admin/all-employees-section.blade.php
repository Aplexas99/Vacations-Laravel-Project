<h2>All Employees</h2>
<br>
<div class="list-group projects">
    @if(count($employees) > 0)
        @foreach($employees as $employee)
            <a href="{{ route('admin.employees.showEmployeeInfo', $employee->id) }}" class="list-group-item">
                <div class="list-item-info">
                    <h5 class="item-header">{{$employee->username}}</h5>
                </div>
            </a>
        @endforeach
    @else
        <p>There is no employee defined!</p>
    @endif
</div>
