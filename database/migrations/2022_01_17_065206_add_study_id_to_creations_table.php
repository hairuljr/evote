<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStudyIdToCreationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('creations', function (Blueprint $table) {
            if (!Schema::hasColumn('creations', 'study_id')) {
                $table->foreignId('study_id')->after('id');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('creations', function (Blueprint $table) {
            if (Schema::hasColumn('creations', 'study_id')) {
                $table->dropColumn('study_id');
            }
        });
    }
}
