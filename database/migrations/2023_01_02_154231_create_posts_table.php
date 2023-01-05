<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("posts", function (Blueprint $table) {
            $table->id();

            $table->string("title", 128);
            $table->text("introduction");
            $table->mediumText("body");
            $table->unsignedMediumInteger("like")->default(0);
            $table->unsignedMediumInteger("dislike")->default(0);

            $table->foreignId("user_id");

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
        Schema::dropIfExists("posts");
    }
};
