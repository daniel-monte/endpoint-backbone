<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZipCodesTable extends Migration
{

    public function up()
    {
        Schema::create('federal_entities', function (Blueprint $table) {
            $table->mediumIncrements('key');
            $table->string('name')->unique();// <================[ d_estado
            $table->string('code')->nullable();//  <================[ c_CP
        });
        //name

        Schema::create('municipalities', function (Blueprint $table){
            $table->mediumIncrements('key');
            $table->string('name')->unique();// <================[ D_mnpio
        });
        //name

        Schema::create('settlements_type', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();// <================[ d_tipo_asenta
        });
        //name

        Schema::create('zip_codes', function (Blueprint $table){
            $table->id();
            $table->string('zip_code')->unique();// <================[ d_codigo
            $table->string('locality')->nullable();// <================[ d_ciudad

            $table->string('federal_entity');// <================[ d_estado
            //$table->foreign('federal_entity')->references('name')->on('federal_entities');
            
            $table->string('municipality');// <================[ D_mnpio
            //$table->foreign('municipality')->references('name')->on('municipalities');
        });
        //zip_code,municipality,federal_entity,locality


        Schema::create('settlements', function (Blueprint $table){
            $table->bigIncrements('key');
            $table->string('zip_code');// <================[ d_codigo
            $table->foreign('zip_code')->references('zip_code')->on('zip_codes');
            $table->string('name');// <================[ d_asenta
            $table->string('zone_type');// <================[ d_zona
            $table->string('settlement_type');// <================[ d_tipo_asenta
            
        });
        //zip_code,name,settlement_type,zone_type
    }


    public function down()
    {
        Schema::dropIfExists('federal_entities');
        Schema::dropIfExists('municipalities');
        Schema::dropIfExists('settlements_type');
        Schema::dropIfExists('zip_codes');
        Schema::dropIfExists('settlements');
    }
}
