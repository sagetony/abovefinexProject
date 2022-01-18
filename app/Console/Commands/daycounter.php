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
        $datas = DB::table('deposits')->where('status', 'CONFIRM')
        ->where('dayCounter', '>=', 0)
        ->get();

                foreach ($datas as $data) {
                $id = $data->id;
                $count_value = $data->dayCounter;
                $new_countValue = $count_value + 1;
                DB::table("deposits")->where('id', $id)->update(['dayCounter' => $new_countValue]);
                $this->info('Successfully Updated.');
            
        }

        $dataeconomys = DB::table("deposits")->where('status', 'CONFIRM')
        ->where('interest', '>=', 0)
        ->get();

        foreach ($dataeconomys as $dataeconomy) {
            $id = $dataeconomy->id;
            $interest = $dataeconomy->interest;
            $interestcap = $dataeconomy->interestcap;
            $amount = $dataeconomy->amount;
            $plan = $dataeconomy->plan;
            $rate = $dataeconomy->planAmount;

            if($plan == "Economy"){
                $dayInt = (floatval($amount + $interestcap)/100)*$rate;
            }else{
                $dayInt = 0; 
            }

                $main_interest = $interest + $dayInt + 0.00;

            DB::table("deposits")->where('id', $id)->update(['interest' => $main_interest]);
            $this->info('Successfully UpdatedE.');
            

        }
        $datafqs = DB::table("deposits")->where('status', 'CONFIRM')
        ->where('interest', '>=', 0)
        ->get();

        foreach ($datafqs as $datafq) {
            $id = $datafq->id;
            $interest = $datafq->interest;
            $amount = $datafq->amount;
            $interestcap = $datafq->interestcap;
            $plan = $datafq->plan;
            $rate = $datafq->planAmount;
            if($plan == "High Frequency"){
                $dayInt = (($amount + $interestcap + 0.00)/100)*$rate;
            }else{
                $dayInt = 0; 
            }

                $main_interest = $interest + $dayInt + 0.00;

            DB::table("deposits")->where('id', $id)->update(['interest' => $main_interest]);
            $this->info('Successfully Updated.');

        }

        $datacons = DB::table("deposits")->where('status', 'CONFIRM')
        ->where('interest', '>=', 0)
        ->get();

        foreach ($datacons as $datacon) {
            $id = $datacon->id;
            $interest = $datacon->interest;
            $amount = $datacon->amount;
            $interestcap = $datacon->interestcap;
            $plan = $datacon->plan;
            $rate = $datacon->planAmount;
            if($plan == "Contract"){
                $dayInt = (floatval($amount+ $interestcap)/100)*$rate;
            }else{
                $dayInt = 0; 
            }

                $main_interest = $interest + $dayInt + 0.00;

            DB::table("deposits")->where('id', $id)->update(['interest' => $main_interest]);
            $this->info('Successfully Updated.');

        }

        $datalevs = DB::table("deposits")->where('status', 'CONFIRM')
        ->where('interest', '>=', 0)
        ->get();

        foreach ($datalevs as $datalev) {
            $id = $datalev->id;
            $interest = $datalev->interest;
            $amount = $datalev->amount;
            $plan = $datalev->plan;
            $interestcap = $datalev->interestcap;
            $rate = $datalev->planAmount;
            if($plan == "Leverage"){
                $dayInt =(floatval($amount+ $interestcap)/100)*$rate;
            }else{
                $dayInt = 0; 
            }

                $main_interest = $interest + $dayInt + 0.00;

            DB::table("deposits")->where('id', $id)->update(['interest' => $main_interest]);
            $this->info('Successfully Updated.');

        }
        
        $datagrams = DB::table("deposits")->where('status', 'CONFIRM')
        ->where('interest', '>=', 0)
        ->get();

        foreach ($datagrams as $datagram) {
            $id = $datagram->id;
            $interest = $datagram->interest;
            $amount = $datagram->amount;
            $plan = $datagram->plan;
            $interestcap = $datagram->interestcap;
            $rate = $datagram->planAmount;
            if($plan == "Gram"){
                $dayInt =(floatval($amount+ $interestcap)/100)*$rate;
            }else{
                $dayInt = 0; 
            }

                $main_interest = $interest + $dayInt + 0.00;

            DB::table("deposits")->where('id', $id)->update(['interest' => $main_interest]);
            $this->info('Successfully Updated.');

        }


        $dataoonzs = DB::table("deposits")->where('status', 'CONFIRM')
        ->where('interest', '>=', 0)
        ->get();

        foreach ($dataoonzs as $dataoonz) {
            $id = $dataoonz->id;
            $interest = $dataoonz->interest;
            $amount = $dataoonz->amount;
            $plan = $dataoonz->plan;
            $interestcap = $dataoonz->interestcap;
            $rate = $dataoonz->planAmount;
            if($plan == "Oonze"){
                $dayInt =(floatval($amount+ $interestcap)/100)*$rate;
            }else{
                $dayInt = 0; 
            }

                $main_interest = $interest + $dayInt + 0.00;

            DB::table("deposits")->where('id', $id)->update(['interest' => $main_interest]);
            $this->info('Successfully Updated.');

        }

        $datakilograms = DB::table("deposits")->where('status', 'CONFIRM')
        ->where('interest', '>=', 0)
        ->get();

        foreach ($datakilograms as $datakilogram) {
            $id = $datakilogram->id;
            $interest = $datakilogram->interest;
            $amount = $datakilogram->amount;
            $plan = $datakilogram->plan;
            $interestcap = $datakilogram->interestcap;
            $rate = $datakilogram->planAmount;
            if($plan == "Kilogram"){
                $dayInt =(floatval($amount+ $interestcap)/100)*$rate;
            }else{
                $dayInt = 0; 
            }

                $main_interest = $interest + $dayInt + 0.00;

            DB::table("deposits")->where('id', $id)->update(['interest' => $main_interest]);
            $this->info('Successfully Updated.');

        }


    }
}
