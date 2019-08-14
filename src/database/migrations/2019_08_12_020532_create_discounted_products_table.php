<?php

use App\Contract\Entity\DiscountedProduct\Field\NameInterface as FieldNameInterface;
use App\Contract\Entity\DiscountedProduct\TableInterface;
use App\Contract\Entity\Product\Field\NameInterface as ProductFieldNameInterface;
use App\Contract\Entity\Product\TableInterface as ProductTableInterface;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountedProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(TableInterface::NAME, function (Blueprint $table) {
            $table->bigIncrements(FieldNameInterface::ID);
            $table->unsignedBigInteger(FieldNameInterface::PRODUCT_ID);

            $table->foreign(FieldNameInterface::PRODUCT_ID)
                ->references(ProductFieldNameInterface::ID)
                ->on(ProductTableInterface::NAME);

            $table->text(FieldNameInterface::NOTE)->nullable();

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
        Schema::dropIfExists(TableInterface::NAME);
    }
}
