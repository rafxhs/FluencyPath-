@extends('layouts.app')

@section('content')
<main class="w-full">
    <section class="w-full  grid grid-rows-1 sm:grid-rows-2 lg:grid-rows-2">
            <div class="flex flex-col items-center text-justify">
                <h1 class="font-primary font-bold text-primary-1000 text-4xl mx-auto p-16">O que é o FluencyPath?</h1>
                <p class="w-[55%] font-secondary font-normal text-neutral-500 text-lg indent-8">O FluencyPath é uma plataforma inovadora desenvolvida para ajudar estudantes do IFPE a aprimorarem suas habilidades no inglês por meio de uma abordagem interativa e imersiva. Baseado na teoria da Aquisição da Linguagem de Stephen Krashen, o FluencyPath utiliza o conceito de input compreensível, proporcionando aos alunos exposição contínua a textos e áudios que facilitam a absorção natural do idioma.</p>
                <br>
                <p class="w-[55%] font-secondary font-normal text-neutral-500 text-lg indent-8">Nosso objetivo é oferecer uma experiência de aprendizado que vá além dos métodos tradicionais, permitindo que os usuários leiam e escutem simultaneamente, revisem vocabulário em contexto real.</p>
            </div>

            <div class="flex flex-col items-center">
                <h2 class="font-primary font-semibold text-primary-1000 text-3xl text-left p-16">A Teoria da Aquisição da Linguagem de Stephen Krashen</h2>
                <p class="w-[55%] font-secondary font-normal text-neutral-500 text-lg text-justify indent-8">O FluencyPath é uma plataforma inovadora desenvolvida para ajudar estudantes do IFPE a aprimorarem suas habilidades no inglês por meio de uma abordagem interativa e imersiva. Baseado na teoria da Aquisição da Linguagem de Stephen Krashen, o FluencyPath utiliza o conceito de input compreensível, proporcionando aos alunos exposição contínua a textos e áudios que facilitam a absorção natural do idioma.</p>
                <br>
                <p class="w-[55%] font-secondary font-normal text-neutral-500 text-lg text-justify indent-8">Nosso objetivo é oferecer uma experiência de aprendizado que vá além dos métodos tradicionais, permitindo que os usuários leiam e escutem simultaneamente, revisem vocabulário em contexto real.</p>
            </div>
    </section>

    <section class="w-full flex-col items-center justify-center p-20">
        <div class="flex justify-center">
            <span class="font-primary font-bold text-primary-1000 text-4xl">Desenvolvedores</span>
        </div>

        <div class="w-full grid sm:grid-cols-2 lg:grid-cols-3 pt-28">

            <div class=" flex flex-col w-full max-w-[380px] min-h-[500px] py-4">
                <div class="w-full h-[300px]  flex items-center justify-center overflow-hidden rounded-lg shadow-md">
                    <img src="{{ URL::asset('images/developer1.jpg') }}"
                        alt="Foto do Desenvolvedor"
                        class="w-full h-full object-cover">
                </div>

                <div class="w-full  h-[180px] text-left mt-4">
                    <span class="font-primary font-medium text-neutral-600 text-2xl">Erick Silva</span>
                    <p class="font-secondary text-primary-400 text-lg">Desenvolvedor Backend</p>
                    <p class="w-full mt-1 font-secondary text-neutral-400 text-base text-justify">Na área de TI desde 2022, Cursando o 3 período de Tecnologia em Sistema Para Internet (TSI) pelo IFPE - Igarassu. Área de Interesse: Dados.</p>
                </div>

                <div class="flex gap-4">
                    <a href="https://github.com/ErickSilva-s" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="text-neutral-400">
                            <path fill="currentColor" d="M12 2A10 10 0 0 0 2 12c0 4.42 2.87 8.17 6.84 9.5c.5.08.66-.23.66-.5v-1.69c-2.77.6-3.36-1.34-3.36-1.34c-.46-1.16-1.11-1.47-1.11-1.47c-.91-.62.07-.6.07-.6c1 .07 1.53 1.03 1.53 1.03c.87 1.52 2.34 1.07 2.91.83c.09-.65.35-1.09.63-1.34c-2.22-.25-4.55-1.11-4.55-4.92c0-1.11.38-2 1.03-2.71c-.1-.25-.45-1.29.1-2.64c0 0 .84-.27 2.75 1.02c.79-.22 1.65-.33 2.5-.33s1.71.11 2.5.33c1.91-1.29 2.75-1.02 2.75-1.02c.55 1.35.2 2.39.1 2.64c.65.71 1.03 1.6 1.03 2.71c0 3.82-2.34 4.66-4.57 4.91c.36.31.69.92.69 1.85V21c0 .27.16.59.67.5C19.14 20.16 22 16.42 22 12A10 10 0 0 0 12 2" />
                        </svg>
                    </a>
                    <a href="https://mail.google.com/mail/?view=cm&fs=1&to=ess56@discente.ifpe.edu.br" rel="noopener noreferrer" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32" class="text-neutral-400">
                            <path fill="currentColor" d="M32 6v20c0 1.135-.865 2-2 2h-2V9.849l-12 8.62l-12-8.62V28H2c-1.135 0-2-.865-2-2V6c0-.568.214-1.068.573-1.422A1.97 1.97 0 0 1 2 4h.667L16 13.667L29.333 4H30c.568 0 1.068.214 1.427.578c.359.354.573.854.573 1.422" />
                        </svg>
                    </a>
                    <a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="text-neutral-400">
                            <path fill="currentColor" d="M20.47 2H3.53a1.45 1.45 0 0 0-1.47 1.43v17.14A1.45 1.45 0 0 0 3.53 22h16.94a1.45 1.45 0 0 0 1.47-1.43V3.43A1.45 1.45 0 0 0 20.47 2M8.09 18.74h-3v-9h3ZM6.59 8.48a1.56 1.56 0 1 1 0-3.12a1.57 1.57 0 1 1 0 3.12m12.32 10.26h-3v-4.83c0-1.21-.43-2-1.52-2A1.65 1.65 0 0 0 12.85 13a2 2 0 0 0-.1.73v5h-3v-9h3V11a3 3 0 0 1 2.71-1.5c2 0 3.45 1.29 3.45 4.06Z" />
                        </svg>
                    </a>
                </div>
            </div>

            <div class=" flex flex-col w-full max-w-[380px] min-h-[500px] py-4">
                <div class="w-full h-[300px]  flex items-center justify-center overflow-hidden rounded-lg shadow-md">
                    <img src="{{ URL::asset('images/developer2.jpg') }}"
                        alt="Foto do Desenvolvedor"
                        class="w-full h-full object-cover">
                </div>

                <div class="w-full text-left h-[180px] mt-4 ">
                    <span class="font-primary font-medium text-neutral-600 text-2xl">Hanna Sabrynna</span>
                    <p class="font-secondary text-primary-400 text-lg">Desenvolvedora Full Stack</p>
                    <p class="w-full mt-1 font-secondary text-neutral-400 text-base text-justify">Técnica em informatica para internet pelo IFPE - Igarassu, cursando o 3 período em TSI. Área de interesse: Desenvolvimento backend.</p>
                </div>

                <div class="flex gap-4">
                    <a href="https://github.com/hannasabrynna" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="text-neutral-400">
                            <path fill="currentColor" d="M12 2A10 10 0 0 0 2 12c0 4.42 2.87 8.17 6.84 9.5c.5.08.66-.23.66-.5v-1.69c-2.77.6-3.36-1.34-3.36-1.34c-.46-1.16-1.11-1.47-1.11-1.47c-.91-.62.07-.6.07-.6c1 .07 1.53 1.03 1.53 1.03c.87 1.52 2.34 1.07 2.91.83c.09-.65.35-1.09.63-1.34c-2.22-.25-4.55-1.11-4.55-4.92c0-1.11.38-2 1.03-2.71c-.1-.25-.45-1.29.1-2.64c0 0 .84-.27 2.75 1.02c.79-.22 1.65-.33 2.5-.33s1.71.11 2.5.33c1.91-1.29 2.75-1.02 2.75-1.02c.55 1.35.2 2.39.1 2.64c.65.71 1.03 1.6 1.03 2.71c0 3.82-2.34 4.66-4.57 4.91c.36.31.69.92.69 1.85V21c0 .27.16.59.67.5C19.14 20.16 22 16.42 22 12A10 10 0 0 0 12 2" />
                        </svg>
                    </a>
                    <a href="https://mail.google.com/mail/?view=cm&fs=1&to=hsfp@discente.ifpe.edu.br" rel="noopener noreferrer" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32" class="text-neutral-400">
                            <path fill="currentColor" d="M32 6v20c0 1.135-.865 2-2 2h-2V9.849l-12 8.62l-12-8.62V28H2c-1.135 0-2-.865-2-2V6c0-.568.214-1.068.573-1.422A1.97 1.97 0 0 1 2 4h.667L16 13.667L29.333 4H30c.568 0 1.068.214 1.427.578c.359.354.573.854.573 1.422" />
                        </svg>
                    </a>
                    <a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="text-neutral-400">
                            <path fill="currentColor" d="M20.47 2H3.53a1.45 1.45 0 0 0-1.47 1.43v17.14A1.45 1.45 0 0 0 3.53 22h16.94a1.45 1.45 0 0 0 1.47-1.43V3.43A1.45 1.45 0 0 0 20.47 2M8.09 18.74h-3v-9h3ZM6.59 8.48a1.56 1.56 0 1 1 0-3.12a1.57 1.57 0 1 1 0 3.12m12.32 10.26h-3v-4.83c0-1.21-.43-2-1.52-2A1.65 1.65 0 0 0 12.85 13a2 2 0 0 0-.1.73v5h-3v-9h3V11a3 3 0 0 1 2.71-1.5c2 0 3.45 1.29 3.45 4.06Z" />
                        </svg>
                    </a>
                </div>
            </div>

            <div class="flex flex-col w-full max-w-[380px] min-h-[500px] py-4">
                <div class="w-full h-[300px]  flex items-center justify-center overflow-hidden rounded-lg shadow-md">
                    <img src="{{ URL::asset('images/developer3.jpg') }}"
                        alt="Foto do Desenvolvedor"
                        class="w-full h-full object-cover">
                </div>

                <div class="w-full h-[180px] text-left mt-4">
                    <span class="font-primary font-medium text-neutral-600 text-2xl">Rafaela Neves</span>
                    <p class="font-secondary text-primary-400 text-lg">UI/UX Designer e Desenvolvedora Frontend</p>
                    <p class="w-full mt-1 font-secondary text-neutral-400 text-base text-justify">Ingressou na área de TI em 2023 no Curso de Sistemas para Internet no IFPE-Igarassu, atualmente no 3 período. Áreas de interesse: Design UX/UI e Frontend.</p>
                </div>

                <div class="flex gap-4 ">
                    <a href="https://github.com/rafxhs" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="text-neutral-400">
                            <path fill="currentColor" d="M12 2A10 10 0 0 0 2 12c0 4.42 2.87 8.17 6.84 9.5c.5.08.66-.23.66-.5v-1.69c-2.77.6-3.36-1.34-3.36-1.34c-.46-1.16-1.11-1.47-1.11-1.47c-.91-.62.07-.6.07-.6c1 .07 1.53 1.03 1.53 1.03c.87 1.52 2.34 1.07 2.91.83c.09-.65.35-1.09.63-1.34c-2.22-.25-4.55-1.11-4.55-4.92c0-1.11.38-2 1.03-2.71c-.1-.25-.45-1.29.1-2.64c0 0 .84-.27 2.75 1.02c.79-.22 1.65-.33 2.5-.33s1.71.11 2.5.33c1.91-1.29 2.75-1.02 2.75-1.02c.55 1.35.2 2.39.1 2.64c.65.71 1.03 1.6 1.03 2.71c0 3.82-2.34 4.66-4.57 4.91c.36.31.69.92.69 1.85V21c0 .27.16.59.67.5C19.14 20.16 22 16.42 22 12A10 10 0 0 0 12 2" />
                        </svg>
                    </a>
                    <a href="https://mail.google.com/mail/?view=cm&fs=1&to=rnb@discente.ifpe.edu.br" rel="noopener noreferrer" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32" class="text-neutral-400">
                            <path fill="currentColor" d="M32 6v20c0 1.135-.865 2-2 2h-2V9.849l-12 8.62l-12-8.62V28H2c-1.135 0-2-.865-2-2V6c0-.568.214-1.068.573-1.422A1.97 1.97 0 0 1 2 4h.667L16 13.667L29.333 4H30c.568 0 1.068.214 1.427.578c.359.354.573.854.573 1.422" />
                        </svg>
                    </a>
                    <a href="https://www.linkedin.com/in/rafaela-neves-346535219/" rel="noopener noreferrer" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="text-neutral-400">
                            <path fill="currentColor" d="M20.47 2H3.53a1.45 1.45 0 0 0-1.47 1.43v17.14A1.45 1.45 0 0 0 3.53 22h16.94a1.45 1.45 0 0 0 1.47-1.43V3.43A1.45 1.45 0 0 0 20.47 2M8.09 18.74h-3v-9h3ZM6.59 8.48a1.56 1.56 0 1 1 0-3.12a1.57 1.57 0 1 1 0 3.12m12.32 10.26h-3v-4.83c0-1.21-.43-2-1.52-2A1.65 1.65 0 0 0 12.85 13a2 2 0 0 0-.1.73v5h-3v-9h3V11a3 3 0 0 1 2.71-1.5c2 0 3.45 1.29 3.45 4.06Z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection
