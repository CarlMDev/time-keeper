<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Edit Time Record
        </h2>
    </x-slot>
    <livewire:edit-time-record recordId="{{$id}}" />
</x-app-layout>