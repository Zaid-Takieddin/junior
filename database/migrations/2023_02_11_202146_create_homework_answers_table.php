<?php

use App\Models\Child;
use App\Models\Homework;
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
        Schema::create('homework_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Homework::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Child::class)->constrained()->cascadeOnDelete();
            $table->string('answer');
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
        Schema::dropIfExists('homework_answers');
    }
};
