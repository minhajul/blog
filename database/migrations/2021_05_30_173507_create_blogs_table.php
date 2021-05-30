<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $status = config('enums.blog_status');

        Schema::create('blogs', function (Blueprint $table) use ($status) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->enum('status', $status)->default($status[0]);
            $table->longText('details');
            $table->unsignedBigInteger('hit_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
