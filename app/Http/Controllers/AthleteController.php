<?php

namespace App\Http\Controllers;

use App\Athlete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AthleteController extends Controller
{

    public function showTeamByAthlete($id)
    {
        return DB::select('SELECT teams.id AS id, teams.name AS name FROM atss LEFT JOIN teams ON atss.tid = teams.id WHERE atss.aid = ?',
          [$id]);
    }

    public function showSportByAthlete($id)
    {
        return DB::select('SELECT sports.id AS id, sports.name AS name FROM atss LEFT JOIN sports ON atss.sid = sports.id WHERE atss.aid = ?',
          [$id]);
    }

    public function showAll()
    {
        return response()->json(Athlete::all());
    }

    public function showOne($id)
    {
        $result = Athlete::find($id);
        $result['athletes'] = $this->showTeamByAthlete($id);
        $result['sports'] = $this->showSportByAthlete($id);
        return response()->json($result);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
          'name' => 'required|unique:athlete',
          'dob' => 'required|email',
          'age' => 'required|numeric',
          'height' => 'required|numeric',
          'weight' => 'required|numeric',
        ]);

        $athlete = Athlete::create($request->all());

        return response()->json($athlete, 201);
    }

    public function update($id, Request $request)
    {
        $athlete = Athlete::findOrFail($id);
        $athlete->update($request->all());

        return response()->json($athlete, 200);
    }

    public function delete($id)
    {
        Athlete::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}