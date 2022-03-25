<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class daycounter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'day:counter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the info table daily';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $datai = DB::table('deposits')->where('status', 'CONFIRM')
        ->where('dayCounter', '>=', 0)
        ->get();

                foreach ($datai as $data) {
                $id = $data->id;
                $count_value = $data->dayCounter;
                $new_countValue = $count_value + 1;
                DB::table("deposits")->where('id', $id)->update(['dayCounter' => $new_countValue]);
                $this->info('Successfully Updated.');
            
        }
        $datas = DB::table('signalbuys')->where('status', 'CONFIRM')
        ->where('dayCounter', '>', 0)
        ->get();

                foreach ($datas as $data) {
                $id = $data->id;
                $count_value = $data->dayCounter;
                $new_countValue = $count_value - 1;
                DB::table("signalbuys")->where('id', $id)->update(['dayCounter' => $new_countValue]);
                $this->info('Successfully Updated.');
            
        }
        $datar = DB::table('robots')->where('status', 'CONFIRM')
        ->where('dayCounter', '>', 0)
        ->get();

                foreach ($datar as $data) {
                $id = $data->id;
                $count_value = $data->dayCounter;
                $new_countValue = $count_value - 1;
                DB::table("deposits")->where('id', $id)->update(['dayCounter' => $new_countValue]);
                $this->info('Successfully Updated.');
            
        }

        

    }
}
