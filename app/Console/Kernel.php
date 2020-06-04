<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Kalemaat;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\TriggerNotications::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule){
        $schedule->command('notifications:trigger')
                 ->everyMinute();

        $schedule->call(function () {
            $kalemaat = Kalemaat::where(array('is_active'=>TRUE,'is_default'=>TRUE))->first();
            if($kalemaat){  
                $updatekalemaat= Kalemaat::where(array('is_active'=>TRUE))->where('id', '>', $kalemaat->id)->orderBy('id','asc')->first();
                if($updatekalemaat){
                    Kalemaat::where(['is_default'=>TRUE])->where('id', '!=',$updatekalemaat->id)->update(['is_default'=>FALSE]);
                    Kalemaat::where(array('id'=>$updatekalemaat->id))->update(['is_default'=>TRUE]); 
                }else{
                    $kalemaat = Kalemaat::where(array('is_active'=>TRUE))->orderBy('id','asc')->first();
                    Kalemaat::where(array('id'=>$kalemaat->id))->update(['is_default'=>TRUE]);           
                    Kalemaat::where('id', '!=',$kalemaat->id)->update(['is_default'=>FALSE]);               
                }
                $response=array('status'=>TRUE,'message'=>'Record Updated');
            }else{
                $response=array('status'=>FALSE,'message'=>'Oops! Default Kalemaats not found.');
            }
            return response()->json($response);         
        })->dailyAt('17:30');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
