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
    <link rel="stylesheet" href="{{ asset('assetsAuth/css/style.css') }}">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>

<div class="login-wrapper d-flex justify-content-center align-items-center">
    <div class="login-card text-center">
        <!-- Ícone -->
        <div class="logo mb-3" style="width:20px;height:20px">
            <a href="{{ route('index') }}"><i class="bi bi-lightning-charge-fill" style="color:#18d1df;"></i></a>
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
            Não tem conta? <a href="{{ route('register') }}">Criar conta</a>
        </p>

        <p class="text-white mt-2">
            Esqueceu sua senha? 
            <button type="button" class="btn btn-link p-0" 
                    style="text-decoration: none; color: #1fd6b8; background: none; border: none; cursor: pointer;" 
                    data-bs-toggle="modal" data-bs-target="#modalRecuperarSenha">
                Recuperar senha
            </button>
        </p>
    </div>
</div>

<!-- Modal Recuperar Senha -->
<div class="modal fade" id="modalRecuperarSenha" tabindex="-1" aria-labelledby="modalRecuperarSenhaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark text-white border-0 shadow-lg rounded-4">
            <div class="modal-header border-0 pb-0 px-5 pt-4">
                <h5 class="modal-title fw-bold" id="modalRecuperarSenhaLabel">Recuperar Senha</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body px-5 pb-5">

                <p class="text-muted small mb-4">Digite seu email para receber o link de redefinição.</p>

                <form id="formRecuperarSenha" method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="email" class="form-label text-white">Email</label>
                        <div class="input-group">
                            <span class="input-group-text bg-secondary border-0"><i class="bi bi-envelope"></i></span>
                            <input type="email" name="email" id="email" class="form-control bg-secondary text-white border-0" 
                                   placeholder="seu@email.com" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary px-4">Enviar Link</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- SweetAlert2 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Bootstrap JS (necessário para modal) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- JavaScript para SweetAlert global + Recuperação via AJAX -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // SweetAlert global para mensagens flash
    @if (session('success'))
        Swal.fire({
            title: 'Sucesso!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK',
            timer: 3000,
            timerProgressBar: true,
            showConfirmButton: false
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
            html: '{{ implode("<br>", $errors->all()) }}',
            icon: 'warning',
            confirmButtonColor: '#f39c12',
            confirmButtonText: 'Corrigir'
        });
    @endif

    // AJAX para formulário de recuperação de senha
    const formRecuperar = document.getElementById('formRecuperarSenha');
    if (formRecuperar) {
        formRecuperar.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(formRecuperar);

            fetch(formRecuperar.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.status) { // Sucesso do Laravel
                    Swal.fire({
                        icon: 'success',
                        title: 'Link enviado!',
                        text: data.status,
                        timer: 4000,
                        showConfirmButton: false
                    });

                    bootstrap.Modal.getInstance(document.getElementById('modalRecuperarSenha')).hide();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro',
                        html: data.errors?.email?.[0] || 'Não foi possível enviar o link.'
                    });
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Falha',
                    text: 'Erro de conexão. Tenta novamente.'
                });
            });
        });
    }
});
</script>
</body>
</html>