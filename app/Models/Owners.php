<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owners extends Model
{
    use HasFactory;

    protected $table = "owners";

    /**
    * The primary key associated with the table
    *
    * @var string
    */

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */

    protected $fillable = [
        'firstname',
        'lastname',
        'contact',
        'address_line2',
        'address_line2',
        'postcode',
        'email',
        'password'
    ];

    /**
     * Indicates if the model should be timestamped.
     * 
     * @var bool
     */
    public $timestamp = true;

    /**
     * The accessors to append to the modelarray form. 
     *
     * @var array
     */
    protected $appends = ['full_name'];

    /**
     * function to get full name of owner
     */

    function getOwnerFullName() {
        return $this->firstname . ' ' . $this->lastname;
      }
}
