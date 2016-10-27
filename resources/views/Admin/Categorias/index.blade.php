@extends('Admin.Template.main')

@section('titulo','Listado de Categorias')

@section('content')
	<br>
    <div class="row">
	    <div class="panel panel-default">
	                        <div class="panel-heading">
	                        	<h1 class="page-header">Listado de Categorias</h1>
	                        	<a href="{{route('Admin.Categorias.create')}}" class="btn btn-primary">
			                        <span class="glyphicon glyphicon-plus"></span> Nuevo
			                    </a>
	                        	                            
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
	                                    @foreach($categorias as $categoria)
		                                    	<tr>
		                                    		<td>{{ $categoria->id }}</td>
			                                        <td>{{ $categoria->name }}</td>
			                                        <td>
			                                        	<a href="{{route('Admin.Categorias.destroy',$categoria->id)}}" onclick="return confirm('¿Seguro desea eliminarlo?')" class="btn btn-danger">
			                                        		<span class="glyphicon glyphicon-trash"></span>
			                                        	</a>
			                                        	<a href="{{route('Admin.Categorias.edit',$categoria->id)}}" onclick="return confirm('¿Seguro desea editarlo?')" class="btn btn-warning">
			                                        		<span class="glyphicon glyphicon-wrench"></span>
			                                        	</a>
			                                        </td>
			                                    
			                                        
		                                    	</tr>
		                                    @endforeach
		                                    
	                                    </tbody>
	                                </table>
	                                {!!$categorias->render()!!}
	                            </div>
	                            <!-- /.table-responsive -->
	                        </div>
	                        <!-- /.panel-body -->
	                    </div>	
    </div>


	
 @endsection