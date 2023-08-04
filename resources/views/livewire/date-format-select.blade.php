<x-form-section submit="updateTimeZone">
    <x-slot name="title">
        {{ __('Date Format') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your preferred date format here.') }}
    </x-slot>

    <x-slot name="form">
       
        <!-- Time Zone -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="date-format" value="{{ __('Date Format') }}" />
            <select id="date-format" class="'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm'" wire:model.defer="setDateFormat">
                <option value="M/d/Y">M/d/Y</option>
                <option value="d/M/Y">d/M/Y</option>
                <option value="d.M.Y">d.M.Y</option>
            </select>
            <x-input-error for="time-zone" class="mt-2" />
        </div>

        
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="timeZone">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>