<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           View modification request
        </h2>
    </x-slot>
    <livewire:time-record-modify-view recordId="{{$id}}" />
</x-app-layout>