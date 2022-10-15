<nav class="hidden space-x-10 md:flex">
    <a href="{{ route('home') }}" class="text-base font-medium text-gray-500 hover:text-gray-900">Acceuil</a>
    <a href="{{ route('about') }}" class="text-base font-medium text-gray-500 hover:text-gray-900">Qui sommes nous
        ?</a>
    <a href="{{ route('faq') }}" class="text-base font-medium text-gray-500 hover:text-gray-900">Faq</a>
    <a href="{{ route('projects') }}" class="text-base font-medium text-gray-500 hover:text-gray-900">Projets</a>
</nav>
<div class="hidden items-center justify-end md:flex md:flex-1 lg:w-0">
  @if(! auth()->user())
  <a href="{{ route('login') }}"
      class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900">Se
      connecter</a>
  <a href="{{ route('register') }}"
      class="ml-8 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700">ouvrir
      un compte</a>
      @else
      <a href="{{ route('dashboard') }}"
      class="ml-8 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700">
      Mon compte</a>
  @endif
</div>
