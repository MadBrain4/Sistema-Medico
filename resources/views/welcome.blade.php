@extends('layouts.app')

@section('content')
<div class="welcome-container">
    <div class="welcome-wrapper">
       <div class="text-center">
            <!-- Logo con animación suave -->
            <div class="logo-animation mb-5 mx-auto" style="width: fit-content;">
                <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}" class="welcome-logo">
            </div>

            <!-- Título principal -->
            <h1 class="welcome-title animate__animated animate__fadeInDown mx-auto" style="width: fit-content;">
                {{ __('Bienvenido al Sistema Médico') }}
            </h1>

            <!-- Subtítulo -->
            <p class="welcome-subtitle animate__animated animate__fadeIn animate__delay-1s mx-auto" style="width: fit-content; max-width: 80%;">
                {{ __('Solución integral para la gestión clínica y administración de medicamentos') }}
            </p>
            </div>
        
        <!-- Botones de acción -->
        <div class="welcome-actions animate__animated animate__fadeInUp animate__delay-1s">
            @guest
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg welcome-btn">
                    <i class="fas fa-sign-in-alt me-2"></i>
                    {{ __('Iniciar Sesión') }}
                </a>
                
                @if(Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg welcome-btn">
                        <i class="fas fa-user-plus me-2"></i>
                        {{ __('Crear Cuenta') }}
                    </a>
                @endif
            @else
                <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg welcome-btn">
                    <i class="fas fa-tachometer-alt me-2"></i>
                    {{ __('Ir al Panel') }}
                </a>
            @endguest
        </div>
        
        <!-- Características destacadas -->
        <div class="welcome-features row mt-5">
            <div class="col-md-4 feature-item">
                <div class="feature-icon">
                    <i class="fas fa-user-md"></i>
                </div>
                <h3>{{ __('Gestión Médica') }}</h3>
                <p>{{ __('Registro completo de visitas y tratamientos') }}</p>
            </div>
            
            <div class="col-md-4 feature-item">
                <div class="feature-icon">
                    <i class="fas fa-pills"></i>
                </div>
                <h3>{{ __('Control de Medicamentos') }}</h3>
                <p>{{ __('Administración de dosis y seguimiento') }}</p>
            </div>
            
            <div class="col-md-4 feature-item">
                <div class="feature-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3>{{ __('Reportes') }}</h3>
                <p>{{ __('Estadísticas y análisis completos') }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Estilos personalizados -->
<style>
    .welcome-container {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        padding: 2rem 0;
    }
    
    .welcome-wrapper {
        max-width: 800px;
        margin: 0 auto;
        padding: 2rem;
        background-color: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }
    
    .welcome-logo {
        max-height: 120px;
        transition: transform 0.3s ease;
    }
    
    .welcome-logo:hover {
        transform: scale(1.05);
    }
    
    .welcome-title {
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 1rem;
        font-size: 2.5rem;
    }
    
    .welcome-subtitle {
        font-size: 1.25rem;
        color: #7f8c8d;
        margin-bottom: 2.5rem;
    }
    
    .welcome-actions {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }
    
    .welcome-btn {
        padding: 0.75rem 2rem;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .welcome-features {
        margin-top: 3rem;
    }
    
    .feature-item {
        text-align: center;
        padding: 1.5rem;
    }
    
    .feature-icon {
        font-size: 2.5rem;
        color: #3498db;
        margin-bottom: 1rem;
    }
    
    .feature-item h3 {
        font-size: 1.25rem;
        margin-bottom: 0.5rem;
        color: #2c3e50;
    }
    
    .feature-item p {
        color: #7f8c8d;
    }
    
    @media (max-width: 768px) {
        .welcome-title {
            font-size: 2rem;
        }
        
        .welcome-subtitle {
            font-size: 1.1rem;
        }
        
        .welcome-actions {
            flex-direction: column;
            align-items: center;
        }
        
        .welcome-btn {
            width: 100%;
            margin-bottom: 1rem;
        }
    }
</style>

<!-- Animaciones CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

<!-- Font Awesome para íconos -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection