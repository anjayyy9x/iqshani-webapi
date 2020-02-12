<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
class ApiController extends Controller
{

    public function index()
    {
        //
        $siswa=Student::all();
        $data=['siswa'=>$siswa];
        return $data;
    }

    public function create(Request $request)
    {
        //
        $siswa=new Student();
        $siswa->nama=$request->nama;
        $siswa->jk=$request->jk;

        $siswa->save();
            
        return 'data tersimpan';
    }
    public function update(Request $request, $id)
    {
        //
        $siswa=Student::find($id);
        $siswa->nama=$request->nama;
        $siswa->jk=$request->jk;

        $siswa->save();
            
        return 'data terupdate';
    }

    public function delete($id)
    {
        //
        $student=\App\Student::find($id);
        $student->delete();

        return 'data terhapus';
    }

    public function detail($id)
    {
        $student=Student::find($id);

        return $siswa;
    }
}
