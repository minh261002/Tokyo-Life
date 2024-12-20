<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use HasFactory, NodeTrait, Sluggable;

    protected $table = 'categories';

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();
    }
    public function isPublished()
    {
        return $this->status == 2;
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_catalogue_posts', 'post_catalogue_id', 'post_id');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 2);
    }
}