<div wire:poll.750ms>
    @php
    {{ $thisDate = new DateTime(date('H:i:s')); }}
    @endphp
    @if($hourFormat == true)
        Current time: {{date_format($thisDate->setTimeZone(new DateTimeZone($userTimeZone)),"H:i:s"); }}
    @else
        Current time: {{date_format($thisDate->setTimeZone(new DateTimeZone($userTimeZone)),"h:i:s a"); }}
    @endif
</div>