<?php

namespace Ejntaylor\Vellum\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

        protected $fillable = [
            'title',
            'slug',
            'body'
        ];

        public function posts()
        {
            return $this->hasMany(Post::class);
        }

        public function getRouteKeyName()
        {
            return 'slug';
        }

}
