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
        Schema::create('coachings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('coachkaryawanID');
            $table->unsignedBiginteger('coacheekaryawanID');
            $table->date('tanggal');
            $table->string('topikkonseling');
            $table->string('responsekonseling');
            $table->string('fukonseling');
            $table->string('targetkonseling');
            $table->string('hasilkonseling');
            $table->string('summary');
            $table->timestamps();

            $table->foreign('coachkaryawanID')->references('id')->on('karyawans')->cascadeOnDelete();
            $table->foreign('coacheekaryawanID')->references('id')->on('karyawans')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coachings');
    }
};
