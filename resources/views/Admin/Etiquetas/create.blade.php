@extends('Admin.Template.main')

@section('titulo','Registro de Etiquetas')

@section('content')

	{!! Form::open(['route'=>'Admin.Etiquetas.store','method'=>'POST']) !!}
		<div class="col-lg-12">
            <h1 class="page-header">Registro de Etiquetas</h1>
        </div>
        <div class="row col-lg-6">
        	<div class="form-group">
				
					{!! Form::label('nombre','Nombre') !!}
					{!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre de la Etiqueta','required']) !!}
			</div>
			<div class="form-group">
				{!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
				<a href="{{route('Admin.Etiquetas.index')}}" class="btn btn-danger">Cancelar</a>
			</div>
		</div>
		
		
		
	{!! Form::close() !!}
@endsection