<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contact_messages', function (Blueprint $table) {

            if (!Schema::hasColumn('contact_messages', 'is_read')) {
                $table->boolean('is_read')
                    ->default(false)
                    ->after('message');
            }

            if (!Schema::hasColumn('contact_messages', 'is_processed')) {
                $table->boolean('is_processed')
                    ->default(false)
                    ->after('is_read');
            }

        });
    }

    public function down(): void
    {
        Schema::table('contact_messages', function (Blueprint $table) {

            if (Schema::hasColumn('contact_messages', 'is_processed')) {
                $table->dropColumn('is_processed');
            }

            if (Schema::hasColumn('contact_messages', 'is_read')) {
                $table->dropColumn('is_read');
            }

        });
    }
};