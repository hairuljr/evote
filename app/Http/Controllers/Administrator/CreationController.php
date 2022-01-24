<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hexters\Ladmin\Exceptions\LadminException;
use App\DataTables\CreationDatatables;
use App\Models\Study;
use App\Repositories\CreationRepository;

class CreationController extends Controller
{
    protected $repository;

    public function __construct(CreationRepository $repository)
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
        ladmin()->allow('administrator.data.creation.index');

        return CreationDatatables::view();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        ladmin()->allow('administrator.data.creation.create');
        $data['study'] = Study::all();
        return view('vendor.ladmin.creation.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ladmin()->allow('administrator.data.creation.create');

        $request->validate([
            'study_id' => ['required', 'exists:studies,id'],
            'title' => ['required'],
            'description' => ['required']
        ]);

        try {
            $this->repository->createCreation($request);
            session()->flash('success', [
                'Creation has been created sucessfully'
            ]);
            return redirect()->back();
        } catch (LadminException $e) {
            return redirect()->back()->withErrors([
                $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('administrator.data.creation.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        ladmin()->allow('administrator.data.creation.update');
        $data['study'] = Study::all();
        $data['creation'] = $this->repository->getModel()->findOrFail($id);
        return view('vendor.ladmin.creation.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        ladmin()->allow('administrator.data.creation.update');

        $request->validate([
            'study_id' => ['required', 'exists:studies,id'],
            'title' => ['required'],
            'description' => ['required']
        ]);
        try {
            $this->repository->updatecreation($request, $id);
            session()->flash('success', [
                'Update has been sucessfully'
            ]);
            return redirect()->back();
        } catch (LadminException $e) {
            return redirect()->back()->withErrors([
                $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ladmin()->allow('administrator.data.creation.destroy');

        try {
            $this->repository->getModel()->findOrFail($id)->delete();
            session()->flash('success', [
                'Delete has been sucessfully'
            ]);
            return redirect()->back();
        } catch (LadminException $e) {
            return redirect()->back()->withErrors([
                $e->getMessage()
            ]);
        }
    }
}
