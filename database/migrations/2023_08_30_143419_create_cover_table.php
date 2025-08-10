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
        Schema::create('cover', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->enum('type', ['about', 'certificate', 'sustainability', 'career', 'career-detail', 'career-apply', 'career-open-position', 'blog', 'contact', 'home'])->nullable();
            $table->text('src')->nullable();
            $table->boolean('is_video')->default(false);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cover');
    }
};
