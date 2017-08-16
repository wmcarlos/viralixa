@extends('admin.main')

@section('title','Modificar Servicios')

@section('content')
	<div class="showback">
		<h4><i class="fa fa-angle-right"></i> Modificar Servicio</h4>
		<hr>
		{!! Form::open(['action' => 'ServiceController@update', 'method' => 'POST', 'class' => 'form-horizontal style-form', 'autocomplete' => 'off']) !!}
			<div class="form-group">
				{!! Form::label('name','Nombre',['class' => 'col-sm-2 col-sm-2 control-label']) !!}
				<div class="col-sm-10">
					{!! Form::text('name',$service->name,['class' => 'form-control','id' => 'name']) !!}
					{!! Form::hidden('id', $service->id, ['id' => 'id']) !!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label('url','Url',['class' => 'col-sm-2 col-sm-2 control-label']) !!}
				<div class="col-sm-10">
					{!! Form::text('url',$service->url,['class' => 'form-control','id' => 'url']) !!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label('position','Posicion',['class' => 'col-sm-2 col-sm-2 control-label']) !!}
				<div class="col-sm-10">
					{!! Form::text('position',$service->position,['class' => 'form-control','id' => 'position']) !!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label('icon','Icono',['class' => 'col-sm-2 col-sm-2 control-label']) !!}
				<div class="col-sm-10">
					{!! Form::text('icon',$service->icon,['class' => 'form-control','id' => 'icon']) !!}
				</div>
			</div>
			{!! Form::button('<i class="fa fa-floppy-o"></i> Guardar',['type' => 'submit', 'class' => 'btn btn-success']) !!}
			<a class="btn btn-danger" href="{{ url('services') }}"><i class="fa fa-times"></i> Cancelar</a>
		{!! Form::close()  !!}
	</div>
@endsection()