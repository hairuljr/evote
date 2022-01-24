<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\VoteRepository;
use App\DataTables\VoteDatatables;

class VoteController extends Controller
{

    protected $repository;

    public function __construct(VoteRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        ladmin()->allow('administrator.data.vote.index');

        return VoteDatatables::view();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        ladmin()->allow('administrator.data.vote.show');

        $data['voter'] = $this->repository->getVote($id);
        $data['creation'] = $this->repository->getCreation($id);
        return view('vendor.ladmin.vote.show', $data);
    }
}
