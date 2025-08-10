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
        Schema::create('key_value', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->string('title_id')->nullable();
            $table->string('title_en');
            $table->string('title_alt_id')->nullable();
            $table->string('title_alt_en');
            $table->string('description_id')->nullable();
            $table->string('description_en');
            $table->longText('content_id')->nullable();
            $table->longText('content_en');
            $table->boolean('is_list')->nullable()->default(false);
            $table->boolean('is_active')->nullable()->default(true);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('key_value');
    }
};
