<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagramasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagramas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->text('contenido')->nullable();
            $table->integer('tipo'); /* 1:contexto 2:contendedor 3:componentes 4:codigo */
            $table->smallInteger('favorito')->default(0); /* 0:en progreso 1:terminado */
            $table->smallInteger('terminado')->default(0); /* 0:en progreso 1:terminado */
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
        Schema::dropIfExists('diagramas');
    }
}
