<div class="p-4">
    <h3 class="mb-4">
        Are you sure you want to delete this record?
    </h3>
    <div class="flex justify-end">
        <div class="mr-4">
            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
            <a href="{{ url('/time-record-delete-confirmation/' . $recordId) }}">Yes</a>
            </button>
        </div>
        <div>
            <button wire:click="$emit('closeModal')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                No
            </button>
        </div>
    </div>
</div>