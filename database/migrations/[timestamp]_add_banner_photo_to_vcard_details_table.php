<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('vcard_details', function (Blueprint $table) {
            $table->string('banner_photo')->nullable()->after('user_id');
        });
    }

    public function down()
    {
        Schema::table('vcard_details', function (Blueprint $table) {
            $table->dropColumn('banner_photo');
        });
    }
}; 