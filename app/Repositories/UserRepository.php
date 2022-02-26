<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\Datatables;
use Illuminate\Support\Str;
use Hexters\Ladmin\Contracts\MasterRepositoryInterface;

class UserRepository extends Repository implements MasterRepositoryInterface
{

  public function __construct()
  {
    parent::__construct(
      app(config('ladmin.user', App\Models\User::class))
    );
  }

  /**
   * Update user
   *
   * @param Request $request
   * @param [Model] $user
   * @return Void
   */
  public function updateUser(Request $request, $id)
  {

    if (!is_null($request->pass)) {
      $request->merge([
        'password' => bcrypt($request->pass ?? 'password'),
        'email' => Str::slug($request->name) . '@mail.com'
      ]);
    }

    $user = $this->model->findOrFail($id);
    $user->update($request->all());
    if ($request->has('role_id')) {
      $user->roles()->sync($request->role_id);
    }
  }

  public function createUser(Request $request)
  {

    $request->merge([
      'password' => bcrypt($request->pass ?? 'password'),
      'email' => Str::slug($request->name) . '@mail.com'
    ]);
    $user = $this->model->create($request->all());
    if ($request->has('role_id')) {
      $user->roles()->sync($request->role_id);
    }
  }

  public function generateUser(Request $request)
  {
    $numbers = range(1, $request->numbers);

    // cek user terkahir yang di generate
    $lastGenerated = $this->model->latest('id')
      ->where('nim', 'LIKE', '0' . '%')
      ->pluck('nim')
      ->first();
    $date = now()->format('d'); //tanggal
    $hour = now()->format('H'); //jam format 24
    $minute = now()->format('i'); //menit

    foreach ($numbers as $value) {
      // jika ada user yang pernah di generate,
      // ambil 3 angka terakhir sebagai lanjutan urutan
      if ($lastGenerated) {
        $item = substr($lastGenerated, 7, 3) + $value;
        $format = '0' . $date . $hour . $minute . str_pad($item, 3, '0', STR_PAD_LEFT);
        $request->merge([
          'name' => 'Tamu ' . $item,
          'email' => Str::slug('Tamu ' . $item) . '@fesma.com',
          'password' => bcrypt('password'),
          'nim' => $format
        ]);
      } else {
        $format = '0' . $date . $hour . $minute . str_pad($value, 3, '0', STR_PAD_LEFT);
        $request->merge([
          'name' => 'Tamu ' . $value,
          'email' => Str::slug('Tamu ' . $value) . '@fesma.com',
          'password' => bcrypt('password'),
          'nim' => $format
        ]);
      }


      $user = $this->model->create($request->except('numbers'));
      if ($request->has('role_id')) {
        $user->roles()->sync($request->role_id);
      }
    }
  }
}
