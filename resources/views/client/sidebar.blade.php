<div class="col-md-4 sidebar-margin-left">
    <!-- Blog Search Well -->
    <div class="well">
        <h4>Tags Search</h4>
        <form action="/" method="post">
            @csrf
            <div class="input-group">
                <input name="search" type="text" class="form-control input-background" placeholder="Search">
                <span class="input-group-btn">
                    <button name="submit" class="btn btn-default search-button" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>
    <!-- Login -->
    <div class="well">
            <h4>Login</h4>
            <form method="post">
                @csrf
                <div class="form-group">
                    <input name="username" type="text" class="form-control input-background" placeholder="Enter Username">
                </div>
                <div class="input-group">
                    <input name="password" type="password" class="form-control input-background" placeholder="Enter Password">
                    <span class="input-group-btn">
                        <button class="btn btn-primary login-button" name="login" type="submit"> Submit </button>
                    </span>
                </div>
                <div class="form-group forgot-link">
                    <a href="/forgot?forgot=<?php echo uniqid(true) ?>">Forgot Password</a>
                </div>
            </form>
            <!-- /.input-group -->
    </div>
    @include('client/widget')
</div>
