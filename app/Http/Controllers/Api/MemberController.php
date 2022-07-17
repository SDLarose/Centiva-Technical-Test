<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    public function index() {
        return response()->json(Member::with('team')->get(), 200);
    }

    public function show(Member $member) {
        return response()->json($member->with('team')->first(), 200);
    }

    public function delete(Member $member) {
        $member->delete();
    }
}