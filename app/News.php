<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class News extends Model
{
    use Notifiable;

    protected $fillable = [
        'title', 'text', 'status',
    ];

    /**
     * create news
     *
     * @param $fields
     * @return News
     */
    public static function add($fields)
    {
        $news = new static;
        $news->fill($fields);
        $news->user_id = Auth::user()->id;
        $news->save();
        return $news;
    }

    /**
     * edit News
     * @param $fields
     */
    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    /**remove News
     * @throws \Exception
     */
    public function remove()
    {
        $this->delete();
    }

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'user_news',
            'news_id',
            'user_id'
        );
    }
    public function setUsers($date)
    {
        if ($date == null) {
            return;
        }
        $this->users()->sync($date);
    }

    /**
     * get users name
     * @return string
     */
    public function getUsersNames()
    {
        return (!$this->users()->isEmpty())
            ? implode(', ', $this->users->pluck('name')->all())
            : 'Not any users';
    }

}
