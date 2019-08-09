<?php

use App\Contract\Entity\Warehouse\Field\LengthInterface as WarehouseFieldLengthInterface;
use App\Contract\Entity\Warehouse\Field\NameInterface as WarehouseFieldNameInterface;
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
            $table->bigIncrements(WarehouseFieldNameInterface::ID);
            $table->char(WarehouseFieldNameInterface::NAME)->unique();
            $table->char(WarehouseFieldNameInterface::CODE, WarehouseFieldLengthInterface::CODE)->unique();
            $table->text(WarehouseFieldNameInterface::NOTE)->nullable();
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
