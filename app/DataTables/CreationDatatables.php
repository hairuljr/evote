<?php

namespace App\DataTables;

use App\Models\Creation;
use Hexters\Ladmin\Datatables\Datatables;
use Hexters\Ladmin\Contracts\DataTablesInterface;

class CreationDatatables extends Datatables implements DataTablesInterface
{

  public function render()
  {
    $data = self::$data;

    return $this->eloquent(Creation::query())
      ->editColumn('thumbnail', function ($item) {
        return "<img src=\"{$item->thumbnail}\" class=\"rounded-circle img-thumbnail\" width=\"50\" alt=\"Thumbnail\">";
      })
      ->editColumn('study', function ($item) {
        return $item->study->name ?? '-';
      })
      ->addColumn('action', function ($item) {
        return view('ladmin::table.action', [
          'show' => null,
          'edit' => [
            'gate' => 'administrator.data.creation.update',
            'url' => route('administrator.data.creation.edit', [$item->id, 'back' => request()->fullUrl()])
          ],
          'destroy' => [
            'gate' => 'administrator.data.creation.destroy',
            'url' => route('administrator.data.creation.destroy', [$item->id, 'back' => request()->fullUrl()]),
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
      'buttons' => view('vendor.ladmin.creation._partials._topButton'),
      'fields' => [__('Thumbnail'), __('Title'), __('Mata Kuliah'), __('Action')],
      'options' => [
        'processing' => true,
        'serverSide' => true,
        'ajax' => request()->fullurl(),
        'columns' => [
          ['data' => 'thumbnail', 'class' => 'text-center'],
          ['data' => 'title'],
          ['data' => 'study'],
          ['data' => 'action', 'class' => 'text-center', 'orderable' => false]
        ]
      ]
    ];
  }
}
