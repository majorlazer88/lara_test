<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->binary('photo_bin')->after('remember_token');
            $table->uuid('uuid')->after('remember_token');
            $table->char('char', 2)->after('remember_token');
            $table->enum('user_provider_type', ['default', 'provider'])->after('remember_token');
            $table->ipAddress('visitor')->after('remember_token');
            $table->set('flavors', ['strawberry', 'vanilla'])->after('remember_token');
            $table->double('user_total_amount_spent_double', 10, 2)->after('remember_token');
            $table->decimal('user_total_amount_spent_decimal', 10, 2)->after('remember_token');
            $table->float('user_total_amount_spent_float', 10, 2)->after('remember_token');
            $table->softDeletes()->after('remember_token');
            $table->time("user_created_time")->after('remember_token');
            $table->timeTz("user_created_timeTz")->after('remember_token');
            $table->timestamp("user_suspension_timestamp")->nullable()->default(null)->after('remember_token');
            $table->timestamp("user_created_time_ts")->useCurrent()->after('remember_token');
            $table->string("user_referral", 254)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
