@extends('admin.adminlayout')
@section('content')

@if ($posts->count() === 0)
    <div class="container">
        <div class="row ">
            <div class="col-md-7 col-centered">
                <div class="panel panel-default">
                    <div class="panel-body login-card">
                        <div class="text-center">
                            <h3><i class="	fa fa-file-text fa-4x"></i></h3>
                            <h2 class="text-center"><i class="fa fa-quote-left"></i> Come on, add a new post <i class="fa fa-quote-right "></i></h2>
                            <div class="row">
                                <div class="col-md-3 col-centered">
                                    <a href="{{ route('posts.create') }}" class="btn btn-primary btn-block submit-buttons ">{{ __('Add a New Post') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- /.container -->
@else
    <table class="table table-bordered table-hover tr-background">
        <div class="row">
            <div id="bulkOptionsContainer" class="col-xs-4">
                <select class="form-control input-background" id="bulk_options" name="bulk_options">
                    <option value="">Select Options</option>
                    <option value="Published">Publish</option>
                    <option value="Draft">Draft</option>
                    <option value="Delete">Delete </option>
                    <option value="Clone">Clone</option>
                </select>
            </div>
            <div class="col-xs-4">
                <input type="button" name="submit" id="apply" class="btn btn-success submit-buttons" value="Apply">
                <a class="btn btn-primary" href="{{ route('posts.create') }}">Add New</a>
            </div>
            <thead>
                <tr>
                    <th class="table-column-size-check-all"><input id="selectAllBoxes" type="button" class="uncheck btn-xs btn-success submit-buttons" value="Check All"></th>
                    <th class="table-column-size-id">ID</th>
                    <th>User</th>
                    <th>title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Tags</th>
                    <th>Views</th>
                    <th>Date</th>
                    <th>View Post</th>
                    <th>Comments</th>
                    <th class="table-column-size-button-th">Edit</th>
                    <th class="table-column-size-button-th'">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td><input class="checkBoxes table-column-size-button-td" type="checkbox" value='{{$post->id}}'></td>
                    <td class="table-column-size-id">{{$post->id}}</td>
                    <td>{{$post->user}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->category->title}}</td>
                    <td>{{$post->status}}</td>
                    <td><image class="img-fluid" src="{{asset('images/' . $post->image)}}"></td>
                    <td>{{$post->tags}}</td>
                    <td>{{$post->views_count}}</td>
                    <td>{{$post->created_at}}</td>
                    <td class='links-color'><a href="{{ route('post.show', $post->id ) }}">View Post </a></td>
                    <td class='links-color'>{{$post->comments->count()}}</td>
                    <form action="{{ route('posts.edit', $post->id ) }}">  
                        @csrf    
                        <td><input type="submit" class='btn-xs btn-success submit-buttons table-column-size-button-td' value='Edit'></td>                    
                    </form>
                    <form action="{{ route('posts.destroy', $post->id ) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <td><input class='btn-xs btn-danger table-column-size-button-td' type='submit' value="Delete"></td>
                    </form>
                </tr> 
                @endforeach
            </tbody>
        </div>
    </table>
@endif
@endsection

@push('scripts')
<script>bulkOperations('post', "{{ csrf_token() }}");</script>
@endpush
