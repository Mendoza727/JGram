<?php

namespace App\Models;

use App\Models\Comentario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->select(['name', 'username', 'imagenPerfil']);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function like()
    {   
        return $this->hasMany(Like::class);
    }

    public function checkLike(User $user)
    {
        return $this->like->contains('user_id', $user->id);
    }
}
