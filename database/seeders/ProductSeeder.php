<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products=[
            ['title'=>'Dozen Cupcakes',
                'description'=>'sweet cake carrot with cream',
                'price'=>32,
                'img'=>'product-1.jpg'
            ],

            ['title'=>'Cookies and Cream',
                    'description'=>'sweet cake with pieces chocolate',
                    'price'=>30,
                    'img'=>'product-2.jpg'
            ],

            ['title'=>'Gluten Free Mini Dozen',
                'description'=>'sweet vanila cake with chocolate glaze ',
                'price'=>31,
                'img'=>'product-3.jpg'
            ],

            ['title'=>'Cookie Dough',
                'description'=>'sweet vanila cake ',
                'price'=>25,
                'img'=>'product-4.jpg'
            ],

            ['title'=>'Vanilla Salted Caramel',
                'description'=>'sweet vanila cake with caramel ',
                'price'=>5,
                'img'=>'product-5.jpg'
            ],

            ['title'=>'Gluten Free Mini Dozen',
                'description'=>'sweet vanila cake with chocolate glaze ',
                'price'=>31,
                'img'=>'product-3.jpg'
            ],

            ['title'=>'German Chocolate',
                'description'=>'sweet  cake with german chocolate  ',
                'price'=>14,
                'img'=>'product-5.jpg'
            ],

            ['title'=>'Dulce De Leche',
                'description'=>'sweet  strawberry cake   ',
                'price'=>32,
                'img'=>'product-7.jpg'
            ],

            ['title'=>'Mississippi Mud',
                'description'=>'Mississippi Mud',
                'price'=>8,
                'img'=>'product-8.jpg'
            ],

            ['title'=>'VEGAN/GLUTEN FREE',
                'description'=>'sweet  vegan cake  ',
                'price'=>8.85,
                'img'=>'product-9.jpg'
            ],

            ['title'=>'SWEET CELTICS',
                'description'=>'sweet  cake with german chocolate  ',
                'price'=>5.77,
                'img'=>'product-10.jpg'
            ],

            ['title'=>'SWEET AUTUMN LEAVES',
                'description'=>'sweet  cake with  chocolate  ',
                'price'=>26.41,
                'img'=>'product-11.jpg'
            ],

            ['title'=>'PALE YELLOW SWEET',
                'description'=>'sweet  cake with  chocolate  ',
                'price'=>22.47,
                'img'=>'product-12.jpg'
            ],
            

        ];

        Product::insert($products);


    }  
    
}
