<?php

namespace App\Repositories;

use App\Models\{Creation, Vote};
use Hexters\Ladmin\Contracts\MasterRepositoryInterface;

class VoteRepository extends Repository implements MasterRepositoryInterface
{
  public $path;

  public function __construct(Vote $model)
  {
    parent::__construct($model);
  }

  public function getCreation($id)
  {
    return Creation::find($id);
  }

  public function getVote($id)
  {
    return $this->model->with('user')->whereCreationId($id)->get();
  }
}
