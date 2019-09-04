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
                            <h2 class="text-center"><i class="fa fa-quote-left"></i> Go ahead, create the first category below <i class="fa fa-quote-right "></i></h2>
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
                                            <input class="btn btn-success submit-buttons" type="submit" name="submit" value="{{ __('Add a New Category') }}">
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
                        <label for="cat_title"> Update Category </label>
                    <input class="form-control input-background" type="=text" name="title" value="{{$category->title}}">
                    </div>
                    <div class="form-group col-md-7">
                        <input class="btn btn-success submit-buttons" type="submit" name="submit" value="Update Category">
                    </div>
            </form>  
        </div>  
    @else
        <div class="col-xs-6">
            <form method="post">
                @csrf
                <div class="form-group col-md-8">
                    <label> Add Category </label>
                    <input class="form-control input-background " type="=text" name="title">
                </div>
                <div class="form-group col-md-7">
                    <input class="btn btn-success submit-buttons" type="submit" name="submit" value="Add Category">
                </div>
            </form>
        </div>
    @endif
    <form method="post">
    @csrf
    <div class="col-xs-5">
        <table class="table table-bordered table-hover tr-background">
            <div class="row">
                <div id="bulkOptionsContainer" class="col-xs-4">
                    <select class="form-control input-background" id="bulk_options" name="bulk_options">
                        <option value="">Select Options</option>
                        <option value="Clone">Clone</option>
                        <option value="Delete">Delete </option>
                    </select>
                </div>
                <div class="col-xs-4">
                    <input type="button" name="submit" id="apply" class="btn btn-success submit-buttons" value="Apply">
                </div>
                <thead>
                    <th class="table-column-size-check-all"><input id="selectAllBoxes" type="button" class="uncheck btn-xs btn-success submit-buttons" value="Check All"></th>
                    <th class="table-column-size-id">ID</th>
                    <th>Category Title</th>
                    <th class="table-column-size-button-th">Edit</th>
                    <th class="table-column-size-button-th">Delete</th>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                    <td><input class="checkBoxes table-column-size-button-td" type="checkbox" value='{{$category->id}}' ></td>
                    <td class="table-column-size-id">{{$category->id}}</td>
                    <td class="table-column-size-categories">{{$category->title}}</td>
                </form>
                {{-- TODO --}}
                @if (Request::is('*/edit'))
                    <form action="{{ route('categories.index') }}">  
                        @csrf    
                        <td><input type="submit" class='btn-xs btn-success submit-buttons table-column-size-button-td' value='Create'></td>                    
                    </form>
                @else
                    <form action="{{ route('categories.edit', $category->id ) }}">  
                        @csrf    
                        <td><input type="submit" class='btn-xs btn-success submit-buttons table-column-size-button-td' value='Edit'></td>                    
                    </form>
                @endif
                <form action="{{ route('categories.destroy', $category->id ) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <td><input class='btn-xs btn-danger table-column-size-button-td' type='submit' value="Delete"></td>
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