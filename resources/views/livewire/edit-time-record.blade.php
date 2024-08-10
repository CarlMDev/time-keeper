<div class="flex justify-center pt-4">
    <div class="grid grid-cols-1">

    @php
        {{$thisDate = new DateTime($recordDate); }}
    @endphp                        
        <div class="py-3">Current Record date: <span class="text-red-600">{{date_format($thisDate->setTimeZone(new DateTimeZone($userTzCode)),$dateFormat);}}</span></div>
        <div class="py-3">Current Record time: <span class="text-red-600">
        @if($time24HrFormat == false)
            {{date_format($thisDate->setTimeZone(new DateTimeZone($userTzCode)),"h:i a");}}
        @else
            {{date_format($thisDate->setTimeZone(new DateTimeZone($userTzCode)),"H:i");}}
        @endif
        
        </span></div>
       
            <div class="py-3">Select new date and time values:</div>
            <div class="py-5">
                <label for="record-date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date/time:</label>
                <input type="datetime-local" wire:model="requestedDateTime"  value=""  min="2000-01-01"
                    max="2100-12-31" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div class="py-5">
                <input type="text" wire:model="message"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Optional message"/>
            </div>
            <div class="my-2">
                <button wire:click="submitRequest"
                    class="bg-emerald-500 text-white active:bg-red-600 font-bold uppercase text-xs px-4 py-2 rounded-full shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                    Submit modification
                </button>
                <a href="{{ url('/dashboard') }}"
                    class="bg-red-500 text-white active:bg-emerald-600 font-bold uppercase text-xs px-4 py-2 rounded-full shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                    type="button">
                    Cancel
                </a>
            </div>

    </div>
</div>