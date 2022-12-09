@extends('index')

@section('content')

@if($message = Session::get('success'))
	<div class="alert alert-info" style="margin-top: 100px">
		{{ $message }}
	</div>
@endif

	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" action="{{ route('validate_login') }}" method="post">
				@csrf
		        <h2 class="form-login-heading">Acessar</h2>
		        <div class="login-wrap">
		            <input type="text" name="email" class="form-control" placeholder="E-MAIL" autofocus/>
					@if($errors->has('email'))
						<span  class="pull-right">{{ $errors->first('email') }}</span>
					@endif
		            <br>
		            <input type="password" name="password" class="form-control" placeholder="SENHA"/>
					@if($errors->has('password'))
						<span  class="pull-right">{{ $errors->first('password') }}</span>
					@endif
					<br>
		            <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> ENTRAR </button>
		            <hr>
		        
		            <div class="registration">
		                Ainda não tem uma conta?<br/>
		                <a class="" href="{{route('registration')}}">
		                    Criar conta
		                </a>
		            </div>
		
		        </div>

		      </form>	  	
	  	
	  	</div>
	  </div>

	<!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="{{asset('assets/js/jquery.backstretch.min.js')}}"></script>
    <script>
        $.backstretch("{{asset('assets/img/login-bg.jpg')}}", {speed: 500});
    </script>
    </head>

@endsection('content')


