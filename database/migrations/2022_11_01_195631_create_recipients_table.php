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
        Schema::create('recipients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->string('company_name', 50);
            $table->string('company_address', 70);
            $table->string('city', 40);
            $table->string('country', 50);
            $table->string('state', 40);
            $table->string('zip_code', 10);
            $table->string('vat_number', 50);
            $table->string('reg_code', 50);
            $table->tinyInteger('default_recipient')->default(0);
            $table->tinyInteger('active')->default(0);
            $table->decimal('balance', 10, $place = 2)->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipients');
    }
};
