<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();

            // Utilisateur qui a créé la facture
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // Client concerné par la facture
            $table->foreignId('client_id')
                ->constrained('clients')
                ->cascadeOnDelete();

            $table->decimal('total', 10, 2)->default(0);

            $table->enum('status', [
                'EN_ATTENTE',
                'VALIDEE',
                'REFUSEE'
            ])->default('EN_ATTENTE');

            $table->text('admin_note')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};