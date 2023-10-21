<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use  App\Models\Music;

class Type extends Model
{
    use HasFactory;

    protected $table = 'types';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];

    public function musics()
    {
        return $this->hasMany(Music::class, 'type_id');
    }
}
