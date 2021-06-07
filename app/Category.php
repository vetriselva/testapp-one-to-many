<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function brand() {
        return $this->belongsTo(brand::class);
    }

    protected $fillable = [
        "category_name",
        "brand_id"
    ];

    public static $rules = [
        'category_name' => 'required',
        'brand_id' => 'required'
    ];

}
