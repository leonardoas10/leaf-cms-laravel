@extends('admin.adminlayout')
@section('content')
<form action="" method="post">
<table class="table table-bordered table-hover">
    <div class="row">
        <div id="bulkOptionsContainer" class="col-xs-4">
            <select class="form-control input-background" id="" name="bulk_options">
                <option value="">Select Options</option>
                <option value="Admin">Admin</option>
                <option value="Subscriber">Subscriber</option>
                <option value="Delete">Delete </option>
            </select>
        </div>
        <div class="col-xs-4">
            <input type="submit" name="submit" class="btn btn-success submit-buttons" value="Apply">
        </div>
        <table class="table table-bordered table-hover tr-background">
            <thead>
                <tr>
                    <th><input id="selectAllBoxes" type="checkbox"></th>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input class="checkBoxes" type="checkbox" name='checkBoxArray[]' value=' echo $user_id '></td>
                    <td>$user_id</td>
                    <td>$username</td>
                    <td>$user_firstname</td>
                    <td>$user_lastname</td>
                    <td>$user_email</td>
                    <td>$user_role</td>
                    <td class='links-color'><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>
                    <td class='links-color'><a href='users.php?change_to_sub={$user_id}'>Subscriber</a></td>
                        
</form>
<form method="post" id="actions">      
                    <input type='hidden' class='_id' name='edit' value=''>
                    <td><input rel='$user_id' class='btn-xs btn-success submit-buttons edit_link' type='submit' value='Edit'></td>
                    <td><input rel='$user_id' class='btn-xs btn-danger del_link' type='submit' name='delete' value='Delete'></td>                             
</form>
                </tr>
    </tbody>
</table>
@endsection
