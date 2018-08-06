<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbusUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albus_user', function (Blueprint $table) {
            $table->increments('id')->comment('主键');
            $table->string('username', 60)->unique('uidx_username')->comment('用户名');
            $table->string('password', 100)->comment('密码');
            $table->string('api_token', 100)->default('')->comment('API Token');
            $table->integer('api_token_expiry_time')->unsigned()->default(0)->comment('API Token 到期时间');
            $table->timestamp('modified_at')->comment('更新时间');
            $table->timestamp('created_at')->useCurrent()->comment('创建时间');
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
        });
        DB::statement("ALTER TABLE `albus_user` COMMENT='用户表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('albus_user');
    }
}
