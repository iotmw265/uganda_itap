<?php

namespace App\Observers;

use App\Models\DataCentresMotion;
use App\Models\User;
use App\Helpers\Helper;
use App\Helpers\UserSession;
use Illuminate\Support\Facades\DB;



class MotionObserver
{
    /**
     * Handle the DataCentresMotion "created" event.
     *
     * @param  \App\Models\DataCentresMotion  $dataCentresMotion
     * @return void
     */
    public function created(DataCentresMotion $dataCentresMotion)
    {
        //

        /// sms server credentials

        $sms_api_base_url = "https://sms.imosys.mw";
        $sms_api_url = "smpp/api/send";
        $sms_server_key = "JBGAKHECH1MW@N0";

        $motion = $dataCentresMotion->toArray();

        $motionInt = $motion["value"] / 100;
        $ieee = $motion["ieee"];
        $Blantyre = ["AAACD0FEFF2C6A3C", "99ACD0FEFF2C6A3C"];
        $Lilongwe = ["9FACD0FEFF2C6A3C","C5ACD0FEFF2C6A3C", "88ACD0FEFF2C6A3C", "68ACD0FEFF2C6A3C"];

        if($ieee == "AAACD0FEFF2C6A3C" || $ieee == "99ACD0FEFF2C6A3C") {
            $title = "Centenary Bank Server Room";
            $message = "Motion has been detected at Blantyre Data Center";
            if ($motionInt > 49) {
                $lastAlert = DB::table('alerts')
                    ->where('location', 'Blantyre Branch')
                    ->where('parameter', 'motion')
                    ->where('created_at', '>', now()->subHours(2))
                    ->first();

                if (!$lastAlert) {
                    $tokens = User::whereNotNull('firebase_token')
                        ->pluck('firebase_token')
                        ->toArray();

                    $phoneNumbers = User::whereNotNull('phone')
                        ->pluck('phone')
                        ->toArray();
                    $jsonNotification = json_encode([]); #empty for now
                    $push_api_response = Helper::PushFirebaseNotification(
                        "AAAAmNWp5RE:APA91bET4f7TdXyaXpNCiIzjp1bk7H8y8yYtJbddzhFaU13O184U5dsvwQMa0x3JPiZnhlGBXoHFGgs8wbT7TrDP7UOn8rwBJrbBwQOvq2v_uCjBg956Q9-uhh-nrZ4NgrtLnzsVhgPV", $tokens,
                        "{$title}", "{$message}",
                        $jsonNotification, "default" #sound
                    );
                    foreach ($phoneNumbers as $phoneNumber) {
                        $sms = Helper::Post($sms_api_base_url, $sms_api_url, array(
                            'access_key' => $sms_server_key,
                            'phone' => $phoneNumber,
                            'message' => $message,
                        ));
                    }
                    // Save the alert to the database
                    DB::table('alerts')->insert([
                        'ieee' => $ieee,
                        'parameter' => "motion",
                        'location' => 'Blantyre Branch',
                    ]);
                }
            }
        }
        else {

            $title = "Centenary Bank Server Room";
            $message = "Room temperature has gone above 32 C at Lilongwe Data Center";
            if ($motionInt > 49) {
                $lastAlert = DB::table('alerts')
                    ->where('location', 'Lilongwe Branch')
                    ->where('parameter', 'motion')
                    ->where('created_at', '>', now()->subHours(2))
                    ->first();

                if (!$lastAlert) {
                    $tokens = User::whereNotNull('firebase_token')
                        ->pluck('firebase_token')
                        ->toArray();
                    $phoneNumbers = User::whereNotNull('phone')
                        ->pluck('phone')
                        ->toArray();
                    $jsonNotification = json_encode([]); #empty for now
                    $push_api_response = Helper::PushFirebaseNotification(
                        "AAAAmNWp5RE:APA91bET4f7TdXyaXpNCiIzjp1bk7H8y8yYtJbddzhFaU13O184U5dsvwQMa0x3JPiZnhlGBXoHFGgs8wbT7TrDP7UOn8rwBJrbBwQOvq2v_uCjBg956Q9-uhh-nrZ4NgrtLnzsVhgPV", $tokens,
                        "{$title}", "{$message}",
                        $jsonNotification, "default" #sound
                    );
                    foreach ($phoneNumbers as $phoneNumber) {
                        $sms = Helper::Post($sms_api_base_url, $sms_api_url, array(
                            'access_key' => $sms_server_key,
                            'phone' => $phoneNumber,
                            'message' => $message,
                        ));
                    }
                    // Save the alert to the database
                    DB::table('alerts')->insert([
                        'ieee' => $ieee,
                        'parameter' => "motion",
                        'location' => 'Lilongwe Branch',
                    ]);
                }
            }

        }
    }

    /**
     * Handle the DataCentresMotion "updated" event.
     *
     * @param  \App\Models\DataCentresMotion  $dataCentresMotion
     * @return void
     */
    public function updated(DataCentresMotion $dataCentresMotion)
    {
        //
    }

    /**
     * Handle the DataCentresMotion "deleted" event.
     *
     * @param  \App\Models\DataCentresMotion  $dataCentresMotion
     * @return void
     */
    public function deleted(DataCentresMotion $dataCentresMotion)
    {
        //
    }

    /**
     * Handle the DataCentresMotion "restored" event.
     *
     * @param  \App\Models\DataCentresMotion  $dataCentresMotion
     * @return void
     */
    public function restored(DataCentresMotion $dataCentresMotion)
    {
        //
    }

    /**
     * Handle the DataCentresMotion "force deleted" event.
     *
     * @param  \App\Models\DataCentresMotion  $dataCentresMotion
     * @return void
     */
    public function forceDeleted(DataCentresMotion $dataCentresMotion)
    {
        //
    }
}
