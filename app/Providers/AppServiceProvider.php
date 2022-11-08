<?php

namespace App\Providers;

use App\Billing\BankPaymentGateway;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\View;
use App\Billing\CreditPaymentGateway;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\Interfaces\PaymentGatewayContractInterface;
use App\Http\View\Composers\UserComposer;
use Illuminate\Database\Eloquent\Model;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind(PaymentGatewayContractInterface::class, function ($app) {
        //     return new BankPaymentGateway('usd', new UserRepository());
        // });
        $this->app->singleton(PaymentGatewayContractInterface::class, function ($app) {
            if (request()->has('credit')) {
                return new CreditPaymentGateway('usd', new UserRepository());
            }

            return new BankPaymentGateway('usd', new UserRepository());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::anonymousComponentNamespace('elements.ml.components', 'ml-html-elements');
        // $expression should be an instance of DateTime
        Blade::directive('datetime', function ($expression) {
            return "<?php echo ($expression)->format('m/d/Y H:i'); ?>";
        });
        Blade::if('disk', function ($value) {
            return config('filesystems.default') === $value;
        });

        // Option 1 - Every single view
        // View::share('users', User::orderBy('name')->get());

        // Option 2 - Regular views with wildcards
        // View::composer(['components.users'], function ($view) {
        //     $view->with('users', User::orderBy('name')->get());
        // });

        // Option 3 - Dedicated Class
        // ['users.*', 'channel.index']
        // Refactor create catalogs in resources/views
        View::composer(['components.users'], UserComposer::class);

        // As these are concerned with application correctness,
        // leave them enabled all the time.
        Model::preventAccessingMissingAttributes();
        Model::preventSilentlyDiscardingAttributes();

        // Since this is a performance concern only, don't halt
        // production for violations.
        // Model::preventLazyLoading(!$this->app->isProduction());
    }
}
