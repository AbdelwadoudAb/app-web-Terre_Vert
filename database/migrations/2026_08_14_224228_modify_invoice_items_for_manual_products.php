<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('invoice_items', function (Blueprint $table) {

            // Supprimer product_id s'il existe
            if (Schema::hasColumn('invoice_items', 'product_id')) {
                $table->dropColumn('product_id');
            }

            // Ajouter le nom du produit
            if (!Schema::hasColumn('invoice_items', 'product_name')) {
                $table->string('product_name')
                    ->after('invoice_id');
            }
        });
    }

    public function down(): void
    {
        Schema::table('invoice_items', function (Blueprint $table) {

            if (Schema::hasColumn('invoice_items', 'product_name')) {
                $table->dropColumn('product_name');
            }

            if (!Schema::hasColumn('invoice_items', 'product_id')) {
                $table->foreignId('product_id')
                    ->after('invoice_id')
                    ->constrained('products')
                    ->cascadeOnDelete();
            }
        });
    }
};