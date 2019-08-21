@extends('admin.adminlayout')
@section('content')

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input value="" type="text" class="form-control input-background" name="post_title">
    </div>
    <div class="form-group">
        <label for="post_category_id">Categories</label>
        <select class="input-background" name="post_category_id" id="post_category_id">

        </select>
    </div>
    <div class="form-group">
        <label for="user_id">Users</label>
        <select name="post_user" id="" class="input-background">
        </select>
    </div>
    <div class="form-group">
        <select name="post_status" id="" class="input-background">
            <option value="">status</option>

        </select>
    </div>
    <div class="form-group">
        <label for="post_image_box">Post Image</label>
        <input type="file" class="form-control input-background" name="post_image_box">
        <span class="btn-danger"></span>
        <br>
        <input class="btn btn-info" type="submit" name="update_image" value="Update Image">
        <img width="100" src="../images/">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control input-background" name="post_tags" value="">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea type="text" class="form-control" id="body" cols="30" rows="10" name="post_content"></textarea>
    </div>
    <div class="form-group">
        <input class="btn btn-success submit-buttons" type="submit" name="update_post" value="Publish Post">
    </div>
</form>
    
@endsection