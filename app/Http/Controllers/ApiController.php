<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Ranking;
use Symfony\Component\ErrorHandler\Debug;

class ApiController extends Controller
{

    public function createRanking (Request $request)
    {
        $rank = 0;
        if ($request->score > 5000) {
          $rank = 0;
        } else if ($request->score > 3000) {
          $rank = 1;
        } else if ($request->score > 2000) {
          $rank = 2;
        } else {
          $rank = 3;
        }

        $ranking = new Ranking;
        $ranking->score = $request->score;
        $ranking->rank = $rank;
        $ranking->perfect = $request->perfect;
        $ranking->strike = $request->strike;
        $ranking->hit = $request->hit;
        $ranking->ball = $request->ball;
        $ranking->combo = $request->combo;
        $ranking->difficulty = $request->difficulty;
        $ranking->save();

        return response()->json([
            "message" => "ranking record created",
        ], 201);
    }
    public function getScoreApp () {
        $ranking = Ranking::take(1)->orderBy('id', 'desc')->get()->toJson(JSON_PRETTY_PRINT);
        Log::debug($ranking);
        return response($ranking, 200);
    }
    public function getRanking () {
        $ranking = Ranking::select('score', 'rank')
        ->take(5)
        ->groupBy('score','rank')
        ->orderBy('score', 'desc')
        ->get()
        ->toJson(JSON_PRETTY_PRINT);
        Log::debug($ranking);
        return response($ranking, 200);
    }
}