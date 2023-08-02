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
                    {{date_format($records[$i]->created_at->setTimeZone('Turkey'),"m/d/Y");}}
                </td>
                <td class="px-2">
                    {{date_format($records[$i]->created_at->setTimeZone('Turkey'),"H:i");}}
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
                        {{ $difference = date_diff($records[$i-1]->created_at, $records[$i]->created_at, true); }}
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