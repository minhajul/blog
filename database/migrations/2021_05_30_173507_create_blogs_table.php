<?php

use App\Enums\BlogStatus;
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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->enum('status', array_map(fn($status) => $status->value, BlogStatus::cases()))
                ->default(BlogStatus::PUBLISHED->value);
            $table->string('banner_path')->nullable();
            $table->longText('details');
            $table->unsignedBigInteger('hit_count')->default(0);
            $table->timestamps();

            $table->index('title');
            $table->index('slug');
            $table->index('status');
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
