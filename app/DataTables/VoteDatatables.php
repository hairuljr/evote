<?php

namespace App\DataTables;

use App\Models\Creation;
use Hexters\Ladmin\Datatables\Datatables;
use Hexters\Ladmin\Contracts\DataTablesInterface;

class VoteDatatables extends Datatables implements DataTablesInterface
{

  /**
   * Datatables function
   */
  public function render()
  {

    /**
     * Data from controller
     */
    $data = self::$data;

    return $this->eloquent(Creation::query())
      ->addColumn('count_vote', function ($item) {
        return $item->vote->count() ?? 0;
      })
      ->addColumn('action', function ($item) {
        return view('ladmin::table.action', [
          'show' => [
            'title' => 'Show Vote',
            'gate' => 'administrator.data.vote.show',
            'url' => route('administrator.data.vote.show', [$item->id, 'back' => request()->fullUrl()])
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
      'title' => 'List Vote',
      'fields' => [__('Mata Kuliah'), __('Jumlah Vote'), __('Action')],
      'buttons' => null,
      'options' => [
        'processing' => true,
        'serverSide' => true,
        'ajax' => request()->fullurl(),
        'columns' => [
          ['data' => 'title'],
          ['data' => 'count_vote'],
          ['data' => 'action', 'class' => 'text-center', 'orderable' => false]
        ]
      ]
    ];
  }
}
