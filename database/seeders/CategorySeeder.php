<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = [
            'Work',
            'Personal',
            'Shopping',
            'Health',
            'Hobbies'
        ];
        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
