@extends('Admin.Template.main')

@section('titulo','Listado de Articulos')

@section('content')
<br>
    <div class="row">
	    <div class="panel panel-default">
	                        <div class="panel-heading">
	                        	<h1 class="page-header">Listado de Articulos</h1>
	                        	<a href="{{route('Admin.Articulos.create')}}" class="btn btn-primary">
			                        <span class="glyphicon glyphicon-plus"></span> Nuevo
			                    </a>
			                    <!-- Buscador de etiquetas -->
		                        {!! Form::open(['route'=>'Admin.Articulos.index','method'=>'GET','class'=>'navbar-form pull-right']) !!}
			                        <div class="input-group">
			                        	{!! Form::text('titulo',null,['class'=>'form-control','placeholder'=>'Buscar Articulos..','aria-describedby'=>'seach']) !!}
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
	                                            <th>Titulo</th>
	                                            <th>categoria</th>
	                                            <th>Usuario</th>
	                                            <th>Accion</th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
	                                    @foreach($articulos as $articulo)
		                                    	<tr>
		                                    		<td>{{ $articulo->id }}</td>
			                                        <td>{{ $articulo->titulo }}</td>
			                                        <td>{{ $articulo->categoria->name }}</td>
			                                        <td>{{ $articulo->user->name }}</td>
			                                        <td>
			                                        	<a href="{{route('Admin.Articulos.destroy',$articulo->id)}}" onclick="return confirm('¿Seguro desea eliminarlo?')" class="btn btn-danger">
			                                        		<span class="glyphicon glyphicon-trash"></span>
			                                        	</a>
			                                        	<a href="{{route('Admin.Articulos.edit',$articulo->id)}}" onclick="return confirm('¿Seguro desea editarlo?')" class="btn btn-warning">
			                                        		<span class="glyphicon glyphicon-wrench"></span>
			                                        	</a>
			                                        </td>
			                                    
			                                        
		                                    	</tr>
		                                    @endforeach
		                                    
	                                    </tbody>
	                                </table>
	                                {!!$articulos->render()!!}
	                            </div>
	                            <!-- /.table-responsive -->
	                        </div>
	                        <!-- /.panel-body -->
	                    </div>	
    </div>
@endsection