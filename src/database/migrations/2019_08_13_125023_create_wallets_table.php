<?php

use App\Contract\Entity\Wallet\Field\NameInterface as FieldNameInterface;
use App\Contract\Entity\Wallet\TableInterface;
use App\Base\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Contract\Entity\User\Field\NameInterface as UserFieldNameInterface;
use App\Contract\Entity\User\TableInterface as UserTableInterface;

class CreateWalletsTable extends Migration
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

            $table->unsignedBigInteger(FieldNameInterface::OWNER_ID)->nullable();
            $table->string(FieldNameInterface::OWNER_TYPE)->nullable();

            $table->char(FieldNameInterface::CURRENCY_CODE, 3);

            $this->addPriceColumn($table, FieldNameInterface::AMOUNT)->nullable();

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
