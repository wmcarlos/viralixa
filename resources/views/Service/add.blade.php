@extends('admin.main')

@section('title','Agregar Servicios')

@section('content')
	<div class="showback">
		<h4><i class="fa fa-angle-right"></i> Agregar Nuevo</h4>
		<hr>
		{!! Form::open(['route' => 'services.store', 'method' => 'POST', 'class' => 'form-horizontal style-form', 'autocomplete' => 'off']) !!}
			<div class="form-group">
				{!! Form::label('name','Nombre',['class' => 'col-sm-2 col-sm-2 control-label']) !!}
				<div class="col-sm-10">
					{!! Form::text('name',null,['class' => 'form-control','id' => 'name']) !!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label('url','Url',['class' => 'col-sm-2 col-sm-2 control-label']) !!}
				<div class="col-sm-10">
					{!! Form::text('url',null,['class' => 'form-control','id' => 'url']) !!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label('position','Posicion',['class' => 'col-sm-2 col-sm-2 control-label']) !!}
				<div class="col-sm-10">
					{!! Form::text('position',null,['class' => 'form-control','id' => 'position']) !!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label('icon','Icono',['class' => 'col-sm-2 col-sm-2 control-label']) !!}
				<div class="col-sm-10">
					{!! Form::text('icon',null,['class' => 'form-control','id' => 'icon']) !!}
				</div>
			</div>
			{!! Form::button('<i class="fa fa-floppy-o"></i> Guardar',['type' => 'submit', 'class' => 'btn btn-success']) !!}
			<a class="btn btn-danger" href="{{ url('services') }}"><i class="fa fa-times"></i> Cancelar</a>
		{!! Form::close()  !!}
	</div>
@endsection()