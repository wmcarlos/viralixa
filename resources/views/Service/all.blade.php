@extends('admin.main')

@section('title','Servicios')

@section('content')
	<div class="showback">
		<h4><i class="fa fa-angle-right"></i> Servicios</h4>
		<a class="btn btn-success" href="{{ url('services/create') }}"><i class="fa fa-plus"></i> Agregar Nuevo</a>
		<hr>
		<table class="table data-table">
			<thead>
				<th>ID</th>
				<th>Nombre</th>
				<th>Url</th>
				<th>Posicion</th>
				<th>-</th>
			</thead>
			<tbody>
				@foreach($services as $service)
					<tr>
						<td>{{ $service->id }}</td>
						<td>{{ $service->name }}</td>
						<td>{{ $service->url }}</td>
						<td>{{ $service->position }}</td>
						<td>
							@if($service->isactive == 'Y')
								<a href="{{ url('services/'.$service->id.'/edit') }}" class="btn btn-info"><i class="fa fa-pencil"></i> Editar</a>
								<a href="{{ url('services/inactivate/'.$service->id) }}" class="btn btn-danger inactivate"><i class="fa fa-times"></i> Desactivar</a>
							@else
								<a class="btn btn-success activate" href="{{ url('services/activate/'.$service->id) }}"><i class="fa fa-check"></i>Activar</a>
							@endif
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection