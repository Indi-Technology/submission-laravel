<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    protected $fillable =
    [
        'title',
        'content',
        'image',
        'id_categories'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_categories');
    }

    public function articleTag()
    {
        return $this->hasMany(ArticleTag::class, 'id_articles');
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }
}
