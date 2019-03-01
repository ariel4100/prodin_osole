<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

Schema::dropIfExists('productos');
class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nombre')->nullable();
            $table->text('descripcion')->nullable();
            $table->text('caracteristicas')->nullable();
            $table->text('especificaciones')->nullable();
            $table->string('file_image')->default('no-image.jpg')->nullable();
            $table->string('file_plano')->nullable();
            $table->string('file_ficha')->nullable();
            $table->string('link_mercadolibre')->nullable();
            //$table->unsignedInteger('categoria_id');
            //$table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->string('orden')->nullable();

            $table->integer('categoria_id')->unsigned()->nullable();
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');

            $table->integer('subcategoria_id')->unsigned()->nullable();
            $table->foreign('subcategoria_id')->references('id')->on('subcategorias')->onDelete('cascade');
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
        Schema::dropIfExists('productos');
    }
}
