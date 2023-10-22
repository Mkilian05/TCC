@extends('layouts.template')

@section('content')
    <script src="https://kit.fontawesome.com/7a775d7d8d.js" crossorigin="anonymous"></script>

    <h1 class="mt-5 mb-5 text-center border"><i class="fa-solid fa-lightbulb p-3" style="color: #000000;"></i>Perguntas
        Frequentes</h1>

    <div class="accordion mb-3" id="faqAccordion">
        <!-- Pergunta 1 -->
        <div class="card">
            <div class="card-header" id="heading1">
                <h2 class="mb-0">
                    <button class="btn btn-custom-faq" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1"
                        aria-expanded="true" aria-controls="collapse1">
                        1. Como funciona o sistema de avaliação de restaurantes no site?
                    </button>
                </h2>
            </div>

            <div id="collapse1" class="collapse show" aria-labelledby="heading1" data-bs-parent="#faqAccordion">
                <div class="card-body">
                    O sistema de avaliações do site funciona através da nota (composta de 1 estrela á 5 estrelas) e de
                    um breve texto,
                    relatando sua opinião sobre o restaurante.
                </div>
            </div>
        </div>

        <!-- Pergunta 2 -->
        <div class="card">
            <div class="card-header" id="heading2">
                <h2 class="mb-0">
                    <button class="btn btn-custom-faq" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2"
                        aria-expanded="false" aria-controls="collapse2">
                        2. Posso confiar nas avaliações dos restaurantes?
                    </button>
                </h2>
            </div>

            <div id="collapse2" class="collapse" aria-labelledby="heading2" data-bs-parent="#faqAccordion">
                <div class="card-body">
                    Caso a avaliação esteja seguindo a maioria ou totalmente as diretrizes de avaliações recomendadas
                    por nós, você poderá
                    sim confiar nelas.
                </div>
            </div>
        </div>

        <!-- Pergunta 3 -->
        <div class="card">
            <div class="card-header" id="heading3">
                <h2 class="mb-0">
                    <button class="btn btn-custom-faq" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3"
                        aria-expanded="false" aria-controls="collapse3">
                        3. Quem escreve as avaliações dos restaurantes?
                    </button>
                </h2>
            </div>

            <div id="collapse3" class="collapse" aria-labelledby="heading3" data-bs-parent="#faqAccordion">
                <div class="card-body">
                    Qualquer usuário que tenha feito login em nosso site poderá avaliar os restaurantes expostos no
                    site.
                </div>
            </div>
        </div>

        <!-- Pergunta 4 -->
        <div class="card">
            <div class="card-header" id="heading4">
                <h2 class="mb-0">
                    <button class="btn btn-custom-faq" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4"
                        aria-expanded="false" aria-controls="collapse4">
                        4. É possível denunciar avaliações falsas ou inapropriadas?
                    </button>
                </h2>
            </div>

            <div id="collapse4" class="collapse" aria-labelledby="heading4" data-bs-parent="#faqAccordion">
                <div class="card-body">
                    Na versão atual em que o site se encontra ainda não é possível fazer denúncias, estamos trabalhando
                    bastante para logo
                    aplicar esta utilidade ao site.
                </div>
            </div>

            <!-- Pergunta 5 -->
            <div class="card">
                <div class="card-header" id="heading5">
                    <h2 class="mb-0">
                        <button class="btn btn-custom-faq" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                            5. Quais são as diretrizes para escrever avaliações de restaurantes?
                        </button>
                    </h2>
                </div>

                <div id="collapse5" class="collapse" aria-labelledby="heading5" data-bs-parent="#faqAccordion">
                    <div class="card-body">
                        • Seja Honesto;<br>
                        • Forneça contexto;<br>
                        • Descreva o ambiente;<br>
                        • Avalie o serviço prestado;<br>
                        • Fale sobre a comida;<br>
                        • Aborde custo e valor;<br>
                        • Mencione pontos fortes e fracos (de maneira equilibrada);<br>
                        • Seja construtivo;<br>
                        • Evite generalidade;<br>
                        • Evite ser excessivamente emocional (linguagem vulgar).
                    </div>
                </div>

                <!-- Pergunta 6 -->
                <div class="card">
                    <div class="card-header" id="heading6">
                        <h2 class="mb-0">
                            <button class="btn btn-custom-faq" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                                6. Como o site lida com a privacidade das informações dos usuários?
                            </button>
                        </h2>
                    </div>

                    <div id="collapse6" class="collapse" aria-labelledby="heading6" data-bs-parent="#faqAccordion">
                        <div class="card-body">
                            Através da proteção de dados, coleta mínima de dados, transparência e moderação de conteúdo
                            conseguimos proteger os
                            dados de cada usuário existente no site.
                        </div>
                    </div>


                    <!-- Pergunta 7 -->
                    <div class="card">
                        <div class="card-header" id="heading7">
                            <h2 class="mb-0">
                                <button class="btn btn-custom-faq" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                                    7. Existe algum tipo de suporte/contato oferecido pelo site?
                                </button>
                            </h2>
                        </div>

                        <div id="collapse7" class="collapse" aria-labelledby="heading7" data-bs-parent="#faqAccordion">
                            <div class="card-body">
                                Oferecemos suporte e contato para sanar dúvidas através do e-mail
                                <a href="mailto:mkilian05@gmail.com">mkilian05@gmail.com</a>. Qualquer dúvida ou ajuda
                                necessária, não hesite em entrar em contato conosco.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </body>

    </html>
@endsection
