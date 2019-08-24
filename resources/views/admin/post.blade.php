@extends('admin.adminlayout')
@section('content')

<form action="" method="post">
    <table class="table table-bordered table-hover tr-background">
        <div class="row">
            <div id="bulkOptionsContainer" class="col-xs-4">
                <select class="form-control input-background" id="" name="bulk_options">
                    <option value="">Select Options</option>
                    <option value="Published">Publish</option>
                    <option value="Draft">Draft</option>
                    <option value="Delete">Delete </option>
                    <option value="Clone">Clone</option>
                </select>
            </div>
            <div class="col-xs-4">
                <input type="submit" name="submit" class="btn btn-success submit-buttons" value="Apply">
                <a class="btn btn-primary" href="posts.php?source=add_posts">Add New</a>
            </div>
            <thead>
                <tr>
                    <th><input id="selectAllBoxes" type="checkbox"></th>
                    <th>Id</th>
                    <th>User</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Tags</th>
                    <th>Views</th>
                    <th>Date</th>
                    <th>View Post</th>
                    <th>Comments</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td><input class="checkBoxes" type="checkbox" name='checkBoxArray[]' value=''></td>
                    <td>{{$post->id}}</td>
                    <td>{{$post->user}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->category->title}}</td>
                    <td>{{$post->status}}</td>
                    <td><image class="img-responsive" src="{{asset('images/' . $post->image)}}"></td>
                    <td>{{$post->tags}}</td>
                    <td>{{$post->views_count}}</td>
                    <td>{{$post->created_at}}</td>
                    <td class='links-color'><a href="{{ route('post.show', $post->id ) }}">View Post </a></td>
                    <td class='links-color'><a href='post_comments.php?id=$post_id'>{{$post->comments_count}}</a></td>
                    </form>
                    <td><a href="{{ route('posts.edit', $post->id ) }}" class='btn-xs btn-success submit-buttons edit_link' name='edit'>Edit</a></td>
                    <form action="{{ route('posts.destroy', $post->id ) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <td><input class='btn-xs btn-danger del_link' type='submit' value="Delete"></td>
                    </form>
                </tr> 
                @endforeach
            </tbody>
        </div>
    </table>
@endsection