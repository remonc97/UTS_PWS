<?php
namespace App\Http\Models; #ini bebas mau dibikin kaya apa. ygpenting kalo mau manggil file ini, manggilnya kayagini.


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
    ];

    protected $guarded = ['id'];
}