<?php

namespace Nuclear\Documents\Media;


use Illuminate\Database\Eloquent\Model as Eloquent;

class MediaTranslation extends Eloquent {

    public $timestamps = false;
    protected $fillable = ['caption', 'alttext', 'description'];

}