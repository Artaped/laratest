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
        'name', 'email', 'password', 'admin', 'status'
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
     * check user role
     *
     * @return integer 1 or 0
     */
    public function isAdmin()
    {
        return $this->admin;
    }

    /**
     * get user status
     *
     * @return integer 1 or 0
     */
    public function getStatus()
    {
        return $this->status;
    }

    public function news()
    {
        return $this->belongsToMany(News::class, 'user_news');
    }

    /**
     * delete User
     *
     * @throws \Exception
     */
    public function remove()
    {
        $this->delete();
    }

    /**
     * create new user
     *
     * @param $filds
     * @return User
     */
    public static function add($filds)
    {

        $user = new static;
        $user->fill($filds);
        $user->save();
        return $user;
    }

    /**
     * edit User
     * @param $fields
     */
    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    /**
     *
     * @param $data
     */
    public function setNews($data)
    {
        if ($data == null) {
            return;
        }
        $this->news()->sync($data);
    }
}
