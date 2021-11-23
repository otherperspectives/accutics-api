<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
    use HasFactory;

    protected $fillable = [
      'type',
      'value'
    ];


    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
