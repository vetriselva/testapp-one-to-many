<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ["brand_name","slug"];
    public function category() {
        return $this->hasMany(brand::class);
    }
}
