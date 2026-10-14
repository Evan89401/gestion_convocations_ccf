<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('actions', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 50)->unique();
            $table->string('commentaire', 250)->nullable();
            $table->timestamps();
        });

        Schema::create('autoriser', function (Blueprint $table) {
            $table->unsignedBigInteger('id_role');
            $table->unsignedBigInteger('id_action');
            $table->string('commentaire', 250)->nullable();
            $table->timestamps();

            $table->primary(['id_role', 'id_action']);

            $table->foreign('id_role')
                ->references('id')
                ->on('roles');

            $table->foreign('id_action')
                ->references('id')
                ->on('actions');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('autoriser');
        Schema::dropIfExists('actions');
    }
};