@extends('admin.adminlayout')
@section('content')

<div class="table-responsive">
    <table class="table table-bordered table-hover tr-background table-responsive">
        <div class="row">
            <div id="bulkOptionsContainer" class="col-xs-4">
                <select class="form-control input-background" id="bulk_options" name="bulk_options">
                    <option value="">Select Options</option>
                    <option value="Admin">Admin</option>
                    <option value="Subscriber">Subscriber</option>
                    <option value="Delete">Delete </option>
                </select>
            </div>
            <div class="col-xs-4">
                <input type="button" name="submit" id="apply" class="btn btn-success submit-buttons" value="Apply">
            </div>
            <thead>
                <tr>
                    <th class="table-column-size-check-all"><input id="selectAllBoxes" type="button" class="uncheck btn-xs btn-success submit-buttons" value="Check All"></th>
                    <th class="table-column-size-id hide-on-mobile">ID</th>
                    <th>Username</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th class='table-column-size-th'>Change Role to</th>
                    <th class="table-column-size-button-th">Edit</th>
                    <th class="table-column-size-button-th">Delete</th>
                    <th class="table-column-size-button-th">Online/Offline</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>
                        <label class="label-checkbox" for="{{$user->id}}">
                            <input class="checkBoxes" type="checkbox" id="{{$user->id}}" value='{{$user->id}}'>
                            <span class="cbx"><i class="glyphicon glyphicon-leaf icon-checkbox"></i></span>
                        </label>
                    </td>
                    <td class="table-column-size-id hide-on-mobile">{{$user->id}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->firstname}}</td>
                    <td>{{$user->lastname}}</td>
                    <td class="table-column-size-email">{{$user->email}}</td>
                    <td class="table-column-size-role">{{$user->role}}</td>
                    <form action="{{ route('change.updateRole', $user->id ) }}" method="POST">
                            @method('PATCH')
                            @csrf
                            <td><input type="submit" class='btn-xs btn-success submit-buttons table-column-size-change-role' name="role" value="{{$user->role === "Admin" ? "Subscriber" : "Admin"}}"></td>
                    </form>        
                    <form action="{{ route('users.edit', $user->id ) }}">  
                    @csrf    
                        <td><input type="submit" class='btn-xs btn-success submit-buttons table-column-size-button-td' value='Edit'></td>                    
                    </form>
                    <form action="{{ route('users.destroy', $user->id ) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <td><input class='btn-xs btn-danger table-column-size-button-td ' type='submit' value="Delete"></td>
                    </form>
                    @if ($user->userIsOnline())
                        <td>Online <i class="fa fa-check-circle"></i></td>
                    @else 
                        <td>Offline <i class="fa fa-times-circle"></i></td>
                    @endif
                </tr>
                @endforeach 
            </tbody>
        </div>
    </table>
</div>
@endsection

@push('scripts')
<script>bulkOperations('user', "{{ csrf_token() }}");</script>
@endpush
                    
