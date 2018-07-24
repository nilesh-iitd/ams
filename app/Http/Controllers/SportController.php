<?php

namespace App\Http\Controllers;

use App\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SportController extends Controller
{
    public function showTeamBySport($id)
    {
        return DB::select('SELECT teams.id AS id, teams.name AS name FROM atss LEFT JOIN teams ON atss.tid = teams.id WHERE atss.sid = ?',
          [$id]);
    }

    public function showAthleteBySport($id)
    {
        return DB::select('SELECT athletes.id AS id, athletes.name AS name FROM atss LEFT JOIN athletes ON atss.aid = athletes.id WHERE atss.sid = ?',
          [$id]);
    }

    public function showAll()
    {
        return response()->json(Sport::all());
    }

    public function showOne($id)
    {
        $result = Sport::find($id);
        $result['athletes'] = $this->showAthleteBySport($id);
        $result['teams'] = $this->showTeamBySport($id);
        return response()->json($result);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
          'name' => 'required|unique:sports'
        ]);

        $athlete = Sport::create($request->all());

        return response()->json($athlete, 201);
    }

    public function update($id, Request $request)
    {
        $athlete = Sport::findOrFail($id);
        $athlete->update($request->all());

        return response()->json($athlete, 200);
    }

    public function delete($id)
    {
        Sport::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}