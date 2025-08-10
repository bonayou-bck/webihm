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
        Schema::create('blog_history', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('blog_id')->nullable();
            $table->string('title_id')->nullable();
            $table->string('title_en')->nullable();
            $table->text('notes')->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->enum('status', ['review', 'rejected'])->nullable()->comment('review and rejected only');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_history');
    }
};
