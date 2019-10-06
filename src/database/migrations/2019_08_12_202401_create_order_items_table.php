<?php

use App\Contract\Entity\OrderItem\Field\NameInterface as FieldNameInterface;
use App\Contract\Entity\OrderItem\TableInterface;
use App\Contract\Entity\Order\Field\NameInterface as OrderFieldNameInterface;
use App\Contract\Entity\ProductQuote\TableInterface as ProductQuoteTableInterface;
use App\Contract\Entity\Order\TableInterface as OrderTableInterface;
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

            $table->unsignedBigInteger(FieldNameInterface::ORDER_ID);
            $table->foreign(FieldNameInterface::ORDER_ID)
                ->references(OrderFieldNameInterface::ID)
                ->on(OrderTableInterface::NAME);


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
