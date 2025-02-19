<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commento extends Model
{
    use HasFactory;
    protected $fillable = ['contenuto','user_id','evento_id'];
     // Method of Author mode
     public function user() {
        // the property $evento->user returns an object of type User
        return $this->belongsTo(User::class,'user_id','id');
    }
     // Method of Author mode
     public function evento() {
        // the property $commmento->evento returns an object of type evento
        return $this->belongsTo(Evento::class,'evento_id','id');
    }
}
