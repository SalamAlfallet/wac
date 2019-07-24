<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'birthday', 'avater', 'country', 'username', 'role_id', 'admin'
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

    public function routeNotificationForNexmo($notification)
    {
        return $this->mobile;
    }

    // public function sendPasswordResetNotification($token)
    // {
    //     $this->notify(new ResetPasswordNotification($token));
    // }
    protected $dates = ['birthday'];

    public function isSuperAdmin()
    {

        if ($this->admin == 1) {
            return true;
        }

        return false;
    }

    public function hasPerm($perm)
    {

        return DB::table('permissions')
       // ->select('count(permissions.*)')
            ->join('permission_roles', 'permission_roles.permission_id', '=', 'permissions.id')
            ->join('users', 'users.role_id', '=', 'permission_roles.role_id')
            ->where('users.id', $this->id)
            ->where('permissions.code', $perm)
            ->count();


        // return UserPerm::where('user_id', $this->id)->where('perm', $perm)->count();


    }
}
