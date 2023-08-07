<div class="flex flex-col items-center pb-8 pt-2">
    <select  wire:model="selectedPeriod" class="'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm'">
        <option value="1">Yesterday</option>
        <option value="5">Last 5 days</option>
        <option value="20">Last 20 days</option>
        <option value="30">Last 30 days</option>
        <option value="60">Last 60 days</option>
        <option value="90">Last 90 days</option>
    </select>

    <div class="flex justify-center pt-4">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b bg-red-100 font-medium dark:border-neutral-500 dark:bg-neutral-600">
                            <tr>
                                <th scope="col" class="px-6 py-4">Date</th>
                                <th scope="col" class="px-6 py-4">Time</th>
                                <th scope="col" class="px-6 py-4">Event</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(sizeof($records) > 0)
                            @for ($i = 0; $i < sizeof($records); $i++)
                            @if($records[$i]->in_out == 0)
                                <tr class="border-b border-black bg-white dark:border-neutral-500 dark:bg-neutral-700">
                                    @else
                                <tr
                                    class="border-b border-black bg-cyan-100 dark:border-neutral-500 dark:bg-neutral-700">
                                    @endif

                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                        @php
                                        {{$thisDate = new DateTime($records[$i]->created_at); }}
                                        @endphp

                                        {{date_format($thisDate->setTimeZone(new DateTimeZone($userTz)),$dateFormat);}}
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                        @if($timeFormat == false)
                                        {{date_format($thisDate->setTimeZone(new DateTimeZone($userTz)),"h:i a");}}
                                        @else
                                        {{date_format($thisDate->setTimeZone(new DateTimeZone($userTz)),"H:i");}}
                                        @endif

                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                        @if($records[$i]->in_out == 0)
                                        OUT
                                        @else
                                        IN
                                        @endif
                                    </td>
                                </tr>
                            @endfor
                            
                            {{ $records->links() }}
                            <br>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>