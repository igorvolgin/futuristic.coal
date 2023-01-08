<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Card extends Model
{
    public function column(): BelongsTo
    {
        return $this->belongsTo(Card::class);
    }
}
