@extends('layouts.main')
@section('content')
    <section class='container mt-10'>
        <div class="flex flex-col overflow-y-auto md:flex-row border-2 rounded-lg">
            <div class="h-32 md:h-auto md:w-1/2">
                <img aria-hidden="true" class="object-cover w-full h-full" src="{{ asset('register.svg') }}"
                    alt="Office" />
            </div>
            <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                <div class="w-full">
                    <h1 class="mb-4 text-3xl text-center font-semibold text-gray-700">
                        Créer un compte <br>
                    </h1>
                    @include('partials.flasher')
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <!-- Input[ype="email"] -->
                        <div class="mt-4">
                            <x-label :value="__('Nom')" />
                            <x-input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}"
                                class="block w-full" required autofocus />
                            @error('first_name')
                                <span class='text-red-500'>{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="mt-4">
                            <x-label :value="__('Prénoms')" />
                            <x-input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}"
                                class="block w-full" required autofocus />
                            @error('last_name')
                                <span class='text-red-500'>{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="mt-4">
                            <x-label :value="__('E-mail')" />
                            <x-input type="email" id="email" name="email" value="{{ old('email') }}"
                                class="block w-full" required autofocus />
                            @error('email')
                                <span class='text-red-500'>{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="mt-4">
                            <x-label :value="__('Contact')" />
                            <x-input type="text" id="contact" name="contact" value="{{ old('contact') }}"
                                class="block w-full" required autofocus />
                            @error('contact')
                                <span class='text-red-500'>{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="mt-4">
                            <x-label :value="__("S'inscrire en tant que")" />
                            <select
                                class='rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full'
                                type="text" id="user_type_id" name="user_type_id" value="{{ old('user_type_id') }}"
                                class="block w-full" required autofocus>
                                <option {{ !old('user_type_id') ? 'selected' : '' }} value=''> Profil</option>
                                @foreach ($userTypes as $user_type)
                                    <option {{ old('user_type_id') == $user_type->id ? 'selected' : '' }}
                                        value="{{ $user_type->id }}">{{ $user_type->name }}</option>
                                @endforeach
                            </select>
                            @error('user_type_id')
                                <span class='text-red-500'>{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Input[ype="password"] -->
                        <div class="mt-4">
                            <x-label for="password" :value="__('Votre mot de passe')" />
                            <x-input type="password" id="password" name="password" class="block w-full" />
                            @error('password')
                                <span class='text-red-500'>{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="mt-4">
                            <x-label for="password_confirmation" :value="__('Confirmer votre mot de passe')" />
                            <x-input type="password" id="password_confirmation" name="password_confirmation"
                                class="block w-full" />
                            @error('password_confirmation')
                                <span class='text-red-500'>{{ $message }}</span>
                            @enderror

                        </div>
                    
                        <div class="mt-4">
                            <button
                                class='block items-center w-full text-center px-4 py-2 bg-blue-900 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-blue-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150'>
                                {{ __('Soumettre') }}
                            </button>
                        </div>
                    </form>
                    <hr class="my-8" />
                </div>
            </div>
        </div>
    </section>
@stop
