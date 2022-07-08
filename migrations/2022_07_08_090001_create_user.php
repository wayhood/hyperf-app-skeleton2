<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

class CreateUser extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user', function (Blueprint $table) {
            $table->comment('普通用户');
            $table->id();
            $table->string('nickname','60')->comment('昵称');
            $table->text('avatar')->comment('头像地址');
            $table->string('username','60')->comment('账户');
            $table->string('password','32')->comment('密码');
            $table->tinyInteger('status')->comment('状态:0=未激活,1=正常,2=锁定');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
}
