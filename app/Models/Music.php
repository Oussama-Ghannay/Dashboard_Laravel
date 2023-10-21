<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Type;

class Music extends Model
{
    use HasFactory;

    protected $table = 'musics';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'album','audio','type_id'];


    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
   

   




}
