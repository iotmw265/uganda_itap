<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DataCentresTemp;
use App\Models\DataCentresHum;
use App\Models\DataCentresMotion;

class DataUploadController extends Controller
{
    public function insert(Request $request)
    {

        //dd($request);
        // Validate the incoming request data
        $validatedData = $request->validate([
            'type' => 'required|string',
            'command' => 'required|string',
            'ieee' => 'required|string',
            'value' => 'required|string',
        ]);

        /*echo('"'.$validatedData['type']).'"';
        echo($validatedData['command'].' ');
        echo($validatedData['ieee'].' ');
        echo($validatedData['value'].' ');*/

        if ($validatedData['command'] === 'temp') {
            DataCentresTemp::create([
                'type' => $validatedData['type'],
                'command' => $validatedData['command'],
                'ieee' => $validatedData['ieee'],
                'value' => $validatedData['value'],
            ]);
        } elseif ($validatedData['command'] === 'humi') {
            DataCentresHum::create([
                'type' => $validatedData['type'],
                'command' => $validatedData['command'],
                'ieee' => $validatedData['ieee'],
                'value' => $validatedData['value'],
            ]);
        } elseif ($validatedData['command'] == 'sensor') {
            DataCentresMotion::create([
                'type' => $validatedData['type'],
                'command' => $validatedData['command'],
                'ieee' => $validatedData['ieee'],
                'value' => $validatedData['value'],
            ]);
        }

        return response()->json(['message' => 'Data inserted successfully'], 201);
    }

    public function receiveData(Request $request)
    {

        // Assuming you have a corresponding model named 'Data' and a corresponding table named 'data'
        DB::table('generator_data')->insert([
            'supervisor_state' => $request->input('supervisor_state'),
            'generator_state' => $request->input('generator_state'),
            'mains_state' => $request->input('mains_state'),
            'load_switching_state' => $request->input('load_switching_state'),
            'mode' => $request->input('mode'),
            'engine_speed' => $request->input('engine_speed'),
            'oil_pressure' => $request->input('oil_pressure'),
            'coolant_temperature' => $request->input('coolant_temperature'),
            'fuel_level' => $request->input('fuel_level'),
            'change_altenator' => $request->input('change_altenator'),
            'engine_battery' => $request->input('engine_battery'),
            'engine_starts' => $request->input('engine_starts'),
            'engine_hours' => $request->input('engine_hours'),
            'dg_loaded' => $request->input('dg_loaded'),
        ]);

        return response()->json(['success' => true]);
    }


}
