<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <title>IMNE MARISTA</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/templatemo-scholar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <h1>MARISTA</h1>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Serach Start ***** -->

                        <!-- ***** Serach Start ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Inicio</a></li>
                            <li class="scroll-to-section"><a href="#services">Serviços</a></li>
                            <li class="scroll-to-section"><a href="#courses">Cursos</a></li>
                            <li class="scroll-to-section"><a href="#contact">Contacto</a></li>
                            <li class="scroll-to-section"><a href="/candidato/login">Entrar</a></li>
                            <li class="scroll-to-section "><a href="/candidato/register">Cadastrar-se</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div class="main-banner" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-carousel owl-banner">
                        <div class="item item-1">
                            <div class="header-text">
                                <span class="category">Nossos sistema</span>
                                <h2>Oferecemos uma nova abordagem de inscrições</h2>
                                <p>Nossa plataforma de inscrições online é projetada para simplificar o processo de
                                    matrícula, oferecendo uma abordagem intuitiva e segura para candidatos e escolas.
                                </p>
                                <div class="buttons">
                                    <div class="main-button">
                                        <a href="/candidato/register">Criar uma conta</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item item-2">
                            <div class="header-text">
                                <span class="category">Rastreio</span>
                                <h2>Acompanhe o estado da sua inscrição</h2>
                                <p>Verifique o status da sua inscrição em tempo real e acompanhe o progresso.</p>
                                <div class="buttons">
                                    <div class="main-button">
                                        <a href="/candidato/login">Fazer login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="services section" id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="service-item">
                        <div class="icon">
                            <img src={{ asset('assets/images/service-01.png') }} alt="graus online">
                        </div>
                        <div class="main-content">
                            <h4>Documentação Necessária</h4>
                            <p>Facilitamos o processo de inscrição solicitando a documentação de forma digital. Envie
                                cópias dos seus documentos, como certificados, históricos escolares e identidade,
                                diretamente através do nosso sistema seguro. Simplifique a inscrição sem sair de casa.
                            </p>
                            <div class="main-button">
                                <a href="#">Leia Mais</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item">
                        <div class="icon">
                            <img src="assets/images/service-02.png" alt="cursos curtos">
                        </div>
                        <div class="main-content">
                            <h4>Preenchimento do Formulário</h4>
                            <p>Complete o formulário de inscrição de maneira rápida e intuitiva. Nossa plataforma guia
                                você passo a passo, garantindo que todas as informações necessárias sejam preenchidas
                                corretamente. Economize tempo e evite erros comuns com nossa interface amigável.</p>
                            <div class="main-button">
                                <a href="#">Leia Mais</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item">
                        <div class="icon">
                            <img src="assets/images/service-03.png" alt="especialistas web">
                        </div>
                        <div class="main-content">
                            <h4>Acompanhamento do Processo</h4>
                            <p>Após o envio da inscrição, acompanhe o status do seu processo em tempo real. Receba
                                notificações automáticas sobre cada etapa, desde a confirmação do recebimento dos
                                documentos até a aprovação final. Mantenha-se informado e tranquilo com nosso sistema de
                                acompanhamento contínuo.</p>
                            <div class="main-button">
                                <a href="#">Leia Mais</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="section about-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-1">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Inscrever-se de Qualquer Lugar
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Complete sua inscrição confortavelmente de sua casa ou de qualquer dispositivo com
                                    acesso à internet.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Processo Rápido e Intuitivo
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Nosso formulário simplificado guia você passo a passo, garantindo que todas as
                                    informações sejam preenchidas corretamente sem complicações.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    Suporte Dedicado
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Nossa equipe de suporte está disponível para ajudar você em cada etapa, respondendo
                                    a dúvidas e oferecendo assistência personalizada.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false"
                                    aria-controls="collapseFour">
                                    Acompanhamento em Tempo Real
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Após concluir sua inscrição, acompanhe o status e receba atualizações instantâneas
                                    sobre o progresso do seu processo.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 align-self-center">
                    <div class="section-heading">
                        <h6>Sobre nós</h6>
                        <h2>Inscrição Online Fácil e Seguro</h2>
                        <p>Nossa plataforma de inscrições online foi projetada para tornar o processo de matrícula
                            simples e acessível para todos. Com uma interface intuitiva e segura.</p>
                        <div class="main-button">
                            <a href="#">Saiba mais</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section courses" id="courses">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-heading">
                        <h2>Nossos Cursos</h2>
                    </div>
                </div>
            </div>
            <div class="row event_box">
                <div class="col-lg-4 col-md-6 align-self-start mb-30 event_outer col-md-6 design">
                    <div class="events_item">
                        <div class="thumb">
                            <a href="#"><img src={{ url('assets/images/course-01.jpg', []) }}
                                    alt=""></a>
                            <span class="category">Matemática & Física</span>
                        </div>
                        <div class="down-content">
                            <h4>Matemática & Física</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 design">
                    <div class="events_item">
                        <div class="thumb">
                            <a href="#"><img src={{ url('assets/images/course-02.jpg', []) }}
                                    alt=""></a>
                            <span class="category">Língua Portuguesa</span>
                        </div>
                        <div class="down-content">
                            <h4>Língua Portuguesa</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 design">
                    <div class="events_item">
                        <div class="thumb">
                            <a href="#"><img src={{ url('assets/images/course-03.jpg', []) }}
                                    alt=""></a>
                            <span class="category">Pré-Escolar</span>
                        </div>
                        <div class="down-content">
                            <h4>Pré-Escolar</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 design">
                    <div class="events_item">
                        <div class="thumb">
                            <a href="#"><img src={{ url('assets/images/course-04.jpg', []) }}
                                    alt=""></a>
                            <span class="category">ICRA - EMC</span>
                        </div>
                        <div class="down-content">
                            <h4>ICRA - EMC</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="section fun-facts">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="wrapper">
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="counter">
                                    <h2 class="timer count-title count-number" data-to="350" data-speed="1000"></h2>
                                    <p class="count-text ">Estudantes felizes</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="counter">
                                    <h2 class="timer count-title count-number" data-to="804" data-speed="1000"></h2>
                                    <p class="count-text ">Horas de Aula</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="counter">
                                    <h2 class="timer count-title count-number" data-to="150" data-speed="1000"></h2>
                                    <p class="count-text ">Estudantes empregados</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="counter end">
                                    <h2 class="timer count-title count-number" data-to="50" data-speed="1000"></h2>
                                    <p class="count-text ">Anos de experiência</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-us section" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-6  align-self-center">
                    <div class="section-heading">
                        <h6>Contacte-nos</h6>
                        <h2>Sinta-se avontade de nos contactar a qualquer momento</h2>
                        <p>Bem-vindos! Estamos aqui para responder às suas dúvidas e para escutar as suas opiniões.
                            Ficamos felizes em ouvir-lhes e queremos ajudá-los sempre que possível!</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-us-content">
                        <form id="contact-form" action="" method="post">
                            <div class="row">
                                <div class="col-lg-12">
                                    <fieldset>
                                        <input type="name" name="name" id="name"
                                            placeholder="Seu Nome..." autocomplete="on" required>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*"
                                            placeholder="Seu E-mail..." required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <textarea name="message" id="message" placeholder="Sua Menssagem"></textarea>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="orange-button">Enviar
                                            agora</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="col-lg-12">
                <p>Copyright © 2024 IMNE MARISTA. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src={{ asset('js/jquery.min.js') }}></script>
    <script src={{ asset('js/bootstrap.min.js') }}></script>
    <script src={{ asset('js/isotope.min.js') }}></script>
    <script src={{ asset('js/owl-carousel.js') }}></script>
    <script src={{ asset('js/counter.js') }}></script>
    <script src={{ asset('js/custom.js') }}></script>

</body>

</html>
