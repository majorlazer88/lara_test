<?php

namespace App\Providers;

use App\Events\NewEntryReceivedEvent;
use App\Listeners\WelcomeContestEntryNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use function Illuminate\Events\queueable;
use App\Events\PaymentDiscountSet;
use App\Listeners\Payment;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        NewEntryReceivedEvent::class => [
            WelcomeContestEntryNotification::class,
        ],
        PaymentDiscountSet::class => [
            Payment::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        // Event::listen(
        //     PaymentDiscountSet::class, [Payment::class, '']
        // );

        // Event::listen(queueable(function (PaymentDiscountSet $event) {
        //     //
        // })->onConnection('database')->onQueue('default')->delay(now()->addSecond(10))
        // ->catch(function (PaymentDiscountSet $event, \Throwable $e) {

        // }));
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
