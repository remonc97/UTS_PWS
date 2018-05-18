<?php

namespace App\Http\Transformers;
use League\Fractal\TransformerAbstract;
use App\Http\Models\Category;


class CategoryTransformer extends TransformerAbstract
{
    public function transform(Category $field){
        return [
            'id kategori' => $field->id,
            'nama kategori' => $field->name,
        ];
    }
}