<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Review record modification request
        </h2>
    </x-slot>
    <livewire:time-record-request-review id="{{$id}}" />
</x-app-layout>