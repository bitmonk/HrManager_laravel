<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
     // Define the table associated with the model
     protected $table = 'leave';

     // Define fillable attributes
     protected $fillable = [
         'name', 'date', // Add more fields as needed
     ];

     public function user()
     {
        return $this->belongsTo(User::class, 'user_id');
     }
}
