<?php

namespace App\Repository;

use App\Models\Project;

class ProjectRepository implements ProjectRepositoryInterface
{
    public function findAll()
    {
        return Project::all();
    }

    public function store(array $data)
    {
        Project::create($data);
    }

    public function update(array $data, $id, $attribute = 'id')
    {
        Project::where($attribute, '=', $id)->update($data);

        return $id;
    }

    public function destroy($id)
    {
        Project::destroy($id);

        return $id;
    }
}
