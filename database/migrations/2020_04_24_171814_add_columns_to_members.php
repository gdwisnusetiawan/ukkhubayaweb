<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToMembers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->string('user_id')->nullable()->after('faculty_id');
            $table->string('place_of_birth')->nullable()->after('user_id');
            $table->date('date_of_birth')->nullable()->after('place_of_birth');
            $table->string('original_address')->nullable()->after('date_of_birth');
            $table->string('residence_address')->nullable()->after('original_address');
            $table->string('hobby')->nullable()->after('residence_address');

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            $table->dropColumn('place_of_birth');
            $table->dropColumn('date_of_birth');
            $table->dropColumn('original_address');
            $table->dropColumn('residence_address');
            $table->dropColumn('hobby');
        });
    }
}
