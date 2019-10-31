<?php

use App\Contract\Entity\MoneyTransfer\Field\NameInterface as FieldNameInterface;
use App\Contract\Entity\MoneyTransfer\TableInterface;
use App\Contract\Entity\MoneyChange\Field\NameInterface as MoneyChangeFieldNameInterface;
use App\Contract\Entity\MoneyChange\TableInterface as MoneyChangeTableInterface;
use App\Base\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoneyTransfersTable extends Migration
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

            $this->addRelationColumn(
                $table,
                FieldNameInterface::INCOME_MONEY_CHANGE_ID,
                MoneyChangeTableInterface::NAME,
                MoneyChangeFieldNameInterface::ID
            );

            $this->addRelationColumn(
                $table,
                FieldNameInterface::OUTCOME_MONEY_CHANGE_ID,
                MoneyChangeTableInterface::NAME,
                MoneyChangeFieldNameInterface::ID
            );

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
