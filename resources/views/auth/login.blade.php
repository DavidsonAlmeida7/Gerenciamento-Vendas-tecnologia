@extends('layouts.app_login')

@section('title', 'Login')

@section('content')


<div class="limiter">
	<div class="container-login100" style="background-image: url('teste/images/optimus_prime.jpg');">
		<div class="wrap-login100 p-t-30 p-b-50">
			<span class="login100-form-title p-b-41">
				Distribuidora Optimus login
			</span>
            <form class="login100-form validate-form p-b-33 p-t-5" method="POST" action="{{ route('login') }}">
                @csrf

				<div class="wrap-input100 validate-input" data-validate="Enter username">
					<input class="input100 @error('email') is-invalid @enderror" id="email" type="text" name="email" placeholder="E-mail" value="{{ old('email') }}" required autocomplete="email">
                    <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
				<div class="wrap-input100 validate-input" data-validate="Enter password">
					<input class="input100 @error('password') is-invalid @enderror" type="password" placeholder="Senha" id="password" name="password" required autocomplete="current-password">
                    <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter remember-me">
                    <label for="remember-me" class="text-info"><input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}><span> Lembrar-me</span></label>
                </div>
                
				<div class="container-login100-form-btn m-t-32">
					<button class="login100-form-btn" type="submit">
						Entrar
                    </button>
                </div>

                <div class="container-login100-form-btn m-t-32">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Esqueceu sua senha?') }}
                        </a>
                    @endif
                    <a class="btn btn-link" href="{{ route('register') }}">{{ __('Criar uma nova conta') }}</a>
                </div>
                
			</form>
		</div>
	</div>
</div>

<div id="dropDownSelect1"></div>

@endsection
