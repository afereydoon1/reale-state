<?php

namespace App\Models\Advertising;

use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ads extends Model
{
    use HasFactory,SoftDeletes,Sluggable;

    public function sluggable(): array
    {
        return[
            'slug' =>[
                'source' => 'title'
            ]
        ];
    }

    protected $casts = ['image' => 'array'];

    protected $fillable = ['title','slug','description', 'address', 'amount', 'image', 'floor', 'year', 'storeroom', 'balcony', 'area', 'room', 'toilet', 'parking', 'tags', 'status', 'user_id', 'category_id', 'sell_status', 'type', 'view'];

    public function galleries()
    {
        return $this->hasMany(Gallery::class,'advertise_id');
    }

    public function adsCategory()
    {
        return $this->belongsTo(AdsCategory::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sellStatus()
    {
        return ($this->sell_status == 0) ? 'اجاره' : 'خرید';
    }

    public function type()
    {
        switch ($this->type)
        {
            case 0 :
                return 'آپارتمان';
            case 1 :
                return 'ویلایی';
            case 2 :
                return 'زمین';
            case 3 :
                return 'سوله';
        }
    }

    public function storeRoom()
    {
        return ($this->sell_status == 0) ? 'ندارد' : 'دارد';
    }

    public function balcony()
    {
        return ($this->sell_status == 0) ? 'ندارد' : 'دارد';
    }

    public function parking()
    {
        return ($this->sell_status == 0) ? 'ندارد' : 'دارد';
    }

    public function toilet()
    {
        switch ($this->toilet)
        {
            case 0 :
                return 'ایرانی';
            case 1 :
                return 'فرنگی';
            case 2 :
                return 'ایرانی و فرنگی';

        }
    }

}
