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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->date('dob');
            $table->integer('age');
            $table->integer('height');
            $table->integer('weight');
            $table->string('work');
            $table->string('bloodGroup')->nullable();
            $table->string('gender');
            $table->text('address');
            $table->integer('mobile');
            $table->bigInteger('nationalId');
            $table->string('photo')->nullable();
            $table->string('package');
            $table->bigInteger('total');
            $table->bigInteger('paid');
            $table->bigInteger('due')->nullable();
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('members');
    }
};
