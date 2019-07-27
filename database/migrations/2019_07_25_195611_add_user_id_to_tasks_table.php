<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToTasksTable extends Migration
{
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->index();
            $table->string('status', 10);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        $table->dropColumn('user_id');
        $table->dropColumn('status');
    }
}
