<?php

namespace App\DAO;
use DB;
use App\Exceptions\MonException;
use Illuminate\Database\QueryException;

class ServiceDessinateur
{
    public function getIDessinateur(){
        try {
        return $this->getKey();
        } catch(QueryException $e) {
    throw new MonException($e->getMessage(),5);
        }
    }


    public function getListeDessinateur(){
        try {
            $query = DB::table('dessinateur')->get();
            return $query;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function getAuteur($id){
        try {
            $query = DB::table('dessinateur')
                ->select()
                ->where('id_dessinateur', '=', $id)
                ->first();
            return $query;
        } catch (QueryException $e){
            throw new MonException($e->getMessage(),5);
        }
    }
}
