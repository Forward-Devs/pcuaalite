<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_id', 'avatar', 'email_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'admin' => 'boolean',
        'developer' => 'boolean',
    ];

    /**
     * Verify if the user is an administrator.
     *
     * @return boolean
     */
    public function isAdmin()
    {
        return $this->admin;
    }

    /**
     * Verify if the user is an developer.
     *
     * @return boolean
     */
    public function isDev()
    {
        return $this->developer;
    }

    /**
     * Get the tickets initiated by the user.
     *
     * @return App/Tickets
     */
    public function getTickets()
    {
        return $this->hasMany('Ticket');
    }

    /**
     * Obtain user activity on the web.
     *
     * @return App/Actividad
     */
    public function getActivity()
    {
        return $this->hasMany('Actividad');
    }


}
