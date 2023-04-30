<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_departments', function (Blueprint $table) {
            $table->id('dept_id');
            $table->string('dept_name');
            $table->timestamps();
        });

        DB::table('tbl_departments')->insert([
            ['dept_name' => 'Information Technology'],
            ['dept_name' => 'Math'],
            ['dept_name' => 'Mechanical Engineering'],
            ['dept_name' => 'Electrical Engineering'],
            ['dept_name' => 'Civil Engineering'],
            ['dept_name' => 'Architecture'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
