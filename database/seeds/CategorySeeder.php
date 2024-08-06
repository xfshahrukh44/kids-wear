<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //categories
        $girls_category = \App\Category::firstOrCreate([
            'name' => 'Girls',
        ], [
            'parent' => 0,
        ]);
        $boys_category = \App\Category::firstOrCreate([
            'name' => 'Boys',
        ], [
            'parent' => 0,
        ]);
        $other_category = \App\Category::firstOrCreate([
            'name' => 'Other',
        ], [
            'parent' => 0,
        ]);

        //sub-categories
        $girls_sub_category_1 = \App\Category::create([
            'name' => 'Baby and Toddlers',
            'parent' => $girls_category->id,
        ]);
        $girls_sub_category_2 = \App\Category::create([
            'name' => 'Christening',
            'parent' => $girls_category->id,
        ]);
        $girls_sub_category_3 = \App\Category::create([
            'name' => 'Communion',
            'parent' => $girls_category->id,
        ]);
        $girls_sub_category_4 = \App\Category::create([
            'name' => 'Flower Suits',
            'parent' => $girls_category->id,
        ]);

        $boys_sub_category_1 = \App\Category::create([
            'name' => 'Baby and Toddlers',
            'parent' => $boys_category->id,
        ]);
        $boys_sub_category_2 = \App\Category::create([
            'name' => 'Christening',
            'parent' => $boys_category->id,
        ]);
        $boys_sub_category_3 = \App\Category::create([
            'name' => 'Communion',
            'parent' => $boys_category->id,
        ]);
        $boys_sub_category_4 = \App\Category::create([
            'name' => 'Flower Suits',
            'parent' => $boys_category->id,
        ]);

        $other_sub_category_1 = \App\Category::create([
            'name' => 'Bedding',
            'parent' => $other_category->id,
        ]);
        $other_sub_category_2 = \App\Category::create([
            'name' => 'Bathing',
            'parent' => $other_category->id,
        ]);
        $other_sub_category_3 = \App\Category::create([
            'name' => 'Feeding',
            'parent' => $other_category->id,
        ]);
        $other_sub_category_4 = \App\Category::create([
            'name' => 'Stollers and Car Seats',
            'parent' => $other_category->id,
        ]);
        $other_sub_category_5 = \App\Category::create([
            'name' => 'Baby Furniture',
            'parent' => $other_category->id,
        ]);
        $other_sub_category_6 = \App\Category::create([
            'name' => 'Nursery & Decor',
            'parent' => $other_category->id,
        ]);

        //child-categories
        foreach ([
                    "Onesie's",
                    "Bloomers & Romper's",
                    "Baby Set's",
                    "Casual baby girl's dresses",
                    "Cardigan",
                    "Pajamas",
                    "Snow Jumpsuits",
                    "Skirts and pants",
                    "Jeans",
                    "Shoes",
                    "Snickers",
                    "Sandles",
                    "Accessories",
                 ] as $category_name) {
            \App\Category::create([
                'name' => $category_name,
                'parent' => $girls_sub_category_1->id,
            ]);
        }

        foreach ([
                    "Gown's and Dresses",
                    "Candle",
                    "Shoes",
                    "Hair Accessories",
                    "Blankets",
                    "Bibs",
                    "Accessories",
                 ] as $category_name) {
            \App\Category::create([
                'name' => $category_name,
                'parent' => $girls_sub_category_2->id,
            ]);
        }

        foreach ([
                    "Dresses and Gowns",
                    "Bolero",
                    "Petticoats & Slips",
                    "Purses",
                    "Rosary",
                    "Veils & Hair Accessories",
                    "Accessories",
                 ] as $category_name) {
            \App\Category::create([
                'name' => $category_name,
                'parent' => $girls_sub_category_3->id,
            ]);
        }

        foreach ([
                    "Flower Girls Dresses",
                    "Kids Clothing",
                    "Parka",
                    "Girl Tops",
                    "Girl Swim Suits",
                    "Socks",
                    "Accessories",
                 ] as $category_name) {
            \App\Category::create([
                'name' => $category_name,
                'parent' => $girls_sub_category_4->id,
            ]);
        }

        foreach ([
                    "Baby Boys Onesie's",
                    "Baby boys Sets",
                    "Rompers",
                    "Pajamas",
                    "Boots",
                    "T-Shirts",
                    "Short Pants & Casual Outfit",
                    "Flannels",
                    "Long Sleeve",
                    "Boys Swim Wear",
                    "Coats",
                    "Snow Jump Suits",
                    "Pants and Jackets",
                    "Boys Outset",
                    "Shoes",
                    "Sneakers",
                    "accessories",
                 ] as $category_name) {
            \App\Category::create([
                'name' => $category_name,
                'parent' => $boys_sub_category_1->id,
            ]);
        }

        foreach ([
                    "Baby Boys Suits",
                    "Rompers",
                    "candles",
                    "Shoes",
                    "Blankets",
                    "Accessories",
                 ] as $category_name) {
            \App\Category::create([
                'name' => $category_name,
                'parent' => $boys_sub_category_2->id,
            ]);
        }

        foreach ([
                    "Boys Suits",
                    "Ties & Bow Ties",
                    "Gloves",
                    "Rosery Shoes",
                    "Accessories",
                 ] as $category_name) {
            \App\Category::create([
                'name' => $category_name,
                'parent' => $boys_sub_category_3->id,
            ]);
        }

        foreach ([
                    "Flower Girls Dresses",
                    "Kids Clothing",
                    "Suits",
                    "Boy Tops",
                    "Pajamas",
                    "Belts",
                    "Shoes",
                    "Flannels",
                    "Suspenders",
                    "Sweatpants",
                    "Pants",
                    "Long & Short Sleeve Shirts",
                 ] as $category_name) {
            \App\Category::create([
                'name' => $category_name,
                'parent' => $boys_sub_category_4->id,
            ]);
        }

        foreach ([
                    "Bedding Sheet Comforters",
                    "Blankets",
                    "Pillows",
                    "Comforter Sets",
                    "Breast Feeding",
                    "Pillow Gaz Reflex Bed",
                    "Bed Wetting Alarm",
                 ] as $category_name) {
            \App\Category::create([
                'name' => $category_name,
                'parent' => $other_sub_category_1->id,
            ]);
        }

        foreach ([
                    "Towels and Cloth Wash",
                    "Burp Cloth & Baby Bathing Mat",
                    "Bag Organizer & Mom Bags",
                    "Wipes Warmer & Wipes Portable Bags",
                    "Diaper Disposal",
                    "Diaper Bags Disposal",
                 ] as $category_name) {
            \App\Category::create([
                'name' => $category_name,
                'parent' => $other_sub_category_2->id,
            ]);
        }

        foreach ([
                    "Bibs",
                    "Slipper Bottles and Sippy Cups",
                    "Snack Container",
                    "Pacifier Holder",
                    "Nipple Replacement Silicon",
                    "Brush Cleaner",
                 ] as $category_name) {
            \App\Category::create([
                'name' => $category_name,
                'parent' => $other_sub_category_3->id,
            ]);
        }

        foreach ([
                    "Stollers and Car Seats",
                    "Baby Carrier",
                    "Stroller Accessories",
                 ] as $category_name) {
            \App\Category::create([
                'name' => $category_name,
                'parent' => $other_sub_category_4->id,
            ]);
        }

        foreach ([
                     "Baby Furniture",
                     "Baby Bassinet",
                     "Craddle",
                     "Crib's Mattresses",
                     "Baby Playmat",
                     "Baby Swing",
                     "High Chair",
                     "Baby Bouncer",
                     "Baby Tricycle",
                 ] as $category_name) {
            \App\Category::create([
                'name' => $category_name,
                'parent' => $other_sub_category_5->id,
            ]);
        }

        foreach ([
                    "Crib Bedding Set",
                    "Blankets",
                    "Blankets",
                    "Pillow Gaz Reflex",
                    "Baby Monitoring Camera",
                    "Baby Wall Frame",
                    "Wall Sticker",
                    "Humidifier",
                 ] as $category_name) {
            \App\Category::create([
                'name' => $category_name,
                'parent' => $other_sub_category_6->id,
            ]);
        }
    }
}


