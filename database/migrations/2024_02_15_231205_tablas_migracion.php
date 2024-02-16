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
        // Inicio de migracion de tablas
        // Migración para la tabla Departamento
            Schema::create('departamento', function (Blueprint $table) {
                $table->string('id_departamento', 25)->primary();
                $table->string('nombre_departamento', 50);
                $table->engine = 'InnoDB';
            });

            // Migración para la tabla Municipio
            Schema::create('municipio', function (Blueprint $table) {
                $table->string('id_municipio', 25)->primary();
                $table->string('nombre_municipio', 150);
                $table->string('id_departamento', 25);
                $table->foreign('id_departamento')->references('id_departamento')->on('departamento')->onDelete('restrict')->onUpdate('restrict');
                $table->engine = 'InnoDB';
            });

            // Migración para la tabla Puesto
            Schema::create('puesto', function (Blueprint $table) {
                $table->string('id_puesto', 25)->primary();
                $table->string('nombre_puesto', 200);
                $table->string('descrip_puesto', 20);
                $table->engine = 'InnoDB';
            });

            // Migración para la tabla Usuario
            Schema::create('usuario', function (Blueprint $table) {
                $table->string('id_usuario', 20)->primary();
                $table->string('nombre_usuario', 200);
                $table->string('img_usuario', 20);
                $table->string('correo_usuario', 70);
                $table->string('contra_usuario', 25);
                $table->boolean('estado_usuario');
                $table->string('id_puesto', 25);
                $table->foreign('id_puesto')->references('id_puesto')->on('puesto')->onDelete('restrict')->onUpdate('restrict');
                $table->string('id_persona', 25);
                $table->engine = 'InnoDB';
            });

            // Migración para la tabla Permiso
            Schema::create('permiso', function (Blueprint $table) {
                $table->string('id_permiso', 20)->primary();
                $table->string('modulo_permiso', 50);
                $table->string('descrip_permiso', 200);
                $table->string('id_puesto', 25);
                $table->foreign('id_puesto')->references('id_puesto')->on('puesto')->onDelete('restrict')->onUpdate('restrict');
                $table->engine = 'InnoDB';
            });

            // Migración para la tabla Persona_datos
            Schema::create('persona_datos', function (Blueprint $table) {
                $table->string('id_persona', 25)->primary();
                $table->string('nombre_personal', 200);
                $table->string('apellido_personal', 200);
                $table->date('fechanac_personal');
                $table->integer('cel_personal');
                $table->integer('tel_personal');
                $table->string('direccion_personal', 200);
                $table->string('id_municipio', 25);
                $table->foreign('id_municipio')->references('id_municipio')->on('municipio')->onDelete('restrict')->onUpdate('restrict');
                $table->engine = 'InnoDB';
            });

            // Migración para la tabla Empresa
            Schema::create('empresa', function (Blueprint $table) {
                $table->string('id_empresa', 25)->primary();
                $table->string('nombre_empresa', 200);
                $table->string('img_empresa', 25);
                $table->boolean('estado_empresa');
                $table->date('fechainicio_empresa');
                $table->string('id_tipoEmpresa', 25);
                $table->engine = 'InnoDB';
            });

            // Migración para la tabla Tipo_empresa
            Schema::create('tipo_empresa', function (Blueprint $table) {
                $table->string('id_tipoEmpresa', 25)->primary();
                $table->string('clase_tipoEmpresa', 100);
                $table->string('descrip_tipoEmpresa', 200);
                $table->engine = 'InnoDB';
            });

            // Migración para la tabla Campania
            Schema::create('campania', function (Blueprint $table) {
                $table->string('id_campania', 25)->primary();
                $table->string('nombre_campania', 150);
                $table->date('fechainicio_campania');
                $table->date('fechafinal_campania');
                $table->date('descrip_campania');
                $table->engine = 'InnoDB';
            });

            // Migración para la tabla Blog
            Schema::create('blog', function (Blueprint $table) {
                $table->string('id_blog', 25)->primary();
                $table->string('nombre_blog', 200);
                $table->string('contenido_blog', 255);
                $table->string('descripcion_blog', 255);
                $table->date('fechaPublic_blog');
                $table->string('img_blog', 200);
                $table->string('slug_blog', 200);
                $table->string('recursos', 255);
                $table->string('id_usuario', 20);
                $table->foreign('id_usuario')->references('id_usuario')->on('usuario')->onDelete('restrict')->onUpdate('restrict');
                $table->string('id_categoria', 25);
                $table->engine = 'InnoDB';
            });

            // Migración para la tabla Categoria
            Schema::create('categoria', function (Blueprint $table) {
                $table->string('id_categoria', 25)->primary();
                $table->string('nombre_categoria', 200);
                $table->string('descrip_categoria', 255);
                $table->engine = 'InnoDB';
            });

            // Migración para la tabla Testimonio
            Schema::create('testimonio', function (Blueprint $table) {
                $table->string('id_testimonio', 25)->primary();
                $table->string('nombre_testimonio', 150);
                $table->string('descripcion_testimonio', 200);
                $table->string('id_empresa', 25);
                $table->foreign('id_empresa')->references('id_empresa')->on('empresa')->onDelete('restrict')->onUpdate('restrict');
                $table->engine = 'InnoDB';
            });

            // Migración para la tabla Contacto
            Schema::create('contacto', function (Blueprint $table) {
                $table->string('id_contacto', 25)->primary();
                $table->string('nombre_contacto', 150);
                $table->string('apellido_contacto', 150);
                $table->string('correo_contacto', 75);
                $table->string('telefono_contacto', 15);
                $table->string('asunto_contacto', 255);
                $table->string('mensaje_contacto', 200);
                $table->string('pais_contacto', 150);
                $table->integer('codigoPostal_contacto');
                $table->string('como_Encontro_contacto', 150);
                $table->string('otrosEncontro_contacto', 255);
                $table->string('id_municipio', 25);
                $table->foreign('id_municipio')->references('id_municipio')->on('municipio')->onDelete('restrict')->onUpdate('restrict');
                $table->engine = 'InnoDB';
            });

            // Migración para la tabla Contacto_campania
            Schema::create('contacto_campania', function (Blueprint $table) {
                $table->string('id_cCampania', 25)->primary();
                $table->string('nombre_cCampania', 100);
                $table->string('apellido_cCampania', 100);
                $table->string('correo_cCampania', 20);
                $table->integer('telefono_cCampania');
                $table->string('asunto_cCampania', 255);
                $table->string('mensaje_cCamapania', 255);
                $table->integer('codigoPostal_cCampania');
                $table->string('comoEncontro_cCampania', 200);
                $table->string('otroEncontro_cCampania', 200);
                $table->string('slug_cCampania', 255);
                $table->string('id_municipio', 25);
                $table->foreign('id_municipio')->references('id_municipio')->on('municipio')->onDelete('restrict')->onUpdate('restrict');
                $table->string('id_campania', 25);
                $table->engine = 'InnoDB';
            });

            // Migración para la tabla Producto
            Schema::create('producto', function (Blueprint $table) {
                $table->string('id_producto', 25)->primary();
                $table->string('nombre_producto', 200);
                $table->string('img_producto', 100);
                $table->float('precio_producto');
                $table->float('descu_producto');
                $table->float('precioFin_producto');
                $table->date('fechaIni_producto');
                $table->date('fechaFin_producto');
                $table->string('descrip_producto', 255);
                $table->engine = 'InnoDB';
            });

            // Migración para la tabla Cliente
            Schema::create('cliente', function (Blueprint $table) {
                $table->string('id_cliente', 25)->primary();
                $table->string('id_usuario', 20);
                $table->foreign('id_usuario')->references('id_usuario')->on('usuario')->onDelete('restrict')->onUpdate('restrict');
                $table->string('id_empresa', 25);
                $table->foreign('id_empresa')->references('id_empresa')->on('empresa')->onDelete('restrict')->onUpdate('restrict');
                $table->string('id_producto', 25);
                $table->foreign('id_producto')->references('id_producto')->on('producto')->onDelete('restrict')->onUpdate('restrict');
                $table->engine = 'InnoDB';
            });

        // Final de migracion de tablas
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};