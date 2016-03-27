<?php

namespace App\Repository;

use App\Task;

class TaskRepository implements TaskRepositoryInterface
{
    public function findAll()
    {
        return Task::all();
    }

    public function store(array $data)
    {
        Task::create($data);
    }

    public function update(array $data, $id, $attribute = 'id')
    {
        Task::where($attribute, '=', $id)->update($data);

        return $id;
    }

    public function destroy($id)
    {
        Task::destroy($id);

        return $id;
    }
}
