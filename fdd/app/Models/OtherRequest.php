<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherRequest extends Model
{
    use HasFactory;
    protected $fillable=['name','message','phone','email','responded','about','slug'];
}
