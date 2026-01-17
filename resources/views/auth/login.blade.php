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
        <div class="logo mb-3">
            <a href="{{route('index')}}"><i class="bi bi-lightning-charge-fill" style="color:#fff"></i></a>
            
        </div>
        <h4 class="title">Smart Home</h4>
        <p class="subtitle">Entre na sua conta</p>
        <form action="/logindata" method="post">
            @csrf
            <!-- Email -->
            <div class="mb-3 text-start">
                <label class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-envelope"></i>
                    </span>
                    <input type="email" style="background-color:#10192d" name="email_camp" class="form-control" placeholder="seu@email.com">
                </div>
            </div>
            <!-- Senha -->
            <div class="mb-4 text-start">
                <label class="form-label">Senha</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-lock"></i>
                    </span>
                    <input type="password" name="senha_camp" class="form-control" placeholder="********">
                </div>
            </div>

            <!-- Botão -->
            <button type="submit" class="btn btn-login w-100">
                Entrar <i class="bi bi-arrow-right"></i>
            </button>
        </form>

        <p class="register mt-4">
            Não tem conta? <a href="{{route('register')}}">Criar conta</a>
        </p>
    </div>
</div>

</body>
</html>
