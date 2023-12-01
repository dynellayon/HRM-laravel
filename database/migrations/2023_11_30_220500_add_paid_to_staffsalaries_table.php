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
        Schema::table('staff_salaries', function (Blueprint $table) {
            $table->string('absences')->nullable();
            $table->string('tardiness')->nullable();
            $table->string('Overtime')->nullable();
            $table->string('Tax')->nullable();
            $table->string('sss')->nullable();
            $table->string('philhealth')->nullable();
            $table->string('hdmf')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('staff_salaries', function (Blueprint $table) {
            $table->dropColumn('absences');
            $table->dropColumn('tardiness');
            $table->dropColumn('Overtime');
            $table->dropColumn('Tax');
            $table->dropColumn('sss');
            $table->dropColumn('philhealth');
            $table->dropColumn('hdmf');
        });
    }
};
