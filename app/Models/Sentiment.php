<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sentiment extends Model
{
    use HasFactory;

    protected $fillable = ['message','sentiment'];

    public function getSentimentAttribute($value)
    {
        if($value == 1)
           return 'Neutrual';
        else if($value == 2)
            return 'Positive';
        else
            return 'Negative';
    }
}
