<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PlayList;

class PlaylistController extends Controller
{
    //
    public function autocomplete(Request $request)
    {
        $data = PlayList::select("name")
                ->where("name","LIKE","%{$request->input('playlist')}%")
                ->get();
   
        return response()->json($data);
    }
}
