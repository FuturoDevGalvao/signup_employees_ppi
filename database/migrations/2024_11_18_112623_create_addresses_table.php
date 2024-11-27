<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('road');
            $table->integer('number');
            $table->string('cep');
            $table->string('state');
            $table->string('complement');
            $table->unsignedBigInteger('employee_id');
            $table->timestamps();

            /* chaves estrangeiras */
            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
                ->onDelete('cascade'); // Excluir endereços automaticamente
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
};
