@props(['label', 'value', 'icon' => 'user', 'color' => 'indigo-500'])

<!-- Card: Simple Widget with Icon -->
<div
    class="flex flex-col rounded-2xl border-4 border-indigo-500 shadow-lg bg-white overflow-hidden hover:shadow-sm hover:cursor-pointer">
    <!-- Card Body: Simple Widget with Icon -->
    <div class="p-5 lg:p-6 flex-grow w-full flex justify-between items-center">
        <div class="flex justify-center items-center w-16 h-16 border-2  rounded-2xl border-primary-900 bg-base-300">
            <x-icon name="{{ $icon }}" class="w-8 h-8 text-primary-900" />
        </div>
        <dl class="text-right">
            <dt class="text-4xl font-bold text-primary-900">
                {{ $value }}
            </dt>
            <hr class='w-full border-2 bg-accent'>
            <dd class="uppercase font-extrabold text-xl text-primary-900 tracking-wider">
                {{ $label }}
            </dd>
        </dl>
    </div>
    <!-- END Card Body: Simple Widget with Icon -->
</div>
