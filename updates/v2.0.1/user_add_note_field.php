<?php namespace Winter\UserPlus\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class UserAddNoteField extends Migration
{
    public function up()
    {
        if (Schema::hasColumn('users', 'note')) {
            return;
        }

        Schema::table('users', function($table)
        {
            $table->text('note')->nullable();
        });
    }

    public function down()
    {
        if (Schema::hasTable('users') && Schema::hasColumn('users', 'note')) {
            Schema::table('users', function ($table) {
                $table->dropColumn(['note']);
            });
        }
    }
}
