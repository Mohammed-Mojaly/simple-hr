<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;


    protected $fillable = [
        'name',
        'email',
        'username',
        'id_number',
        'fullname',
        'salary',
        'phone',
        'avatar',
        'is_work',
        'gender',
        'roles_name',
        'postion_id',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
        'roles_name' => 'array',
    ];


    public function postion()
    {
        return $this->belongsTo(Postions::class);
    }


    public function reports()
    {
        return $this->hasMany(EmployeesReport::class);
    }




    public function complaints()
    {
        return $this->hasMany(Complaints::class);
    }

    public function status()
    {
        return $this->is_work == '1' ? '<label class="badge badge-success" style="font-size:15px">Working</label>' : '<label class="badge badge-warning" style="font-size:15px">Not Work</label>';
    }

    public function userImage()
    {
        return $this->user_image != '' ? asset('assets/users/' .$this->user_image) : asset('assets/users/default_avatar.svg');
    }

}
