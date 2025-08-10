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
        Schema::create('contact', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('admin_id')->nullable();
            $table->string('name_id');
            $table->string('name_en');
            $table->text('address_id')->nullable();
            $table->text('address_en')->nullable();
            $table->string('email', 50)->nullable();
            $table->string('telephone', 18)->nullable();
            $table->string('fax', 18)->nullable();
            $table->text('cover')->nullable();
            $table->longText('location_map')->nullable();
            $table->boolean('is_active')->nullable()->default(true);
            $table->boolean('is_footer')->default(false);
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
        Schema::dropIfExists('contact');
    }
};
