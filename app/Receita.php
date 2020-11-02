<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Receita extends Model
{
    protected $fillable = ['name', 'ingredientes', 'preparacao', 'imagem', 'categoria_id'];

    public function categoria()
    {
        return $this->belongsTo(CategoriaReceita::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes_receita');
    }

    public function deleteImage()
    {
        Storage::delete($this->imagem);
    }
}
