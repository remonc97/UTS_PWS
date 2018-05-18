<?php

namespace App\Http\Transformers;
use League\Fractal\TransformerAbstract;
use App\Http\Models\Book;

class BookTranformer extends TransformerAbstract
{
    public function transform(Book $field)
    {
        return[
            'ID Buku' => $field->id,
            'ID Kategori' => $field->category_id,
            'Judul Buku' => $field->title,
            'ISBN' => $field->isbn,
            'Pengerbit' => $field->penerbit,
            'Jumlah Halaman' => $field->jml_halaman,
            'Tahun Terbit' =>   $field->tahun_terbit,
        ];
    }
}