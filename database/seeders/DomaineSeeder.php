<?php

namespace Database\Seeders;

use App\Models\Domaine;
use App\Models\Project;
use App\Models\Role;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Database\Seeder;

class DomaineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Domaine::create([
            'name' => 'Agriculture',
        ]);

        Domaine::create([
            'name' => 'Immobilier',
        ]);

        foreach (Domaine::all() as $domaine) {
            $user = User::factory()->sequence([
                'role_id' => Role::USER,
                'user_type_id' => UserType::PROJECT_OWNER,
            ])->create();
        }

        Project::factory(10)->create();
    }
}
