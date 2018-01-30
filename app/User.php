<?php

namespace App;

use App\Models\Supervisor;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Silber\Bouncer\Database\HasRolesAndAbilities;

use App\Models\OfficeEntity;

class User extends Authenticatable
{
    use Notifiable, HasRolesAndAbilities;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name', 'email', 'employee_id', 'password', 'sex',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function setValues($fullName, $email, $employee_id, $sex, $id = null)
    {
        $this->id = $id;
        $this->full_name = $fullName;
        $this->email = $email;
        $this->employee_id = $employee_id;
        $this->sex = $sex;
    }

    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class);
    }

    public function office_entities()
    {
        return $this->hasMany(OfficeEntity::class);
    }

    public function voucher()
    {
        return $this->belongsTo(User::class);
    }
}
