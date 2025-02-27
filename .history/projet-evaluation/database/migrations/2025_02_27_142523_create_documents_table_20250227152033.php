<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table->uuid('id')->primary();
        // Change this line from uuid to unsignedBigInteger to match users.id type
        $table->unsignedBigInteger('user_id');
        $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();

        $table->string('type');
        $table->string('file_path');
        $table->string('original_name');
        $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
        $table->text('rejection_reason')->nullable();
        $table->timestamps();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
