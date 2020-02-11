<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class TestApiController extends Controller
{
    //
    public function test(Request $request)
    {
        $search = $request->get('search');
        $data   = Student::where('nama','like','%'.$search.'%')->paginate(5);

    	return $data;
    }
}
