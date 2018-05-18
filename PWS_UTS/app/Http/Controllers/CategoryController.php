<?php

namespace App\Http\Controllers;

use App\Http\Models\Category;
use App\Http\Transformers\CategoryTransformer;
use Dingo\Api\Http\Request;
use Dingo\Api\Routing\Helpers;
use Mockery\Exception;

class CategoryController extends Controller
{
    use Helpers;

    public function index(){

        $a = Category::all();

        return $this->response->collection($a,new CategoryTransformer);
    }

    public function show($id){

        try{
            $a = Category::find($id);
        }catch(Exception $e){
            return $e;
        }

        if($a){
            return $this->response->item($a,new CategoryTransformer);
        }else{
            $this->response->errorNotFound('data tidak ditemukan');
        }
    }

    public function store(Request $request){

        #filtering cuma 1 value yg masuk
        $data = $request->only([
            'keykategori',
        ]);

        #bikin object untuk nampung data utk disave ke kategori
        $a = new Category([
            'name' => $data['keykategori']
        ]);

        #validasi


        #insert ke db
        try{
            $a->save();
        }catch (Exception $e){
            $this->response->error($e,500);
        }

        #kirim response bahwa berhasil diinsert, status code 200
        $this->response->created();
    }

    public function update($id,Request $request){
        try{
            $a = Category::find($id);
        }catch(Exception $e){
            $this->response->error($e,500);
        }

        if($a){
            $data = $request->only([
                'keykategori'
            ]);

            $a->fill([
                'name' => $data['keykategori'],
            ]);

            try{
                $a->save();
            }catch (Exception $e){
                $this->response->error($e,500);
            }

            $this->response->error('',200);

        }else{
            $this->response->errorNotFound('data tidak ditemukan');
        }
    }

    public function destroy($id){

        try{
            $a = Category::find($id);
        }catch(Exception $e){
            $this->response->error($e,500);
        }

        if($a){

            try{
                $a->delete();
            }catch (Exception $e){
                $this->response->error($e,500);
            }

            $this->response->noContent();

        }else{
            $this->response->errorNotFound('data tidak ditemukan');
        }
    }

}