<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use Notifiable;

    protected $fillable = [
        'title', 'text', 'status',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_news');
    }

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
        $news->save();
        return $news;
    }

    /**
     * edit News
     *
     * @param $fields
     */
    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    /**remove News
     *
     * @throws \Exception
     */
    public function remove()
    {
        $this->delete();
    }

    /**
     * @param $data
     */
    public function setUsers($data)
    {
        if ($data == null) {
            return;
        }
        $this->users()->sync($data);
    }

}
