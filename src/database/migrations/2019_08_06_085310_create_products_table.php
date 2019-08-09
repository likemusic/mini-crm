<?php

use App\Contract\Entity\Product\Field\NameInterface as ProductFieldNameInterface;
use App\Contract\Entity\Product\TableInterface;
use App\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(TableInterface::NAME, function (Blueprint $table) {
            $table->bigIncrements(ProductFieldNameInterface::ID);
            $table->char(ProductFieldNameInterface::NAME)->unique();
            $table->text(ProductFieldNameInterface::NOTE)->nullable();

            $this->addPriceColumn($table, ProductFieldNameInterface::APPROXIMATE_PRICE)->nullable();
            $this->addPriceColumn($table, ProductFieldNameInterface::SELLING_PRICE)->nullable();

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
