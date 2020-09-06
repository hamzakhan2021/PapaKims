<?php

use Flynsarmy\CsvSeeder\CsvSeeder;

class CodeSeeder extends CsvSeeder
{
    /**
     * AccountTyesTableSeeder constructor.
     */
    public function __construct ()
    {
        $this->table = "postal_codes";
        // dd($this->table);
        $this->should_trim  = true;
        $this->filename = base_path() . '/database/seeds/csvs/code.csv';
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Recommended when importing larger CSV
        DB::disableQueryLog();

        // Clean table before importing
        DB::table($this->table)->truncate();

        parent::run();
    }
}
