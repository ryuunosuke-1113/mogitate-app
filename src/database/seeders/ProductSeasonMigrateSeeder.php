<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Season;

class ProductSeasonMigrateSeeder extends Seeder
{
  public function run(): void
  {
    $map = Season::pluck('id', 'name'); // ['spring'=>1,...]

    Product::query()->each(function ($p) use ($map) {
      if (!empty($p->season) && isset($map[$p->season])) {
        // 旧seasonを pivot に反映（既に入ってる場合も上書きしてOKなら sync）
        $p->seasons()->syncWithoutDetaching([$map[$p->season]]);
      }
    });
  }
}
