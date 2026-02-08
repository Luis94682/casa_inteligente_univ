    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container d-flex justify-content-between">
        <a class="navbar-brand" href="{{route('index')}}" data-aos="flip-left">
          <i class="fa-solid fa-bolt"></i> Smart Home
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="#inicio">Início</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#funcionalidades">Funcionalidades</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#beneficios">Benefícios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#tecnologias">Tecnologias</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contato">Contacto</a>
            </li>
          </ul>
          <div class="ms-3 d-flex gap-2 btn-entrar">
            <a href="{{route('login')}}" class="btn btn-accent btn-sm">Começar agora</a>
          </div>
        </div>
      </div>
    </nav>

    <!-- Hero -->
    <section class="hero text-center" id="inicio">
      <div class="container">
        <p class="mb-4">
          <span class="highlight-dot"></span>
          Sistema inteligente de gestão energética
        </p>

        <h1>
          Gestão Inteligente de<br />
          <span id="energia">Energia</span> para sua Casa
        </h1>

        <p>
          Monitore, economize e otimize o consumo de energia em tempo real.<br />
          Transforme sua casa em um ambiente sustentável e inteligente.
        </p>

        <div class="d-flex justify-content-center gap-3 flex-wrap mt-5">
          <a href="{{route('login')}}" class="btn btn-accent btn-lg px-5">vamos testar →</a>
          <a href="#beneficios" class="btn btn-outline-light btn-lg px-5">
            <i class="fa-solid fa-play me-2"></i> Saiba mais
          </a>
        </div>
      </div>
    </section>