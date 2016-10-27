@extends('Admin.Template.main')

@section('titulo','Listado de Etiquetas')

@section('content')
	<br>
    <div class="row">
	    <div class="panel panel-default">
	                        <div class="panel-heading">
	                        	<h1 class="page-header">Listado de Etiquetas</h1>

	                        	<a href="{{route('Admin.Etiquetas.create')}}" class="btn btn-primary">
			                        <span class="glyphicon glyphicon-plus"></span> Nuevo
			                    </a>

				                     <!-- Buscador de etiquetas -->
		                        {!! Form::open(['route'=>'Admin.Etiquetas.index','method'=>'GET','class'=>'navbar-form pull-right']) !!}
			                        <div class="input-group">
			                        	{!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Buscar Etiquetas..','aria-describedby'=>'seach']) !!}
			                        	<span class="input-group-addon" id="seach"><i class="glyphicon glyphicon-search"></i> </span>			                        	
			                       	</div>
			                    {!! Form::close() !!}
		                        <!-- /.Buscador de etiquetas -->
		                    </div>
	                       
	                        <!-- /.panel-heading -->
	                        <div class="panel-body">
	                            <div class="table-responsive">
	                                <table class="table">
	                                    <thead>
	                                        <tr>
	                                            <th>Id</th>
	                                            <th>Nombre</th>
	                                            <th>Accion</th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
	                                    @foreach($etiquetas as $etiqueta)
		                                    	<tr>
		                                    		<td>{{ $etiqueta->id }}</td>
			                                        <td>{{ $etiqueta->nombre }}</td>
			                                        <td>
			                                        	<a href="{{route('Admin.Etiquetas.destroy',$etiqueta->id)}}" onclick="return confirm('¿Seguro desea eliminarlo?')" class="btn btn-danger">
			                                        		<span class="glyphicon glyphicon-trash"></span>
			                                        	</a>
			                                        	<a href="{{route('Admin.Etiquetas.edit',$etiqueta->id)}}" onclick="return confirm('¿Seguro desea editarlo?')" class="btn btn-warning">
			                                        		<span class="glyphicon glyphicon-wrench"></span>
			                                        	</a>
			                                        </td>
			                                    
			                                        
		                                    	</tr>
		                                    @endforeach
		                                    
	                                    </tbody>
	                                </table>
	                                {!!$etiquetas->render() !!}
	                            </div>
	                            <!-- /.table-responsive -->
	                        </div>
	                        <!-- /.panel-body -->
	                    </div>	
    </div>


	
 @endsection