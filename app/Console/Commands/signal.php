<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class signal extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'signal:day';

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
        $datas = DB::table('signalbuys')->where('status', 'CONFIRM')
        ->where('dayCounter', '>', 0)
        ->get();

                foreach ($datas as $data) {
                $id = $data->id;
                $count_value = $data->dayCounter;
                $new_countValue = $count_value - 1;
                DB::table("signalbuys")->where('id', $id)->update(['dayCounter' => $new_countValue, 'status' => 'CONFIRM']);
                $this->info('Successfully Updated.');
                    
            }
            $datad = DB::table('signalbuys')
        ->where('dayCounter', '=', 0)
        ->get();

                foreach ($datad as $data) {
                $id = $data->id;
               
                DB::table("signalbuys")->where('id', $id)->update([ 'status' => 'EXPIRED']);
                $this->info('Successfully Updated.');
                    
            }
        }
}
