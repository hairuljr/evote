<?php

namespace App\Repositories;

use App\Models\{Creation, PhotoCreation};
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Hexters\Ladmin\Contracts\MasterRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class CreationRepository extends Repository implements MasterRepositoryInterface
{
  public $path;

  public function __construct(Creation $model)
  {
    parent::__construct($model);
    $this->path = 'creations';
  }

  public function updateCreation(Request $request, $id)
  {
    $creation = $this->model->findOrFail($id);
    $thumb = $request->file('thumbnail');
    if ($thumb != null) {
      Storage::disk('public')->delete('creations/' . $creation->getRawOriginal('thumbnail'));
      $imageFit = upload($thumb, $this->path);
    }
    $data['thumbnail'] = $imageFit ?? $creation->getRawOriginal('thumbnail');
    $data['title'] = $request->title;
    $data['slug'] = Str::slug($request->title);
    $data['description'] = $request->description;
    $creation->update($data);

    $this->uploadMultiplePhoto($request->file('multi_photo'), $creation->id);
  }

  public function createCreation(Request $request)
  {
    $image = $request->file('thumbnail');
    $imageFit = upload($image, $this->path);
    $data['thumbnail'] = $imageFit;
    $data['title'] = $request->title;
    $data['slug'] = Str::slug($request->title);
    $data['description'] = $request->description;
    $creation = $this->model->create($data);

    $this->uploadMultiplePhoto($request->file('multi_photo'), $creation->id);
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
