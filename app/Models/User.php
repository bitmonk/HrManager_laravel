<?php

namespace App\Models;

use App\Models\position;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\address;
use App\Models\level;
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Indicates if the model's created_at timestamps are not used.
     *
     * @var bool
     */
    public $timestamps = false;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'email', 'password','date_of_birth','phone1','phone2','blood_group_id','health_condition','position_id','level_id','image','join_date',

    ];

    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        if (is_null($this->last_name)) {
            return "{$this->name}";
        }

        return "{$this->name} {$this->last_name}";
    }

    /**
     * Set the user's password.
     *
     * @param string $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }



    public function punchIns()
    {
        return $this->hasMany(PunchIn::class);
    }
    
    public function address()
    {
        return $this->hasOne(Address::class, 'u_id', 'id');
    }
// User model
    public function position()
    {
        return $this->belongsTo(position::class, 'id');
    }

    public function permanentAddress()
    {
        return $this->hasOne(Address::class, 'u_id')->where('type', 'permanent');
    }

    public function temporaryAddress()
    {
        return $this->hasOne(Address::class, 'u_id')->where('type', 'temporary');
    }

    public function emergencyContact()
    {
        return $this->hasOne(emergency_contact::class, 'u_id');
    }
    public function level()
    {
        return $this->belongsTo(level::class, 'level_id');
    }
    public function salaries()
    {
        return $this->hasMany(Salary::class, 'u_id');
    }
    public function bankDetails()
    {
        return $this->hasOne(bank_detail::class, 'u_id');
    }

}
