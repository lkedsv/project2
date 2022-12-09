<?php

use App\Models\cliente;
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
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id();
            $table->string('cep');
            $table->text('rua')->nullable();
            $table->text('bairro')->nullable();
            $table->text('cidade');
            $table->string('uf');
            $table->text('complemento')->nullable();
            $table->foreignIdFor(cliente::class); //Chave estrangeira para User "One"
            $table->timestamps();
        });

        //Vinculação da chave estrangeira
        Schema::table('enderecos', function (Blueprint $table) {
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
};
