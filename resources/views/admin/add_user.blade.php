@extends('admin.adminlayout')
@section('content')
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="user_firstname">Firstname</label>
        <input type="text" class="form-control input-background" name="user_firstname">
    </div>
    <div class="form-group">
        <label for="user_lastname">Lastname</label>
        <input type="text" class="form-control input-background" name="user_lastname">
    </div>
    <div class="form-group">
        <select name="user_role" id="" class="input-background">
            <option value="Subscriber">Select Option</option>
            <option value="Admin">Admin</option>
            <option value="Subscriber">Subscriber</option>
        </select>
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control input-background" name="username">
    </div>
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" class="form-control input-background" name="user_email">
    </div>
    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control input-background" name="user_password">
    </div>
    <div class="form-group">
        <input class="btn btn-success submit-buttons" type="submit" name="create_user" value="Add User">
    </div>
</form>
@endsection