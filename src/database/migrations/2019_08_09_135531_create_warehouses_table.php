<?php

use App\Contract\Entity\Warehouse\Field\LengthInterface as FieldLengthInterface;
use App\Contract\Entity\Warehouse\Field\NameInterface as FieldNameInterface;
use App\Contract\Entity\Warehouse\TableInterface;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarehousesTable extends Migration
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
            $table->unsignedTinyInteger(FieldNameInterface::SORT_ORDER)->nullable();
            $table->char(FieldNameInterface::CODE, FieldLengthInterface::CODE)->unique();
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
