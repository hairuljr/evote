<?php

namespace App\Repositories;

use App\Models\{PhotoCreation};
use Illuminate\Http\Request;
use Hexters\Ladmin\Contracts\MasterRepositoryInterface;

class PhotoCreationRepository extends Repository implements MasterRepositoryInterface
{
  public $path;

  public function __construct(PhotoCreation $model)
  {
    parent::__construct($model);
    $this->path = 'creations';
  }

  public function getPhotos($id)
  {
    return $this->model->where('creation_id', $id)->get();
  }

  public function updatePhotoCreation(Request $request, $id)
  {
    $this->model->whereCreationId($request->creation_id)->delete();

    $this->uploadMultiplePhoto($request->file('multi_photo'), $request->creation_id);
  }

  private function uploadMultiplePhoto($photos, $creation_id)
  {
    if ($photos) {
      foreach ($photos as $value) {
        $imageMultiFit = upload($value, $this->path);
        $dataPhoto['creation_id'] = $creation_id;
        $dataPhoto['picture'] = $imageMultiFit;
        PhotoCreation::create($dataPhoto);
      }
    }
  }
}
