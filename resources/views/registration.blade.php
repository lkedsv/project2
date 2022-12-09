@extends('index')

@section('content')
     
     <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" action="{{ route('validate_registration') }}" method="post">
				@csrf
		        <h2 class="form-login-heading">DIGITE SEUS DADOS</h2>
		        <div class="login-wrap">
                    <input type="text" class="form-control" name="name" placeholder="NOME" autofocus>
                    @if($errors->has('name'))
                        <span>{{ $errors->first('name') }}</span>
                    @endif
		            <br>
		            <input type="text" class="form-control" name="email" placeholder="E-MAIL" autofocus>
                    @if($errors->has('email'))
                        <span>{{ $errors->first('email') }}</span>
                    @endif
		            <br>
		            <input type="password" class="form-control" name="password" placeholder="SENHA">
                    @if($errors->has('password'))
                        <span>{{ $errors->first('password') }}</span>
                    @endif
                    <br>
		            <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> CADASTRAR </button>

		            <hr>
		        
		            <div class="registration">
		                <a class="" href="{{route('login')}}">
                      Voltar para o início
		                </a>
		            </div>

		        </div>
		
		      </form>	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="{{asset('assets/js/jquery.backstretch.min.js')}}"></script>
    <script>
        $.backstretch("{{asset('assets/img/login-bg.jpg')}}", {speed: 500});
    </script>

@endsection('content')
