<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'title', 'body', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    public function getRouteKeyName()
    {
        return 'title';
    }

    public function isAnswered()
    {
        return Answer::where('user_id', auth()->user()->id)
            ->where('question_id', $this->id)
            ->exists();
    }
}
