<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificacions', function (Blueprint $table) {
            $table->id();
            $table->string('contenido');
            $table->smallInteger('aceptado')->default(0); /* 0:no 1:si */            
            $table->smallInteger('leido')->default(0); /* 0:no 1:si */
            $table->foreignId('proyecto_id')
            ->nullable()
            ->constrained('proyectos')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            $table->foreignId('user_id')
            ->nullable()
            ->constrained('users')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notificacions');
    }
}
