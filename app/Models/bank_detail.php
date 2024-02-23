<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bank_detail extends Model
{
    use HasFactory;

    /**
     * Indicates if the model's created_at timestamps are not used.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $fillable = [
        'u_id',  // Assuming 'u_id' is the user_id field
        'account_name',
        'account_number',
        'bank_name',
        // Add any other fields
    ];

}
