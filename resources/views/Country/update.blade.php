@extends('admin.main')

@section('title','Modificar Paises')

@section('content')
	<div class="showback">
		<h4><i class="fa fa-angle-right"></i> Modificar Pais</h4>
		<hr>
		{!! Form::open(['action' => 'CountryController@update', 'method' => 'POST', 'class' => 'form-horizontal style-form', 'autocomplete' => 'off']) !!}
			<div class="form-group">
				{!! Form::label('name','Nombre',['class' => 'col-sm-2 col-sm-2 control-label']) !!}
				<div class="col-sm-10">
					{!! Form::text('name',$country->name,['class' => 'form-control','id' => 'name']) !!}
					{!! Form::hidden('id',$country->id,['class' => 'form-control','id' => 'id']) !!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label('phone_code','Codigo de Telefono',['class' => 'col-sm-2 col-sm-2 control-label']) !!}
				<div class="col-sm-10">
					{!! Form::text('phone_code',$country->phone_code,['class' => 'form-control','id' => 'phone_code']) !!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label('flag_icon','Icono de Bandera',['class' => 'col-sm-2 col-sm-2 control-label']) !!}
				<div class="col-sm-10">
					{!! Form::text('flag_icon',$country->flag_icon,['class' => 'form-control','id' => 'flag_icon']) !!}
				</div>
			</div>
			{!! Form::button('<i class="fa fa-floppy-o"></i> Guardar',['type' => 'submit', 'class' => 'btn btn-success']) !!}
			<a class="btn btn-danger" href="{{ url('countries') }}"><i class="fa fa-times"></i> Cancelar</a>
		{!! Form::close()  !!}
	</div>
@endsection()