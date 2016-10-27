@extends('Admin.Template.main')

@section('titulo','Editar Articulo ' . $articulo->titulo)

@section('content')
	
	{!! Form::open(['route'=>['Admin.Articulos.update',$articulo],'method'=>'PUT']) !!}
		<div class="col-lg-12">
            <h1 class="page-header">Editar Articulo {{$articulo->titulo}}</h1>
        </div>
	    <div class="row col-lg-10">
        	<div class="form-group">
				{!! Form::label('titulo','Titulo') !!}
				{!! Form::text('titulo',$articulo->titulo,['class'=>'form-control','placeholder'=>'Titulo del Articulo','required']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('categoria_id','Categoria') !!}
				{!! Form::select('categoria_id',$categorias,$articulo->categoria->id,['class'=>'form-control select-categoria','required']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('contenido','Contenido') !!}
				{!! Form::textarea('contenido',$articulo->contenido,['class'=>'form-control textarea-content']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('etiquetas','Etiquetas') !!}
				{!! Form::select('etiquetas[]',$etiquetas,$mis_etiquetas,['class'=>'form-control select-tag','multiple','required']) !!}
			</div>
			
			<div class="form-group">
				{!! Form::submit('Editar Articulo',['class'=>'btn btn-primary']) !!}
				<a href="{{route('Admin.Articulos.index')}}" class="btn btn-danger">Cancelar</a>
			</div>
		</div>
		
		
		

	{!! Form::close() !!}

@endsection

@section('js')
	<script>
		$('.select-tag').chosen({
			placeholder_text_multiple:'Seleccione maximmo 3 etiquetas',
			max_selected_options: 3,
			search_contains: true,
			no_results_text: 'No se encontraron estas etiquetas'
		});
		$('.select-categoria').chosen({
			placeholder_text_single: 'Seleccione una categoria',
			search_contains: true,
			no_results_text:'No se encontro esta categoria'
		});
		$('.textarea-content').trumbowyg();
	</script>
@endsection