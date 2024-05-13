<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Sample Milling',
            'price' => '3',
            'test_method' => 'Romer labs®',
            'accredit_status' => 'Not accreditated',
            'details' => 'Cyclotec mill or romer mill'
        ]);

        Product::create([
            'name' => 'Aflatoxin',
            'price' => '20',
            'test_method' => 'AOAC official method 2005.08 Aflatoxins in corn raw peanuts and peanut butter',
            'accredit_status' => 'ISO/IEC 17025 accredited',
            'details' => 'UPLC-FLD'
        ]);

        Product::create([
            'name' => 'Milk Proximate',
            'price' => '5',
            'test_method' => 'Foss™',
            'accredit_status' => 'Not accreditated',
            'details' => 'Milko FTscan (FTIR)'
        ]);

        Product::create([
            'name' => 'Saponin',
            'price' => '10',
            'test_method' => 'In-House',
            'accredit_status' => 'Not accreditated',
            'details' => 'Colorimetric'
        ]);

        Product::create([
            'name' => 'Multimycotoxins',
            'price' => '30',
            'test_method' => 'In-House',
            'accredit_status' => 'Not accreditated',
            'details' => 'UPLC-MS'
        ]);

        Product::create([
            'name' => 'Dry matter content',
            'price' => '8',
            'test_method' => 'AOAC official method 934.01',
            'accredit_status' => 'Not accreditated',
            'details' => 'Oven drying'
        ]);

        Product::create([
            'name' => 'Crude Protein',
            'price' => '20',
            'test_method' => 'AOAC official method 988.05',
            'accredit_status' => 'Not accreditated',
            'details' => 'Kjeldhal'
        ]);

        Product::create([
            'name' => 'Ash Content',
            'price' => '8',
            'test_method' => 'AOAC official method 942.05 Ash of animal feed',
            'accredit_status' => 'Not accreditated',
            'details' => 'Loss on ashing'
        ]);

        Product::create([
            'name' => 'Primary Amino Acids',
            'price' => '70',
            'test_method' => 'AOAC official method 994.12 amino acids in feeds',
            'accredit_status' => 'Not accreditated',
            'details' => 'UPLC-FLD (OPA precolumn derivatisation)'
        ]);

        Product::create([
            'name' => 'Crude fat',
            'price' => '18',
            'test_method' => 'AOAC official method 2003.06 Crude fat  in feeds, cereal grains and forages',
            'accredit_status' => 'Not accreditated',
            'details' => 'Soxlet pet ether extraction'
        ]);

        Product::create([
            'name' => 'Fatty acids profile',
            'price' => '60',
            'test_method' => 'AOAC official method 996.06',
            'accredit_status' => 'Not accreditated',
            'details' => 'Hydrolytic extraction followed by GC-MS',
        ]);

        Product::create([
            'name' => 'Crude fiber',
            'price' => '20',
            'test_method' => 'AOAC official method 962.09',
            'accredit_status' => 'Not accreditated',
            'details' => 'Acid digestion and Loss on Ignition Method'
        ]);

        Product::create([
            'name' => 'Water soluble vitamins (B1, B2, B3, B5, B6, B12 and folic acid)',
            'price' => '20',
            'test_method' => 'In-House',
            'accredit_status' => 'Not accreditated',
            'details' => 'HPLC-UV detection'
        ]);

        Product::create([
            'name' => 'Fat soluble vitamins (vitamin A, E (alpha  and  gamma tocopherol)',
            'price' => '25',
            'test_method' => 'In-House',
            'accredit_status' => 'Not accreditated',
            'details' => 'HPLC-UV detection'
        ]);

        Product::create([
            'name' => 'Phytic acid',
            'price' => '40',
            'test_method' => 'Megazyme',
            'accredit_status' => 'Not accreditated',
            'details' => 'Phytic acid megazyme kit'
        ]);

        Product::create([
            'name' => 'Tannins',
            'price' => '10',
            'test_method' => 'In-House',
            'accredit_status' => 'Not accreditated',
            'details' => 'Colorimetric'
        ]);

        Product::create([
            'name' => 'Total free phenolics',
            'price' => '12',
            'test_method' => 'In-House',
            'accredit_status' => 'Not accreditated',
            'details' => 'Colorimetric'
        ]);

        Product::create([
            'name' => 'Antioxidant',
            'price' => '10',
            'test_method' => 'In-House',
            'accredit_status' => 'Not accreditated',
            'details' => 'Colorimetric (DPPH method)'
        ]);

        Product::create([
            'name' => 'Sugars (Sucrose, Glucose, Fructose and Xylose)',
            'price' => '35',
            'test_method' => 'In-House',
            'accredit_status' => 'Not accreditated',
            'details' => 'HPLC-ELSD quantification'
        ]);

        Product::create([
            'name' => 'Total oxalate',
            'price' => '30',
            'test_method' => 'In-House',
            'accredit_status' => 'Not accreditated',
            'details' => 'HPLC determination expressed as oxalic acid equivalent'
        ]);

        Product::create([
            'name' => 'Mineral analysis (Fe, Zn, Mg, Ca, Mn, Co, Al, K, Na)',
            'price' => '3',
            'test_method' => 'Romer labs®, Foss™ Cyclotec™',
            'accredit_status' => 'Not accreditated',
            'details' => 'Sample milling(Cyclotec mill or Romer mill)'
        ]);

        Product::create([
            'name' => 'Mineral analysis (Fe, Zn, Mg, Ca, Mn, Co, Al, K, Na)',
            'price' => '5',
            'test_method' => 'AOAC official method 985.01 Metals and other elements in plants and pet foods',
            'accredit_status' => 'Not accreditated',
            'details' => 'Acid digestion'
        ]);

        Product::create([
            'name' => 'Mineral analysis (Fe, Zn, Mg, Ca, Mn, Co, Al, K, Na)',
            'price' => '10',
            'test_method' => 'AOAC official method 985.01 Metals and other elements in plants and pet foods',
            'accredit_status' => 'Not accreditated',
            'details' => 'Single Element quantification (ICP-OES)'
        ]);
    }
}
