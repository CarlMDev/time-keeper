<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Time Record Modify
        </h2>
    </x-slot>
    <livewire:time-record-modify recordId="{{$id}}" />
</x-app-layout>