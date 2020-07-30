<?php


namespace App\Repositories;


interface RepositoryInterface
{
    public function getAll();
    public function save($request);
    public function get($id);
}
