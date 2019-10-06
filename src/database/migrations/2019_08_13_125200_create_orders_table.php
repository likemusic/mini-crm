<?php

use App\Contract\Entity\Counteragent\Field\NameInterface as CounteragentFieldNameInterface;
use App\Contract\Entity\Counteragent\TableInterface as CounteragentTableInterface;
use App\Contract\Entity\Order\Field\NameInterface as FieldNameInterface;
use App\Contract\Entity\User\Field\NameInterface as UserFieldNameInterface;
use App\Contract\Entity\Order\TableInterface;
use App\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Contract\Entity\ProductQuote\Field\NameInterface as ProductQuoteFieldNameInterface;
use App\Contract\Entity\ProductQuote\TableInterface as ProductQuoteTableInterface;
use App\Contract\Entity\User\TableInterface as UserTableInterface;

class CreateOrdersTable extends Migration
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
            $table->dateTime(FieldNameInterface::DATETIME);
            $table->integer(FieldNameInterface::DATE_ORDER_ID);

            $this->addRelationColumn(
                $table,
                FieldNameInterface::PRODUCT_QUOTE_ID,
                ProductQuoteTableInterface::NAME,
                ProductQuoteFieldNameInterface::ID
            );

            $table->string(FieldNameInterface::IMEIES);

            $table->unsignedInteger(FieldNameInterface::COUNT);
            $this->addPriceColumn($table, FieldNameInterface::AMOUNT);

            $this->addCounteragentRelation($table, FieldNameInterface::PROVIDER_ID);
            $this->addCounteragentRelation($table, FieldNameInterface::BUYER_ID);

            $this->addRelationColumn(
                $table,
                FieldNameInterface::COURIER_ID,
                UserTableInterface::NAME,
                UserFieldNameInterface::ID
            );

            $table->text(FieldNameInterface::NOTE)->nullable();

            $table->timestamps();
        });
    }

    private function addCounteragentRelation(Blueprint $table, string $fieldName)
    {
        $this->addRelationColumn($table, $fieldName, CounteragentTableInterface::NAME, CounteragentFieldNameInterface::ID);
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
