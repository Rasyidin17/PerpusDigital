<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
  
class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $users = [
            [
               'nickname'=>'Admin User',
               'full_name'=>'Admin User',
               'no_tlp'=>'087654323456',
               'jk'=>'L',
               'email'=>'admin@itsolutionstuff.com',
               'type'=>1,
               'password'=> bcrypt('123456'),
            ],
            [
               'nickname'=>'Manager User',
               'full_name'=>'Manager User',
               'no_tlp'=>'087654323456',
               'jk'=>'L',
               'email'=>'manager@itsolutionstuff.com',
               'type'=> 2,
               'password'=> bcrypt('123456'),
            ],
            [
               'nickname'=>'User',
               'full_name'=>'User',
               'no_tlp'=>'087654323456',
               'jk'=>'L',
               'email'=>'user@itsolutionstuff.com',
               'type'=>0,
               'password'=> bcrypt('123456'),
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}