<?php

use Illuminate\Database\Seeder;

class ItemTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('RAWITEMS')->delete();  
        $filename1="amazonBracelets.json";
        $filename2="amazonChuridar.json";
        $filename3="amazonEarrings.json";
        $filename4="amazonFashionSandals.json";
        $filename5="amazonHats.json";
        $filename6="amazonJackets.json";
        $filename7="amazonJeans.json";
        $filename8="amazonKurtas.json";
        $filename9="amazonLeggings.json";
        $filename10="amazonNecklaces.json";
        $filename11="amazonRing.json";
        $filename12="amazonSalwarSuitSets.json";
        $filename13="amazonSareeBlouses.json";
        $filename14="amazonSarees.json";
        $filename15="amazonShorts.json";
        $filename16="amazonSkirts.json";
        $filename17="amazonTops.json";

        $item1 = json_decode(file_get_contents(__DIR__."/amazonData/".$filename1), true);
        $item2 = json_decode(file_get_contents(__DIR__."/amazonData/".$filename2), true);
        $item3 = json_decode(file_get_contents(__DIR__."/amazonData/".$filename3), true);
        $item4 = json_decode(file_get_contents(__DIR__."/amazonData/".$filename4), true);
        $item5 = json_decode(file_get_contents(__DIR__."/amazonData/".$filename5), true);
        $item6 = json_decode(file_get_contents(__DIR__."/amazonData/".$filename6), true);
        $item7 = json_decode(file_get_contents(__DIR__."/amazonData/".$filename7), true);
        $item8 = json_decode(file_get_contents(__DIR__."/amazonData/".$filename8), true);
        $item9 = json_decode(file_get_contents(__DIR__."/amazonData/".$filename9), true);
        $item10 = json_decode(file_get_contents(__DIR__."/amazonData/".$filename10), true);
        $item11 = json_decode(file_get_contents(__DIR__."/amazonData/".$filename11), true);
        $item12 = json_decode(file_get_contents(__DIR__."/amazonData/".$filename12), true);
        $item13 = json_decode(file_get_contents(__DIR__."/amazonData/".$filename13), true);
        $item14 = json_decode(file_get_contents(__DIR__."/amazonData/".$filename14), true);
        $item15 = json_decode(file_get_contents(__DIR__."/amazonData/".$filename15), true);
        $item16 = json_decode(file_get_contents(__DIR__."/amazonData/".$filename16), true);
        $item17 = json_decode(file_get_contents(__DIR__."/amazonData/".$filename17), true);

        DB::table('RAWITEMS')->insert($item1);
        DB::table('RAWITEMS')->insert($item2);
        DB::table('RAWITEMS')->insert($item3);
        DB::table('RAWITEMS')->insert($item4);
        DB::table('RAWITEMS')->insert($item5);
        DB::table('RAWITEMS')->insert($item6);
        DB::table('RAWITEMS')->insert($item7);
        DB::table('RAWITEMS')->insert($item8);
        DB::table('RAWITEMS')->insert($item9);
        DB::table('RAWITEMS')->insert($item10);
        DB::table('RAWITEMS')->insert($item11);
        DB::table('RAWITEMS')->insert($item12);
        DB::table('RAWITEMS')->insert($item13);
        DB::table('RAWITEMS')->insert($item14);
        DB::table('RAWITEMS')->insert($item15);
        DB::table('RAWITEMS')->insert($item16);
        DB::table('RAWITEMS')->insert($item17);
       
    }

}
