<?php

namespace App\Models;

use App\Events\NewEntryReceivedEvent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContestEntry extends Model
{
    use HasFactory;

    protected $guarded = [];

    // // when it saves in to DB  we can fire event
    // protected static function booted()
    // {
    //     // we are attaching to created event
    //     static::created(function ($contestEntry) {
    //         // dd('test dispatch');
    //         NewEntryReceivedEvent::dispatch();
    //     });
    // }
}
