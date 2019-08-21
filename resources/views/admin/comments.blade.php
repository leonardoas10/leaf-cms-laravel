@extends('admin.adminlayout')
@section('content')
<form action="" method="post">
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
                        <th>Approved</th>
                        <th>Unapproved</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input class="checkBoxes" type="checkbox" name='checkBoxArray[]' value=''></td>
                        <td>$comment_id</td>
                        <td>$comment_author</td>
                        <td>$comment_content</td>
                        <td>$comment_email</td>
                        <td>$comment_status</td>
                        <td class='links-color'><a href='../post.php?p_id=$post_id'>$post_title</a></td>
                        <td>$comment_date</td>
                        <td class='links-color'><a href='comments.php?approve=$comment_id'>Approve</a></td>
                        <td class='links-color'><a href='comments.php?unapprove=$comment_id'>Unapprove</a></td>

                        <form method="post">
                        <td><input rel='$comment_id' class='btn-xs btn-danger del_link' type='submit' name='delete'value='Delete'></td>
                        </form>
                    </tr>
                </tbody>
            </table>
    </table>
</form>
@endsection
