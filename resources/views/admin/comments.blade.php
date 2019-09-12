@extends('admin.adminlayout')
@section('content')

@if ($comments->count() === 0 || $subscribers_comments->count() === 0)
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-centered">
                <div class="panel panel-default">
                    <div class="panel-body login-card">
                        <div class="text-center">
                            <h3><i class="fa fa-commenting-o fa-4x"></i></h3>
                            @if (Auth::user()->role === "Admin")
                                <h2 class="text-center"><i class="fa fa-quote-left"></i> Come on, choose a post and start making nice comments <i class="fa fa-quote-right "></i></h2>
                                <div class="row">
                                    <div class="col-md-3 col-centered">
                                        <a href="{{ route('posts.index') }}" class="btn btn-primary btn-block submit-buttons ">{{ __('Go To Posts') }}</a>
                                    </div>
                                </div>
                            @else
                                <h2 class="text-center"><i class="fa fa-quote-left"></i> Come on, look for a post and start making nice comments <i class="fa fa-quote-right "></i></h2>
                                <div class="row">
                                    <div class="col-md-3 col-centered">
                                        <a href="/" class="btn btn-primary btn-block submit-buttons ">{{ __('Go To Home') }}</a>
                                    </div>
                                </div> 
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- /.container -->
@else
    <div class="table-responsive">
        <table class="table table-bordered table-hover tr-background table-responsive">
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
                        @if (Auth::user()->role === "Admin")
                            <th class="table-column-size-id hide-on-mobile">ID</th>
                        @endif
                        <th>Author</th>
                        <th class="hide-on-mobile">Comment</th>
                        <th >Email</th>
                        <th>Status</th>
                        <th>Post</th>
                        <th class="hide-on-mobile">Date</th>
                        <th class='table-column-size-th'>Change Status to</th>
                        <th class="table-column-size-button-th">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (Auth::user()->role === "Admin" ? $comments : $subscribers_comments as $comment)
                    <tr>
                        <td>
                            <label class="label-checkbox" for="{{$comment->id}}">
                                <input class="checkBoxes hidden" type="checkbox" id="{{$comment->id}}" value='{{$comment->id}}'>
                                <span class="cbx "><i class="glyphicon glyphicon-leaf icon-checkbox"></i></span>
                            </label>
                        </td>
                        @if (Auth::user()->role === "Admin")
                            <td class="table-column-size-id hide-on-mobile">{{$comment->id}}</td>
                        @endif
                        <td>{{$comment->user->username}}</td>
                        <td class="hide-on-mobile">{{$comment->content}}</td>
                        <td class="table-column-size-email">{{$comment->user->email}}</td>
                        <td>{{$comment->status}}</td>
                        <td class='links-color'><a href="{{ route('post.show', $comment->post->id ) }}">{{$comment->post->title}}</a></td>
                        <td class="hide-on-mobile">{{$comment->created_at}}</td>
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
    </div>
@endif
        
@endsection

@push('scripts')
<script>bulkOperations('comment', "{{ csrf_token() }}");</script>
@endpush
