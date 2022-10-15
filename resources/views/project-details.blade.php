@extends('layouts.main')
@section('content')
    <section class='mt-16 container'>
        <h1 class='text-center text-3xl'>Details du projet</h1>
        <div class='mt-2  border-2 border-primary py-12 px-4'>
            <div class='flex justify-between'>
                <span>{{ $project->title }}</span>
                <span>{{ $project->domaine->name }}</span>
            </div>
            <hr class='mt-2 mb-4'>
            <div class='flex justify-between mb-4'>
                <span>Publié : {{ $project->created_at->diffForHumans() }}</span>
                <span>{{ $project->amount }} FCFA a collecté/5000 FCFA Recolté</span>
            </div>
            <img src="https://cdn.tailgrids.com/1.0/assets/images/portfolio/portfolio-01/image-01.jpg" alt="portfolio"
                class="object-cover h-48 w-full" />
            <p class='mt-10'>{{ $project->description }}</p>
            @if (auth()->user())
                @include('partials.flasher')
                <div>
                    <livewire:projects.contribute :project="$project" />
                </div>
            @endif
            @if (!auth()->user())
                <div class='w-full py-4 bg-red-300 px-4 font-bold mt-4'>
                    Vous devez vous connecter pour participer
                </div>
            @endif
        </div>
    </section>
@stop
