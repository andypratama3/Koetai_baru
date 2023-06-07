<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Sponsor\StoreSponsorAction;
use App\Actions\Sponsor\DeleteSponsorAction;
use App\Http\Requests\Sponsor\StoreSponsorRequest;

class SponsorController extends Controller
{
    public function index()
    {
        $limit = 15;
        $sponsors = Sponsor::select(['nama','logo','slug'])->latest()->paginate($limit);
        $count = $sponsors->count();
        $no = $limit * ($sponsors->currentPage() - 1);
        return view('dashboard.sponsor.index', compact('sponsors','count','no'));
    }
    public function create()
    {
        return view('dashboard.sponsor.create');
    }
    public function store(StoreSponsorRequest $request, StoreSponsorAction $storeSponsorAction)
    {
        $storeSponsorAction->execute($request);
        return redirect()->route('dashboard.sponsor.index')->with('success-insert','Sponsor Berhasil Ditambahkan!');
    }
    public function show(Request $request,$slug)
    {
        $sponsor = Sponsor::where('slug',$slug)->select(['nama','logo','slug'])->firstOrFail();

        return view('dashboard.sponsor.show', compact('sponsor'));
    }
    public function destroy($slug, DeleteSponsorAction $deleteSponsorAction){

        $deleteSponsorAction->execute($slug);
        return redirect()->route('dashboard.sponsor.index')->with('success-delete','Event Berhasil Di Hapus!');
    }


}
