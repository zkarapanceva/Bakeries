<?php

use Flynsarmy\CsvSeeder\CsvSeeder;

class BakeriesSeeder extends CsvSeeder
{
        public function __construct()
    	{
    		$this->table = "bakeries";
    		$this->timestamps = true;
    		$this->filename = base_path().'/database/seeds/csvs/bakeries.csv';
    	}

    	public function run()
    	{
    		// Recommended when importing larger CSVs
    		DB::disableQueryLog();

    		// Uncomment the below to wipe the table clean before populating
    		DB::table($this->table)->truncate();

    		parent::run();
    	}
}
