<footer class="flex items-center justify-center w-full bg-primary-700 h-[400px]">
  <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between pt-10">
      <a href="{{ route('/') }}">
        <img src="{{URL::asset('images/logo-cor-branca-primaria-horizontal.svg')}}" alt="Logo" class="h-8 w-auto object-contain">
      </a>

      <div class="justify-between gap-4 md:grid-cols-2 mb-14">
        <div class="grid justify-between grid-cols-3 gap-10">
          <ul>
            <p class="block mb-1 text-base font-semibold  text-primary-200">
              Funcionalidades
            </p>
            <li>
              <a href="#" class="block text-neutral-100 py-1 hover:text-slate-500 focus:text-slate-500 text-sm">
                Textos
              </a>
            </li>
            <li>
              <a href="#" class="block text-neutral-100 py-1 hover:text-slate-500 focus:text-slate-500 text-sm">
                Flashcards
              </a>
            </li>
          </ul>
          <ul>
            <p class="block mb-1 text-base font-semibold text-primary-200">
              Suporte
            </p>
            <li>
              <a href="#" class="block text-neutral-100 py-1 hover:text-slate-500 focus:text-slate-500 text-sm">
                Segurança
              </a>
            </li>
            <li>
              <a href="#" class="block text-neutral-100 py-1 hover:text-slate-500 focus:text-slate-500 text-sm">
                Termos & Privacidade
              </a>
            </li>
          </ul>
          <ul>
            <p class="block mb-1 text-base font-semibold text-primary-200">
              Empresa
            </p>
            <li>
              <a href="#" class="block text-neutral-100 py-1 hover:text-slate-500 focus:text-slate-500 text-sm">
                Sobre nós
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="flex flex-col items-center justify-center w-full py-8 mt-10 border-t border-slate-200 md:flex-row md:justify-between">
      <p class="block mb-4 text-sm text-center text-white md:mb-0">
        © {{ date('Y') }}
        <a href="https://material-tailwind.com/">FluencyPath</a>. Todos
        os direitos reservados.
      </p>
    </div>
  </div>
</footer>
