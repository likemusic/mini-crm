<?php

use App\Contract\Entity\StockItem\Field\NameInterface as FieldNameInterface;
use App\Contract\Entity\StockItem\TableInterface;
use App\Contract\Entity\Product\TableInterface as ProductTableInterface;
use App\Contract\Entity\Warehouse\TableInterface as WarehouseTableInterface;
use App\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Contract\Entity\Product\Field\NameInterface as ProductFieldNameInterface;
use App\Contract\Entity\Warehouse\Field\NameInterface as WarehouseFieldNameInterface;

class CreateStockItemsTable extends Migration
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
            $table->unsignedBigInteger(FieldNameInterface::WAREHOUSE_ID);
            $table->unsignedInteger(FieldNameInterface::QUANTITY);

            $table->text(FieldNameInterface::NOTE)->nullable();

            $table->foreign(FieldNameInterface::PRODUCT_ID)
                ->references(ProductFieldNameInterface::ID)
                ->on(ProductTableInterface::NAME);

            $table->foreign(FieldNameInterface::WAREHOUSE_ID)
                ->references(WarehouseFieldNameInterface::ID)
                ->on(WarehouseTableInterface::NAME);

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
