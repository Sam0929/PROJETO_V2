<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class UserId extends Model
{
    use HasFactory;

    protected $fillable = [

        'UserId',
    ];

    public function user(){

    return $this->belongsTo(User::Class);
}

}
