<div class="flex justify-center pt-4">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <p class="pb-2 text-lg">Request from {{$employee->name}}</p>
                <table class="min-w-full text-left text-sm font-light">
                    <thead class="border-b bg-red-100 font-medium dark:border-neutral-500 dark:bg-neutral-600">
                        <tr>
                            @if($recordModification->modification_type == 'Edit')
                                <th scope="col" class="px-6 py-4">Existing Date</th>
                                <th scope="col" class="px-6 py-4">Existing Time</th>
                                <th scope="col" class="px-6 py-4">Event</th>
                            @else
                                <th scope="col" class="px-6 py-4">Date</th>
                                <th scope="col" class="px-6 py-4">Time</th>
                                <th scope="col" class="px-6 py-4">Event</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>

                        <tr class="border-b border-black bg-white dark:border-neutral-500 dark:bg-neutral-700">


                            <td class="whitespace-nowrap px-6 py-4 font-medium">
                                @php
                                    {{$recordDateTime = new DateTime($record->created_at); }}
                                @endphp

                                {{date_format($recordDateTime->setTimeZone(new DateTimeZone($userTzCode)),$dateFormat);}}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 font-medium">
                                @if($timeFormat == false)
                                    {{date_format($recordDateTime->setTimeZone(new DateTimeZone($userTzCode)),"h:i a");}}
                                @else
                                    {{date_format($recordDateTime->setTimeZone(new DateTimeZone($userTzCode)),"H:i");}}
                                @endif

                            </td>
                            <td class="whitespace-nowrap px-6 py-4 font-medium">
                                @if($record->in_out == 0)
                                    OUT
                                @else
                                    IN
                                @endif
                            </td>
                        </tr>
                        <br>
                    </tbody>
                </table>
                @if($recordModification->modification_type == 'Edit')
                <table class="min-w-full text-left text-sm font-light">
                    <thead class="border-b bg-red-100 font-medium dark:border-neutral-500 dark:bg-neutral-600">
                        <tr>
                            <th scope="col" class="px-6 py-4">Requested Date</th>
                            <th scope="col" class="px-6 py-4">Requested Time</th>
                            <th scope="col" class="px-6 py-4">Event</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr class="border-b border-black bg-white dark:border-neutral-500 dark:bg-neutral-700">


                            <td class="whitespace-nowrap px-6 py-4 font-medium">
                                @php
                                    {{$requestedRecordDateTime = new DateTime($recordModification->requested_record_date_time); }}
                                @endphp

                                {{date_format($requestedRecordDateTime->setTimeZone(new DateTimeZone($userTzCode)),$dateFormat);}}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 font-medium">
                                @if($timeFormat == false)
                                {{date_format($requestedRecordDateTime->setTimeZone(new DateTimeZone($userTzCode)),"h:i a");}}
                                @else
                                {{date_format($requestedRecordDateTime->setTimeZone(new DateTimeZone($userTzCode)),"H:i");}}
                                @endif

                            </td>
                            <td class="whitespace-nowrap px-6 py-4 font-medium">
                                @if($record->in_out == 0)
                                    OUT
                                @else
                                    IN
                                @endif
                            </td>
                        </tr>
                        <br>
                    </tbody>
                </table>
                @else
                    <br>
                    <h2>This record is to be deleted.</h2>
                @endif
                <div class="flex flex-col items-center pt-3 my-2">
                    <button wire:click='$emit("openModal", "confirm-record-mod-cancel", {{ json_encode(["recordModificationId" => $recordModification->id]) }})'
                        class="bg-red-500 text-white active:bg-red-600 font-bold uppercase text-xs px-4 py-2 rounded-full shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                        Cancel this request
                    </button>
                    <a  href="{{ url('/dashboard') }}"
                        class="bg-blue-500 text-white active:bg-emerald-600 font-bold uppercase text-xs px-4 py-2 rounded-full shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="button">
                        Go back
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>