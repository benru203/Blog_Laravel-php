@extends('Admin.Template.main')

@section('titulo','Editar Etiqueta' . $etiqueta->name)

@section('content')

	{!! Form::open(['route'=>['Admin.Etiquetas.update',$etiqueta],'method'=>'PUT']) !!}
		<div class="col-lg-12">
            <h1 class="page-header">Editar Etiqueta {{$etiqueta->nombre}}</h1>
        </div>
        <div class="row col-lg-6">
        	<div class="form-group">
				
					{!! Form::label('nombre','Nombre') !!}
					{!! Form::text('nombre',$etiqueta->nombre,['class'=>'form-control','required']) !!}
			</div>
			<div class="form-group">
				{!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
				<a href="{{route('Admin.Etiquetas.index')}}" class="btn btn-danger">Cancelar</a>
			</div>
		</div>
		
		
		
	{!! Form::close() !!}
@endsection