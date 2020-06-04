<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Notification;
use App\User;

class TriggerNotications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notifications:trigger {notification_id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Code for trigger notifications';

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
     * @return mixed
     */
    public function handle()
    {
        $notification_id = $this->argument('notification_id');
        if(intval($notification_id) > 0)
            $notifications = Notification::where('id', $notification_id)->get();
        else
            $notifications = Notification::whereRaw("date_format(datetime, '%Y-%m-%d %H:%i') = '".date('Y-m-d H:i')."'")->get();

        if(!empty($notifications)){
            foreach ($notifications as $notification){
                $notification_type = $notification->type;
                $notification_datetime = $notification->datetime;

                $users = User::whereHas('roles', function($query){
                    $query->where('id','!=' ,config('constants.ROLE_TYPE_SUPERADMIN_ID'));
                })->where(['is_active'=>TRUE, 'is_online'=>TRUE]);

                if(isset($notification->device_type)){
                    $users->where('device_type', $notification->device_type);
                }  

                if(isset($notification->mobile_numbers) && $notification->mobile_numbers!=''){
                    $mobile_numbers=array_map('trim', explode(',', $notification->mobile_numbers));
                    $users->whereIn('mobile_number', $mobile_numbers);
                }     

                $country_ids = $notification->countries()->pluck('country_id');
                if(count($country_ids)>0){
                    $users->whereHas('profile.country', function($query) use ($country_ids) { 
                        $query->whereIn('id',$country_ids);              
                    });
                } 

                $city_ids = $notification->cities()->pluck('city_id');
                if(count($city_ids)>0){
                    $users->whereHas('profile.city', function($query) use ($city_ids) { 
                        $query->whereIn('id',$city_ids);              
                    });
                }

                $role_ids = $notification->roles()->pluck('role_id');
                if(count($role_ids)>0){
                    $users->whereHas('roles', function($query) use ($role_ids) { 
                        $query->whereIn('id',$role_ids);              
                    });
                }

                if(isset($notification->gender)){  
                    $gender=$notification->gender;
                    $users->whereHas('profile', function($query) use ($gender) {
                        $query->where('gender', $gender);                
                    }); 
                } 

                $users = $users->get();

                if($users->count() > 0){
                    $image='';
                    $audio='';
                    if ($notification->getFirstMedia('image')){     
                        $image=$notification->getFirstMedia('image')->getFullUrl(); 
                    }

                    if ($notification->getFirstMedia('audio')){
                        $audio=$notification->getFirstMedia('audio')->getFullUrl();
                    }

                    $extraNotificationData = array("alert" => $notification->message,"message" => $notification->message,"subject"=>$notification->subject,"website"=>$notification->website,"category"=>'',"contactno1"=>$notification->whatsapp_number,"contactno2"=>$notification->mobile_number,'hdate'=>'',"message_time"=>$notification->datetime,"image"=>$image,"audio"=>$audio,'id'=>$notification->id);
                    
                    $chunkedUsers = $users->chunk(1);
                    foreach ($chunkedUsers as $users){
                        event(new \App\Events\SendNotification($notification, $users, $extraNotificationData));
                    }
                    // echo "SENT\n\r";
                }
            }
        }
    }
}
