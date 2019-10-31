<?php

use App\Contract\Entity\MoneyChange\Field\NameInterface as FieldNameInterface;
use App\Contract\Entity\MoneyChange\TableInterface;
use App\Contract\Entity\Wallet\Field\NameInterface as WalletFieldNameInterface;
use App\Contract\Entity\Wallet\TableInterface as WalletTableInterface;
use App\Base\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoneyChangesTable extends Migration
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
                FieldNameInterface::WALLET_ID,
                WalletTableInterface::NAME,
                WalletFieldNameInterface::ID
            );

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
