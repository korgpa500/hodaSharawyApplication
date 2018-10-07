<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    function index(){
        $types = Type::get();
        return view('types.index')->with('types' ,$types);
    }

    function store(Request $request){
        Type::create([
            'type_name' => $request->type_name,
        ]);
        return redirect()->route('types.index');
    }

    function show($type_id){
        $oneType = Type::find($type_id);
        $types = Type::get();
        return view('types.index')->with('types' ,$types)->with('oneType',$oneType);
    }

    function edit(Request $request ,$type_id){
        $type = Type::find($type_id);
        $type->type_name = $request->type_name;
        $type->update();
        return redirect()->route('types.index');
    }

    function destroy($type_id){
        Type::where('type_id',$type_id)->delete();
        return redirect()->route('types.index');
    }
}
