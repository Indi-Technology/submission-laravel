<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function articles(){
        return $this->belongsToMany(Article::class, 'article_tags');
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function ($tag) {
            $tag->articles()->detach();

            if ($tag->articles()->count() === 0) {
                $tag->delete();
            }
        });
    }
}
