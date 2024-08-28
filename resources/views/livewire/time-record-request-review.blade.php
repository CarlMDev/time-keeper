<div class="flex flex-col items-center pb-8 pt-2">
    <div class="flex justify-center pt-4">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                @if ($modification->modification_type == 'Edit')
                    <h2>{{$user->name}} requests a modification on a clock-{{$modification->in_out == 1 ?  "IN" : "OUT"}} record</h2>
                    @php
                        $existingDate = date_create($modification->existing_record_date_time);
                        $existingDate->setTimezone(new DateTimeZone($user->time_zone_name));

                        $requestedDate = date_create($modification->requested_record_date_time);
                        $requestedDate->setTimezone(new DateTimeZone($user->time_zone_name));
                    @endphp
                    <h2>The request involves changing the record's date/time from</h2>
                    <h2>{{date_format($existingDate, 'm/d/Y H:i:s')}}</h2>
                    <h2> - to -</h2>
                    <h2>{{date_format($requestedDate, 'm/d/Y H:i:s')}}</h2>
                @else
                    @php
                        $createDate = date_create($timeRecord->created_at);
                        $createDate->setTimezone(new DateTimeZone($user->time_zone_name));
                    @endphp
                    <h2>{{$user->name}} requests to delete a clock-{{$modification->in_out = 1 ?  "IN" : "OUT"}} record</h2>
                    <h2>Dated: {{date_format($createDate, 'm/d/Y H:i:s')}}</h2>
                @endif
            </div>
            <div class="my-2">
                <button wire:click='processRequest'
                    class="bg-green-500 text-white active:bg-red-600 font-bold uppercase text-xs px-4 py-2 rounded-full shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                    Process request
                </button>
                <a  href="{{ url()->previous() }}"
                    class="bg-red-500 text-white active:bg-emerald-600 font-bold uppercase text-xs px-4 py-2 rounded-full shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                    type="button">
                    Cancel
                </a>
            </div>
        </div>
    </div>
</div>