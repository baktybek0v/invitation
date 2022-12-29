<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//use Laravel\Passport\HasApiTokens;
//use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $guard_name = 'bash';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'login',
        'phone',
        'email',
        'email_verified_at',
        'password',
        'event_bg_color',
        'event_text_color',
        'active',
        'department_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime'
    ];


    public function getRoleName()
    {
        return $this->getRoleNames()->first();
    }


    public function getDepartment()
    {
        $department = Department::find($this->department_id);
        if (isset($department)) return $department->name;
        else                    return '';
    }

    public function isAdmin() {
        if ($this->getRoleName() == 'Администратор') return true;
        else return false;
    }

    public function isUser() {
        if ($this->getRoleName() == 'Пользователь') return true;
        else return false;
    }

    public function isDriver() {
        if ($this->getRoleName() == 'Водитель') return true;
        else return false;
    }

    public function getStatus()
    {
        if($this->active == 0){
            return '<span class="text-warning font-weight-bold">Не активен</span>';
        }else{
            return '<span class="text-success font-weight-bold">Активен</span>';
        }
    }

}
