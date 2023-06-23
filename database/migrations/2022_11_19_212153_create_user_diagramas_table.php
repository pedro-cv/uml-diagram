<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDiagramasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_diagramas', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('editar')->default(1);
            $table->foreignId('diagrama_id')
            ->nullable()
            ->constrained('diagramas')
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
        Schema::dropIfExists('user_diagramas');
    }
}
