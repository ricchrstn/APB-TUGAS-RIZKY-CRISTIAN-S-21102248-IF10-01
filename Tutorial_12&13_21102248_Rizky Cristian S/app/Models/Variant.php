<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    protected $fillable = ['variant_name', 'product_id'];

    public function product()
{
    return $this->belongsTo(Product::class);
}

}
