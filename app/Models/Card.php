<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Card extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'column_id'];

    protected $hidden = ['updated_at'];

    public function column(): BelongsTo
    {
        return $this->belongsTo(Card::class);
    }
}
