 <div id="login-page">
  	<div class="container">
	      {!! Form::open(['action' => 'UserController@auth', 'method' => 'POST', 'class' => 'form-login', 'autocompete' => 'off']) !!}
	        <h2 class="form-login-heading">Iniciar Sesion</h2>
	        <div class="login-wrap">
	            {!! Form::text('email',null,['class' => 'form-control', 'placeholder' => 'Correo Electronico', 'id' => 'email']) !!}
	            <br>
	            {!! Form::password('password',['class' => 'form-control', 'placeholder' => 'Contrase&ntilde;a']) !!}
	            <label class="checkbox">
	                <span class="pull-right">
	                    <a data-toggle="modal" href="#"> Olvide mi Contrase&ntilde;a?</a>
	
	                </span>
	            </label>
	            {!! Form::button('<i class="fa fa-lock"></i> Entrar', ['class' => 'btn btn-theme btn-block', 'type' => 'submit']) !!}
	            <hr>
	              <!--Show Errors-->
		          @if($errors->any())
		            <div class="alert alert-danger alert-dismissable">
		            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                <ul>
		                  @foreach($errors->all() as $error)
		                    <li><strong>{{  $error }}</strong></li>
		                  @endforeach()
		                </ul>
		            </div>
		          @endif
	            <div class="login-social-link centered">
	            <p>or you can sign in via your social network</p>
	                <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
	                <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
	            </div>
	            <div class="registration">
	                No Posees una cuenta?<br/>
	                <a class="" href="#">
	                    Crear Cuenta
	                </a>
	            </div>
	        </div>
	      {!! Form::close() !!}	  	
  	</div>
 </div>