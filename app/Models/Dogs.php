<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dogs extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'height',
        'weight',
        'age',
        'image',
        'notes'
    ];
    // Define the inverse relationship if necessary
    public function appointments()
    {
        return $this->hasMany(Appointments::class, 'dog_id','id');
    }
}
