@extends('admin.main')

@section('title','Usuarios')

@section('content')
	<div class="showback">
		<h4><i class="fa fa-angle-right"></i> Usuarios</h4>
		<a class="btn btn-success" href="{{ url('users/create') }}"><i class="fa fa-plus"></i> Agregar Nuevo</a>
		<hr>
		<table class="table data-table">
			<thead>
				<th>ID</th>
				<th>Nombre</th>
				<th>Email</th>
				<th>Telefono</th>
				<th>-</th>
			</thead>
			<tbody>
				@foreach($users as $user)
					<tr>
						<td>{{ $user->id }}</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->phone }}</td>
						<td>
							@if($user->isactive == 'Y')
								<a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-info"><i class="fa fa-pencil"></i> Editar</a>
								<a href="{{ url('users/inactivate/'.$user->id) }}" class="btn btn-danger inactivate"><i class="fa fa-times"></i> Desactivar</a>
							@else
								<a class="btn btn-success activate" href="{{ url('users/activate/'.$user->id) }}"><i class="fa fa-check"></i>Activar</a>
							@endif
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection