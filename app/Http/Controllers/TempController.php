<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataCentresTemp;
use App\Models\DataCentresHum;
use App\Models\DataCentresMotion;
use App\Models\UserSetting;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
// use Illuminate\Support\Facades\DB;

class TempController extends Controller
{

    public function getLatestTemperature(Request $request)
    {
        $dataCentre = $request->input('data_centre');

        // Initialize response variables
        $status = 1; // 1 for success, 0 for failure
        $message = 'Success';
        $data = [];

        // Hardcoded IEEE values for sensor 1 and sensor 2
        $sensors = [];

        if ($dataCentre === 'BT') {
            $sensors = [
                'Aisle 1' => 'AAACD0FEFF2C6A3C',
                'Aisle 2' => '99ACD0FEFF2C6A3C',
            ];
        } elseif ($dataCentre === 'LL') {
            $sensors = [
                'Aisle 1' => '9FACD0FEFF2C6A3C',
                'Aisle 2' => 'C5ACD0FEFF2C6A3C',
                'Aisle 3' => '88ACD0FEFF2C6A3C',
                'Aisle 4' => '68ACD0FEFF2C6A3C',
            ];
        }

        foreach ($sensors as $sensorName => $sensorIeee) {
            // Get the latest entries for temperature, humidity, and motion for each sensor
            $latestTemperature = DataCentresTemp::where('ieee', $sensorIeee)->orderBy('created_at', 'desc')->first();
            $latestHumidity = DataCentresHum::where('ieee', $sensorIeee)->orderBy('created_at', 'desc')->first();
            $latestMotion = DataCentresMotion::where('ieee', $sensorIeee)
            ->where('value', 49)
            ->orderBy('created_at', 'desc')
            ->first();

            // Process the data for the current sensor and add it to the list
            $sensorData = [
                'sensorName' => $sensorName,
                'temperature' => $latestTemperature ? [
                    'value' => round($latestTemperature->value / 100, 1), // Divide by 100 for temperature and round
                    'timestamp' => $latestTemperature->created_at,
                ] : null,
                'humidity' => $latestHumidity ? [
                    'value' => round($latestHumidity->value / 100), // Divide by 100 for humidity and round
                    'timestamp' => $latestHumidity->created_at,
                ] : null,
                'motion' => $latestMotion ? [
                    'timestamp' => $latestMotion->created_at,
                ] : null,
            ];

            $data[] = $sensorData;
        }

        $response = [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];

        return response()->json($response);
    }

    public function getAggregatedData(Request $request)
    {
        $dataCentre = $request->input('data_centre');
    
        // Initialize response variables
        $status = 1; // 1 for success, 0 for failure
        $message = 'Success';
        $aggregatedData = [];
    
        $sensors = [];
    
        if ($dataCentre === 'BT') {
            $sensors = [
                'Aisle 1' => 'AAACD0FEFF2C6A3C',
                'Aisle 2' => '99ACD0FEFF2C6A3C',
            ];
        } elseif ($dataCentre === 'LL') {
            $sensors = [
                'Aisle 1' => '9FACD0FEFF2C6A3C',
                'Aisle 2' => 'C5ACD0FEFF2C6A3C',
                'Aisle 3' => '88ACD0FEFF2C6A3C',
                'Aisle 4' => '68ACD0FEFF2C6A3C',
            ];
        }
    
        // Get the current date
        $currentDate = Carbon::now();
    
        // Set the "fromDate" to the start of the current day (midnight)
        $fromDate = $currentDate->startOfDay();
    
        $formattedDate = $fromDate->toDateString();
    
        // Initialize merged data array
        $mergedData = [];
    
        foreach ($sensors as $sensorName => $sensorIeees) {
            // Initialize arrays for data types
            $temperatureData = [];
            $humidityData = [];
    
            if ($sensorIeees) {
                // Get data for the single IEEE sensor for the present day
                $dailyTemperatureData = DataCentresTemp::whereDate('created_at', $fromDate)
                ->whereIn('ieee', [$sensorIeees])
                ->orderBy('created_at', 'desc')
                ->select('ieee', 'created_at', DB::raw('ROUND(value / 100, 2) as value'))
                ->distinct('created_at')
                ->get();

            $dailyHumidityData = DataCentresHum::whereDate('created_at', $fromDate)
                ->whereIn('ieee', [$sensorIeees])
                ->orderBy('created_at', 'desc')
                ->select('ieee', 'created_at', DB::raw('ROUND(value / 100, 2) as value'))
                ->distinct('created_at')
                ->get();
    
                $temperatureData = $dailyTemperatureData->toArray();
                $humidityData = $dailyHumidityData->toArray();
            }
    
            // Check if there's data available for the day
            if (!empty($temperatureData) || !empty($humidityData)) {
                $sensorData = [
                    'date' => $formattedDate,
                    'sensor_name' => $sensorName,
                    'temperature' => $temperatureData,
                    'humidity' => $humidityData,
                ];
    
                // Add the sensor data to the merged data list
                $mergedData[] = $sensorData;
            }
        }
    
        // Add the merged data list to the aggregated data array
        $aggregatedData[] = $mergedData;
    
        $response = [
            'status' => $status,
            'message' => $message,
            'data' => $aggregatedData,
        ];
    
        return response()->json($response);
    }
    
    

    

    





    
    private function getSensorName($ieee)
    {
        return $this->sensorMapping[$ieee] ?? 'Unknown Sensor';
    }

    private $sensorMapping = [
        'AAACD0FEFF2C6A3C' => 'Aisle 1',
        '99ACD0FEFF2C6A3C' => 'Aisle 2',
        // Add more mappings as needed
    ];

    public function getAggregatedDataxx(Request $request)
    // public function getData(Request $request)
    {
        $dataCentre = $request->input('data_centre');
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');

        // Retrieve all data for the specified "ieee" values
        $ieeeValues = array_keys($this->sensorMapping);

        // Query temperature and humidity data based on "ieee" and date range
        $data = DataCentresTemp::whereIn('ieee', $ieeeValues)
            ->whereBetween('date', [$fromDate, $toDate])
            ->get();

        // Process the data into the desired structure
        $result = [];

        foreach ($data as $record) {
            $sensorName = $this->getSensorName($record->ieee);
            $result[$record->date][$sensorName]['temperature'] = [
                'max' => $record->max_temp,
                'min' => $record->min_temp,
                'avg' => $record->avg_temp,
            ];
            $result[$record->date][$sensorName]['humidity'] = [
                'max' => $record->max_humidity,
                'min' => $record->min_humidity,
                'avg' => $record->avg_humidity,
            ];
        }

        // Format the result as needed
        $formattedResult = [];

        foreach ($result as $date => $sensors) {
            $formattedDate = [
                'date' => $date,
                'sensor_data' => [],
            ];

            foreach ($sensors as $sensorName => $data) {
                $formattedDate['sensor_data'][] = [
                    'sensor_name' => $sensorName,
                    'temperature' => $data['temperature'],
                    'humidity' => $data['humidity'],
                ];
            }

            $formattedResult[] = $formattedDate;
        }

        return response()->json([
            'status' => 1,
            'message' => 'Success',
            'data' => $formattedResult,
        ]);
    }

    public function UserDetails()
    {
        $user = auth()->user();
    
        return response()->json([
            'user' => $user,
        ]);
    }

    public function update(Request $request)
    {
        // Initialize response variables
        $status = 1; // 1 for success, 0 for failure
        $message = 'User setting updated';
        $data = null;
    
        try {
            // Authenticate the user
            $user = auth()->user();
    
            // Extract the user_id from the authenticated user
            $user_id = $user->id;
    
            // Get data from the request
            $parameter = $request->input('parameter');
            $statusValue = $request->input('status');
    
            // Validate the data if necessary
    
            // Update or create the user's setting
            $userSetting = UserSetting::updateOrCreate(
                ['user_id' => $user_id, 'parameter' => $parameter],
                ['status' => $statusValue]
            );
    
            // Set the data to the updated UserSetting model
            $data = $userSetting;
        } catch (\Exception $e) {
            // Handle any exceptions, if necessary
            $status = 0; // Set status to 0 for failure
            $message = 'Failed to update user setting';
        }
    
        // Build the response array
        $response = [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];
    
        return response()->json($response);
    }
    

    public function getUserData()
{
    // Initialize response variables
    $status = 1; // 1 for success, 0 for failure
    $message = 'Successfully retrieved';
    $data = null;

    try {
        // Retrieve the authenticated user
        $user = auth()->user();

        // Retrieve the user's ID from the authenticated user
        $user_id = $user->id;

        // Retrieve the user's UserSetting entries
        $userSettings = UserSetting::where('user_id', $user_id)->get();

        // Set the data to the user's UserSetting entries
        $data = $userSettings;
    } catch (\Exception $e) {
        // Handle any exceptions, if necessary
        $status = 0; // Set status to 0 for failure
        $message = 'Failed to retrieve';
    }

    // Build the response array
    $response = [
        'status' => $status,
        'message' => $message,
        'data' => $data,
    ];

    return response()->json($response);
}




public function getUpsStatus()
{
    // Get UPS status
    $upsStatus = DB::table('btz_data_center')
        ->where('SerialNumber', '230648-10089')
        ->orderBy('ExactTime', 'desc')
        ->first();

    // Get DG status
    $dgStatus = DB::table('bt_dg_state_view')
        ->where('SerialNumber', '230648-10088')
        ->orderBy('ExactTime', 'desc')
        ->first();

    if ($upsStatus && $dgStatus) {
        $phase1State = $upsStatus->phase_1 == 1 ? 'ON' : 'OFF';
        $phase2State = $upsStatus->phase_2 == 1 ? 'ON' : 'OFF';
        $dgState = $dgStatus->dg == 1 ? 'ON' : 'OFF';
        $escomState = $dgStatus->escom == 1 ? 'ON' : 'OFF';

        $phase1Image = $upsStatus->phase_1 == 1 ? 'https://centenarybank.iot.mw/img/switch_on.png' : 'https://centenarybank.iot.mw/img/switch_off.png';
        $phase2Image = $upsStatus->phase_2 == 1 ? 'https://centenarybank.iot.mw/img/switch_on.png' : 'https://centenarybank.iot.mw/img/switch_off.png';
        $dgImage = $dgStatus->dg == 1 ? 'https://centenarybank.iot.mw/img/switch_on.png' : 'https://centenarybank.iot.mw/img/switch_off.png';
        $escomImage = $dgStatus->escom == 1 ? 'https://centenarybank.iot.mw/img/switch_on.png' : 'https://centenarybank.iot.mw/img/switch_off.png';

        // Additional parameters
        $upsTimestamp = $upsStatus->ExactTime;
        $dgTimestamp = $dgStatus->ExactTime;
        $upsSerialNumber = $upsStatus->SerialNumber;
        $dgSerialNumber = $dgStatus->SerialNumber;

        return [
            'status' => 'success',
            'data' => [
                'ups' => [
                    'phase_1' => [
                        'state' => $phase1State,
                        'image' => $phase1Image
                    ],
                    'phase_2' => [
                        'state' => $phase2State,
                        'image' => $phase2Image
                    ],
                    'timestamp' => $upsTimestamp,
                    'serial_number' => $upsSerialNumber,
                ],
                'dg' => [
                    'dg' => [
                        'state' => $dgState,
                        'image' => $dgImage
                    ],
                    'escom' => [
                        'state' => $escomState,
                        'image' => $escomImage
                    ],
                    'timestamp' => $dgTimestamp,
                    
                ]
            ],
            'msg' => 'UPS and DG status retrieved successfully.'
        ];
    }

    return null;
}

public function getUpsStatusLL()
{
    // Get UPS status
    $upsStatus = DB::table('ll_data_center')
        ->where('SerialNumber', '230648-10091')
        ->orderBy('ExactTime', 'desc')
        ->first();

    // Get DG status
    $dgStatus = DB::table('ll_dg_main_state_view')
        ->where('SerialNumber', '230648-10093')
        ->orderBy('ExactTime', 'desc')
        ->first();

    $BackUpdgStatus = DB::table('deepsea_controller_view')
        ->orderBy('created_at', 'desc')
        ->first();

    if ($upsStatus && $dgStatus) {
        $phase1State = $upsStatus->phase_1 == 1 ? 'ON' : 'OFF';
        $phase2State = $upsStatus->phase_2 == 1 ? 'ON' : 'OFF';
        $phase3State = $upsStatus->phase_3 == 1 ? 'ON' : 'OFF';
        $dgState = $dgStatus->dg == 1 ? 'ON' : 'OFF';
        $escomState = $dgStatus->escom == 1 ? 'ON' : 'OFF';
        $BackUpdgState = $BackUpdgStatus->generator_status == 1 ? 'ON' : 'OFF';

        $phase1Image = $upsStatus->phase_1 == 1 ? 'https://centenarybank.iot.mw/img/switch_on.png' : 'https://centenarybank.iot.mw/img/switch_off.png';
        $phase2Image = $upsStatus->phase_2 == 1 ? 'https://centenarybank.iot.mw/img/switch_on.png' : 'https://centenarybank.iot.mw/img/switch_off.png';
        $phase3Image = $upsStatus->phase_3 == 1 ? 'https://centenarybank.iot.mw/img/switch_on.png' : 'https://centenarybank.iot.mw/img/switch_off.png';
        $dgImage = $dgStatus->dg == 1 ? 'https://centenarybank.iot.mw/img/switch_on.png' : 'https://centenarybank.iot.mw/img/switch_off.png';
        $escomImage = $dgStatus->escom == 1 ? 'https://centenarybank.iot.mw/img/switch_on.png' : 'https://centenarybank.iot.mw/img/switch_off.png';
        $BackUpdgImage = $BackUpdgStatus->generator_status == 1 ? 'https://centenarybank.iot.mw/img/switch_on.png' : 'https://centenarybank.iot.mw/img/switch_off.png';

        // Additional parameters
        $upsTimestamp = $upsStatus->ExactTime;
        $dgTimestamp = $dgStatus->ExactTime;
        $BackUpdgTimestamp = $BackUpdgStatus->created_at;
        $upsSerialNumber = $upsStatus->SerialNumber;
        $dgSerialNumber = $dgStatus->SerialNumber;

        return [
            'status' => 'success',
            'data' => [
                'UPS' => [
                    'Phase 1' => [
                        'state' => $phase1State,
                        'image' => $phase1Image
                    ],
                    'Phase 2' => [
                        'state' => $phase2State,
                        'image' => $phase2Image
                    ],
                    'Phase 3' => [
                        'state' => $phase3State,
                        'image' => $phase3Image
                    ],
                    'timestamp' => $upsTimestamp,
                      
                ],
                'Power' => [
                    'Main Generator' => [
                        'state' => $dgState,
                        'image' => $dgImage
                    ],
                    'Escom' => [
                        'state' => $escomState,
                        'image' => $escomImage
                    ],
                    'Backup Generator' => [
                        'state' => $BackUpdgState,
                        'image' => $BackUpdgImage
                    ],
                    'timestamp' => $dgTimestamp,
                
                ]
            ],
            'msg' => 'UPS and DG status retrieved successfully.'
        ];
    }

    return null;
}

public function fuel()
{
    // Fetch data for BT DG tank
    $bt_dg = DB::table('tanks')->where('serialNumber', '230648-10088')->orderBy('ExactTime', 'desc')->limit(1);
    $bt_fuel_stored = $bt_dg->value('VarD0');
    $bt_dg_last_posted = $bt_dg->value('ExactTime');
    $bt_find_height = (0.0735 * $bt_fuel_stored - 234) / 10;
    $bt_dg_fuel_height = round($bt_find_height,1);
    $bt_find_height_max = 18;
    $bt_dg_fuel_percentage = round(($bt_find_height / 18 * 100), 0);
    $bt_tank_capacity = 220;
    $bt_dg_fuel_litres = round($bt_dg_fuel_percentage / 100 * $bt_tank_capacity, 1);

    // Determine BT DG image
    if ($bt_dg_fuel_percentage < 1) {
        $bt_dg_image = 'https://centenarybank.iot.mw/img/dg_tanks/bt_tank_0.png';
    } elseif ($bt_dg_fuel_percentage <= 14) {
        $bt_dg_image = 'https://centenarybank.iot.mw/img/dg_tanks/bt_tank_10.png';
    } elseif ($bt_dg_fuel_percentage <= 24) {
        $bt_dg_image = 'https://centenarybank.iot.mw/img/dg_tanks/bt_tank_20.png';
    } elseif ($bt_dg_fuel_percentage <= 34) {
        $bt_dg_image = 'https://centenarybank.iot.mw/img/dg_tanks/bt_tank_30.png';
    } elseif ($bt_dg_fuel_percentage <= 44) {
        $bt_dg_image = 'https://centenarybank.iot.mw/img/dg_tanks/bt_tank_40.png';
    } elseif ($bt_dg_fuel_percentage <= 54) {
        $bt_dg_image = 'https://centenarybank.iot.mw/img/dg_tanks/bt_tank_50.png';
    } elseif ($bt_dg_fuel_percentage <= 64) {
        $bt_dg_image = 'https://centenarybank.iot.mw/img/dg_tanks/bt_tank_60.png';
    } elseif ($bt_dg_fuel_percentage <= 74) {
        $bt_dg_image = 'https://centenarybank.iot.mw/img/dg_tanks/bt_tank_70.png';
    } elseif ($bt_dg_fuel_percentage <= 84) {
        $bt_dg_image = 'https://centenarybank.iot.mw/img/dg_tanks/bt_tank_80.png';
    } elseif ($bt_dg_fuel_percentage <= 94) {
        $bt_dg_image = 'https://centenarybank.iot.mw/img/dg_tanks/bt_tank_90.png';
    } elseif ($bt_dg_fuel_percentage <= 100) {
        $bt_dg_image = 'https://centenarybank.iot.mw/img/dg_tanks/bt_tank_100.png';
    } else {
        $bt_dg_image = 'https://centenarybank.iot.mw/img/dg_tanks/bt_tank_technical_fault.png';
    }

    // Fetch data for LL backup DG
    $ll_backup_dg = DB::table('generator_data')->orderBy('created_at', 'desc')->limit(1);
    
    $ll_backup_dg_fuel_level = $ll_backup_dg->value('fuel_level') / 100 * 80;
    $ll_backup_dg_fuel_level_percentage = $ll_backup_dg->value('fuel_level');
    $ll_backup_dg_last_posted = $ll_backup_dg->value('created_at');

    // Determine LL backup DG image
    if ($ll_backup_dg_fuel_level_percentage < 1) {
        $ll_backup_dg_image = 'https://centenarybank.iot.mw/img/dg_tanks/ll_backup_0.png';
    } elseif ($ll_backup_dg_fuel_level_percentage <= 14) {
        $ll_backup_dg_image = 'https://centenarybank.iot.mw/img/dg_tanks/ll_backup_10.png';
    } elseif ($ll_backup_dg_fuel_level_percentage <= 24) {
        $ll_backup_dg_image = 'https://centenarybank.iot.mw/img/dg_tanks/ll_backup_20.png';
    } elseif ($ll_backup_dg_fuel_level_percentage <= 34) {
        $ll_backup_dg_image = 'https://centenarybank.iot.mw/img/dg_tanks/ll_backup_30.png';
    } elseif ($ll_backup_dg_fuel_level_percentage <= 44) {
        $ll_backup_dg_image = 'https://centenarybank.iot.mw/img/dg_tanks/ll_backup_40.png';
    } elseif ($ll_backup_dg_fuel_level_percentage <= 54) {
        $ll_backup_dg_image = 'https://centenarybank.iot.mw/img/dg_tanks/ll_backup_50.png';
    } elseif ($ll_backup_dg_fuel_level_percentage <= 64) {
        $ll_backup_dg_image = 'https://centenarybank.iot.mw/img/dg_tanks/ll_backup_60.png';
    } elseif ($ll_backup_dg_fuel_level_percentage <= 74) {
        $ll_backup_dg_image = 'https://centenarybank.iot.mw/img/dg_tanks/ll_backup_70.png';
    } elseif ($ll_backup_dg_fuel_level_percentage <= 84) {
        $ll_backup_dg_image = 'https://centenarybank.iot.mw/img/dg_tanks/ll_backup_80.png';
    } elseif ($ll_backup_dg_fuel_level_percentage <= 94) {
        $ll_backup_dg_image = 'https://centenarybank.iot.mw/img/dg_tanks/ll_backup_90.png';
    } elseif ($ll_backup_dg_fuel_level_percentage <= 100) {
        $ll_backup_dg_image = 'https://centenarybank.iot.mw/img/dg_tanks/ll_backup_100.png';
    } else {
        $ll_backup_dg_image = 'https://centenarybank.iot.mw/img/dg_tanks/ll_backup_technical_fault.png';
    }

    // Fetch data for LL DG tank
    $ll_dg = DB::table('tanks')->where('serialNumber', '230648-10093')->orderBy('ExactTime', 'desc')->limit(1);
    $ll_fuel_stored = $ll_dg->value('VarD0');
    $ll_dg_find_height = (0.081 * $ll_fuel_stored - 275) / 10;
    $ll_dg_fuel_percentage = round(($ll_dg_find_height / 29 * 100), 0);
    $ll_dg_fuel_height = round($ll_dg_find_height,1);
    $ll_dg_last_posted = $ll_dg ->value('ExactTime');
    $ll_dg_fuel_height_max = 29; 
    $ll_dg_tank_capacity = 300;
    $ll_dg_fuel_litres = round($ll_dg_fuel_percentage / 100 * $ll_dg_tank_capacity, 1);

    // Determine LL DG image
    if ($ll_dg_fuel_percentage < 1) {
        $ll_dg_image = 'https://centenarybank.iot.mw/img/dg_tanks/ll_main_0.png';
    } elseif ($ll_dg_fuel_percentage <= 14) {
        $ll_dg_image = 'https://centenarybank.iot.mw/img/dg_tanks/ll_main_10.png';
    } elseif ($ll_dg_fuel_percentage <= 24) {
        $ll_dg_image = 'https://centenarybank.iot.mw/img/dg_tanks/ll_main_20.png';
    } elseif ($ll_dg_fuel_percentage <= 34) {
        $ll_dg_image = 'https://centenarybank.iot.mw/img/dg_tanks/ll_main_30.png';
    } elseif ($ll_dg_fuel_percentage <= 44) {
        $ll_dg_image = 'https://centenarybank.iot.mw/img/dg_tanks/ll_main_40.png';
    } elseif ($ll_dg_fuel_percentage <= 54) {
        $ll_dg_image = 'https://centenarybank.iot.mw/img/dg_tanks/ll_main_50.png';
    } elseif ($ll_dg_fuel_percentage <= 64) {
        $ll_dg_image = 'https://centenarybank.iot.mw/img/dg_tanks/ll_main_60.png';
    } elseif ($ll_dg_fuel_percentage <= 74) {
        $ll_dg_image = 'https://centenarybank.iot.mw/img/dg_tanks/ll_main_70.png';
    } elseif ($ll_dg_fuel_percentage <= 84) {
        $ll_dg_image = 'https://centenarybank.iot.mw/img/dg_tanks/ll_main_80.png';
    } elseif ($ll_dg_fuel_percentage <= 94) {
        $ll_dg_image = 'https://centenarybank.iot.mw/img/dg_tanks/ll_main_90.png';
    } elseif ($ll_dg_fuel_percentage <= 100) {
        $ll_dg_image = 'https://centenarybank.iot.mw/img/dg_tanks/ll_main_100.png';
    } else {
        $ll_dg_image = 'https://centenarybank.iot.mw/img/dg_tanks/ll_main_technical_fault.png';
    }
    $dgStatus = DB::table('ll_dg_main_state_view')
    ->where('SerialNumber', '230648-10093')
    ->orderBy('ExactTime', 'desc')
    ->first();

    $BackUpdgStatus = DB::table('deepsea_controller_view')
    ->orderBy('created_at', 'desc')
    ->first();

    if ($dgStatus) {
        
        $dgState = $dgStatus->dg == 1 ? 'ON' : 'OFF';
        $escomState = $dgStatus->escom == 1 ? 'ON' : 'OFF';
        $BackUpdgState = $BackUpdgStatus->generator_status == 1 ? 'ON' : 'OFF';

       
        $dgImage = $dgStatus->dg == 1 ? 'https://centenarybank.iot.mw/img/switch_on.png' : 'https://centenarybank.iot.mw/img/switch_off.png';
        $escomImage = $dgStatus->escom == 1 ? 'https://centenarybank.iot.mw/img/switch_on.png' : 'https://centenarybank.iot.mw/img/switch_off.png';
        $BackUpdgImage = $BackUpdgStatus->generator_status == 1 ? 'https://centenarybank.iot.mw/img/switch_on.png' : 'https://centenarybank.iot.mw/img/switch_off.png';



        $dgStatus = DB::table('bt_dg_state_view')
        ->where('SerialNumber', '230648-10088')
        ->orderBy('ExactTime', 'desc')
        ->first();
    
        if ($dgStatus) {
            
            $dgState = $dgStatus->dg == 1 ? 'ON' : 'OFF';
            $escomState = $dgStatus->escom == 1 ? 'ON' : 'OFF';
    
            
            $BTdgImage = $dgStatus->dg == 1 ? 'https://centenarybank.iot.mw/img/switch_on.png' : 'https://centenarybank.iot.mw/img/switch_off.png';
            $escomImage = $dgStatus->escom == 1 ? 'https://centenarybank.iot.mw/img/switch_on.png' : 'https://centenarybank.iot.mw/img/switch_off.png';        
    // Construct response
    $response = [
        'status' => 'success',
        'data' => [
            'Blantyre Data Center Generator' => [
                'litres' => $bt_dg_fuel_litres,
                'percentage' => $bt_dg_fuel_percentage,
                'image' => $bt_dg_image,
                'height' => $bt_dg_fuel_height . " of " . $bt_find_height_max,
                'switch' => $BTdgImage,
                'Timestamp' => $bt_dg_last_posted,
            ],
            'Lilongwe Head Office Generator' => [
                'litres' => $ll_dg_fuel_litres . " of " . $ll_dg_tank_capacity,
                'percentage' => $ll_dg_fuel_percentage,
                'image' => $ll_dg_image,
                'height' => $ll_dg_fuel_height . " of " . $ll_dg_fuel_height_max,
                'switch' => $dgImage,
                'Timestamp' => $ll_dg_last_posted,
            ],
            'Lilongwe Back Up Generator' => [
                'litres' => $ll_backup_dg_fuel_level,
                'percentage' => $ll_backup_dg_fuel_level_percentage,
                'image' => $ll_backup_dg_image,
                'height' => $ll_dg_fuel_height . " of " . $ll_dg_fuel_height_max,
                'switch' => $BackUpdgImage,
                'Timestamp' => $ll_backup_dg_last_posted,
            ],
        ],
        'msg' => 'Fuel data retrieved successfully.',
    ];

    return $response;
}
    }


}
}
 

// $response = [
//     'status' => 'success',
//     'data' => [
//         [
//             'name' => 'Blantyre Data Center Generator',
//             'litres' => $bt_dg_fuel_litres,
//             'percentage' => $bt_dg_fuel_percentage,
//             'image' => $bt_dg_image,
//             'height' => $bt_dg_fuel_height . " of " . $bt_find_height_max,
//             'switch' => $BTdgImage,
//             'Timestamp' => $bt_dg_last_posted,
//         ],
//         [
//             'name' => 'Lilongwe Head Office Generator',
//             'litres' => $ll_dg_fuel_litres . " of " . $ll_dg_tank_capacity,
//             'percentage' => $ll_dg_fuel_percentage,
//             'image' => $ll_dg_image,
//             'height' => $ll_dg_fuel_height . " of " . $ll_dg_fuel_height_max,
//             'switch' => $dgImage,
//             'Timestamp' => $ll_dg_last_posted,
//         ],
//         [
//             'name' => 'Lilongwe Back Up Generator',
//             'litres' => $ll_backup_dg_fuel_level,
//             'percentage' => $ll_backup_dg_fuel_level_percentage,
//             'image' => $ll_backup_dg_image . " of " . $ll_dg_fuel_height_max,
//             'height' => $ll_dg_fuel_height . " of " . $ll_dg_fuel_height_max,
//             'switch' => $BackUpdgImage,
//             'Timestamp' => $ll_backup_dg_last_posted,
//         ],
//     ],
//     'msg' => 'Fuel data retrieved successfully.',
// ];
    


