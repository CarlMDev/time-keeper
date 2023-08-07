<div class="flex flex-col items-center">
    <p class="{{$statusStyle}}">{{ $status }}</p>
    <button wire:click="toggle" class="{{$buttonStyle}}">
        {{ $buttonMessage }}
    </button>
</div>