<div wire:poll.750ms>
    @php
    {{ $thisDate = new DateTime(date('H:i:s')); }}
    @endphp

    Current time: {{date_format($thisDate->setTimeZone(new DateTimeZone($userTimeZone)),"H:i:s"); }}  
</div>