@extends('admin.adminlayout')
@section('content')

    <table class="table table-bordered table-hover">
        <div class="row">
            <div id="bulkOptionsContainer" class="col-xs-4">
                <select class="form-control input-background" id="" name="bulk_options">
                    <option value="">Select Options</option>
                    <option value="Approved">Approved</option>
                    <option value="Unapproved">Unapproved</option>
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
                        <th>Author</th>
                        <th>Comment</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>In Response to</th>
                        <th>Date</th>
                        <th>Change Status to</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($comments as $comment)
                    <tr>
                        <td><input class="checkBoxes" type="checkbox" name='checkBoxArray[]' value=''></td>
                    <td>{{$comment->id}}</td>
                        <td>{{$comment->author}}</td>
                        <td>{{$comment->content}}</td>
                        <td>{{$comment->email}}</td>
                        <td>{{$comment->status}}</td>
                        <td class='links-color'><a href="{{ route('post.show', $comment->post->id ) }}">{{$comment->post->title}}</a></td>
                        <td>{{$comment->created_at}}</td>

                        <form action="{{ route('comments.update', $comment->id ) }}" method="POST">
                            @method('PATCH')
                            @csrf
                                <td><input type="submit" class='btn-xs btn-success submit-buttons edit_link' name="status" value="{{$comment->status === "Approved" ? "Unapproved" : "Approved"}}"></td>
                        </form>

                        <form action="{{ route('comments.destroy', $comment->id ) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <td><input class='btn-xs btn-danger del_link' type='submit' value="Delete"></td>
                        </form>
                    </tr>   
                    @endforeach
                </tbody>
            </table>
    </table>

@endsection
