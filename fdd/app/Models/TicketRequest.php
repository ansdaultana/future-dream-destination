<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketRequest extends Model
{
    use HasFactory;
    protected $fillable=[  
    'name',
    'email',
    'phone'  ,
    'no_of_adults',
    'no_of_children',
    'from',
    'to',
    'booking_date',
    'responded'];
}
