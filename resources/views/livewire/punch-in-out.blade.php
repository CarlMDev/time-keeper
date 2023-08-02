<div class="flex flex-col items-center">
    <p class="text-xl">{{ $status }}</p>
    <br>
    <br>
    <button wire:click="toggle" class="{{ $buttonStyle }}">
    {{ $buttonMessage }}
    </button>
</div>