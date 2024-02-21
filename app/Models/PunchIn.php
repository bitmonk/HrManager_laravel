<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PunchIn extends Model
{
    use HasFactory;

    protected $fillable = ['punch_in_time', 'punch_out_time','to_do', 'task_completed'];

    /**
     * Get the user that owns the punch-in record.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}