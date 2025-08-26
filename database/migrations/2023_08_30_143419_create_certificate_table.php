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
        Schema::create('certificate', function (Blueprint $table) {
            $table->bigInteger('id', true);
            // $table->bigInteger('admin_id')->nullable();
            $table->string('name_id')->nullable();
            // $table->string('name_en');
            $table->text('description_id')->nullable();
            // $table->text('description_en');
            $table->text('logo')->nullable();
            $table->boolean('showcase')->nullable()->default(false);
            // $table->boolean('is_active')->nullable()->default(true);
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
        Schema::dropIfExists('certificate');
    }
};
