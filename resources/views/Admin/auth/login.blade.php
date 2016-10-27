
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>
    @include('Admin.Template.cargacss')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Inicio de Sesion</h3>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['route'=>'Admin.auth.login','method'=>'POST']) !!}
                            <fieldset>
                                <div class="form-group">
                                    {!! Form::label('email','Correo Electronico') !!}
                                    {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'example@mail.com']) !!}                                    
                                </div>
                                <div class="form-group">
                                    {!! Form::label('email','Correo Electronico') !!}
                                    {!! Form::password('password',['class'=>'form-control','placeholder'=>'**********']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::submit('Iniciar Sesion',['class'=>'btn btn-lg btn-success btn-block']) !!}                                    
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('Admin.Template.cargajs')

</body>

</html>