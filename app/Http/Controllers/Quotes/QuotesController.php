<?php

namespace App\Http\Controllers\Quotes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class QuotesController extends Controller
{

    public function fetch_random_quotes()
    {
        

        for ($i = 0; $i < 5; $i++) {
            $quotes = Http::get('https://api.kanye.rest/text');
            $response[] = $quotes->body();
        }
        // dd($quotes->body());
        return response()->json(
            ['quotes' => $response,]
        );
    }
}
