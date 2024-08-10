<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TimeRecordModification extends Model
{
    use HasFactory;

    public $requestedDateTime;

    protected $fillable = [
        'requested_record_date_time',
        'message',
    ];

    protected $casts = [
        'requested_record_date_time' => 'datetime:Y-m-d H:i:s'
    ];
 /*   public function setAttribute($key, $value)
    {
        if ($value instanceof CarbonInterface) {
            // Convert all carbon dates to app timezone
            $value = $value->clone()->setTimezone('UTC');
        } else if ($value instanceof DateTimeInterface) {
            // Convert all other dates to timestamps
            $value = $value->getTimestamp();
        }
        // They will be reconverted to a Carbon instance but with the correct timezone
        return parent::setAttribute($key, $value);
    }
        */
}
