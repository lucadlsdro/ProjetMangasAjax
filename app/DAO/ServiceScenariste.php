<?php

namespace App\DAO;
use DB;
use App\Exceptions\MonException;
use Illuminate\Database\QueryException;
class ServiceScenariste
{
    public function getIScenariste() {

        try {
            return $this->getKey();
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function getListeScenaristes(){
        try {
            $query = DB::table('scenariste')->get();
            return $query;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function getScenariste($id) {
        try {
            $query = DB::table('scenariste')
                ->select()
                ->where('id_scenariste', '=', $id)
                ->first();
            return $query;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }
}
