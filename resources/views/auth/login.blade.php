@extends('layouts.main')
@section('content')
    <section class='container mt-10'>
        <div class="flex flex-col overflow-y-auto md:flex-row border-2 rounded-lg">
            <div class="h-32 md:h-auto md:w-1/2">
                <img aria-hidden="true" class="object-cover w-full h-full"
                    src="https://dh-ui.s3.amazonaws.com/assets/team.png" alt="Office" />
            </div>
            <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                <div class="w-full">
                    <h1 class="mb-4 text-3xl text-center font-semibold text-gray-700">
                        Veuillez vous connecter<br> a votre espace
                    </h1>

                    <x-auth-validation-errors :errors="$errors" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Input[ype="email"] -->
                        <div class="mt-4">
                            <x-label :value="__('Email')" />
                            <x-input type="email" id="email" name="email" value="{{ old('email') }}"
                                class="block w-full" required autofocus />
                        </div>
                        <!-- Input[ype="password"] -->
                        <div class="mt-4">
                            <x-label for="password" :value="__('Votre mot de passe')" />
                            <x-input type="password" id="password" name="password" class="block w-full" />
                        </div>
                        <div class="flex mt-6 text-sm">
                            <label class="flex items-center dark:text-gray-400">
                                <input type="checkbox" name="remember"
                                    class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple">
                                <span class="ml-2">{{ __('Se souvenir de moi') }}</span>
                            </label>
                        </div>
                        <div class="mt-4">
                            <button
                                class='block items-center w-full text-center px-4 py-2 bg-blue-900 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-blue-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150'>
                                {{ __('Connexion') }}
                            </button>
                        </div>
                    </form>
                    <hr class="my-8" />
                    @if (Route::has('password.request'))
                        <p class="text-center">
                            <a class="text-sm font-medium text-black hover:underline"
                                href="{{ route('password.request') }}">
                                {{ __('Mot de passe oublié?') }}
                            </a>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </section>
@stop
