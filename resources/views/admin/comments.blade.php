@extends('admin.adminlayout')
@section('content')

@if ($comments->count() < 1)
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-centered">
                <div class="panel panel-default">
                    <div class="panel-body login-card">
                        <div class="text-center">
                            <h3><i class="fa fa-commenting-o fa-4x"></i></h3>
                            @if (Auth::user()->role === "Admin")
                                <h2 class="text-center"><i class="fa fa-quote-left"></i> {{__('comment.choose_a_post')}} <i class="fa fa-quote-right "></i></h2>
                                <div class="row">
                                    <div class="col-md-3 col-centered">
                                        <a href="{{ route('posts.index') }}" class="btn btn-primary btn-block submit-buttons ">{{ __('comment.go_to_posts') }}</a>
                                    </div>
                                </div>
                            @else
                                <h2 class="text-center"><i class="fa fa-quote-left"></i> {{__('comment.look_for_a_post')}} <i class="fa fa-quote-right "></i></h2>
                                <div class="row">
                                    <div class="col-md-3 col-centered">
                                        <a href="/" class="btn btn-primary btn-block submit-buttons ">{{ __('comment.go_to_home') }}</a>
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
                        <option value="">{{ __('comment.select_options') }}</option>
                        <option value="Approved">{{ __('comment.approved') }}</option>
                        <option value="Unapproved">{{ __('comment.unapproved') }}</option>
                        <option value="Delete">{{ __('comment.delete') }}</option>
                    </select>
                </div>
                <div class="col-xs-4">
                    <input type="submit" name="submit" id="apply" class="btn btn-success submit-buttons" value="{{ __('comment.apply') }}">
                </div>
                <thead>
                    <tr>
                        <th class="table-column-size-check-all"><input id="selectAllBoxes" type="button" class="uncheck btn-xs btn-success submit-buttons" value="{{ __('comment.check_all') }}"></th>
                        @if (Auth::user()->role === "Admin")
                            <th class="table-column-size-id hide-on-mobile">ID</th>
                        @endif
                        <th>{{ __('comment.author') }}</th>
                        <th class="hide-on-mobile">{{ __('comment.comment') }}</th>
                        <th>{{ __('comment.email') }}</th>
                        <th>{{ __('comment.status') }}</th>
                        <th>{{ __('comment.post') }}</th>
                        <th class="hide-on-mobile">{{ __('comment.date') }}</th>
                        <th class='table-column-size-th'>{{ __('comment.change_status_to') }}</th>
                        <th class="table-column-size-button-th">{{ __('comment.delete') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $comment)
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
                        <td class="hide-on-mobile">{{strip_tags(html_entity_decode(str_limit($comment->content, $limit = 30, $end = '...')))}}</td>
                        <td class="table-column-size-email">{{$comment->user->email}}</td>
                        <td>{{$comment->status}}</td>
                        <td class='links-color'><a href="{{ route('post.show', $comment->post->id ) }}">{{$comment->post->title}}</a></td>
                        <td class="hide-on-mobile">{{$comment->created_at}}</td>
                        <form action="{{ route('comments.update', $comment->id ) }}" method="POST">
                            @method('PATCH')
                            @csrf
                            @if (App::isLocale('es'))
                                <td><input type="submit" class='btn-xs btn-success submit-buttons table-column-size-change-role' name="status" value="{{$comment->status === "Aprovado" ? "Desaprovado" : "Aprovado"}}"></td>
                            @else
                                <td><input type="submit" class='btn-xs btn-success submit-buttons table-column-size-change-role' name="status" value="{{$comment->status === "Approved" ? "Unapproved" : "Approved"}}"></td>
                            @endif  
                        </form>


                     
                        <td>
                            <button type="button" class="btn-xs btn-danger table-column-size-button-td" data-toggle="modal" data-target="#delete_category_modal_{{ $comment->id }}">
                                {{ __('comment.delete') }}
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="delete_category_modal_{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabel">{{ __('comment.are_you_sure') }}</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span class="close-x" aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('comments.destroy', $comment->id ) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-body">
                                                <p class="text-center">{{ __('comment.you_are_going_to') }}</p>
                                                <p class="text-center">{{strip_tags(html_entity_decode(str_limit($comment->content, $limit = 30, $end = '...')))}}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button class='btn-xs btn-danger' type='submit'  value="">{{ __('comment.delete_comment') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>   
                    @endforeach
                </tbody>
            </div>
        </table>
    </div>
@endif      
@push('bulk_operator')
    <script>bulkOperations('comment', "{{ csrf_token() }}");</script>
@endpush   
@endsection


