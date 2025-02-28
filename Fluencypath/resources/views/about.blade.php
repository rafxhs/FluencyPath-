@extends('layouts.app')

@section('content')
<div class="container">
    <main>
        <div>
            <section>
                <div>
                    <h1>O que é o FluencyPath?</h1>
                    <p>O FluencyPath é uma plataforma inovadora desenvolvida para ajudar estudantes do IFPE a aprimorarem suas habilidades no inglês por meio de uma abordagem interativa e imersiva. Baseado na teoria da Aquisição da Linguagem de Stephen Krashen, o FluencyPath utiliza o conceito de input compreensível, proporcionando aos alunos exposição contínua a textos e áudios que facilitam a absorção natural do idioma.</p>
                    <br>
                    <p>Nosso objetivo é oferecer uma experiência de aprendizado que vá além dos métodos tradicionais, permitindo que os usuários leiam e escutem simultaneamente, revisem vocabulário em contexto real.</p>
                </div>

                <div>
                    <h2>A Teoria da Aquisição da Linguagem de Stephen Krashen</h2>
                    <p>O FluencyPath é uma plataforma inovadora desenvolvida para ajudar estudantes do IFPE a aprimorarem suas habilidades no inglês por meio de uma abordagem interativa e imersiva. Baseado na teoria da Aquisição da Linguagem de Stephen Krashen, o FluencyPath utiliza o conceito de input compreensível, proporcionando aos alunos exposição contínua a textos e áudios que facilitam a absorção natural do idioma.</p>
                    <br>
                    <p>Nosso objetivo é oferecer uma experiência de aprendizado que vá além dos métodos tradicionais, permitindo que os usuários leiam e escutem simultaneamente, revisem vocabulário em contexto real.</p>
                </div>
            </section>

            <section>
                <div>
                    <span>Desenvolvedores</span>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="">
                            <img src="{{ URL::asset('images/developer1.jpg') }}" alt="Foto do Desenvolvedor">
                            <span>Erick Silva</span>
                            <p>Desenvolvedor Backend</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed luctus lectus ligula, dictum semper mi egestas ut.</p>
                            <div>
                                <!--Colocar os ícones aqui-->
                            </div>

                        </div>

                        <div>
                            <img src="{{ URL::asset('images/developer2.jpg') }}" alt="Foto do Desenvolvedor">
                            <span>Hanna Sabrynna</span>
                            <p>Desenvolvedora Full Stack</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed luctus lectus ligula, dictum semper mi egestas ut.</p>
                            <div>
                                <!--Colocar os ícones aqui-->
                            </div>

                        </div>

                        <div>
                            <img src="{{ URL::asset('images/developer3.jpg') }}" alt="Foto do Desenvolvedor">
                            <span>Rafaela Neves</span>
                            <p>UI/UX Designer e Desenvolvedora Frontend</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed luctus lectus ligula, dictum semper mi egestas ut.</p>
                            <div>
                                <!--Colocar os ícones aqui-->
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

</div>
@endsection