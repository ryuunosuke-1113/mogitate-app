<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void
  {
    Schema::create('product_season', function (Blueprint $table) {
      $table->id();

      $table->foreignId('product_id')
        ->constrained()
        ->cascadeOnDelete();

      $table->foreignId('season_id')
        ->constrained()
        ->cascadeOnDelete();

      // 同じ組み合わせの重複を禁止
      $table->unique(['product_id', 'season_id']);

      $table->timestamps();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('product_season');
  }
};
