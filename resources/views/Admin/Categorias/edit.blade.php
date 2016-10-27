@extends('Admin.Template.main')

@section('titulo','Editar Categoria' . $categoria->name)

@section('content')

	{!! Form::open(['route'=>['Admin.Categorias.update',$categoria],'method'=>'PUT']) !!}
		<div class="col-lg-12">
            <h1 class="page-header">Editar Categoria {{$categoria->name}}</h1>
        </div>
        <div class="row col-lg-6">
        	<div class="form-group">
				
					{!! Form::label('name','Nombre') !!}
					{!! Form::text('name',$categoria->name,['class'=>'form-control','required']) !!}
			</div>
			<div class="form-group">
				{!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
				<a href="{{route('Admin.Categorias.index')}}" class="btn btn-danger">Cancelar</a>
			</div>
		</div>
		
		
		
	{!! Form::close() !!}
@endsection