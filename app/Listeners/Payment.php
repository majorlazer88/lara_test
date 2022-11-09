<?php

namespace App\Listeners;

use App\Events\PaymentDiscountSet;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

// class Payment implements ShouldQueue
class Payment
{
    public $connection = 'database';
    public $queue = 'default';
    public $delay = '60';

    // If your queue connection's after_commit configuration option is set to false, you may still indicate that a particular queued listener should be dispatched after all open database transactions have been committed by defining an $afterCommit property on the listener class:
    // https://laravel.com/docs/9.x/queues#jobs-and-database-transactions
    // public $afterCommit = true;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    // use InteractsWithQueue;

    /**
     * Handle the event.
     *
     * @param  \App\Events\PaymentDiscountSet  $event
     * @return void
     */
    public function handle(PaymentDiscountSet $event)
    {
        // Perform any actions necessary to respond to the event
        $userName = $event->user->name;
        dump('Do something here with: ' . $userName);

        // if (true) {
        //     $this->release(30);
        // }

        // Stop propogation of event to other listeners
        return false;
    }

    // define the listener's queue connection or queue name at runtime
    // public function viaConnection()
    // {
    //     return 'database';
    // }

    // public function viaQueue()
    // {
    //     return 'default';
    // }

    public function shouldQueue(PaymentDiscountSet $event)
    {
        // return $event->user->is_admin == '1';
        return false;
    }

    /**
     * Handle a job failure.
     *
     * @param  \App\Events\OrderShipped  $event
     * @param  \Throwable  $exception
     * @return void
     */
    public function failed(PaymentDiscountSet $event, $exception)
    {
        dd($exception);
    }
}
