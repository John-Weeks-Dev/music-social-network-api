<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'image',
        'title',
        'description',
        'loaction',
    ];

    /**
     * Get the user associated with the post.
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
