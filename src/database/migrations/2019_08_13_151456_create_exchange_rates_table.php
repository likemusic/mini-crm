<?php

use App\Contract\Entity\ExchangeRate\Field\NameInterface as FieldNameInterface;
use App\Contract\Entity\ExchangeRate\TableInterface;

use App\Contract\Entity\Currency\Field\NameInterface as CurrencyFieldNameInterface;
use App\Contract\Entity\Currency\TableInterface as CurrencyTableInterface;

use App\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExchangeRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(TableInterface::NAME, function (Blueprint $table) {
            $table->bigIncrements('id');

            $this->addRelationColumn(
                $table,
                FieldNameInterface::FROM_CURRENCY_ID,
                CurrencyTableInterface::NAME,
                CurrencyFieldNameInterface::ID
            );

            $this->addRelationColumn(
                $table,
                FieldNameInterface::TO_CURRENCY_ID,
                CurrencyTableInterface::NAME,
                CurrencyFieldNameInterface::ID
            );

            $table->decimal(FieldNameInterface::RATE, 9, 5);
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
