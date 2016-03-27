<?php

namespace App\Repository;

interface ProjectRepositoryInterface
{
    public function findAll();
    public function store(array $data);
    public function update(array $data, $id, $attribute = 'id');
    public function destroy($id);
}
