<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\DataCentresHum;
use App\Models\User;
use App\Models\UserSettings;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;

class SendPowerAlerts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'alerts:power';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Broadcast power alerts';

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

       // sms server credentials
       $sms_api_base_url = "https://sms.imosys.mw";
       $sms_api_url = "smpp/api/send";
       $sms_server_key = "JBGAKHECH1MW@N0";
       //

       $power_records = DB::table('alerts')->where('status','pending')->where('type','ups')->orderBy('created_at','desc')->get();


       foreach ( $power_records as $row)
       {
           $serial_number = $row->serial_number;
           $rack_name = $row->parameter;
           $power_status = $row->power_status;
           $created_at = $row->created_at;

               if ($power_status == 'off' ){

                    $title = "NBS Bank Server Room";
                    $message = $rack_name." has lost power as of ".$created_at.".\n\n[NOTE: IMS autogenerated message]";

               }
               elseif ($power_status == 'on' )
               {

                    $title = "NBS Bank Server Room";
                    $message = "Power at ".$rack_name." has been restored as of ".$created_at.".\n\n[NOTE: IMS autogenerated message]";

               }
       
             

                    $tokens = User::whereNotNull('firebase_token')
                        ->pluck('firebase_token')
                        ->toArray();
                    $phoneNumbers = User::whereNotNull('phone_number')
                        ->pluck('phone_number')
                        ->toArray();
                    $jsonNotification = json_encode([]); #empty for now
                    $push_api_response = Helper::PushFirebaseNotification(
                        "AAAAmNWp5RE:APA91bET4f7TdXyaXpNCiIzjp1bk7H8y8yYtJbddzhFaU13O184U5dsvwQMa0x3JPiZnhlGBXoHFGgs8wbT7TrDP7UOn8rwBJrbBwQOvq2v_uCjBg956Q9-uhh-nrZ4NgrtLnzsVhgPV", $tokens,
                        "{$title}", "{$message}",
                        $jsonNotification, "default" #sound
                    );
                    

                    /*$phoneNumbers = ['+265995131052','+265994647532','+265991183117','+265993203474'];*/
                        foreach ($phoneNumbers as $phoneNumber) {
                        $sms = Helper::Post($sms_api_base_url, $sms_api_url, array(
                            'access_key' => $sms_server_key,
                            'phone' => $phoneNumber,
                            'message' => $message,
                        ));
                        }
                    
                    /*$sms = Helper::Post($sms_api_base_url, $sms_api_url, array(
                        'access_key' => $sms_server_key,
                        'phone' => '+265994647532',
                        'message' => $message,
                    ));*/

               $id = $row->id;

               DB::table('alerts')->where('id',$id)->update(['status' => 'sent',]);

           
       }

    }
}
