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
       
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
