<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content', 'category_id'];
    protected $table = 'blog';
    public function Categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
