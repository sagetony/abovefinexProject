<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class interestcap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'interest:cap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Compound Interest';

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
           $datas = DB::table('deposits')->where('status', 'CONFIRM')->where('interest', '>=', 0)
            ->get();
            foreach($datas as $data){
                $id = $data->id;
                $interest_v = $data->interest;
                $interest_cap = $data->interestcap;

            $new_interest = (int)$interest_v + (int)$interest_cap;
            DB::table("deposits")->where('id', $id)->update(['interestcap' =>  $new_interest, 'interest' => 0]);
            $this->info('Successfully Updated.');
               
            }
            
    }
}
