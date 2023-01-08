<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Column extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];

    protected $hidden = ['updated_at'];


    public function cards(): HasMany
    {
        return $this->hasMany(Card::class);
    }
}
