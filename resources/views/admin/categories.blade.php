@extends('admin.adminlayout')
@section('content')

@if ($categories->count() === 0)
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-centered">
                <div class="panel panel-default">
                    <div class="panel-body login-card">
                        <div class="text-center">
                            <h3><i class="fa fa-server fa-4x"></i></h3>
                            <h2 class="text-center"><i class="fa fa-quote-left"></i>{{__('category.go_ahead')}} <i class="fa fa-quote-right "></i></h2>
                            <form method="post">
                                @csrf
                                <div class="form-group col-md-4 col-centered">
                                    <div class="form-group row ">
                                        <div class="col-md-10 col-centered">
                                            <input class="form-control input-background" type="text" name="title">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <div class=" col-centered">
                                            <input class="btn btn-success submit-buttons" type="submit" name="submit" value="{{ __('category.add_a_new_category') }}">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- /.container -->
@else
    
    @if (Request::is('*/edit'))
        <div class="col-xs-6">
            <form method="post" action="{{ route('categories.update', $category->id ) }}">
                    @method("PATCH")
                    @csrf
                    <div class="form-group col-md-8">
                        <label for="cat_title">{{ __('category.update_category') }}</label>
                        <input class="form-control input-background" type="=text" name="title" value="{{$category->title}}">
                    </div>
                    <div class="form-group col-md-7">
                        @error('title')
                            <span class="invalid-feedback red-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-7">
                        <input class="btn btn-success submit-buttons" type="submit" name="submit" value="{{ __('category.update') }}">
                    </div>
            </form>  
        </div>  
    @else
        <div class="col-xs-6">
            <form method="post">
                @csrf
                <div class="form-group col-md-8">
                    <label>{{ __('category.add_category') }}</label>
                    <input class="form-control input-background " type="text" name="title" value="{{ old('title') }}">
                </div>
                <div class="form-group col-md-7">
                    @error('title')
                        <span class="invalid-feedback red-error" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-7">
                    <input class="btn btn-success submit-buttons" type="submit" name="submit" value="{{ __('category.add') }}">
                </div>
            </form>
        </div>
    @endif
    <form method="post">
    @csrf
    <div class="col-xs-5">
        <div></div>
        <table class="table table-bordered table-hover tr-background">
            <div class="row">
                <div id="bulkOptionsContainer" class="col-xs-4">
                    <select class="form-control input-background" id="bulk_options" name="bulk_options">
                        <option value="">{{ __('category.select_options') }}</option>
                        <option value="Delete">{{ __('category.delete') }}</option>
                    </select>
                </div>
                <div class="col-xs-4">
                    <input type="button" name="submit" id="apply" class="btn btn-success submit-buttons" value="{{ __('category.apply') }}">
                </div>
                <thead>
                <th class="table-column-size-check-all"><input id="selectAllBoxes" type="button" class="uncheck btn-xs btn-success submit-buttons" value="{{__('category.check_all')}}"></th>
                    <th class="table-column-size-id hide-on-mobile">ID</th>
                    <th>{{ __('category.category_title') }}</th>
                    <th class="table-column-size-button-th">{{ __('category.edit') }}</th>
                    <th class="table-column-size-button-th">{{ __('category.delete') }}</th>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>
                            <label class="label-checkbox" for="{{$category->id}}">
                                <input class="checkBoxes" type="checkbox" id="{{$category->id}}" value='{{$category->id}}'>
                                <span class="cbx "><i class="glyphicon glyphicon-leaf icon-checkbox"></i></span>
                            </label>
                        </td>
                        <td class="table-column-size-id hide-on-mobile">{{$category->id}}</td>
                        <td class="table-column-size-categories">{{$category->title}}</td>
                </form>
                {{-- TODO --}}
                @if (Request::is('*/edit'))
                    <form action="{{ route('categories.index') }}">  
                        @csrf    
                        <td><input type="submit" class='btn-xs btn-success submit-buttons table-column-size-button-td' value='{{ __('category.create') }}'></td>                    
                    </form>
                @else
                    <form action="{{ route('categories.edit', $category->id ) }}">  
                        @csrf    
                        <td><input type="submit" class='btn-xs btn-success submit-buttons table-column-size-button-td' value='{{ __('category.edit') }}'></td>                    
                    </form>
                @endif
                <form action="{{ route('categories.destroy', $category->id ) }}" method="POST">
                    @csrf
                    @method('DELETE')
                        <td><input class='btn-xs btn-danger table-column-size-button-td' type='submit' value="{{ __('category.delete') }}"></td>
                </form>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
@endif
@endsection

@push('scripts')
<script>bulkOperations('category', "{{ csrf_token() }}");</script>
@endpush