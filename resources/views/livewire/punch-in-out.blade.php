    <div x-data="{ open: false }" class="flex flex-col items-center">
        <p
            x-bind:class="{'text-xl break-after-auto pb-8 pt-2 text-green-700' : ! open , 'text-xl break-after-auto pb-8 pt-2 text-red-600': open}  ">
            {{ $status }}</p>
        <br>

        <div>
            <button wire:click="toggle" @click="open = ! open"
                x-bind:class="{'bg-red-500 text-white hover:bg-green-200 hover:text-black font-bold py-2 px-4 rounded' : ! open , 'bg-green-500 text-white hover:bg-red-200 hover:text-black font-bold py-2 px-4 rounded': open}  ">
                {{ $buttonMessage }}
            </button>
        </div>
    </div>