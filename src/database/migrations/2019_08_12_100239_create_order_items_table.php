<?php

use App\Contract\Entity\OrderItem\Field\NameInterface as FieldNameInterface;
use App\Contract\Entity\OrderItem\TableInterface;
use App\Contract\Entity\ProductQuote\Field\NameInterface as ProductQuoteFieldNameInterface;
use App\Contract\Entity\ProductQuote\TableInterface as ProductQuoteTableInterface;
use App\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateOrderItemsTable extends Migration
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

            $table->unsignedBigInteger(FieldNameInterface::PRODUCT_QUOTE_ID);
            $table->foreign(FieldNameInterface::PRODUCT_QUOTE_ID)
                ->references(ProductQuoteFieldNameInterface::ID)
                ->on(ProductQuoteTableInterface::NAME);

            $this->addPriceColumn($table, FieldNameInterface::SELLING_PRICE);
            $table->unsignedInteger(FieldNameInterface::COUNT);
            $this->addPriceColumn($table, FieldNameInterface::AMOUNT);

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
