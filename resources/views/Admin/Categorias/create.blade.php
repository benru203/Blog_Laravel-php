@extends('Admin.Template.main')

@section('titulo','Registro de Categorias')

@section('content')

	{!! Form::open(['route'=>'Admin.Categorias.store','method'=>'POST']) !!}
		<div class="col-lg-12">
            <h1 class="page-header">Registro de Categoria</h1>
        </div>
        <div class="row col-lg-6">
        	<div class="form-group">
				
					{!! Form::label('name','Nombre') !!}
					{!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre de la Categoria','required']) !!}
			</div>
			<div class="form-group">
				{!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
				<a href="{{route('Admin.Categorias.index')}}" class="btn btn-danger">Cancelar</a>
			</div>
		</div>
		
		
		
	{!! Form::close() !!}
@endsection