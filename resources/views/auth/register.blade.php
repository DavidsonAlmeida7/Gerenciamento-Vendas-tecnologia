@extends('layouts.app_login')

@section('title', 'Login')

@section('content')


<div class="limiter">
	<div class="container-login100" style="background-image: url('teste/images/optimus_prime.jpg');">
		<div class="wrap-login100 p-t-30 p-b-50">
			<span class="login100-form-title p-b-41">
				Distribuidora Optimus Cadastrar
			</span>
            <form class="login100-form validate-form p-b-33 p-t-5" method="POST" action="{{ route('register') }}">
                @csrf

				<div class="wrap-input100 validate-input" data-validate="Enter name">
					<input class="input100 @error('name') is-invalid @enderror" id="name" type="text" name="name" placeholder="Nome" value="{{ old('name') }}" required autocomplete="name">
                    <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter email">
					<input class="input100 @error('email') is-invalid @enderror" id="email" type="text" name="email" placeholder="E-mail" value="{{ old('email') }}" required autocomplete="email">
                    <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
				<div class="wrap-input100 validate-input" data-validate="Enter password">
					<input class="input100 @error('password') is-invalid @enderror" type="password" placeholder="Senha" id="password" name="password" required autocomplete="new-password">
                    <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter confirm-password">
					<input class="input100" type="password" placeholder="Confirmar senha" id="password-confirm" name="password_confirmation" required autocomplete="new-password">
                    <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                </div>
                
				<div class="container-login100-form-btn m-t-32">
					<button class="login100-form-btn" type="submit">
						{{ __('Registrar') }}
                    </button>
                </div>
                
			</form>
		</div>
	</div>
</div>

<div id="dropDownSelect1"></div>

@endsection
