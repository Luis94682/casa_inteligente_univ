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
</head>

<body>

    <div class="login-wrapper d-flex justify-content-center align-items-center" >
        <div class="login-card text-center" style="max-width: 600px !important;">

            <!-- Ícone -->
            <div class="logo mb-3">
                <a href="{{ route('index') }}"><i class="bi bi-lightning-charge-fill" style="color:#fff"></i></a>
            </div>

            <h4 class="title">Smart Home</h4>
            <p class="subtitle">Criar conta</p>

            <form>
                <!-- Email -->
                <div class="mb-3 text-start d-flex" style="gap: 15px;">
                    <div class="inputForm" style="width:100%">
                        <label class="form-label">Email</label>
                        <div class="input-group" style="width: 100&">
                            <span class="input-group-text">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <input type="email" name="camp_email" class="form-control" placeholder="seu@email.com">
                        </div>
                    </div>
                    <div class="inputForm" style=";width:100%">

                        <label class="form-label">Senha</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-lock"></i>
                            </span>
                            <input type="password" name="camp_password" class="form-control" placeholder="********">
                        </div>
                    </div>


                </div>

                <!-- Senha -->


                <!-- Confirmar Senha -->

                <div class="mb-4 text-start d-flex" style="gap: 15px">

                    <div class="inputForm" style="width:100%">
                        <label class="form-label">Confirmar Senha</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-lock"></i>
                            </span>
                            <input type="password" name="camp_confirm_password" class="form-control"
                                placeholder="********">
                        </div>
                    </div>
                    <div class="inputForm" style="width:100%">
                        <label class="form-label">Telefone</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-phone"></i>
                            </span>
                            <input type="tel" name="camp_phone" class="form-control"
                                placeholder="(+244) 000 000 000">
                        </div>
                    </div>

                </div>



                <div class="mb-4 text-start">

                </div>

                <!-- Botão -->
                <button type="submit" class="btn btn-login w-100">
                    criar conta <i class="bi bi-arrow-right"></i>
                </button>
            </form>

            <p class="register mt-4">
                entre na sua conta! <a href="{{ route('login') }}">Login</a>
            </p>
        </div>
    </div>

</body>

</html>
