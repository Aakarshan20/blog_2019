<?php

use Illuminate\Database\Seeder;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $data = [
            [
                'link_name' => 'google',
                'link_title' => '搜尋引擎',
                'link_url' => 'http://www.google.com.tw',
                'link_order' => 1,
            ],
            [
                'link_name' => 'youtube',
                'link_title' => '影片網站',
                'link_url' => 'http://www.youtube.com.tw',
                'link_order' => 2,
            ],
            [
                'link_name' => 'yahoo',
                'link_title' => '入口網站',
                'link_url' => 'http://www.yahoo.com.tw',
                'link_order' => 3,
            ],
        ];
        DB::table('links')->insert($data);
    }
}
