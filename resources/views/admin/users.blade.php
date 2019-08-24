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
                    <th>Change Role to</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td><input class="checkBoxes" type="checkbox" name='checkBoxArray[]' value=' echo $user_id '></td>
                    <td>{{$user->id}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->firstname}}</td>
                    <td>{{$user->lastname}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    @if ($user->role === "Admin")
                        <td class='links-color'><a href="{{ route('change.updateRole', $user->id ) }}" value="Subscriber">Subscriber</a></td>
                    @else
                        <td class='links-color'><a href="{{ route('change.updateRole', $user->id ) }}" name="Admin">Admin</a></td>
                    @endif           
</form>
<form method="post" id="actions">      
                    <input type='hidden' class='_id' name='edit' value=''>
                    <td><a href="{{ route('users.edit', $user->id ) }}" class='btn-xs btn-success submit-buttons edit_link' name='edit'>Edit</a></td>
                           
</form>
                    <form action="{{ route('users.destroy', $user->id ) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <td><input class='btn-xs btn-danger del_link' type='submit' value="Delete"></td>
                    </form>
                </tr>
                @endforeach 
    </tbody>
</table>
@endsection
                    
