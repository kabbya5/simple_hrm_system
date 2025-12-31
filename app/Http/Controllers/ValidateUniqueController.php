<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidateUniqueController extends Controller
{
    public function validateUnique(Request $request){

        $modelName = $request->model;
        $name = $request->name;
        $type = $request->type;
        $value = $request->value;

        if($type == "email"){
            $request->validate([
                'name' => 'required|email',
            ]);
        }else {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);
        }

        $modelClass = "App\\Models\\$modelName";

        $exists = $modelClass::where($name, $value)->exists();

        if($exists){
            return response()->json([
                'valid' => false,
                'message' => ucfirst($name).' is already taken.'
            ]);
        }

        return response()->json([
            'valid' => true,
            'message' => ucfirst($name).' is available.'
        ]);

    }
}
