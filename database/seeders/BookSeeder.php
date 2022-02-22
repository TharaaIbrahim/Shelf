<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('books')->insert([
            [
                'book_name' => 'Novel',
                'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                'price'=>10,
                 'image'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQztn2EGo6R4xOjSbytthnbg7WusrleCz0azA&usqp=CAU','delivery'=>'available',  
                 'user_id'=>1,
                'category_id'=>1,
          
            ], 
            [
                'book_name' => 'Novel',
                'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                'price'=>10,
                 'image'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQztn2EGo6R4xOjSbytthnbg7WusrleCz0azA&usqp=CAU','delivery'=>'available',  
                 'user_id'=>1,
                'category_id'=>1,
            ], 
            [
                'book_name' => 'Novel',
                'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                'price'=>10,
                 'image'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQztn2EGo6R4xOjSbytthnbg7WusrleCz0azA&usqp=CAU','delivery'=>'available',  
                 'user_id'=>1,
                'category_id'=>1,
              
               
                

                
            ],   ]);
    }
}
