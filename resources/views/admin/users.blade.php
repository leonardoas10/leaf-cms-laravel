@extends('admin.adminlayout')
@section('content')

<div class="table-responsive">
    <table class="table table-bordered table-hover tr-background table-responsive">
        <div class="row">
            <div id="bulkOptionsContainer" class="col-xs-4">
                <select class="form-control input-background" id="bulk_options" name="bulk_options">
                <option value="">{{__('user.select_options')}}</option>
                    <option value="Admin">{{__('user.admin')}}</option>
                    <option value="Subscriber">{{__('user.subscriber')}}</option>
                    <option value="Delete">{{__('user.delete')}}</option>
                </select>
            </div>
            <div class="col-xs-4">
                <input type="button" name="submit" id="apply" class="btn btn-success submit-buttons" value="{{__('user.apply')}}">
            </div>
            <thead>
                <tr>
                    <th class="table-column-size-check-all"><input id="selectAllBoxes" type="button" class="uncheck btn-xs btn-success submit-buttons" value="Check All"></th>
                    <th class="table-column-size-id hide-on-mobile">ID</th>
                    <th>{{__('user.username')}}</th>
                    <th>{{__('user.firstname')}}</th>
                    <th>{{__('user.lastname')}}</th>
                    <th>{{__('user.email')}}</th>
                    <th>{{__('user.role')}}</th>
                    <th class='table-column-size-th'>{{__('user.change_role_to')}}</th>
                    <th class="table-column-size-button-th">{{__('user.edit')}}</th>
                    <th class="table-column-size-button-th">{{__('user.delete')}}</th>
                    <th class="table-column-size-button-th">{{__('user.online_offline')}}</th>
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
                            @if (App::isLocale('es'))
                                <td><input type="submit" class='btn-xs btn-success submit-buttons table-column-size-change-role' name="role" value="{{$user->role === "Administrador" ? "Suscriptor" : "Administrador"}}"></td>
                            @else
                                <td><input type="submit" class='btn-xs btn-success submit-buttons table-column-size-change-role' name="role" value="{{$user->role === "Admin" ? "Subscriber" : "Admin"}}"></td>
                            @endif  
                    </form>        
                    <form action="{{ route('users.edit', $user->id ) }}">  
                    @csrf    
                        <td><input type="submit" class='btn-xs btn-success submit-buttons table-column-size-button-td' value="{{__('user.edit')}}"></td>                    
                    </form>
                    <td>
                        <button type="button" class="btn-xs btn-danger table-column-size-button-td" data-toggle="modal" data-target="#delete_category_modal_{{ $user->id }}">
                            {{ __('user.delete') }}
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="delete_category_modal_{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="exampleModalLabel">{{ __('user.are_you_sure') }}</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span class="close-x" aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('users.destroy', $user->id ) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-body">
                                        
                                        <p class="text-center">{{ __('user.you_are_going_to') }}</p>
                                        <p class="text-center">{{$user->username}}</p>
                                            
                                    </div>
                                    <div class="modal-footer">
                                        <button class='btn-xs btn-danger' type='submit'  value="">{{ __('user.delete_user') }}</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal -->
                    </td>
                    @if ($user->userIsOnline())
                        <td class="text-center">{{__('user.online')}} <i class="fa fa-check-circle"></i></td>
                    @else 
                        <td class="text-center">{{__('user.offline')}} <i class="fa fa-times-circle"></i></td>
                    @endif
                </tr>
                @endforeach 
            </tbody>
        </div>
    </table>
</div>
@push('bulk_operator')
    <script>bulkOperations('user', "{{ csrf_token() }}");</script>
@endpush   
@endsection



                    
