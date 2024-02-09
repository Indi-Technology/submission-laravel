<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleTag extends Model
{
    use HasFactory;

    protected $table = 'articles_tags';

    protected $fillable =
    [
        'id_articles',
        'id_tags'
    ];

    public function article()
    {
        return $this->hasMany(Article::class, 'id_articles');
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class, 'id_tags');
    }
}
