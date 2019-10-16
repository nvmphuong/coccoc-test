<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'medias';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
        , 'source'
        , 'type'
        , 'url'
        , 'key'
        , 'image'
    ];

    public function playlists()
    {
        return $this->belongsToMany(Playlist::class);
    }

    public function artists()
    {
        return $this->belongsToMany(Artist::class ,'media_artist');
    }
}
