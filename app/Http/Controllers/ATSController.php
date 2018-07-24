<?php

namespace App\Http\Controllers;

use App\ATS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ATSController extends Controller
{

    public function showTeamByAthlete($id)
    {
        $teams = DB::select('SELECT teams.id AS id, teams.name AS name FROM atss LEFT JOIN teams ON atss.tid = teams.id WHERE atss.aid = ?',
          [$id]);
        return response()->json($teams);
    }

    public function showTeamBySport($id)
    {
        $teams = DB::select('SELECT teams.id AS id, teams.name AS name FROM atss LEFT JOIN teams ON atss.tid = teams.id WHERE atss.sid = ?',
          [$id]);
        return response()->json($teams);
    }

    public function showAthleteByTeam($id)
    {
        $athletes = DB::select('SELECT athletes.id AS id, athletes.name AS name FROM atss LEFT JOIN athletes ON atss.aid = athletes.id WHERE atss.tid = ?',
          [$id]);
        return response()->json($athletes);
    }

    public function showAthleteBySport($id)
    {
        $athletes = DB::select('SELECT athletes.id AS id, athletes.name AS name FROM atss LEFT JOIN athletes ON atss.aid = athletes.id WHERE atss.sid = ?',
          [$id]);
        return response()->json($athletes);
    }

    public function showSportByAthlete($id)
    {
        $sports = DB::select('SELECT sports.id AS id, sports.name AS name FROM atss LEFT JOIN sports ON atss.sid = sports.id WHERE atss.aid = ?',
          [$id]);
        return response()->json($sports);
    }

    public function showSportByTeam($id)
    {
        $sports = DB::select('SELECT sports.id AS id, sports.name AS name FROM atss LEFT JOIN sports ON atss.sid = sports.id WHERE atss.tid = ?',
          [$id]);
        return response()->json($sports);
    }

    public function showAll()
    {
        return response()->json(ATS::all());
    }

    public function showOne($id)
    {
        return response()->json(ATS::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
          'dop' => 'required|unique:atss',
          'aid' => 'required|numeric',
          'tid' => 'required|numeric',
          'sid' => 'required|numeric',
        ]);

        $athlete = ATS::create($request->all());

        return response()->json($athlete, 201);
    }

    public function update($id, Request $request)
    {
        $athlete = ATS::findOrFail($id);
        $athlete->update($request->all());

        return response()->json($athlete, 200);
    }

    public function delete($id)
    {
        ATS::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}