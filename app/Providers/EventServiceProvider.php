<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Models\DataCentresTemp;
use App\Models\DataCentresHum;
use App\Models\DataCentresMotion;
use App\Observers\HumidityObserver;
use App\Observers\MotionObserver;
use App\Observers\TemperatureObserver;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        // //
         DataCentresHum::observe(HumidityObserver::class);
         DataCentresMotion::observe(MotionObserver::class);
         DataCentresTemp::observe(TemperatureObserver::class);

    }
}
