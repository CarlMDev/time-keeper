<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Hi {{ auth()->user()->name }}!
        </h2>
    </x-slot>
    <livewire:punch-in-out />
</x-app-layout>
