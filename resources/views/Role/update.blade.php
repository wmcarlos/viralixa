@extends('admin.main')

@section('title','Editar Roles')

@section('content')
	<div class="showback">
		<h4><i class="fa fa-angle-right"></i> Editar Rol</h4>
		<hr>
		{!! Form::open(['action' => 'RoleController@update', 'method' => 'POST', 'class' => 'form-horizontal style-form', 'autocomplete' => 'off']) !!}
			<div class="form-group">
				{!! Form::label('name','Nombre',['class' => 'col-sm-2 col-sm-2 control-label']) !!}
				<div class="col-sm-10">
					{!! Form::text('name',$data['role']->name,['class' => 'form-control','id' => 'name']) !!}
					{!! Form::hidden('id',$data['role']->id) !!}
				</div>
			</div>
		    <h4>Servicios Asignados</h4>
			<hr>
			@foreach($data['services'] as $service)
				<div class="checkbox">
					<label>
						<input type="checkbox" name="services[]" value="{{ $service->id }}"> {{ $service->name }}
					</label>
				</div>
			@endforeach()
			<br>
			{!! Form::button('<i class="fa fa-floppy-o"></i> Guardar',['type' => 'submit', 'class' => 'btn btn-success']) !!}
			<a class="btn btn-danger" href="{{ url('roles') }}"><i class="fa fa-times"></i> Cancelar</a>
		{!! Form::close()  !!}
	</div>
@endsection()