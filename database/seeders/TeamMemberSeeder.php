<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        TeamMember::create(['name' => 'Dr. Rajesh Gupta', 'designation' => 'Medical Director', 'sort_order' => 1, 'status' => true]);
        TeamMember::create(['name' => 'Suresh Patel', 'designation' => 'Operations Manager', 'sort_order' => 2, 'status' => true]);
        TeamMember::create(['name' => 'Priya Sharma', 'designation' => 'Head Paramedic', 'sort_order' => 3, 'status' => true]);
        TeamMember::create(['name' => 'Amit Kumar', 'designation' => 'Fleet Manager', 'sort_order' => 4, 'status' => true]);
    }
}
