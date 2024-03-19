<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        schema::create('orders' ,function(Blueprint $table){
             $table->id();
             $table->integer('ID_client')->unsigned();
             $table->foreign('ID_client')->references('id')->on('users')->deleteOn('CASCADE');
             $table->date('date_Commande')->default(now());
             $table->text('Adresse_Livraison');
             $table->string('ville');
             $table->float('totalPayer');
             $table->string('etat')->default('en cour');
             $table->timestamps();





        });

        // Date_commande DATE,
        // Total DECIMAL(10, 2),
        // Statut VARCHAR(50),
        // Mode_paiement VARCHAR(50),
        // Adresse_livraison TEXT,
        // Adresse_facturation TEXT,
        // Informations_supplémentaires TEXT,
        // created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        // updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        // FOREIGN KEY (ID_client) REFERENCES clients(ID_client)
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
