<?php

use App\Models\Regobject;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('regobject_abouts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('url')->nullable();

            $table->text('a_desc')->nullable();
            $table->string('a_img')->nullable();
            $table->text('a_desc2')->nullable();
            $table->string('a_img2')->nullable();
            $table->text('a_desc3')->nullable();
            $table->string('a_img3')->nullable();
            $table->text('a_desc4')->nullable();
            $table->string('a_img4')->nullable();

            $table->foreignIdFor(Regobject::class)
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();


            $table->text('css')->nullable();
            $table->json('params')->nullable();
            $table->string('published')->default(1);
            $table->text('metatitle')->nullable();
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();
            $table->integer('sorting')->default(999);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regobject_abouts');
    }
};
