<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Actions\Talent\StoreTalentAction;
use App\Actions\Talent\DeleteTalentAction;
use App\Actions\Talent\UpdateTalentAction;
use App\Http\Requests\Talent\StoreTalentRequest;
use App\Models\Talent;

class TalentController extends Controller
{
    public function index()
    {
        $limit = 5;
        $talents = Talent::select(['nama', 'slug'])->orderBy('nama')->paginate($limit);
        $count = $talents->count();
        $no = $limit * ($talents->currentPage() - 1);

        return view('dashboard.talent.index', compact(
            'talents',
            'count',
            'no'
        ));
    }
    public function create()
    {
        return view('dashboard.talent.create');
    }
    public function store(StoreTalentRequest $request, StoreTalentAction $storeTalentAction)
    {
        $storeTalentAction->execute($request);

        return redirect()->route('dashboard.talent.index')->with('succes','Talent Berhasil Ditambahkan!');
    }
    public function show(Request $request,$slug)
    {
        $talent = Talent::where('slug',$slug)->select(['nama','deskripsi', 'foto', 'slug'])->firstOrFail();

        return view('dashboard.talent.show', compact('talent'));
    }

    public function edit(Request $request,$slug)
    {
        $talent = Talent::where('slug',$slug)->select(['id','nama','deskripsi', 'foto', 'slug'])->firstOrFail();

        return view('dashboard.talent.edit', compact('talent'));
    }
    public function update(StoreTalentRequest $request, UpdateTalentAction $updateTalentAction, $slug){

        $updateTalentAction->execute($request,$slug);
        return redirect()->route('dashboard.talent.index')->with('succes','Talent Berhasil Di Update!');

    }
    public function destroy($slug, DeleteTalentAction $deleteTalentAction){

        $deleteTalentAction->execute($slug);
        return redirect()->route('dashboard.talent.index')->with('succes','Talent Berhasil Di Hapus!');
    }
}
