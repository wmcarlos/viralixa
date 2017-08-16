@extends('admin.main')

@section('title','Agregar Usuario')

@section('content')
	<div class="showback">
		<h4><i class="fa fa-angle-right"></i> Agregar Nuevo Usuario</h4>
		<hr>
		{!! Form::open(['route' => 'users.store', 'method' => 'POST', 'class' => 'form-horizontal style-form', 'autocomplete' => 'off']) !!}
			<div class="form-group">
				{!! Form::label('name','Nombre',['class' => 'col-sm-2 col-sm-2 control-label']) !!}
				<div class="col-sm-10">
					{!! Form::text('name',null,['class' => 'form-control','id' => 'name']) !!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label('email','Email',['class' => 'col-sm-2 col-sm-2 control-label']) !!}
				<div class="col-sm-10">
					{!! Form::text('email',null,['class' => 'form-control','id' => 'email']) !!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label('password','Contrase&ntilde;a',['class' => 'col-sm-2 col-sm-2 control-label']) !!}
				<div class="col-sm-10">
					{!! Form::password('password',['class' => 'form-control','id' => 'password']) !!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label('phone','Telefono',['class' => 'col-sm-2 col-sm-2 control-label']) !!}
				<div class="col-sm-10">
					{!! Form::text('phone',null,['class' => 'form-control','id' => 'phone']) !!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label('role','Rol',['class' => 'col-sm-2 col-sm-2 control-label']) !!}
				<div class="col-sm-10">
					{!! Form::select('role',$roles,null,['class' => 'form-control','id' => 'role']) !!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label('country','Pais',['class' => 'col-sm-2 col-sm-2 control-label']) !!}
				<div class="col-sm-10">
					{!! Form::select('country',$countries,null,['class' => 'form-control','id' => 'country']) !!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label('avatar','Foto Perfil',['class' => 'col-sm-2 col-sm-2 control-label']) !!}
				<div class="col-sm-10">
					{!! Form::file('avatar') !!}
				</div>
			</div>
			{!! Form::button('<i class="fa fa-floppy-o"></i> Guardar',['type' => 'submit', 'class' => 'btn btn-success']) !!}
			<a class="btn btn-danger" href="{{ url('users') }}"><i class="fa fa-times"></i> Cancelar</a>
		{!! Form::close()  !!}
	</div>
@endsection()