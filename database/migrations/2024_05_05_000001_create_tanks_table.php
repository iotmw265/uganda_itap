<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanks', function (Blueprint $table) {
            $table->id();
            $table->string('TankCode')->nullable();
            $table->integer('IntervalNo')->nullable();
            $table->integer('WaterLevel')->nullable();
            $table->integer('Temperature1')->nullable();
            $table->integer('Temperature2')->nullable();
            $table->double('BatteryLevel')->nullable();
            $table->integer('Timespan')->nullable();
            $table->timestamp('ExactTime')->nullable();
            $table->string('Airtime')->nullable();
            $table->string('GSMSignal')->nullable();
            $table->string('AssetId')->nullable();
            $table->string('SerialNumber')->nullable();
            $table->integer('Status')->nullable();
            $table->string('UpdatedOn')->nullable();
            $table->string('VarA0')->nullable();
            $table->string('VarB0')->nullable();
            $table->string('VarC0')->nullable();
            $table->string('VarD0')->nullable();
            $table->string('VarE0')->nullable();
            $table->string('VarF0')->nullable();
            $table->string('VarG0')->nullable();
            $table->string('VarH0')->nullable();
            $table->string('VarI0')->nullable();
            $table->string('VarJ0')->nullable();
            $table->string('VarK0')->nullable();
            $table->string('VarL0')->nullable();
            $table->string('VarM0')->nullable();
            $table->string('VarN0')->nullable();
            $table->string('VarO0')->nullable();
            $table->string('VarP0')->nullable();
            $table->string('inputA')->nullable();
            $table->string('inputB')->nullable();
            $table->string('inputC')->nullable();
            $table->string('inputD')->nullable();
            $table->string('outputA')->nullable();
            $table->string('outputB')->nullable();
            $table->string('outputC')->nullable();
            $table->string('outputD')->nullable();
            $table->string('factor1')->nullable();
            $table->string('factor2')->nullable();
            $table->string('factor3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tanks');
    }
}
