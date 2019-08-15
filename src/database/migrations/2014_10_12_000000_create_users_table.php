<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Contract\Entity\User\TableInterface;
use App\Contract\Entity\User\Field\NameInterface as FieldNameInterface;

class CreateUsersTable extends Migration
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
            $table->string(FieldNameInterface::NAME);
            $table->string(FieldNameInterface::EMAIL)->unique();
            $table->timestamp(FieldNameInterface::EMAIL_VERIFIED_AT)->nullable();
            $table->string(FieldNameInterface::PASSWORD);
            $table->rememberToken();
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
