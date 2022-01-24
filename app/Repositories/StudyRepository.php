<?php

namespace App\Repositories;

use App\Models\{Study};
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Hexters\Ladmin\Contracts\MasterRepositoryInterface;

class StudyRepository extends Repository implements MasterRepositoryInterface
{
  public $path;

  public function __construct(Study $model)
  {
    parent::__construct($model);
  }

  public function updateStudy(Request $request, $id)
  {
    $creation = $this->model->findOrFail($id);
    $data['name'] = $request->name;
    $data['slug'] = Str::slug($request->name);
    $creation->update($data);
  }

  public function createStudy(Request $request)
  {
    $data['name'] = $request->name;
    $data['slug'] = Str::slug($request->name);
    $this->model->create($data);
  }
}
