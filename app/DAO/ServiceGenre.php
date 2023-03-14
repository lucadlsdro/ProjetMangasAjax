<?php

namespace App\DAO;
use DB;
use App\Exceptions\MonException;
use Illuminate\Database\QueryException;
class ServiceGenre
{
    public function getIdGenre()
    {
        try {
            return $this->getKey();
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function getListeGenres()
    {
        try {
            $query = DB::table('genre')->get();
            return $query;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }
}
