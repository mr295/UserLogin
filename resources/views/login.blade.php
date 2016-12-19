<!DOCTYPE html>
<!-- This is html page to login user-->
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>

    <link href="/UserLogin/public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/UserLogin/public/css/datepicker3.css" rel="stylesheet">
    <link href="/UserLogin/public/css/styles.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="/UserLogin/public/js/html5shiv.js"></script>
    <script src="/UserLogin/public/js/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">Log In</div>
            <div class="panel-body">
                <form role="form" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {!! Session::get('success') !!}
                        </div>
                    @endif
                    @if(Session::has('error'))
                        <div class="alert alert-error">
                            {!! Session::get('error') !!}
                        </div>
                    @endif
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="Email" name="email" autofocus="">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Password" name="password" type="password" value="">
                        </div>

                        <button type="submit" class="btn btn-primary">Login</button>
                         <a href="/UserLogin/public/register"><button type="button" class="btn btn-primary">New User</button></a>
                    </fieldset>
                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->




</body>

</html>
