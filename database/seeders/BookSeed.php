<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Faker;

class BookSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<100;$i++){
            $faker=Faker\Factory::create();
            $book=new Book();
            $book->book_name=$faker->name;
            $book->image="images/7gvYNxPDd2ykSqO0xsYBZbVNyOQpCapfzrYocB3p.png";
            //$book->image= $faker->image('public/images',640,480, null, false);

            $book->author=$faker->name;;
            $book->user_id=rand(0,10);
            $book->details='<span >Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span>';
            $book->used=rand(20,199);
            $book->buy_price=rand(200,999);
            $book->is_sold=rand(0,1);
            $book->sell_price=rand(100,1221);

            $book->used=55;
            $book->created_at=$faker->dateTimeBetween('-60 days', '+0365 days');
            $book->updated_at=$faker->dateTimeBetween('now', '+0221 days');
            $book->save();

            $book->categories()->sync([rand(1,9),rand(1,9)]);



           /* Book::create([
                'book_name'=>"Book ".$i,
                'categories_id'=>["2","4"],
                "author"=> "Humayon Ahmed",
                "details"=> '<span >Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span>',
                "used"=>"98",
                "buy_price"=> "32",
                "sell_price"=> "32",
                "user_id"=> 2,

            ]);*/
        }
    }
}
