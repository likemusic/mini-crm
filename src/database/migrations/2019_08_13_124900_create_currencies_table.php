<?php

use App\Contract\Entity\Currency\Field\NameInterface as FieldNameInterface;
use App\Contract\Entity\Currency\TableInterface;
use App\Base\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Contract\Entity\User\Field\NameInterface as UserFieldNameInterface;
use App\Contract\Entity\User\TableInterface as UserTableInterface;

class CreateCurrenciesTable extends Migration
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
            $table->char(FieldNameInterface::CODE, 3)->unique();
            $table->char(FieldNameInterface::NAME)->unique()->nullable();
            $table->unsignedTinyInteger(FieldNameInterface::SORT_ORDER)->nullable();

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
