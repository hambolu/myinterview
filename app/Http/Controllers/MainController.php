<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Lga;
use DB;
use Carbon\Carbon;
use App\Models\AnnouncedPuResult;

class MainController extends Controller
{
    public function index()
    {
        $state = State::where('state_id',25)
                ->first();
        $lga = DB::table('lga')
                ->inRandomOrder()
                ->first();
        $pollingunit = DB::table('polling_unit')
                ->where('lga_id',$lga->lga_id)
                ->first();

        $result = DB::table('announced_pu_results')
                ->where('polling_unit_uniqueid',$pollingunit->uniqueid ?? 0)
                ->sum('party_score');


        return view('welcome', compact('state','lga', 'pollingunit', 'result'));
    }

    public function total()
    {
        $state = State::where('state_id',25)
                ->first();
        $lga = DB::table('lga')
                ->inRandomOrder()
                ->first();
        $pollingunit = DB::table('polling_unit')
                ->get();

        // $result = DB::table('announced_pu_results')
        //         ->where('polling_unit_uniqueid',$pollingunit->uniqueid ?? 0)
        //         ->where('polling_unit_uniqueid',$pollingunit->uniqueid ?? 0)
        //         ->sum('party_score');



        return view('total', compact('state','lga', 'pollingunit'));
    }
    public function addNew()
    {

        // dd(date("Y-m-d H:i:s"));
        $party = DB::table('party')->get();
        $pollingunit = DB::table('polling_unit')->get();
        return view('addData',compact('party','pollingunit'));
    }
    public function addNewData(Request $request)
    {


        $pollingunit = new AnnouncedPuResult();
        $pollingunit->polling_unit_uniqueid = $request->uniqueid;
        $pollingunit->party_abbreviation = $request->party_abbreviation;
        $pollingunit->party_score =$request->party_score;
        $pollingunit->entered_by_user = $request->entered_by_user;
        $pollingunit->date_entered = date("Y-m-d H:i:s");
        $pollingunit->user_ip_address = $ipaddress = $_SERVER['REMOTE_ADDR'];
        $pollingunit->save();

        return back();

    }
}
