<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
       Schema::create('visitors', function (Blueprint $table) {
            $table->id();

            $table->string('ip',45)->nullable();
            $table->string('session_id')->nullable();
            $table->string('country')->nullable();
            $table->string('country_code')->nullable();
            $table->string('region')->nullable();
            $table->string('city')->nullable();
            $table->string('device')->nullable();
            $table->string('os')->nullable();
            $table->string('browser')->nullable();
            $table->string('page_title')->nullable();
            $table->string('url')->nullable();
            $table->string('referrer')->nullable();
            $table->string('source')->nullable();
            $table->integer('visit_count')->default(1);
            $table->boolean('is_unique')->default(false);
            $table->timestamp('last_visit_at')->nullable();
            $table->timestamps();

            $table->index('session_id');
            $table->index('ip');
        });


        /*
        |--------------------------------------------------------------------------
        | Page Views Table
        |--------------------------------------------------------------------------
        */

        Schema::create('page_views', function (Blueprint $table) {

            $table->id();

            $table->string('session_id',100);
            $table->string('ip',45);

            $table->text('url');
            $table->string('page_title')->nullable();

            $table->timestamp('created_at')->useCurrent();

            $table->index('session_id');
            $table->index('ip');
            $table->index('created_at');
        });



        /*
        |--------------------------------------------------------------------------
        | Visitor Settings Table
        |--------------------------------------------------------------------------
        */

        Schema::create('visitor_settings', function (Blueprint $table) {

            $table->id();
            $table->boolean('total_visitors')->default(1);
            $table->boolean('unique_visitors')->default(1);
            $table->boolean('total_visits')->default(1);
            $table->boolean('top_pages_card')->default(1);
            $table->boolean('bounce_rate')->default(1);
            $table->boolean('online_visitors')->default(1);
            $table->boolean('avg_session')->default(1);
            $table->boolean('hit_chart')->default(1);
            $table->boolean('overview_chart')->default(1);
            $table->boolean('heatmap')->default(1);
            $table->boolean('search_engine_chart')->default(1);
            $table->boolean('top_pages_table')->default(1);
            $table->boolean('top_visitors')->default(1);
            $table->boolean('country_chart')->default(1);
            $table->boolean('browser_chart')->default(1);
            $table->boolean('device_chart')->default(1);
            $table->boolean('os_chart')->default(1);
            $table->boolean('world_map')->default(1);
            $table->timestamps();
        });


        /*
        |--------------------------------------------------------------------------
        | Insert Default Settings Row
        |--------------------------------------------------------------------------
        */
        for($i=0; $i<=1; $i++){
            DB::table('visitor_settings')->insert([
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

    }


    public function down(): void
    {
        Schema::dropIfExists('page_views');
        Schema::dropIfExists('visitors');
        Schema::dropIfExists('visitor_settings');
    }
};
