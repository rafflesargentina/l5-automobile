<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutomobilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('automobiles', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string('source');
            $table->string('factory_type_id');
            $table->string('factory_type')->nullable();
            $table->string('factory_id')->nullable();
            $table->string('factory')->nullable();
            $table->string('brand_id');
            $table->string('brand');
            $table->string('type_id');
            $table->string('type');
            $table->string('model_id');
            $table->string('model');
            $table->decimal('y2017', 10, 2)->nullable();
            $table->decimal('y2016', 10, 2)->nullable();
            $table->decimal('y2015', 10, 2)->nullable();
            $table->decimal('y2014', 10, 2)->nullable();
            $table->decimal('y2013', 10, 2)->nullable();
            $table->decimal('y2012', 10, 2)->nullable();
            $table->decimal('y2011', 10, 2)->nullable();
            $table->decimal('y2010', 10, 2)->nullable();
            $table->decimal('y2009', 10, 2)->nullable();
            $table->decimal('y2008', 10, 2)->nullable();
            $table->decimal('y2007', 10, 2)->nullable();
            $table->decimal('y2006', 10, 2)->nullable();
            $table->decimal('y2005', 10, 2)->nullable();
            $table->decimal('y2004', 10, 2)->nullable();
            $table->decimal('y2003', 10, 2)->nullable();
            $table->decimal('y2002', 10, 2)->nullable();
            $table->decimal('y2001', 10, 2)->nullable();
            $table->decimal('y2000', 10, 2)->nullable();
            $table->decimal('y1999', 10, 2)->nullable();
            $table->decimal('y1998', 10, 2)->nullable();
            $table->decimal('y1997', 10, 2)->nullable();
            $table->decimal('y1996', 10, 2)->nullable();
            $table->decimal('y1995', 10, 2)->nullable();
            $table->decimal('y1994', 10, 2)->nullable();
            $table->decimal('y1993', 10, 2)->nullable();
            $table->decimal('y1992', 10, 2)->nullable();
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
        Schema::dropIfExists('automobiles');
    }
}
