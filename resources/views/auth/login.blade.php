<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Smart Home | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Ícones Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="{{asset('assetsAuth/css/style.css')}}">
</head>
<body>

<div class="login-wrapper d-flex justify-content-center align-items-center">
    <div class="login-card text-center">
        <!-- Ícone -->
        <div class="logo mb-3" style="width:20px;height:20px">
            <a href="{{route('index')}}"><i class="bi bi-lightning-charge-fill" style="color:#18d1df;"></i></a>
            
        </div>
        <h4 class="title" style="color:#fff">Smart Home</h4>
        <p class="subtitle">Entre na sua conta</p>
       <form action="{{ route('login.authenticate') }}" method="POST">
    @csrf

    <!-- Email -->
    <div class="mb-3 text-start">
        <label class="form-label">Email</label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
            <input type="email" 
                   name="email_camp" 
                   class="form-control @error('email_camp') is-invalid @enderror" 
                   placeholder="seu@email.com"
                   value="{{ old('email_camp') }}"
                   required autofocus>
            @error('email_camp')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <!-- Senha -->
    <div class="mb-4 text-start">
        <label class="form-label">Senha</label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-lock"></i></span>
            <input type="password" 
                   name="senha_camp" 
                   class="form-control @error('senha_camp') is-invalid @enderror" 
                   placeholder="********"
                   required>
            @error('senha_camp')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-login w-100">
        Entrar <i class="bi bi-arrow-right"></i>
    </button>
</form>

        <p class="register mt-4">
            Não tem conta? <a href="{{route('register')}}">Criar conta</a>
        </p>
    </div>
</div>



     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                Swal.fire({
                    title: 'Sucesso!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 3000, // fecha sozinho após 5 segundos
                    timerProgressBar: true,
                    showConfirmButton: false // opcional: sem botão se quiser só timer
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    title: 'Erro!',
                    text: '{{ session('error') }}',
                    icon: 'error',
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'OK'
                });
            @endif

            @if ($errors->any())
                Swal.fire({
                    title: 'Atenção!',
                    html: '{{ implode('<br>', $errors->all()) }}',
                    icon: 'warning',
                    confirmButtonColor: '#f39c12',
                    confirmButtonText: 'Corrigir'
                });
            @endif
        });
    </script>
</body>
</html>
