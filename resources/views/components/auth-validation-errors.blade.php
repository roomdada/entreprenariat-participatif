@props(['errors'])

@if ($errors->any())
    <!-- Danger Alert -->
    <div {{ $attributes->merge(['class' => 'p-4 md:p-5 rounded text-red-700 bg-red-100']) }}>
        <div class="flex items-center mb-3">
            <svg class="hi-solid hi-x-circle inline-block w-5 h-5 mr-3 flex-none text-red-500" fill="currentColor"
                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                    clip-rule="evenodd" />
            </svg>
            <h3 class="font-semibold">
                Veuillez corriger les erreurs suivantes:
            </h3>
        </div>
        <ul class="list-inside ml-8 space-y-2">
            @foreach ($errors->all() as $error)
                <li class="flex items-center">
                    <svg class="hi-solid hi-arrow-narrow-right inline-block w-4 h-4 flex-none mr-2" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
    <!-- END Danger Alert -->
@endif
