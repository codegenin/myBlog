<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates = ['published_at']; // Treat this field as a date

    /**
     * Set title field into a slug on post insert
     *
     * @param $title
     */
    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;

        // Check if no existing title
        if ( ! $this->exists ) {
            // Yeah! create slug of title
            $this->attributes['slug'] = str_slug($title);
        }
    }
}
