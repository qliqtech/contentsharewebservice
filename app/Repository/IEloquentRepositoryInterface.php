<?php


namespace App\Repository;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface  IEloquentRepositoryInterface
{

    public  function  create(array $attributes): Model;

    /**
     * @param $id
     * @return Model
     */


    public function find($id): Model;

    public function update($id, array $attributes);


    public function listall(): Collection;

}
