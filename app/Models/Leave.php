<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
     // Define the table associated with the model
     protected $table = 'leaves';

     // Define fillable attributes
     protected $fillable = [
         'name', 'date', // Add more fields as needed
     ];
}
