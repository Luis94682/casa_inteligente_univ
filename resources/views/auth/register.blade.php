<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <title>Smart Home | Registo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Ícones Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- CSS personalizado (mantém o teu) -->
    <link rel="stylesheet" href="{{ asset('assetsAuth/css/style.css') }}">
</head>

<body>

    <div class="login-wrapper d-flex justify-content-center align-items-center">
        <div class="login-card text-center" style="max-width: 600px !important;">

            <!-- Ícone / Logo -->
            <div class="logo mb-3">
                <a href="{{ route('index') }}"><i class="bi bi-lightning-charge-fill" style="color:#fff"></i></a>
            </div>

            <h4 class="title">Smart Home</h4>
            <p class="subtitle">Criar uma nova conta</p>

            <!-- Formulário com Laravel -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="row g-3">

                    <!-- Email -->
                    <div class="col-md-6">
                        <label class="form-label text-start d-block">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" placeholder="seu@email.com"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Telefone -->
                    <div class="col-md-6">
                        <label class="form-label text-start d-block">Telefone</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-phone"></i></span>
                            <input type="tel" name="telefone"
                                class="form-control @error('telefone') is-invalid @enderror"
                                placeholder="(+244) 000 000 000" value="{{ old('telefone') }}">
                            @error('telefone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Senha -->
                    <div class="col-md-6">
                        <label class="form-label text-start d-block">Senha</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="********"
                                required autocomplete="new-password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>



                    <div class="col-md-6">
                        <label class="form-label text-start d-block">Confirmar Senha</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="********" required autocomplete="new-password">
                        </div>
                    </div>

                    <!-- nome completo-->
                    <div class="col-md-6">
                        <label class="form-label text-start d-block">Nome</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input type="text" name="name" class="form-control" placeholder="pedro" required>
                        </div>
                    </div>

                </div>

                <!-- Botão -->
                <button type="submit" class="btn btn-login w-100 mt-4">
                    Criar conta <i class="bi bi-arrow-right"></i>
                </button>

            </form>

            <p class="register mt-4">
                Já tens conta? <a href="{{ route('login') }}">Entrar</a>
            </p>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script para mostrar o SweetAlert baseado na session flash -->

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
                    timer: 5000, // fecha sozinho após 5 segundos
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
