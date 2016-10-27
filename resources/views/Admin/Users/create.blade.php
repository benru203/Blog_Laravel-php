@extends('Admin.Template.main')

@section('titulo','Registro de Usuario')

@section('content')

	{!! Form::open(['route'=>'Admin.Users.store','method'=>'POST']) !!}
		<div class="col-lg-12">
            <h1 class="page-header">Registro de Usuario</h1>
        </div>
        <div class="row col-lg-6">
        	<div class="form-group">
				
					{!! Form::label('name','Nombre') !!}
					{!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre Completo','required']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('email','Correo Electronico') !!}
				{!! Form::email('email',null,['class'=>'form-control','placeholder'=>'example@gmail.com','required']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('password','Contraseña') !!}
				{!! Form::password('password',['class'=>'form-control','placeholder'=>'**********','required']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('type','Tipo') !!}
				{!! Form::select('type',['member'=>'Miembro','admin'=>'Administrador'],null,['class'=>'form-control', 'placeholder'=>'Seleccione una opcion...','required'])!!}
			</div>
			<div class="form-group">
				{!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
				<a href="{{route('Admin.Users.index')}}" class="btn btn-danger">Cancelar</a>
			</div>
		</div>
		
		
		
	{!! Form::close() !!}
@endsection