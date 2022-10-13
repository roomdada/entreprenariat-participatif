<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Role::create([
      'id' => Role::SUPER_ADMIN,
      'name' => 'Admin',
    ]);

    Role::create([
      'id' => Role::USER,
      'name' => 'Utilisateur simple',
    ]);

    User::create([
      'identifier' => 'admin',
      'first_name' => 'Kouadio',
      'last_name' => 'Celestin Jean Pierre',
      'email' => 'admin@email.com',
      'contact' => '0102223366',
      'role_id' => Role::SUPER_ADMIN,
      'password' => Hash::make('password'),
    ]);


    UserType::create([
      'id' => UserType::INVESTOR,
      'name' => UserType::getUsertypeName(UserType::INVESTOR),
    ]);

    UserType::create([
      'id' => UserType::PROJECT_OWNER,
      'name' => UserType::getUsertypeName(UserType::PROJECT_OWNER),
    ]);
      
  }
}
