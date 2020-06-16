<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'company_id'=>1,
            'employee_name'=>'Severian',
            'employee_position'=>'CEO'
        ]);

        DB::table('employees')->insert([
            'company_id'=>3,
            'employee_name'=>'Nael',
            'employee_position'=>'CPO'
        ]);

        DB::table('employees')->insert([
            'company_id'=>2,
            'employee_name'=>'Andre',
            'employee_position'=>'IT Manager'
        ]);

        DB::table('employees')->insert([
            'company_id'=>4,
            'employee_name'=>'Ricky',
            'employee_position'=>'IT Staff'
        ]);
    }
}
