<x-form-section submit="updateTimeZone">
    <x-slot name="title">
        {{ __('Time zone setup') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your time zone here.') }}
    </x-slot>

    <x-slot name="form">
       
        <!-- Time Zone -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="time-zone" value="{{ __('Time zone') }}" />
            <select id="time-zone" class="'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm'" wire:model.defer="selectedTimeZone">
                @foreach ($timezones as $key => $value)
                <option value="{{$key}}">{{$value}}</option>
                @endforeach
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
