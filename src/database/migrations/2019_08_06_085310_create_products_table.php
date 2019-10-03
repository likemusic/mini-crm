<?php

use App\Contract\Entity\Product\Field\NameInterface as FieldNameInterface;
use App\Contract\Entity\Product\TableInterface;
use App\Contract\Entity\ProductCategory\TableInterface as CategoryTableInterface;
use App\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Contract\Entity\ProductCategory\Field\NameInterface as CategoryFieldNameInterface;

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
            $table->bigIncrements(FieldNameInterface::ID);
            $table->char(FieldNameInterface::NAME)->unique();
            $table->unsignedBigInteger(FieldNameInterface::CATEGORY_ID);
            $table->text(FieldNameInterface::NOTE)->nullable();

            $this->addPriceColumn($table, FieldNameInterface::APPROXIMATE_PRICE)->nullable();
            $this->addPriceColumn($table, FieldNameInterface::SELLING_PRICE)->nullable();

            $table->foreign(FieldNameInterface::CATEGORY_ID)
                ->references(CategoryFieldNameInterface::ID)
                ->on(CategoryTableInterface::NAME);

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
