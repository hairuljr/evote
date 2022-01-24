<?php

namespace App\DataTables;

use App\Models\Study;
use Hexters\Ladmin\Datatables\Datatables;
use Hexters\Ladmin\Contracts\DataTablesInterface;

class StudyDatatables extends Datatables implements DataTablesInterface
{

  public function render()
  {
    $data = self::$data;

    return $this->eloquent(Study::query())
      ->addColumn('action', function ($item) {
        return view('ladmin::table.action', [
          'show' => null,
          'edit' => [
            'gate' => 'administrator.data.study.update',
            'url' => route('administrator.data.study.edit', [$item->id, 'back' => request()->fullUrl()])
          ],
          'destroy' => [
            'gate' => 'administrator.data.study.destroy',
            'url' => route('administrator.data.study.destroy', [$item->id, 'back' => request()->fullUrl()]),
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
      'title' => 'Studies',
      'buttons' => view('vendor.ladmin.study._partials._topButton'),
      'fields' => [__('Nama'), __('Action')],
      'options' => [
        'processing' => true,
        'serverSide' => true,
        'ajax' => request()->fullurl(),
        'columns' => [
          ['data' => 'name', 'class' => 'text-center'],
          ['data' => 'action', 'class' => 'text-center', 'orderable' => false]
        ]
      ]
    ];
  }
}
