<!DOCTYPE html>
<!-- This is html page for editing User profile-->
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User</title>

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
            <div class="panel-heading">User Update Form</div>
            <div class="panel-body">
                <form role="form" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    @if(Session::has('success'))
                        <div class="alert alert-error">
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
                                <label class="col-md-4 control-label" for="name">Full Name</label>
                                <div class="col-md-8">
                                    <input id="name" value="{{$user->name}}" name="name" placeholder="Full Name" type="text" class="form-control"autofocus="">
                                </div>
                            </div></br></br>
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">Email</label>
                            <div class="col-md-8">
                                <input class="form-control" value="{{$user->email}}" type="email" placeholder="Email" name="email" autofocus="">
                            </div>
                        </div></br></br>
                        <div class="form-group">
                                <label class="col-md-4 control-label">User Image</label>
                                <div class="col-md-8">
                                    <input type="file" name="picture"><br><img src="/uploads/{{$user->image}}" style="height: 60px">
                                </div>
                            </div></br></br></br></br>
                        
                        

                        <div class="form-group">
                                <div class="col-md-9 widget-right">
                                    <button type="submit" class="btn btn-primary btn-md pull-right">Update</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-9">
                                    <a href="/UserLogin/public/changepassword"><button type="button" class="btn btn-primary btn-md pull-right">Change Password</button></a>
                               </div>
                        </div>

                    </fieldset>
                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->




</body>

</html>
