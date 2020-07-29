<?php


namespace App\Repositories;


class AbstractRepository
{
    public function save($request)
    {
         return $this->model->create($request->all());
    }

    public function getAll()
    {
        return $this->model->all();
    }
}
