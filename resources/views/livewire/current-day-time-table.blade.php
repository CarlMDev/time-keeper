<div class="flex flex-col items-center py-4">
    <table class="table-autoborder-collapse border border-slate-400">
        <thead>
            <tr>
                <th class="border border-slate-300 ...">Date</th>
                <th class="border border-slate-300 ...">Time</th>
                <th class="border border-slate-300 ...">Event</th>
                <th class="border border-slate-300 ...">Hours</th>
            </tr>
        </thead>
        <tbody>
            @php
                {{ $hours = 0; }}
                {{ $minutes = 0; }}
                {{ $seconds = 0; }}
                {{ $difference = 0; }}
            @endphp
            @for($i = 0; $i < sizeof($records); $i++) <tr>
                <td class="px-2">
                    @php
                        {{$thisDate = new DateTime($records[$i]->created_at); }}    
                    @endphp
                    {{date_format($thisDate->setTimeZone(new DateTimeZone($userTz)),"m/d/Y");}}
                </td>
                <td class="px-2">
                    {{date_format($thisDate->setTimeZone(new DateTimeZone($userTz)),"H:i");}}
                </td>
                <td class="px-2">
                    @if($records[$i]->in_out == 0)
                        OUT
                    @else
                        IN
                    @endif
                </td>

                @if($records[$i]->in_out == 0 && $records[$i-1]->in_out == 1 && $i > 0)
                    @php
                        {{$firstDate = new DateTime($records[$i-1]->created_at); }}
                        {{$secondDate = new DateTime($records[$i]->created_at); }}
                        {{ $difference = date_diff($firstDate, $secondDate, true); }}
                        {{ $hours += $difference->h; }}
                        {{ $minutes += $difference->i; }}
                        {{ $seconds += $difference->s; }}
                        
                        {{ $minutes += $seconds/60; }}

                        {{ $hours += $minutes/60; }}
                        {{ $hours = 0.01 * (int)($hours * 100); }}
                    @endphp
                @endif

                <td class="px-2">
                    {{ $hours }}
                </td>
                </tr>
                @endfor
        </tbody>
    </table>
    Total: {{$hours}} hours 
</div>