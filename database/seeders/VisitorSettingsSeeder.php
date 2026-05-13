<?php

namespace 0vinodVisitorTracking\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VisitorSettingsSeeder extends Seeder
{
    public function run()
    {
        if (!DB::table('visitor_settings')->exists()) {
            if (DB::table('visitor_settings')->count() == 0) {
                DB::table('visitor_settings')->insert([
                    'total_visitors' => 1,
                    'unique_visitors' => 1,
                    'total_visits' => 1,
                    'top_pages_card' => 1,
                    'bounce_rate' => 1,
                    'online_visitors' => 1,
                    'avg_session' => 1,
                    'hit_chart' => 1,
                    'overview_chart' => 1,
                    'heatmap' => 1,
                    'search_engine_chart' => 1,
                    'top_pages_table' => 1,
                    'top_visitors' => 1,
                    'country_chart' => 1,
                    'browser_chart' => 1,
                    'device_chart' => 1,
                    'os_chart' => 1,
                    'world_map' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    }
}
