<div class="flex flex-col items-center pb-8 pt-2">
    <div class="flex justify-center pt-4">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b bg-red-100 font-medium dark:border-neutral-500 dark:bg-neutral-600">
                            <tr>
                                <th scope="col" class="px-6 py-4">Employee Name</th>
                                <th scope="col" class="px-6 py-4">Type</th>
                                <th scope="col" class="px-6 py-4">Date/time</th>
                                <th scope="col" class="px-6 py-4">Event</th>
                                <th scope="col" class="px-6 py-4"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(sizeof($recordList) > 0)
                            @for ($i = 0; $i < sizeof($recordList); $i++)
                                <tr class="border-b border-black bg-white-100 dark:border-neutral-500 dark:bg-neutral-700">

                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                        {{$recordList[$i]->name}}
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                        {{$recordList[$i]->modification_type}}
                                    </td>

                                    @php
                                        $createdDate = date_create($recordList[$i]->created_at);
                                        $createdDate->setTimezone(new DateTimeZone($recordList[$i]->tz_code))
                                    @endphp

                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                        {{ date_format($createdDate, 'm/d/Y H:i:s') }}
                                    </td>

                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                        {{$recordList[$i]->in_out == 1 ? "IN" : "OUT" }}
                                    </td>


                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                        <a  href="{{ route('time-record-mod-request-review', ['id' => $recordList[$i]->id]) }}"
                                            class="bg-cyan-600 text-white active:bg-cyan-200 font-bold uppercase text-xs px-4 py-2 rounded-full shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                            type="button">
                                            Review request
                                        </a>
                                    </td>
                                   
                                </tr>
                            @endfor
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>