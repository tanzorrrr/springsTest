<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Scalar\String_;
use Illuminate\Support\Str;


class Post extends Model
{
    protected $fillable=['title','slug','text','autors[]'];

    public function setSlugAttribute($value) {
        $this->attributes['slug'] = Str::slug( mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
