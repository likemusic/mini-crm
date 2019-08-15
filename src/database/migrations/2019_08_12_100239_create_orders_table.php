<?php

use App\Contract\Entity\Counteragent\Field\NameInterface as CounteragentFieldNameInterface;
use App\Contract\Entity\Counteragent\TableInterface as CounteragentTableInterface;
use App\Contract\Entity\Order\Field\NameInterface as FieldNameInterface;
use App\Contract\Entity\Order\TableInterface;
use App\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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

            $table->unsignedBigInteger(FieldNameInterface::COUNTERAGENT_ID);
            $table->foreign(FieldNameInterface::COUNTERAGENT_ID)
                ->references(CounteragentFieldNameInterface::ID)
                ->on(CounteragentTableInterface::NAME);

            $this->addPriceColumn($table, FieldNameInterface::TOTAL_AMOUNT)->nullable();

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
