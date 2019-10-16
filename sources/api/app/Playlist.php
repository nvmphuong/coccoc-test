<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $table = 'playlists';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'source',
    ];
    protected $appends = ['image'];

    public function medias()
    {
        return $this->belongsToMany(Media::class);
    }

    public function artists()
    {
        return $this->hasManyThrough(Artist::class, Media::class);
    }

    public function getImageAttribute()
    {
        $firstMedia = $this->medias()->first();
        if ($firstMedia) {
            return $this->medias()->first()->image;
        }
        return null;
    }
}
