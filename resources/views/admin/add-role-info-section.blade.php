<h2> Add Role</h2>
<br>

<div>
    <form action="{{ route('admin.roles.addRole') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="role_name">Role Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Role Name">
        </div>
        <button type="submit" class="btn btn-primary btn-submit">Add</button>
    </form>
</div>

<script>
    let name = document.getElementById('name');
    let btn = document.querySelector('.btn-submit');
    name.addEventListener('keyup', function() {
        if (name.value.length > 2) {
            btn.disabled = false;
        } else {
            btn.disabled = true;
        }
    });

</script>