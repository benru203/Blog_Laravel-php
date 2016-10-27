@extends('Admin.Template.main')

@section('titulo','Listado de Usuarios')
	
@section('content')
	<br>
    <div class="row">
	    <div class="panel panel-default">
	                        <div class="panel-heading">
	                        	<h1 class="page-header">Listado de Usuarios</h1>
	                        	<a href="{{route('Admin.Users.create')}}" class="btn btn-primary">
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
	                                            <th>Correo Electronico</th>
	                                            <th>Tipo</th>
	                                            <th>Accion</th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
		                                    @foreach($users as $user)
		                                    	<tr>
		                                    		<td>{{ $user->id }}</td>
			                                        <td>{{ $user->name }}</td>
			                                        <td>{{ $user->email }}</td>
			                                        <td>
			                                        @if($user->type=="admin")
			                                        	<span class="label label-danger">
			                                        		{{ $user->type }}			                                        	
			                                        	</span>
			                                        @else
			                                        	<span class="label label-primary">
			                                        		{{ $user->type }}
			                                        	</span>
			                                        @endif
			                                        </td>			                                        
			                                        <td>
			                                        	<a href="{{route('Admin.Users.destroy',$user->id)}}" onclick="return confirm('¿Seguro desea eliminarlo?')" class="btn btn-danger">
			                                        		<span class="glyphicon glyphicon-trash"></span>
			                                        	</a>
			                                        	<a href="{{route('Admin.Users.edit',$user->id)}}" onclick="return confirm('¿Seguro desea editarlo?')" class="btn btn-warning">
			                                        		<span class="glyphicon glyphicon-wrench"></span>
			                                        	</a>
			                                        </td>
			                                    
		                                    	</tr>
		                                    @endforeach
	                                    </tbody>
	                                </table>
	                                {!! $users->render() !!}
	                            </div>
	                            <!-- /.table-responsive -->
	                        </div>
	                        <!-- /.panel-body -->
	                    </div>	
    </div>


	
 @endsection