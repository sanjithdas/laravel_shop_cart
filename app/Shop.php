<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Shop extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','price','quantity_in_stock','quantity_in_order','description','display_image'];
    public function deleteImage(){
        Storage::delete('public/'.$this->image);
    }
}
