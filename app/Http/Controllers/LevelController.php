<?php

namespace App\Http\Controllers;

use App\DataTables\LevelDataTable;
use App\Http\Requests\StoreLevelRequest;
use App\Http\Requests\UpdateLevelRequest;
use App\Models\LevelModel;

class LevelController extends Controller
{
    public function index(LevelDataTable $dataTable)
    {
        return $dataTable->render('level.index');
    }

    function create()
    {
        return view('level.create');
    }

    function store(StoreLevelRequest $request)
    {
        $validated = $request->safe()->only(['level_kode', 'level_nama']);

        LevelModel::create($validated);
        return redirect('/level');
    }

    function edit($id)
    {
        return view('level.edit', ['data' => LevelModel::find($id)]);
    }

    function update(UpdateLevelRequest $request, $id)
    {
        $validated = $request->safe()->only(['level_kode', 'level_nama']);
        LevelModel::find($id)->update($validated);

        return redirect('/level');
    }

    function destroy($id)
    {
        LevelModel::find($id)->delete();
        return redirect('/level');
    }
}
