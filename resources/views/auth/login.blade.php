@extends('layouts.app')

@section('content')
    <div class="d-flex min-vh-100 align-items-center justify-content-center bg-dark bg-opacity-75 position-fixed w-100 top-0 start-0" 
         style="background: url('{{ URL::to('assets/img/auth-bg.jpg') }}') center/cover no-repeat; animation: fadeIn 1s ease-in-out;">
        <div class="card shadow-lg p-4" style="max-width: 450px; width: 100%; animation: slideUp 0.8s ease-in-out;">
            {!! Toastr::message() !!}

            <div class="text-center mb-3">
                <img src="{{ URL::to('assets/img/logo.png') }}" alt="Logo" style="background:#001b2f!important">
                <h2 class="fw-bold text-dark"></h2>
                <p class="text-muted">Bienvenue ! Connectez-vous pour continuer</p>
            </div>

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="mb-3 position-relative">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" 
                           placeholder="Adresse email" value="{{ old('email') }}" required autofocus>
                    <span class="position-absolute top-50 end-0 translate-middle-y me-3 text-muted">
                        <i class="fas fa-envelope"></i>
                    </span>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 position-relative">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" 
                           placeholder="Mot de passe" required>
                    <span class="position-absolute top-50 end-0 translate-middle-y me-3 text-muted">
                        <i class="fas fa-eye"></i>
                    </span>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="remember" id="remember" 
                               {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Se souvenir de moi</label>
                    </div>
                    <a href="{{ route('password.request') }}" class="text-decoration-none">Mot de passe oublié ?</a>
                </div>

                <button type="submit" class="btn btn-primary w-100" style="transition: transform 0.3s ease-in-out;" 
                        onmouseover="this.style.transform='scale(1.05)';" onmouseout="this.style.transform='scale(1)';">
                    Connexion
                </button>

                @if (Route::has('register'))
                    <p class="text-center mt-3">Pas encore inscrit ? 
                        <a href="{{ route('register') }}" class="text-primary">Créez un compte</a>
                    </p>
                @endif
            </form>

            <div class="text-center my-3 position-relative">
                <span class="bg-white px-2">ou</span>
                <hr class="position-absolute top-50 start-0 w-100">
            </div>

            <div class="d-flex justify-content-center gap-3">
                <!-- Connexion Google -->
                <a href="{{ url('login/google') }}" class="btn btn-danger rounded-circle d-flex align-items-center justify-content-center" 
                   style="width: 45px; height: 45px; transition: transform 0.3s ease-in-out;"
                   onmouseover="this.style.transform='scale(1.2)';" onmouseout="this.style.transform='scale(1)';">
                    <i class="fab fa-google"></i>
                </a>

                <!-- Connexion Facebook -->
                <a href="{{ url('login/facebook') }}" class="btn btn-primary rounded-circle d-flex align-items-center justify-content-center" 
                   style="width: 45px; height: 45px; transition: transform 0.3s ease-in-out;"
                   onmouseover="this.style.transform='scale(1.2)';" onmouseout="this.style.transform='scale(1)';">
                    <i class="fab fa-facebook-f"></i>
                </a>
            </div>
        </div>
    </div>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideUp {
            from { transform: translateY(50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
    </style>
@endsection
