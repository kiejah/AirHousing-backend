<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\County;
use App\Models\Listing;
use App\Models\ApartmentType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    
    public $apartments_types = [
        'Single Room',
        'Bedsitter',
        '1 Bedroom',
        '2 Bedroom',
        '3 Bedroom',
        '4 Bedroom',
        '5 Bedroom'
    ];

    public $counties = [
        ['name'=>'Mombasa','id'=> 1],
                ['name'=>'Kwale','id'=>  2],
                ['name'=>'Kilifi','id'=> 3],
                ['name'=>'Tana River','id'=> 4],
                ['name'=>'Lamu','id'=> 5],
                ['name'=>'Taita-Taveta','id'=> 6],
                ['name'=>'Garissa','id'=> 7],
                ['name'=>'Wajir','id'=> 8],
                ['name'=>'Mandera','id'=> 9],
                ['name'=>'Marsabit','id'=> 10],
                ['name'=>'Isiolo','id'=> 11],
                ['name'=>'Meru','id'=> 12],
                ['name'=>'Tharaka-Nithi','id'=> 13],
                ['name'=>'Embu','id'=> 14],
                ['name'=>'Kitui','id'=> 15],
                ['name'=>'Machakos','id'=> 16],
                ['name'=>'Makueni','id'=> 17],
                ['name'=>'Nyandarua','id'=> 18],
                ['name'=>'Nyeri','id'=> 19],
                ['name'=>'Kirinyaga','id'=> 20],
                ['name'=>'Muranga','id'=> 21],
                ['name'=>'Kiambu','id'=> 22],
                ['name'=>'Turkana','id'=> 23],
                ['name'=>'West Pokot','id'=> 24],
                ['name'=>'Samburu','id'=> 25],
                ['name'=>'Trans Nzoia','id'=> 26],
                ['name'=>'Uasin Gishu','id'=> 27],
                ['name'=>'Elgeyo-Marakwet','id'=> 28],
                ['name'=>'Nandi','id'=> 29],
                ['name'=>'Baringo','id'=> 30],
                ['name'=>'Laikipia','id'=> 31],
                ['name'=>'Nakuru','id'=> 32],
                ['name'=>'Narok','id'=> 33],
                ['name'=>'Kajiado','id'=> 34],
                ['name'=>'Kericho','id'=> 35],
                ['name'=>'Bomet','id'=> 36],
                ['name'=>'Kakamega','id'=> 37],
                ['name'=>'Vihiga','id'=> 38],
                ['name'=>'Bungoma','id'=> 39],
                ['name'=>'Busia','id'=> 40],
                ['name'=>'Siaya','id'=> 41],
                ['name'=>'Kisumu','id'=> 42],
                ['name'=>'Homa Bay','id'=> 43],
                ['name'=>'Migori','id'=> 44],
                ['name'=>'Kisii','id'=> 45],
                ['name'=>'Nyamira','id'=> 46],
                ['name'=>'Nairobi','id'=> 47]
        
    ];

    public function run()
    {
        //\App\Models\User::factory(2)->create();
        //$this->allcounties();

        $user = User::factory()->create([
            'name'=>'John Doe',
            'email'=>'john@gmail.com'

        ]);
        foreach ($this->counties as $county) {
            County::create([
                'name' => $county['name'] 
            ]);
        }

        foreach ($this->apartments_types as $at) {
            ApartmentType::create([
                'apartment_type_name' => $at, 
            ]);
        }

        Listing::factory(8)->create([
            'user_id'=>$user->id,
            'county_id'=>'1',
            'house_aprt_type'=>'2'
        ]);
        



        


        // Listing::create([
        //     'title' => 'Laravel Senior Developer', 
        //     'tags' => 'laravel, javascript',
        //     'company' => 'Acme Corp',
        //     'location' => 'Boston, MA',
        //     'email' => 'email1@email.com',
        //     'website' => 'https://www.acme.com',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        // ]);

        // Listing::create( [
        //     'title' => 'Full-Stack Engineer',
        //     'tags' => 'laravel, backend ,api',
        //     'company' => 'Stark Industries',
        //     'location' => 'New York, NY',
        //     'email' => 'email2@email.com',
        //     'website' => 'https://www.starkindustries.com',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        //   ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);





    }
    // public function allcounties() {
	// 	//remove foreign key check
    //     DB::statement('SET FOREIGN_KEY_CHECKS=0;');
	// 	//truncate existing table if any
    //     DB::table('counties')->truncate();
    //     DB::table('counties')->delete();
		
    //     DB::table('counties')->insert(
    //         [
    //             ['name'=>'Mombasa','id'=> 1],
    //             ['name'=>'Kwale','id'=>  2],
    //             ['name'=>'Kilifi','id'=> 3],
    //             ['name'=>'Tana River','id'=> 4],
    //             ['name'=>'Lamu','id'=> 5],
    //             ['name'=>'Taita-Taveta','id'=> 6],
    //             ['name'=>'Garissa','id'=> 7],
    //             ['name'=>'Wajir','id'=> 8],
    //             ['name'=>'Mandera','id'=> 9],
    //             ['name'=>'Marsabit','id'=> 10],
    //             ['name'=>'Isiolo','id'=> 11],
    //             ['name'=>'Meru','id'=> 12],
    //             ['name'=>'Tharaka-Nithi','id'=> 13],
    //             ['name'=>'Embu','id'=> 14],
    //             ['name'=>'Kitui','id'=> 15],
    //             ['name'=>'Machakos','id'=> 16],
    //             ['name'=>'Makueni','id'=> 17],
    //             ['name'=>'Nyandarua','id'=> 18],
    //             ['name'=>'Nyeri','id'=> 19],
    //             ['name'=>'Kirinyaga','id'=> 20],
    //             ['name'=>'Muranga','id'=> 21],
    //             ['name'=>'Kiambu','id'=> 22],
    //             ['name'=>'Turkana','id'=> 23],
    //             ['name'=>'West Pokot','id'=> 24],
    //             ['name'=>'Samburu','id'=> 25],
    //             ['name'=>'Trans Nzoia','id'=> 26],
    //             ['name'=>'Uasin Gishu','id'=> 27],
    //             ['name'=>'Elgeyo-Marakwet','id'=> 28],
    //             ['name'=>'Nandi','id'=> 29],
    //             ['name'=>'Baringo','id'=> 30],
    //             ['name'=>'Laikipia','id'=> 31],
    //             ['name'=>'Nakuru','id'=> 32],
    //             ['name'=>'Narok','id'=> 33],
    //             ['name'=>'Kajiado','id'=> 34],
    //             ['name'=>'Kericho','id'=> 35],
    //             ['name'=>'Bomet','id'=> 36],
    //             ['name'=>'Kakamega','id'=> 37],
    //             ['name'=>'Vihiga','id'=> 38],
    //             ['name'=>'Bungoma','id'=> 39],
    //             ['name'=>'Busia','id'=> 40],
    //             ['name'=>'Siaya','id'=> 41],
    //             ['name'=>'Kisumu','id'=> 42],
    //             ['name'=>'Homa Bay','id'=> 43],
    //             ['name'=>'Migori','id'=> 44],
    //             ['name'=>'Kisii','id'=> 45],
    //             ['name'=>'Nyamira','id'=> 46],
    //             ['name'=>'Nairobi','id'=> 47]
    //             ]
    //     );
	// 	//reset foreign key check
    //     DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    // }
    
}
