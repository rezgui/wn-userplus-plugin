<?php namespace Winter\UserPlus\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class UserAddUrlField extends Migration
{
    public function up()
    {
        if (Schema::hasColumn('users', 'url')) {
            return;
        }

        Schema::table('users', function($table)
        {
            $table->string('url', 200)->nullable();
        });
    }

    public function down()
    {
        if (Schema::hasTable('users') && Schema::hasColumn('users', 'url')) {
            Schema::table('users', function ($table) {
                $table->dropColumn(['url']);
            });
        }
    }
}
