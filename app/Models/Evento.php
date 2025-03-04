<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Evento extends Model
{
    use HasFactory;
    protected $table = "evento";
    protected $fillable = ['titolo', 'contenuto', 'immagine', 'user_id', 'data'];

    protected $dates = ['data'];

    // Method of Author mode
    public function user() {
        // the property $evento->user returns an object of type User
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function commenti(){
        return $this->hasMany(Commento::class, 'evento_id', 'id');
    }
}