<?php

namespace App\Models\Advertising;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdsCategory extends Model
{
    use HasFactory, SoftDeletes , Sluggable;

    public function sluggable() : array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    protected $fillable = ['name', 'slug','status', 'tags'];

    public function ads()
    {
        return $this->hasMany(Ads::class,'category_id');
    }

}
