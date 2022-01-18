<?php

namespace App\DataTables;

use App\Models\Creation;
use Hexters\Ladmin\Datatables\Datatables;
use Hexters\Ladmin\Contracts\DataTablesInterface;

class PhotoCreationDatatables extends Datatables implements DataTablesInterface
{

  public function render()
  {
    $data = self::$data;

    return $this->eloquent(Creation::query())
      ->addColumn('action', function ($item) {
        return view('ladmin::table.action', [
          'show' => null,
          'edit' => [
            'gate' => 'administrator.data.photocreation.update',
            'url' => route('administrator.data.photocreation.edit', [$item->id, 'back' => request()->fullUrl()])
          ],
          'destroy' => [
            'gate' => 'administrator.data.photocreation.destroy',
            'url' => route('administrator.data.photocreation.destroy', [$item->id, 'back' => request()->fullUrl()]),
          ]
        ]);
      })
      ->escapeColumns([])
      ->make(true);
  }

  /**
   * Datatables Option
   */
  public function options()
  {

    /**
     * Data from controller
     */
    $data = self::$data;

    return [
      'title' => 'Creations',
      // 'buttons' => view('vendor.ladmin.photo-creation._partials._topButton'),
      'fields' => [__('Nama Karya'), __('Action')],
      'options' => [
        'processing' => true,
        'serverSide' => true,
        'ajax' => request()->fullurl(),
        'columns' => [
          ['data' => 'title', 'class' => 'text-center'],
          ['data' => 'action', 'class' => 'text-center', 'orderable' => false]
        ]
      ]
    ];
  }
}
