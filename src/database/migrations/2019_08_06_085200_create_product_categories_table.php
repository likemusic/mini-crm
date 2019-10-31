<?php

use App\Contract\Entity\ProductCategory\Field\NameInterface as FieldNameInterface;
use App\Contract\Entity\ProductCategory\TableInterface;
use App\Base\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCategoriesTable extends Migration
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
