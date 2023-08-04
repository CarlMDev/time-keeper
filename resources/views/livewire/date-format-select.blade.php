<x-form-section submit="setDateFormat">
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
            <select id="date-format" class="'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm'" wire:model.defer="selectedDateFormat">
                <option value="m/d/Y">m/d/Y</option>
                <option value="d/m/Y">d/m/Y</option>
                <option value="d.m.Y">d.m.Y</option>
            </select>
            <x-input-error for="date-format" class="mt-2" />
        </div>

        
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="selectedDateFormat">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>