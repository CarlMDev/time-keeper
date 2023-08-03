<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Hi {{ auth()->user()->name }}!
        </h2>
        <livewire:current-time />
    </x-slot>
    <livewire:punch-in-out />
    <livewire:current-day-time-table />
</x-app-layout>
