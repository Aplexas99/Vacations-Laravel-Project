<h2> Add Employee</h2>
<br>

<div>
    <form action="{{ route('admin.employees.addEmployee') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="employee_name">Employee Name</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Employee Name">
        </div>
        <div class="form-group">
            <label for="employee_password">Employee Password</label>
            <input type="text" class="form-control" id="password" name="password" placeholder="Employee Password">
        </div>
        <div class="form-group">
            <label for="employee_email">Employee Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Employee Email">
        </div>
        <div class="form-group">
            <label for="employee_phone">Vacation days left:</label>
            <input type="number" class="form-control" id="vacation_days_left" name="vacation_days_left" placeholder="Vacation days left">
            <input type="hidden" name="vacation_days_used" value=0>
        </div>
        <div class="form-group">
            <label for="employee_role">Employee Role</label>
            <select name="role_id" id="role_id">
                @foreach($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="employee_team">Employee Team</label>
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

