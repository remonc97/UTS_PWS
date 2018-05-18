<?php

namespace App\Http\Transformers;
use League\Fractal\TransformerAbstract;
use App\Http\Models\Book;

class BookTransformer extends TransformerAbstract
{
    public function transform(Book $field)
    {
        return[
            'ID Kategori' => $field->category_id,
            'Judul Buku' => $field->title,
            'ISBN' => $field->isbn,
            'Pengerbit' => $field->penerbit,
            'Jumlah Halaman' => $field->jml_halaman,
            'Tahun Terbit' =>   $field->tahun_terbit,
        ];
    }
}