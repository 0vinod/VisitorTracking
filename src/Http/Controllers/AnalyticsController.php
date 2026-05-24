<?php
// E:\xampp\htdocs\hnuman\packages\Vinod\VisitorTracking\src\Http\Controllers\AnalyticsController.php
namespace Vinod\VisitorTracking\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Vinod\VisitorTracking\Helpers\Visitor;
use Vinod\VisitorTracking\Models\VisitorSetting;
use Vinod\VisitorTracking\Models\VisitorTable;

class AnalyticsController extends Controller 
{
    public function dashboard()
    {
        $days = 7;

        $hitStats = [];
        $labels = [];
        $google = [];
        $bing = [];
        $duck = [];
        $yahoo = [];
        $yandex = [];

        for ($i = $days - 1; $i >= 0; $i--) {

            $date = Carbon::today()->subDays($i)->toDateString();
            $label = Carbon::parse($date)->format('M d');

            $labels[] = $label;

            $visits = VisitorTable::whereDate('created_at', $date)->count();

            $visitors = VisitorTable::whereDate('created_at', $date)
                ->distinct('session_id')
                ->count('session_id');

            $hitStats[] = [
                'date' => $label,
                'visits' => $visits,
                'visitors' => $visitors
            ];

          $google[] = VisitorTable::whereDate('created_at', $date)
    ->where('source', 'Search (Google)')
    ->count();

$bing[] = VisitorTable::whereDate('created_at', $date)
    ->where('source', 'Search (Bing)')
    ->count();

$yahoo[] = VisitorTable::whereDate('created_at', $date)
    ->where('source', 'Search (Yahoo)')
    ->count();        }

        $totalSessions = DB::table('page_views')
            ->distinct()
            ->count('session_id');

        $bouncedSessions = DB::table('page_views')
            ->select('session_id')
            ->groupBy('session_id')
            ->havingRaw('COUNT(*) = 1')
            ->get()
            ->count();

        $bounceRate = $totalSessions > 0 ? (($bouncedSessions / $totalSessions) * 100) : 0;

        $onlineVisitors = VisitorTable::where('last_visit_at', '>=', now()->subMinutes(5))
            ->distinct('session_id')
            ->count('session_id');

        $avgSession = VisitorTable::select(
            'session_id',
            DB::raw('MIN(created_at) as start'),
            DB::raw('MAX(last_visit_at) as end')
        )
            ->where('created_at', '>=', now()->subDays(1)) // limit data
            ->groupBy('session_id')
            ->get()
            ->map(function ($session) {
                return strtotime($session->end) - strtotime($session->start);
            })
            ->avg();

        $hours = floor($avgSession / 3600);
        $minutes = floor(($avgSession % 3600) / 60);

        $avgSession = "{$hours}h {$minutes}m";

        return response()->json([

            'country' => VisitorTable::selectRaw("COALESCE(country,'Unknown') as label, COUNT(*) as total")
    ->groupByRaw("COALESCE(country,'Unknown')")
    ->get(),

            'browser' => VisitorTable::selectRaw("browser as label, COUNT(*) as total")
                ->groupBy('browser')
                ->get(),

            'device' => VisitorTable::selectRaw("device as label, COUNT(*) as total")
                ->groupBy('device')
                ->get(),

            'os' => VisitorTable::selectRaw("os as label, COUNT(*) as total")
                ->groupBy('os')
                ->get(),

            'hit_stats' => $hitStats,

            'search_engine' => [
                'labels' => $labels,
                'google' => $google,
                'bing' => $bing,
                'duckduckgo' => $duck,
                'yahoo' => $yahoo,
                'yandex' => $yandex
            ],

            'top_pages' => VisitorTable::selectRaw('url,page_title,COUNT(*) as total')
                ->groupBy('url', 'page_title')
                ->orderByDesc('total')
                ->get(),

            'top_visitors' => VisitorTable::selectRaw('ip,country,city,browser,os,COUNT(*) as visits')
                ->groupBy('ip', 'country', 'city', 'browser', 'os')
                ->orderByDesc('visits')
                ->get(),

            'totalVisitors' => VisitorTable::count(),
            'uniqueVisitors' => VisitorTable::distinct('session_id')->count('session_id'),
            'totalVisits' => VisitorTable::sum('visit_count'),
            'totalPages'  => VisitorTable::distinct('url')->count('url'),
            'bounceRate' => $bounceRate,
            'onlineVisitors' => $onlineVisitors,
            'avgSession' => $avgSession,
            'heatmap' => VisitorTable::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as total'))->where('created_at', '>=', now()->subYear())
                ->groupBy(DB::raw('DATE(created_at)'))
                ->get()
                ->keyBy('date')
        ]);
    }

    public function worldMap()
    {
        return VisitorTable::selectRaw('country_code as code, COUNT(*) as visits')
            ->groupBy('country_code')
            ->pluck('visits', 'code');
    }

    public function livePages()
    {
        return VisitorTable::selectRaw("url,page_title, COUNT(*) as visitors")
            ->where('created_at', '>=', now()->subMinutes(5))
            ->groupBy('url', 'page_title')
            ->orderByDesc('visitors')
            ->get();
    }

    public function settings(Request $request)
    {
        if ($request->isMethod('POST')) {
            $field = $request->field;
            $value = $request->value ?? 0;
            if ($field) {
                
                $visitorSettings = VisitorSetting::first();
                $visitorSettings->$field = $value;
                $visitorSettings->save();

                return response()->json(['status' => 'success', 'message' => 'Successfully Updated.']);
            }
            return response()->json(['status' => 'failed', 'message' => 'Failed to update.']);
        }  
        return response()->json(['status' => 'failed', 'message' => 'Something went wrong.']);
    }
}
