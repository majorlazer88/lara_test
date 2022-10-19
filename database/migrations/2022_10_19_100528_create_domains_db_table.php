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
        Schema::create('domains_db', function (Blueprint $table) {
            $table->id();
            $table->binary('domain');
            $table->string('TLD', 30);
            $table->string('region', 50);
            $table->string('lang', 40);
            $table->decimal('platform_price', 10, 2)->nullable()->default(0);
            $table->foreignId('service_provider_id')->constrained()->comment('Domain provider ID');
            $table->mediumText('spec_conditions')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('domains_db');
    }
};
