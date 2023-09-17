<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\TicketRequest;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

       
        Category::factory()->create([
            'name'=>'Ticket'
        ]);

        Category::factory()->create([
            'name'=>'Visa'
        ]);
        
        Category::factory()->create([
            'name'=>'Tourism'
        ]);
        
    }
}