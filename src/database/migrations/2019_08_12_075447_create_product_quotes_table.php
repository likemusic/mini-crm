<?php

use App\Contract\Entity\ProductQuote\Field\NameInterface as FieldNameInterface;
use App\Contract\Entity\ProductQuote\TableInterface;
use App\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductQuotesTable extends Migration
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
            $table->text(FieldNameInterface::NOTE)->nullable();

            $this->addPriceColumn($table, FieldNameInterface::APPROXIMATE_PRICE)->nullable();
            $this->addPriceColumn($table, FieldNameInterface::SELLING_PRICE)->nullable();

            $table->unsignedBigInteger(FieldNameInterface::PRODUCT_ID)->nullable();

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
