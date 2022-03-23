<?php

namespace App\Models\Advertising;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlideShow extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'url', 'address','published_at', 'amount', 'body', 'image','status','tags'];
}
