<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserModel;

class LevelModel extends Model
{
   protected $table = 'm_levels';
    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class);
    }
}
