@extends('admin.adminlayout')
@section('content')

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="user_firstname">Firstname</label>
        <input type="text" class="form-control input-background" name="user_firstname" value="">
    </div>
    <div class="form-group">
        <label for="user_lastname">Lastname</label>
        <input type="text" class="form-control input-background" name="user_lastname" value="">
    </div>
    <div class="form-group">
        <select name="user_role" id="" class="input-background">
            <option value="">roll actual</option>
            <option value='Subscriber'>Subscriber</option>
            <option value='Admin'>Admin</option>
        </select>
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control input-background" name="username" value="">
    </div>
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" class="form-control input-background" name="user_email" value="">
    </div>
    <div class="form-group">
        <label for="user_password">Password</label>
        <input autocomplete="off" type="password" class="form-control input-background" name="user_password">
    </div>
    <div class="form-group">
        <input class="btn btn-success submit-buttons" type="submit" name="edit_user" value="Edit User">
    </div>
</form>

@endsection