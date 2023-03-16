<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
 
class Increment extends Controller
{
    
    public function update(Request $request)
    {
        $id = Auth::id();
        $value = User::find($id);
        $lines = User::all();
        $value->score = 10.54;
        $value->save();
        //return redirect()->back();
        //return response()->json($value);
        //return response()->json($lines);
        return array(response()->json($lines), response()->json($value), $id);
    }

}