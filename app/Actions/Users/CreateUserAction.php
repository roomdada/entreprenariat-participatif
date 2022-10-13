<?php

namespace App\Actions\Users;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateUserAction
{
  public function execute(array $data): User
  {
    DB::beginTransaction();
    $identifier = explode('@', $data['email'])[0];

    $user = User::create([
      'identifier' => $identifier,
      'first_name' => $data['first_name'],
      'last_name' => $data['last_name'],
      'email' => $data['email'],
      'password' => Hash::make($data['password']),
      'role_id' => $data['role_id'] ?? Role::USER,
      'user_type_id' => $data['user_type_id'] ?? null,
      'contact' => $data['contact']
    ]);

    DB::commit();

    return $user;
  }
}
