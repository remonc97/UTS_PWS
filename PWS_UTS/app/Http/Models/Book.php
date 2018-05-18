<?php
namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'title',
        'isbn',
        'penerbit',
        'jml_halaman',
        'tahun_terbit'
    ];

    protected $guarded = [
        'id'
    ];
}