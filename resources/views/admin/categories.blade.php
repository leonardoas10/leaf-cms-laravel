@extends('admin.adminlayout')
@section('content')

<div class="col-xs-6">
    <form method="post">
        <div class="form-group">
            <label for="cat_title"> Add Category </label>
            <input class="form-control input-background" type="=text" name="cat_title">
        </div>
        <div class="form-group ">
            <input class="btn btn-success submit-buttons" type="submit" name="submit" value="Add Category">
        </div>
    </form>
</div>
<form method="post">
<div class="col-xs-6">
    <table class="table table-bordered table-hover tr-background">
        <div class="row">
            <div id="bulkOptionsContainer" class="col-xs-4">
                <select class="form-control input-background" id="" name="bulk_options">
                    <option value="">Select Options</option>
                    <option value="Clone">Clone</option>
                    <option value="Delete">Delete </option>
                </select>
            </div>
            <div class="col-xs-4">
                <input type="submit" class="btn btn-success submit-buttons" value="Apply">
            </div>
            <thead>
                <th><input id="selectAllBoxes" type="checkbox"></th>
                <th>ID</th>
                <th>Category Title</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            <tbody>
                <tr>
                <td><input class="checkBoxes" type="checkbox" name='checkBoxArray[]' value=''></td>
                <td>{id}</td>
                <td>{title}</td>

</form>
<form method="post" id="actions">

                <input type='hidden' class='_id' name='edit' value=''>
                <td><input rel='' class='btn-xs btn-success submit-buttons edit_link' type='submit' value='Edit'></td>
                <td><input rel='' class='btn-xs btn-danger del_link' type='submit' name='delete' value='Delete'></td>
</form>
                </tr>
            </tbody>
    </table>
</div>
@endsection
