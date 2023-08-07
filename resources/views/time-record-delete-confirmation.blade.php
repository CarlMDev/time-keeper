<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Time Deletion Confirmation {{$id}}
        </h2>
    </x-slot>
    <livewire:record-delete-request-sent recordId="{{$id}}" />
</x-app-layout>