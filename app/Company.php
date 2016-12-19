<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {

    protected $fillable = [
        'name', 'user_id', 'images'
    ];

    public function setName($name)
    {
        $this->setAttribute('name', $name);
    }

    public function setUserId($userId)
    {
        $this->setAttribute('user_id', $userId);
    }

    public function setImage($images)
    {
        $this->setAttribute('images', $images);
    }

    public function getName()
    {
        $this->getAttribute('name');
    }

    public function getUserId()
    {
        $this->getAttribute('user_id');
    }

    public function getImage()
    {
        $this->getAttribute('images');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'user_id');
    }
}