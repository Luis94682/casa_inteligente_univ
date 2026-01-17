
@extends('_layouts.main')
@section('content')

@include('_layouts.header')
    <!-- Objetivos / Pilares -->
    <section class="py-5 objectivos" id="objectivos">
      <div class="container text-center">
        <p class="section-title mb-2">NOSSOS OBJETIVOS</p>
        <h2 class="mb-5">O que fazemos por si</h2>
        <p class="lead mb-5">
          Nosso sistema foi desenvolvido com três pilares fundamentais para
          revolucionar<br />
          a forma como você gerencia a energia da sua casa.
        </p>

        <div class="row g-4">
          <div class="col-lg-4" data-aos="zoom-in">
            <div class="card-feature p-4 h-100">
              <i class="fa-solid fa-heart-pulse feature-icon"></i>
              <h4>Monitorar Consumo em Tempo Real</h4>
              <p class="text-secondary mt-3">
                Acompanhe o consumo de energia de cada dispositivo da sua
                casa<br />
                instantaneamente, com gráficos claros e intuitivos.
              </p>
            </div>
          </div>

          <div class="col-lg-4" data-aos="zoom-in">
            <div class="card-feature p-4 h-100">
              <i class="fa-solid fa-lightbulb feature-icon"></i>
              <h4>Recomendações Automáticas</h4>
              <p class="text-secondary mt-3">
                Receba sugestões personalizadas baseadas em inteligência
                artificial<br />
                para otimizar o uso de energia na sua casa.
              </p>
            </div>
          </div>

          <div class="col-lg-4" data-aos="zoom-in">
            <div class="card-feature p-4 h-100">
              <i class="fa-solid fa-leaf feature-icon"></i>
              <h4>Redução de Desperdícios</h4>
              <p class="text-secondary mt-3">
                Identifique e elimine gastos desnecessários de energia,<br />
                contribuindo para um planeta mais sustentável.
              </p>
            </div>
          </div>

          <div class="col-lg-4" data-aos="zoom-in">
            <div class="card-feature p-4 h-100">
              <i class="fa-solid fa-leaf feature-icon"></i>
              <h4>Redução de Desperdícios</h4>
              <p class="text-secondary mt-3">
                Identifique e elimine gastos desnecessários de energia,<br />
                contribuindo para um planeta mais sustentável.
              </p>
            </div>
          </div>

          <div class="col-lg-4" data-aos="zoom-in">
            <div class="card-feature p-4 h-100">
              <i class="fa-solid fa-leaf feature-icon"></i>
              <h4>Redução de Desperdícios</h4>
              <p class="text-secondary mt-3">
                Identifique e elimine gastos desnecessários de energia,<br />
                contribuindo para um planeta mais sustentável.
              </p>
            </div>
          </div>

          <div class="col-lg-4" data-aos="zoom-in">
            <div class="card-feature p-4 h-100">
              <i class="fa-solid fa-leaf feature-icon"></i>
              <h4>Redução de Desperdícios</h4>
              <p class="text-secondary mt-3">
                Identifique e elimine gastos desnecessários de energia,<br />
                contribuindo para um planeta mais sustentável.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Funcionalidades -->
    <section
      class="section bg-dark funcionalidades mt-5 mb-5 pt-5"
      id="funcionalidades"
    >
      <div class="container text-center">
        <p class="section-title">FUNCIONALIDADES</p>
        <h2 class="mb-4">Tecnologia ao seu serviço</h2>
        <p class="lead text-secondary mb-5">
          Descubra todas as ferramentas que tornam a gestão de energia da sua
          casa simples,<br />
          inteligente e eficiente.
        </p>

        <div class="row g-5 justify-content-center">
          <div class="col-lg-4" data-aos="flip-left">
            <div class="feature-card p-5 position-relative">
              <div class="feature-number">01</div>
              <i class="fa-solid fa-heart-pulse feature-icon"></i>
              <h4>Monitorização do Consumo</h4>
              <p class="text-secondary mt-3">
                Visualize o consumo de energia em tempo real<br />
                com dashboards interativos e detalhados.
              </p>
              <!-- Placeholder para imagem do dashboard -->
              <img
                src="https://cdn.dribbble.com/userupload/17319945/file/original-3de3f4fab5dba2f1cc643329127b5bb6.png?resize=2048x1536"
                class="img-fluid mt-4 rounded"
                alt="Dashboard de Monitorização em Tempo Real"
                style="border: 1px solid #30363d"
              />
            </div>
          </div>

          <div class="col-lg-4" data-aos="flip-right">
            <div class="feature-card p-5 position-relative">
              <div class="feature-number">02</div>
              <i class="fa-solid fa-bell feature-icon"></i>
              <h4>Alertas Inteligentes</h4>
              <p class="text-secondary mt-3">
                Receba notificações quando o consumo<br />
                ultrapassar limites definidos ou detectar anomalias.
              </p>
              <!-- Placeholder para imagem de alertas -->
              <img
                src="https://smarthomescene.com/wp-content/uploads/2023/09/browser-mod-examples-custom-popups-in-home-assistant-featured.jpg"
                class="img-fluid mt-4 rounded"
                alt="Alertas Inteligentes"
                style="border: 1px solid #30363d"
              />
            </div>
          </div>

          <div class="col-lg-4" data-aos="flip-left">
            <div class="feature-card p-5 position-relative">
              <div class="feature-number">03</div>
              <i class="fa-solid fa-chart-line feature-icon"></i>
              <h4>Histórico de Consumo</h4>
              <p class="text-secondary mt-3">
                Analise padrões de consumo com relatórios<br />
                detalhados por dia, semana, mês ou ano.
              </p>
              <!-- Placeholder para imagem de histórico -->
              <img
                src="https://www.mdpi.com/ijgi/ijgi-11-00194/article_deploy/html/images/ijgi-11-00194-g007.png"
                class="img-fluid mt-4 rounded"
                alt="Histórico de Consumo"
                style="border: 1px solid #30363d"
              />
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Benefícios -->
    <section class="section" id="beneficios">
      <div class="container text-center">
        <p class="section-title">BENEFÍCIOS</p>
        <h2 class="mb-4">Por que escolher-nos?</h2>
        <p class="lead text-secondary mb-5">
          Descubra como o Smart Energy Home pode transformar a sua relação com o
          consumo de<br />
          energia e trazer benefícios reais para o seu dia a dia.
        </p>

        <div class="row g-5">
          <div class="col-lg-6">
            <div class="benefit-card">
              <div class="benefit-icon-bg">
                <i class="fa-solid fa-arrow-down feature-icon benefit-icon"></i>
              </div>
              <h4>Economia na Conta de Energia</h4>
              <p class="text-secondary mt-3">
                Reduza até 30% na sua fatura mensal de eletricidade com gestão
                inteligente e<br />
                recomendações personalizadas.
              </p>

              <ul
                class="list-unstyled check-list mt-5 text-start"
                data-aos="flip-left"
              >
                <div class="circle-liste">
                  <div class="circle-liste-small"></div>
                  <li>Análise de tarifas</li>
                </div>

                <div class="row-line"></div>
                <div class="circle-liste">
                  <div class="circle-liste-small"></div>
                  <li>Uso em horários económicos</li>
                </div>

                <div class="row-line"></div>
                <div class="circle-liste">
                  <div class="circle-liste-small"></div>
                  <li>Detecção de desperdícios</li>
                </div>
              </ul>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="benefit-card">
              <div class="benefit-icon-bg">
                <i
                  class="fa-solid fa-gauge-high feature-icon benefit-icon"
                  data-aos="flip-left"
                ></i>
              </div>
              <h4>Maior Eficiência Energética</h4>
              <p class="text-secondary mt-3">
                Maximize o rendimento energético da sua casa com automações
                inteligentes que<br />
                funcionam 24 horas por dia.
              </p>

              <ul
                class="list-unstyled check-list mt-5 text-start"
                data-aos="flip-left"
              >
                <div class="circle-liste">
                  <div class="circle-liste-small"></div>
                  <li>Automação de dispositivos</li>
                </div>

                <div class="row-line"></div>
                <div class="circle-liste">
                  <div class="circle-liste-small"></div>
                  <li>Agendamento inteligente</li>
                </div>

                <div class="row-line"></div>
                <div class="circle-liste">
                  <div class="circle-liste-small"></div>
                  <li>Otimização contínua</li>
                </div>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section bg-dark mt-5 pb-5 pt-5" id="tecnologias">
      <div class="container text-center">
        <p class="section-title">TECNOLOGIAS</p>
        <h2 class="mb-4 display-5 fw-bold">Inovação que faz a diferença</h2>

        <p class="lead text-secondary mb-5 mx-auto" style="max-width: 800px">
          Utilizamos as tecnologias mais avançadas do mercado para garantir
          eficiência, segurança e<br />
          uma experiência excepcional.
        </p>

        <div class="row g-4 justify-content-center card-gap">

          <div class="col-lg-4" data-aos="zoom-in">
            <div class="card-feature p-4 h-100">
              <div class="solid-cicle">
                <i class="fa-solid fa-brain tech-icon"></i>
              </div>
              <h4>Inteligência Artificial</h4>
              <p class="text-secondary mt-3">
                Algoritmos de machine learning que aprendem os seus hábitos e
                otimizam automaticamente o consumo.
              </p>
            </div>
          </div>

          <div class="col-lg-4" data-aos="zoom-in">
            <div class="card-feature p-4 h-100">
              <div class="solid-cicle">
                <i class="fa-solid fa-network-wired tech-icon"></i>
              </div>
              <h4>IoT Integrado</h4>
              <p class="text-secondary mt-3">
                Conecta todos os dispositivos da sua casa num único ecossistema
                inteligente e automatizado.
              </p>
            </div>
          </div>



          <div class="col-lg-4" data-aos="zoom-in">
            <div class="card-feature p-4 h-100">
              <div class="solid-cicle">
                 <i class="fa-solid fa-shield-halved tech-icon"></i>
              </div>
              <h4>Segurança Avançada</h4>
              <p class="text-secondary mt-3">
              Encriptação de ponta a ponta e proteção de dados conforme os
                mais altos
                padrões de segurança.
              </p>
            </div>
          </div>
          <div class="col-lg-4" data-aos="zoom-in">
            <div class="card-feature p-4 h-100">
              <div class="solid-cicle">
                 <i class="fa-solid fa-shield-halved tech-icon"></i>
              </div>
              <h4>Segurança Avançada</h4>
              <p class="text-secondary mt-3">
              Encriptação de ponta a ponta e proteção de dados conforme os
                mais altos
                padrões de segurança.
              </p>
            </div>
          </div>


       
        </div>
      </div>
    </section>

    @include('_layouts.footer')

  
@endsection