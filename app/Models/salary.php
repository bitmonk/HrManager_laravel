<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'salarys'; // Replace 'salaries' with your actual table name

    /**
     * Indicates if the model's created_at timestamps are not used.
     *
     * @var bool
     */
    public $timestamps = false;

    // Assuming you have a relationship method for the User model
    public function user()
    {
        return $this->belongsTo(User::class,  'id');
    }
}
