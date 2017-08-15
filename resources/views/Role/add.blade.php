@extends('admin.main')

@section('title','Agregar Roles')

@section('content')
	<div class="showback">
		<h4><i class="fa fa-angle-right"></i> Agregar Nuevo Rol</h4>
		<hr>
		{!! Form::open(['route' => 'roles.store', 'method' => 'POST', 'class' => 'form-horizontal style-form']) !!}
			<div class="form-group">
				{!! Form::label('name','Nombre',['class' => 'col-sm-2 col-sm-2 control-label']) !!}
				<div class="col-sm-10">
					{!! Form::text('txtname',null,['class' => 'form-control','id' => 'txtname']) !!}
				</div>
			</div>
			{!! Form::button('<i class="fa fa-floppy-o"></i> Guardar',['type' => 'submit', 'class' => 'btn btn-success']) !!}
			<a class="btn btn-danger" href="{{ url('roles') }}"><i class="fa fa-times"></i> Cancelar</a>
		{!! Form::close()  !!}
	</div>
@endsection()