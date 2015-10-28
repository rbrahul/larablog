<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddingCollunmsToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users',function($table){
            $table->string("member_type",50)->default('author');
            $table->string("status",50)->default('pending');
            $table->string("avatar",255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("users",function($table){
            $table->dropColumn('member_type');
            $table->dropColumn('status');
            $table->dropColumn('avatar');
        });
    }
}
