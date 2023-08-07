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
                            <th scope="col" class="px-6 py-4">Total hours</th>
                            <th scope="col" class="px-6 py-4"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        {{ $hours = 0; }}
                        {{ $minutes = 0; }}
                        {{ $seconds = 0; }}
                        {{ $difference = 0; }}
                        {{ $totalHours = 0; }}
                        @endphp
                        @for($i = 0; $i < sizeof($records); $i++) @if($records[$i]->in_out == 0)
                            <tr class="border-b border-black bg-white dark:border-neutral-500 dark:bg-neutral-700">
                                @else
                            <tr class="border-b border-black bg-cyan-100 dark:border-neutral-500 dark:bg-neutral-700">
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

                                @if($records[$i]->in_out == 0 && $records[$i-1]->in_out == 1 && $i > 0)
                                @php
                                {{ $firstDate = new DateTime($records[$i-1]->created_at); }}
                                {{ $secondDate = new DateTime($records[$i]->created_at); }}
                                {{ $difference = date_diff($firstDate, $secondDate, true); }}
                                {{ $hours = $difference->h; }}
                                {{ $minutes = $difference->i; }}
                                {{ $seconds = $difference->s; }}


                                {{ $minutes += $seconds/60; }}

                                {{ $hours += $minutes/60; }}
                                {{ $hours = 0.01 * (int)($hours * 100); }}
                                {{ $totalHours += $hours; }}
                                @endphp
                                @endif

                                <td class="whitespace-nowrap px-6 py-4 font-medium">
                                    {{ $totalHours }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 font-medium">
                                    <button
                                        class="bg-lime-500 text-white active:bg-lime-600 font-bold uppercase text-xs px-4 py-2 rounded-full shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                                        <a href="{{ url('/time-record-edit/' . $records[$i]->id) }}">Request modification</a>
                                    </button>
                                </td>
                            </tr>
                            @endfor
                    </tbody>
                </table>
                <div class="pt-3 flex justify-center">
                    <span>Total: {{$totalHours}} hours</span>
                </div>
            </div>
        </div>
    </div>
</div>