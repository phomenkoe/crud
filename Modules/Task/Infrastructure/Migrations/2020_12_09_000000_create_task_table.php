<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateTaskTable
 */
class CreateTaskTable extends Migration
{
    const STATUS_WORK = 'in_work';
    const STATUS_PAUSE = 'on_pause';
    const STATUS_FINISHED = 'finished';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->enum(
                'status',
                [self::STATUS_WORK, self::STATUS_PAUSE, self::STATUS_FINISHED]
            )->default(self::STATUS_WORK);
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
        Schema::dropIfExists('task');
    }
}
