<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function image()
    {
        if($this->image)
        {
            return asset('storage/' . $this->image);
        }else{
            return asset('assets/img/stisla.svg');
        }
    }
}
