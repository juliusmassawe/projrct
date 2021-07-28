<?php

namespace App\Models\DVCA;

use App\Models\Admin\Level;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
