<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{

    public function showAthleteByTeam($id)
    {
        return DB::select('SELECT athletes.id AS id, athletes.name AS name FROM atss LEFT JOIN athletes ON atss.aid = athletes.id WHERE atss.tid = ?',
          [$id]);
    }

    public function showSportByTeam($id)
    {
        return DB::select('SELECT sports.id AS id, sports.name AS name FROM atss LEFT JOIN sports ON atss.sid = sports.id WHERE atss.tid = ?',
          [$id]);
    }

    public function showAll()
    {
        return response()->json(Team::all());
    }

    public function showOne($id)
    {
        $result = Team::find($id);
        $result['teams'] = $this->showAthleteByTeam($id);
        $result['sports'] = $this->showSportByTeam($id);
        return response()->json($result);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
          'name' => 'required|unique:teams',
          'logo' => 'required|url',
        ]);

        $athlete = Team::create($request->all());

        return response()->json($athlete, 201);
    }

    public function update($id, Request $request)
    {
        $athlete = Team::findOrFail($id);
        $athlete->update($request->all());

        return response()->json($athlete, 200);
    }

    public function delete($id)
    {
        Team::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}