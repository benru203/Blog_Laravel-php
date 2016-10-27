@extends('Admin.Template.main')

@section('titulo','Editar Usuario'.$user->name)

@section('content')

	{!! Form::open(['route'=>['Admin.Users.update',$user],'method'=>'PUT']) !!}
		<div class="col-lg-12">
            <h1 class="page-header">Editar Usuario {{ $user->name}}</h1>
        </div>
        <div class="row col-lg-6">
        	<div class="form-group">
				
					{!! Form::label('name','Nombre') !!}
					{!! Form::text('name',$user->name,['class'=>'form-control','required']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('email','Correo Electronico') !!}
				{!! Form::email('email',$user->email,['class'=>'form-control','required']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('type','Tipo') !!}
				{!! Form::select('type',['member'=>'Miembro','admin'=>'Administrador'],$user->type,['class'=>'form-control'])!!}
			</div>
			<div class="form-group">
				{!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
				<a href="{{route('Admin.Users.index')}}" class="btn btn-danger">Cancelar</a>
			</div>
		</div>
		
		
		
	{!! Form::close() !!}
@endsection