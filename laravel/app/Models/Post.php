<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'body',
        'file_id',
        'latitude',
        'longitude',
        'visibility_id',
        'author_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function file()
    {
       return $this->hasOne(File::class);
    }
    


}
