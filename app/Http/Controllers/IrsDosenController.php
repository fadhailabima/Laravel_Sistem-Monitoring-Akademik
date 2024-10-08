<?php

namespace App\Http\Controllers;

use App\Models\IRS;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IrsDosenController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $datairs = DB::table('irs')
                ->join('mahasiswas', 'irs.mahasiswa_id', '=', 'mahasiswas.nim')
                ->select('mahasiswas.nama', 'irs.id', 'irs.semester', 'irs.jmlsks', 'irs.scansks', 'irs.isverified')
                ->where('dosen_wali', '=', auth()->user()->dosenWali->nip)
                ->where('nama', 'LIKE', '%' . $request->search . '%')->paginate(10);
        } else {
            $datairs = DB::table('irs')
                ->join('mahasiswas', 'irs.mahasiswa_id', '=', 'mahasiswas.nim')
                ->where('dosen_wali', '=', auth()->user()->dosenWali->nip)
                ->select('mahasiswas.nama', 'irs.id', 'irs.semester', 'irs.jmlsks', 'irs.scansks', 'irs.isverified')
                ->paginate(10);
        }

        return view('dosen.IrsDosen', compact('datairs'));
    }


    public function download($id)
    {

        $downloadirs = DB::table('irs')->where('id', '=', $id)->first();
        $filepath = public_path("storage/post-scansks/{$downloadirs->scansks}");
        return response()->download($filepath);
    }

    public function changestatus(Request $request)
    {
        $datairs = IRS::find($request->id);

        $datairs->isverified = $request->isverified;
        // dd($request);
        $datairs->update(['isverified' => 1]);
        return redirect('/dashboarddosen/irs')->with('success', 'IRS setujui');
    }

    public function unchangestatus(Request $request)
    {
        $datairs = IRS::find($request->id);

        $datairs->isverified = $request->isverified;
        // dd($request);
        $datairs->update(['isverified' => 0]);
        return redirect('/dashboarddosen/irs')->with('gagal', 'IRS tidak disetujui');
    }
}