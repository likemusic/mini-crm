<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Contract\Entity\ProductInterface;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(ProductInterface::TABLE, function (Blueprint $table) {
            $table->bigIncrements(ProductInterface::FIELD_ID);
            $table->char(ProductInterface::FIELD_NAME)->unique();
            $table->text(ProductInterface::FIELD_NOTE)->nullable();
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
        Schema::dropIfExists('products');
    }
}
