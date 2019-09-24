@extends('admin.adminlayout')
@section('content')

@if (Auth::user()->role === "Admin" ? $posts->count() < 1 : $subscribers_posts->count() < 1)
    <div class="container">
        <div class="row ">
            <div class="col-md-7 col-centered">
                <div class="panel panel-default">
                    <div class="panel-body login-card">
                        <div class="text-center">
                            <h3><i class="	fa fa-file-text fa-4x"></i></h3>
                            <h2 class="text-center"><i class="fa fa-quote-left"></i> {{__('post.come_on')}} <i class="fa fa-quote-right "></i></h2>
                            <div class="row">
                                <div class="col-md-3 col-centered">
                                    <a href="{{ route('posts.create') }}" class="btn btn-primary btn-block submit-buttons ">{{__('post.new_post')}} </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- /.container -->
@else
<div class="table-responsive">
    <table class="table table-bordered table-hover tr-background">
        <div class="row">
            <div id="bulkOptionsContainer" class="col-xs-4">
                <select class="form-control input-background" id="bulk_options" name="bulk_options">
                    <option value="">{{__('post.select_options')}} </option>
                    <option value="Published">{{__('post.publish')}} </option>
                    <option value="Draft">{{__('post.draft')}} </option>
                    <option value="Delete">{{__('post.delete')}} </option>
                </select>
            </div>
            <div class="col-xs-4 flex-row">
                <input type="button" name="submit" id="apply" class="btn btn-success submit-buttons" value="{{__('post.apply')}} ">
                <a class="btn btn-primary" href="{{ route('posts.create') }}">{{__('post.add_new')}} </a>
            </div>
            <thead>
                <tr>
                    <th class="table-column-size-check-all"><input id="selectAllBoxes" type="button" class="uncheck btn-xs btn-success submit-buttons" value="{{__('post.check_all')}} "></th>
                    @if (Auth::user()->role === "Admin")
                        <th class="table-column-size-id">ID</th>
                    @endif
                    <th>{{__('post.user')}} </th>
                    <th>{{__('post.title')}} </th>
                    <th>{{__('post.category')}} </th>
                    <th>{{__('post.status')}} </th>
                    <th>{{__('post.image')}} </th>
                    <th>{{__('post.tags')}} </th>
                    <th>{{__('post.views_name')}} </th>
                    <th>{{__('post.date')}} </th>
                    <th>{{__('post.view_post')}} </th>
                    <th>{{__('post.comments')}} </th>
                    <th class="table-column-size-button-th">{{__('post.edit')}} </th>
                    <th class="table-column-size-button-th'">{{__('post.delete')}} </th>
                </tr>
            </thead>
            <tbody>
                @foreach (Auth::user()->role === "Admin" ? $posts : $subscribers_posts as $post)
                    <tr>
                        <td>
                            <label class="label-checkbox" for="{{$post->id}}">
                                <input class="checkBoxes" type="checkbox" id="{{$post->id}}" value='{{$post->id}}'>
                                <span class="cbx "><i class="glyphicon glyphicon-leaf icon-checkbox"></i></span>
                            </label>
                        </td>
                        @if (Auth::user()->role === "Admin")
                            <td class="table-column-size-id">{{$post->id}}</td>
                        @endif
                        <td>{{$post->user}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->category->title}}</td>
                        <td>{{$post->status}}</td>
                        <td><image class="img-fluid" src="{{asset('images/' . $post->image)}}"></td>
                        <td>{{$post->tags}}</td>
                        <td>{{trans_choice('post.views', $post->views_count)}}</td>
                        <td>{{$post->created_at}}</td>
                        <td class='links-color'><a href="{{ route('post.show', $post->id ) }}">{{__('post.view_post')}} </a></td>
                        <td class='links-color'>{{trans_choice('post.comments_count', $post->comments->count())}}</td>
                        <form action="{{ route('posts.edit', $post->id ) }}">  
                            @csrf    
                            <td><input type="submit" class='btn-xs btn-success submit-buttons table-column-size-button-td' value="{{__('post.edit')}} "></td>                    
                        </form>
                        <td>
                            <button type="button" class="btn-xs btn-danger table-column-size-button-td" data-toggle="modal" data-target="#delete_modal_{{ $post->id }}">
                                {{ __('post.delete') }}
                            </button>
    
                            <!-- Modal -->
                            <div class="modal fade" id="delete_modal_{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabel">{{ __('post.are_you_sure') }}</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span class="close-x" aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
    
                                        <form action="{{ route('posts.destroy', $post->id ) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-body">
                                                
                                                <p class="text-center">{{ __('post.you_are_going_to') }}</p>
                                                <p class="text-center">{{$post->title}}</p>
                                                    
                                            </div>
                                            <div class="modal-footer">
                                                <button class='btn-xs btn-danger' type='submit'  value="">{{ __('post.delete_post') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                    
                            </div>
                            <!-- End Modal --> 
                        </td>
                    </tr> 
                @endforeach
            </tbody>
        </div>
    </table>
</div>
@endif
@endsection

@push('scripts')
<script>bulkOperations('post', "{{ csrf_token() }}");</script>
@endpush
