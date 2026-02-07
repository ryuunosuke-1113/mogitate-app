<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
Schema::table('products', function (Blueprint $table) {
    if (Schema::hasColumn('products', 'season')) {
        $table->dropColumn('season');
    }
});
}

public function down(): void
{
  Schema::table('products', function (Blueprint $table) {
    $table->string('season')->nullable();
  });
}
};
