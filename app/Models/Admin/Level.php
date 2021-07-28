<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Programme;


class Level extends Model
{
    use HasFactory;

    public function programme(){
        return $this->hasMany(Programme::class);
    }

}
