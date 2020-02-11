<?php

use Illuminate\Database\Seeder;
use App\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 
        for ($i=0; $i < 10; $i++) { 
            $jk = 'P';
            if ($i > 4) {
                $jk = 'L';
            }
            Student::create([
            'nama'=>'Arturia-'.$i,
            'jk'=> $jk
            ]); 
        } 
        for ($i=0; $i < 10; $i++) { 
            $jk = 'L';
            if ($i > 4) {
                $jk = 'P';
            }
            Student::create([
            'nama'=>'Joji-'.$i,
            'jk'=> $jk
            ]); 
        }
         
    }
}
