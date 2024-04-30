<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    use HasFactory;

    protected $fillable = [
        'datetime',
        'pickup_address',
        'postcode',
        'status',
        'user_id',
        'dog_id',
        'caretaker_id'
    ];
    public function dogs()
    {
        return $this->belongsTo(Dogs::class, 'dog_id','id');
    }
}
