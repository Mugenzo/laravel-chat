<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $fillable = [
        'name',
        'owner'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_channel');
    }

    public function messages()
    {
        return $this->hasMany(Message::class)->with('user');
    }
}
