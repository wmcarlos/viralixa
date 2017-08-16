@extends('admin.main')

@section('title','Paises')

@section('content')
	<div class="showback">
		<h4><i class="fa fa-angle-right"></i> Paises</h4>
		<a class="btn btn-success" href="{{ url('countries/create') }}"><i class="fa fa-plus"></i> Agregar Nuevo</a>
		<hr>
		<table class="table data-table">
			<thead>
				<th>ID</th>
				<th>Nombre</th>
				<th>Codigo Telefono</th>
				<th>-</th>
			</thead>
			<tbody>
				@foreach($countries as $country)
					<tr>
						<td>{{ $country->id }}</td>
						<td>{{ $country->name }}</td>
						<td>{{ $country->phone_code }}</td>
						<td>
							@if($country->isactive == 'Y')
								<a href="{{ url('countries/'.$country->id.'/edit') }}" class="btn btn-info"><i class="fa fa-pencil"></i> Editar</a>
								<a href="{{ url('countries/inactivate/'.$country->id) }}" class="btn btn-danger inactivate"><i class="fa fa-times"></i> Desactivar</a>
							@else
								<a class="btn btn-success activate" href="{{ url('countries/activate/'.$country->id) }}"><i class="fa fa-check"></i>Activar</a>
							@endif
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection