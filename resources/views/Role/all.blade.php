@extends('admin.main')

@section('title','Roles')

@section('content')
	<div class="showback">
		<h4><i class="fa fa-angle-right"></i> Roles</h4>
		<a class="btn btn-success" href="{{ url('roles/create') }}"><i class="fa fa-plus"></i> Agregar Nuevo</a>
		<hr>
		<table class="table data-table">
			<thead>
				<th>ID</th>
				<th>Nombre</th>
				<th>-</th>
			</thead>
			<tbody>
				@foreach($roles as $role)
					<tr>
						<td>{{ $role->id }}</td>
						<td>{{ $role->name }}</td>
						<td>
							@if($role->isactive == 'Y')
								<a href="{{ url('roles/'.$role->id.'/edit') }}" class="btn btn-info"><i class="fa fa-pencil"></i> Editar</a>
								<a href="{{ url('roles/inactivate/'.$role->id) }}" class="btn btn-danger"><i class="fa fa-times"></i> Desactivar</a>
							@else
								<a class="btn btn-success" href="{{ url('roles/activate/'.$role->id) }}"><i class="fa fa-check"></i>Activar</a>
							@endif
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection