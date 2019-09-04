@extends('admin.adminlayout')
@section('content')

@if ($comments->count() === 0)
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-centered">
                <div class="panel panel-default">
                    <div class="panel-body login-card">
                        <div class="text-center">
                            <h3><i class="fa fa-commenting-o fa-4x"></i></h3>
                            <h2 class="text-center"><i class="fa fa-quote-left"></i> Come on, choose a post and start making nice comments <i class="fa fa-quote-right "></i></h2>
                            <div class="row">
                                <div class="col-md-3 col-centered">
                                    <a href="{{ route('posts.index') }}" class="btn btn-primary btn-block submit-buttons ">{{ __('Go To Posts') }}</a>
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
                    <option value="Approved">Approved</option>
                    <option value="Unapproved">Unapproved</option>
                    <option value="Delete">Delete </option>
                </select>
            </div>
            <div class="col-xs-4">
                <input type="submit" name="submit" id="apply" class="btn btn-success submit-buttons" value="Apply">
            </div>
            <thead>
                <tr>
                    <th class="table-column-size-check-all"><input id="selectAllBoxes" type="button" class="uncheck btn-xs btn-success submit-buttons" value="Check All"></th>
                    <th class="table-column-size-id">ID</th>
                    <th>Author</th>
                    <th>Comment</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>In Response to</th>
                    <th>Date</th>
                    <th class='table-column-size-th'>Change Status to</th>
                    <th class="table-column-size-button-th">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                <tr>
                    <td><input class="checkBoxes table-column-size-button-td" type="checkbox" value='{{$comment->id}}'></td>
                    <td class="table-column-size-id">{{$comment->id}}</td>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->content}}</td>
                    <td class="table-column-size-email">{{$comment->email}}</td>
                    <td>{{$comment->status}}</td>
                    <td class='links-color'><a href="{{ route('post.show', $comment->post->id ) }}">{{$comment->post->title}}</a></td>
                    <td>{{$comment->created_at}}</td>
                    <form action="{{ route('comments.update', $comment->id ) }}" method="POST">
                        @method('PATCH')
                        @csrf
                            <td><input type="submit" class='btn-xs btn-success submit-buttons table-column-size-change-role' name="status" value="{{$comment->status === "Approved" ? "Unapproved" : "Approved"}}"></td>
                    </form>
                    <form action="{{ route('comments.destroy', $comment->id ) }}" method="POST">
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
<script>bulkOperations('comment', "{{ csrf_token() }}");</script>
@endpush
