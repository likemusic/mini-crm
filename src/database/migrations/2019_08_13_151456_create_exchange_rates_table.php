<?php

use App\Contract\Entity\ExchangeRate\Field\NameInterface as FieldNameInterface;
use App\Contract\Entity\ExchangeRate\TableInterface;
use Illuminate\Database\Migrations\Migration;
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
            $table->char(FieldNameInterface::FROM_CURRENCY_CODE, 3);
            $table->char(FieldNameInterface::TO_CURRENCY_CODE, 3);
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
