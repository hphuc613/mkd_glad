<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name')->nullable();
            $table->integer('type')->nullable();
            $table->string('value')->nullable();
            $table->timestamp('expiration_date')->nullable();
            $table->string('description')->nullable();
            $table->smallInteger('status')->default(1);
            $table->string('key_slug')->nullable();
            $table->unsignedBigInteger('updated_by');
            $table->unsignedBigInteger('created_by');
            $table->softDeletes();
            $table->timestamps();
        });

        DB::table('vouchers')->insert([
            'code' => 'vc10regemail',
            'name' => 'Voucher 10% Registration Email',
            'type' => 2,
            'value' => 10,
            'expiration_date' => null,
            'description' => 'New users who register for EMAIL will receive a 10% voucher code',
            'status' => 1,
            'key_slug' => Str::random(6) . time(),
            'updated_by' => 1,
            'created_by' => 1,
            'created_at' => formatDate(time(), 'Y-m-d H:i:s'),
            'updated_at' => formatDate(time(), 'Y-m-d H:i:s')
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vouchers');
    }
}
