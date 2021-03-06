@extends('admin.main')

@section('title','Modificar Usuario')

@section('content')
	<div class="showback">
		<h4><i class="fa fa-angle-right"></i> Modificar Usuario</h4>
		<hr>
		{!! Form::open(['action' => 'UserController@update', 'method' => 'POST', 'class' => 'form-horizontal style-form', 'autocomplete' => 'off']) !!}
			<div class="form-group">
				{!! Form::label('name','Nombre',['class' => 'col-sm-2 col-sm-2 control-label']) !!}
				<div class="col-sm-10">
					{!! Form::text('name',$data['user']->name,['class' => 'form-control','id' => 'name']) !!}
					{!! Form::hidden('id',$data['user']->id) !!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label('email','Email',['class' => 'col-sm-2 col-sm-2 control-label']) !!}
				<div class="col-sm-10">
					{!! Form::text('email',$data['user']->email,['class' => 'form-control','id' => 'email']) !!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label('phone','Telefono',['class' => 'col-sm-2 col-sm-2 control-label']) !!}
				<div class="col-sm-10">
					{!! Form::text('phone',$data['user']->phone,['class' => 'form-control','id' => 'phone']) !!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label('role_id','Rol',['class' => 'col-sm-2 col-sm-2 control-label']) !!}
				<div class="col-sm-10">
					{!! Form::select('role_id',$data['roles'],$data['user']->role_id,['class' => 'form-control','id' => 'role']) !!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label('country_id','Pais',['class' => 'col-sm-2 col-sm-2 control-label']) !!}
				<div class="col-sm-10">
					{!! Form::select('country_id',$data['countries'],$data['user']->country_id,['class' => 'form-control','id' => 'country']) !!}
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