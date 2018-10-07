<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\SuggestionResource;
use App\Suggestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuggestionController extends Controller
{
    function index(){
       $suggestions =  Suggestion::get();

       return SuggestionResource::collection($suggestions);
    }
}
