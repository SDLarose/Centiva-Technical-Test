<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTeamRequest;
use App\Models\Team;
use App\Models\Member;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index() {
        return response()->json(Team::with('members')->get(), 200);
    }

    public function show(Team $team) {
        return response()->json($team->with('members')->first(), 200);
    }

    public function create(CreateTeamRequest $request) {
        $validated = $request->validated();
        
        $team = Team::create([
            'name' => $validated['name']
        ]);

        if (!$team)
            return response()->json(['error' => 'Team could not be created. Validate the informations provided']);

        $membersJSON = json_decode($validated['members']);
        foreach ($membersJSON as $member) :
            $team->members()->save(new Member(['name' => $member->name, 'email' => $member->email]));
        endforeach;
    }

    public function members(Team $team) {
        return response()->json($team->members, 200);
    }

    public function delete(Team $team) {
        $team->delete();
    }
}
