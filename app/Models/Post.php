<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'tags', 'image', 'content'];

    public function scopeFilter($query, array $filters) {
        if($filters['tag'] ?? false) {
            $query->select('posts.id', 'posts.title', 'posts.content')
                ->leftJoin('post_tag','posts.id','=','post_tag.post_id')
                ->leftJoin('tags','post_tag.tag_id','=','tags.id')
                ->where('tags.name', 'like',request('tag'))
                ->groupBy('posts.id','posts.title','posts.content')
                ->latest('posts.created_at');
        }

        if($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%');
        }
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
