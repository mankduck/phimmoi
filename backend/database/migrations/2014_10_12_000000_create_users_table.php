<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('ten');
            $table->string('dien_thoai', 20)->nullable();
            $table->string('province_id', 10)->nullable();
            $table->string('district_id', 10)->nullable();
            $table->string('ward_id', 10)->nullable();
            $table->string('dia_chi')->nullable();
            $table->dateTime('ngay_sinh')->nullable();
            $table->string('anh')->nullable();
            $table->text('mo_ta')->nullable();
            $table->text('ip')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('mat_khau');
            $table->rememberToken();
            $table->tinyInteger('trang_thai')->default(1);
            $table->bigInteger('id_nhom_user')->default(2);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
