<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndex extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medias', function (Blueprint $table) {
            $table->index('name');
        });
        Schema::table('playlists', function (Blueprint $table) {
            $table->index('name');
        });
        Schema::table('artists', function (Blueprint $table) {
            $table->index('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medias', function (Blueprint $table) {
            $table->dropIndex('name');
        });
        Schema::table('playlists', function (Blueprint $table) {
            $table->dropIndex('name');
        });
        Schema::table('artists', function (Blueprint $table) {
            $table->dropIndex('name');
        });
    }
}
