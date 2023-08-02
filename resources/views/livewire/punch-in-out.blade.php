<div class="flex flex-col items-center">
    <p class="text-xl break-after-auto pb-8 pt-2">{{ $status }}</p>
    <button wire:click="toggle" class="{{$buttonStyle}}">
        {{ $buttonMessage }}
    </button>
</div>