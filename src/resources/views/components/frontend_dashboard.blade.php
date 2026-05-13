{{-- E:\xampp\htdocs\hnuman\packages\Vinod\VisitorTracking\src\resources\views\components\countries.blade.php --}}
<style>
    .visitor-dashboard {
        font-family: "Segoe UI", sans-serif;
    }

    .jvm-tooltip {
        background: #111;
        color: #fff;
        padding: 8px 12px;
        border-radius: 6px;
        font-size: 13px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }

    .analytics-card {
        display: flex;
        align-items: center;
        padding: 20px;
        border-radius: 10px;
        color: white;
        gap: 15px;
        box-shadow: 0 8px 18px rgba(0, 0, 0, 0.08);
    }

    .card-icon {
        font-size: 28px;
    }

    .card-title {
        font-size: 14px;
        opacity: .9;
    }

    .card-value {
        font-size: 26px;
        font-weight: bold;
    }

    .card-visitors {
        background: linear-gradient(45deg, #4facfe, #00f2fe);
    }

    .card-visits {
        background: linear-gradient(45deg, #43e97b, #38f9d7);
    }

    .card-pages {
        background: linear-gradient(45deg, #fa709a, #fee140);
    }

    .card-online {
        background: linear-gradient(45deg, #667eea, #764ba2);
    }

    /* chart boxes */

    .analytics-box {
        background: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
    }

    .analytics-box h5 {
        margin-bottom: 15px;
        font-weight: 600;
    }

    /* tables */

    .analytics-box table {
        font-size: 14px;
    }

    .analytics-box table th {
        background: #f5f6fa;
    }

    .analytics-box canvas {
        max-height: 320px;
    }

    .visitor-dashboard .card {
        border: none;
        border-radius: 10px;
    }

    .visitor-dashboard .card-header {
        font-size: 16px;
        padding: 12px 18px;
    }

    .visitor-dashboard .card-body {
        padding: 20px;
    }

    .visitor-dashboard table td,
    .visitor-dashboard table th {
        vertical-align: middle;
    }

    .visitor-dashboard canvas {
        max-height: 320px;
    }

    .card-bounces {
        background: linear-gradient(306deg, #d0d721, #c1bacf);
    }

    .card-online {
        background: linear-gradient(306deg, #4ad15c, #b0b32e);
    }

    .card-avgtime {
        background: linear-gradient(101deg, #4161a9, #279580);
    }

    .unique-visitor {
        background: linear-gradient(306deg, #d88333, #b0b32e);
    }

    .analytics-values {
        font-size: 32px;
        font-weight: bold;
        color: #e74c3c;
    }

    .heatmap-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    .heatmap-months {
        display: grid;
        grid-auto-flow: column;
        gap: 3px;
        margin-left: 30px;
        font-size: 12px;
    }

    .heat-cell:hover {
        transform: scale(1.2);
        cursor: pointer;
    }

    .heatmap-body {
        display: flex;
    }

    .heatmap-days {
        display: grid;
        grid-template-rows: repeat(7, 16px);
        margin-right: 5px;
        font-size: 12px;
    }

    .heatmap-grid {
        display: grid;
        grid-auto-flow: column;
        grid-template-rows: repeat(7, 16px);
        grid-auto-columns: 16px;
        gap: 3px;
    }

    .heat-cell {
        width: 16px;
        height: 16px;
        border-radius: 2px;
    }
</style>
<div class="container-fluid visitor-dashboard">

    <!-- KPI CARDS -->
    <div class="row mb-4">

        @if ($visitorSetting->total_visitors)
            <div class="col-md-3 col-6 visitorSetting_total_visitors">
                <div class="analytics-card card-visitors">
                    <div class="card-icon">👥</div>
                    <div>
                        <div class="card-title">Total Visitors</div>
                        <div class="card-value" id="totalVisitors">0</div>
                    </div>
                </div>
            </div>
        @endif
        @if ($visitorSetting->unique_visitors)
            <div class="col-md-3 col-6 mb-3 visitorSetting_unique_visitors">
                <div class="card shadow-sm">
                    <div class="analytics-card unique-visitor">
                        <div class="card-icon">👮‍♂️</div>
                        <div>
                            <div class="card-title">Unique Visitor</div>
                            <div class="card-value" id="uniqueVisitor">0</div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if ($visitorSetting->total_visits)
            <div class="col-md-3 col-6 mb-3 visitorSetting_total_visits">
                <div class="analytics-card card-visits">
                    <div class="card-icon">📊</div>
                    <div>
                        <div class="card-title">Total Visits</div>
                        <div class="card-value" id="totalVisits">0</div>
                    </div>
                </div>
            </div>
        @endif
        @if ($visitorSetting->top_pages_card)
            <div class="col-md-3 col-6 mb-3 visitorSetting_top_pages_card">
                <div class="analytics-card card-pages">
                    <div class="card-icon">📄</div>
                    <div>
                        <div class="card-title">Top Pages</div>
                        <div class="card-value" id="totalPages">0</div>
                    </div>
                </div>
            </div>
        @endif
        @if ($visitorSetting->bounce_rate)
            <div class="col-md-3 col-6 mb-3 visitorSetting_bounce_rate">
                <div class="analytics-card card-bounces">
                    <div class="card-icon">📉</div>
                    <div>
                        <div class="card-title">Bounce Rate</div>
                        <div class="card-value analytics-values">0 %</div>
                    </div>
                </div>
            </div>
        @endif
        @if ($visitorSetting->online_visitors)
            <div class="col-md-3 col-6 mb-3 visitorSetting_online_visitors">
                <div class="analytics-card card-online">
                    <div class="card-icon">🤖</div>
                    <div>
                        <div class="card-title">Online Visitor</div>
                        <div class="card-value online-visitors">0 </div>
                    </div>
                </div>
            </div>
        @endif
        @if ($visitorSetting->avg_session)
            <div class="col-md-3 col-6 mb-3 visitorSetting_avg_session">
                <div class="analytics-card card-avgtime">
                    <div class="card-icon">⏱</div>
                    <div>
                        <div class="card-title">Avg Session Timer</div>
                        <div class="card-value avgTimeSession">0 </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <!-- MAIN CHARTS -->
    <div class="row">

        @if ($visitorSetting->hit_chart)
            <div class="col-md-12 mb-4 visitorSetting_hit_chart">
                <div class="analytics-box">
                    <h5>Hit Statistics</h5>
                    <canvas id="hitChart"></canvas>
                </div>
            </div>
        @endif
        @if ($visitorSetting->overview_chart)
            <div class="col-md-12 mb-4 visitorSetting_overview_chart">
                <div class="analytics-box">
                    <h5>Website Overview</h5>
                    <canvas id="overviewChart"></canvas>
                </div>
            </div>
        @endif
        @if ($visitorSetting->heatmap)
            <div class="col-md-12 mb-4 visitorSetting_heatmap">
                <div class="analytics-box">
                    <h5>Visitor Activity ({{ date('Y') }})</h5>

                    <div class="heatmap-wrapper">
                        <div class="heatmap-months" id="heatmapMonths"></div>
                        <div class="heatmap-body">
                            <div class="heatmap-days"></div>
                            <div id="visitHeatmap" class="heatmap-grid"></div>
                        </div>

                    </div>
                </div>
            </div>
        @endif
        @if ($visitorSetting->top_pages_table)
            <div class="col-md-12 mb-4 visitorSetting_top_pages_table">
                <div class="analytics-box">
                    <h5>Top Pages</h5>
                    <table class="table table-hover" id="topPagesTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Link</th>
                                <th>Visits</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        @endif
        @if ($visitorSetting->top_pages_table)
            <div class="col-md-12 mb-4 visitorSetting_top_pages_table">
                <div class="analytics-box">
                    <h5>Top Visitors</h5>
                    <table class="table table-hover" id="topVisitorsTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Visits</th>
                                <th>Country</th>
                                <th>City</th>
                                <th>IP</th>
                                <th>Browser</th>
                                <th>OS</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        @endif
        @if ($visitorSetting->top_visitors)
            <div class="col-md-12 mb-4 visitorSetting_top_visitors">
                <div class="analytics-box">
                    <h5>Search Engine Referrals</h5>
                    <canvas id="searchEngineChart"></canvas>
                </div>
            </div>
        @endif
    </div>

    <!-- PIE CHARTS -->
    <div class="row">

        @if ($visitorSetting->country_chart)
            <div class="col-md-6 mb-4 visitorSetting_country_chart">
                <div class="analytics-box">
                    <h5>Visitors by Country</h5>
                    <canvas id="countryChart"></canvas>
                </div>
            </div>
        @endif

        @if ($visitorSetting->browser_chart)
            <div class="col-md-6 mb-4 visitorSetting_browser_chart">
                <div class="analytics-box">
                    <h5>Visitors by Browser</h5>
                    <canvas id="browserChart"></canvas>
                </div>
            </div>
        @endif

        @if ($visitorSetting->device_chart)
            <div class="col-md-6 mb-4 visitorSetting_device_chart">
                <div class="analytics-box">
                    <h5>Visitors by Device</h5>
                    <canvas id="deviceChart"></canvas>
                </div>
            </div>
        @endif

        @if ($visitorSetting->os_chart)
            <div class="col-md-6 mb-4 visitorSetting_os_chart">
                <div class="analytics-box">
                    <h5>Visitors by OS</h5>
                    <canvas id="osChart"></canvas>
                </div>
            </div>
        @endif

        @if ($visitorSetting->world_map)
            <div class="col-md-12 mb-4 visitorSetting_world_map">
                <div class="analytics-box">
                    <h5>World Visitors</h5>
                    <div id="worldMap" style="height:400px"></div>
                </div>
            </div>
        @endif
    </div>
</div>

<script src="https://code.jquery.com/jquery-4.0.0.js" integrity="sha256-9fsHeVnKBvqh3FB2HYu7g2xseAZ5MlN6Kz/qnkASV8U="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap/dist/css/jsvectormap.min.css">

<script src="https://cdn.jsdelivr.net/npm/jsvectormap"></script>
<script src="https://cdn.jsdelivr.net/npm/jsvectormap/dist/maps/world.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<script>
    $(document).ready(function() {

        $.post("{{ route('visitor.dashboard') }}", function(data) {

            createChart('countryChart', data.country);
            createChart('browserChart', data.browser);
            createChart('deviceChart', data.device);
            createChart('osChart', data.os);

            $('#totalVisitors').text(data.totalVisitors)
            $('#totalVisits').text(data.totalVisits)
            $('#totalPages').text(data.totalPages)
            $('#uniqueVisitor').text(data.uniqueVisitors)
            $('#analytics-values').text(data.bounceRate)
            $('.online-visitors').text(data.onlineVisitors)
            $('.avgTimeSession').text(data.avgSession)

            if ($("#topPagesTable").length > 0) {
                renderTopPages(data.top_pages);
            }

            if ($('#topVisitorsTable').length > 0) {
                renderTopVisitors(data.top_visitors);
            }

            if ($("#hitChart").length) {
                renderHitChart(data.hit_stats);
            }

            if ($("searchEngineChart").length) {
                renderSearchEngine(data.search_engine);
            }

            if ($("#overviewChart").length) {
                renderOverviewChart(data);
            }

            if ($('.visitorSetting_heatmap').length) {
                renderWeekdays();
                renderMonths();
                renderHeatmap(data.heatmap);
            }

        });

        function renderMonths() {

            const container = document.getElementById("heatmapMonths");

            const year = new Date().getFullYear();

            const start = new Date(year, 0, 1); // Jan 1
            const end = new Date(year, 11, 31); // Dec 31

            let html = "";
            let currentMonth = -1;

            for (let d = new Date(start); d <= end; d.setDate(d.getDate() + 7)) {

                const month = d.getMonth();

                if (month !== currentMonth) {

                    currentMonth = month;

                    html += `<span>${d.toLocaleString('default', { month: 'short' })}</span>`;

                } else {

                    html += `<span></span>`;
                }
            }

            container.innerHTML = html;
        }

        function renderHeatmap(data) {

            const container = document.getElementById("visitHeatmap");

            const year = new Date().getFullYear();

            const start = new Date(year, 0, 1);
            const end = new Date(year, 11, 31);

            let html = "";

            for (let d = new Date(start); d <= end; d.setDate(d.getDate() + 1)) {

                const date = d.toISOString().split('T')[0];

                const visits = data[date]?.total ?? 0;

                let color = "#ebedf0";

                if (visits > 0) color = "#c6e48b";
                if (visits > 20) color = "#7bc96f";
                if (visits > 50) color = "#239a3b";
                if (visits > 100) color = "#196127";

                html += `
                <div class="heat-cell"
                    style="background:${color}"
                    title="${date} : ${visits} visits">
                </div>`;
            }

            container.innerHTML = html;
        }

        function renderWeekdays() {

            const days = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

            let html = "";

            days.forEach(day => {
                html += `<div>${day}</div>`;
            });

            document.querySelector(".heatmap-days").innerHTML = html;
        }

        function renderOverviewChart(data) {

            new Chart(document.getElementById("overviewChart"), {

                type: "bar",

                data: {
                    labels: [
                        "Total Visitors",
                        "Unique Visitors",
                        "Total Visits",
                        "Total Pages",
                        "Online Visitors",
                    ],

                    datasets: [{
                        label: "Website Metrics",

                        data: [
                            data.totalVisitors,
                            data.uniqueVisitors,
                            data.totalVisits,
                            data.totalPages,
                            data.onlineVisitors,
                        ],

                        backgroundColor: [
                            "#36a2eb",
                            "#4bc0c0",
                            "#ff6384",
                            "#ff9f40",
                            "#9966ff"
                        ]
                    }]
                },

                options: {
                    responsive: true,

                    plugins: {
                        legend: {
                            display: false
                        }
                    },

                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }

            });
        }

        function createChart(canvasId, chartData) {


            if (chartData && chartData.length === 0) return;
            new Chart(document.getElementById(canvasId), {

                type: 'pie',

                data: {
                    labels: chartData.map(x => x.label),

                    datasets: [{
                        data: chartData.map(x => x.total)
                    }]
                },

                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: "bottom"
                        }
                    }
                }

            });

        }

        function renderTopPages(pages) {

            let html = '';

            pages.forEach(function(row, index) {

                html += `
                    <tr>
                        <td>${index+1}</td>
                        <td>${row.page_title ?? 'Unknown'}</td>
                        <td>
                            <a href="${row.url}" target="_blank">
                                ${row.page_title ?? 'Open'}
                            </a>
                        </td>
                        <td>${row.total}</td>
                    </tr>`;
            });

            if ($("#topPagesTable").length > 0) {
                $("#topPagesTable tbody").html(html);
            }

        }

        function renderTopVisitors(visitors) {

            let html = '';

            visitors.forEach(function(row, index) {

                html += `
                        <tr>
                            <td>${index+1}</td>
                            <td>${row.visits}</td>
                            <td>${row.country ?? 'Unknown'}</td>
                            <td>${row.city ?? 'Unknown'}</td>
                            <td>${row.ip}</td>
                            <td>${row.browser ?? 'Unknown'}</td>
                            <td>${row.os ?? 'Unknown'}</td>
                        </tr>
                        `;

            });

            if ($('#topVisitorsTable').length > 0) {
                $("#topVisitorsTable tbody").html(html);
            }

        }

        function renderHitChart(stats) {

            const labels = stats.map(x => x.date);
            const visitors = stats.map(x => x.visitors);
            const visits = stats.map(x => x.visits);


            new Chart(document.getElementById("hitChart"), {

                type: "line",

                data: {

                    labels: labels,

                    datasets: [

                        {
                            label: "Visitors",
                            data: visitors,
                            borderColor: "#ff6384",
                            backgroundColor: "rgba(255,99,132,0.2)",
                            tension: 0.4,
                            fill: true
                        },

                        {
                            label: "Visits",
                            data: visits,
                            borderColor: "#36a2eb",
                            backgroundColor: "rgba(54,162,235,0.2)",
                            tension: 0.4,
                            fill: true
                        }

                    ]

                },

                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: "top"
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }

            });

        }

        function renderSearchEngine(data) {

            new Chart(document.getElementById("searchEngineChart"), {
                type: "line",
                data: {
                    labels: data.labels,
                    datasets: [{
                            label: "Google",
                            data: data.google,
                            borderColor: "#ff6384",
                            backgroundColor: "rgba(255,99,132,0.2)",
                            tension: 0.4,
                            fill: true
                        },

                        {
                            label: "Bing",
                            data: data.bing,
                            borderColor: "#ff9f40",
                            backgroundColor: "rgba(255,159,64,0.2)",
                            tension: 0.4,
                            fill: true
                        },

                        {
                            label: "DuckDuckGo",
                            data: data.duckduckgo,
                            borderColor: "#36a2eb",
                            backgroundColor: "rgba(54,162,235,0.2)",
                            tension: 0.4,
                            fill: true
                        },

                        {
                            label: "Yahoo",
                            data: data.yahoo,
                            borderColor: "#9966ff",
                            backgroundColor: "rgba(153,102,255,0.2)",
                            tension: 0.4,
                            fill: true
                        },

                        {
                            label: "Yandex",
                            data: data.yandex,
                            borderColor: "#4bc0c0",
                            backgroundColor: "rgba(75,192,192,0.2)",
                            tension: 0.4,
                            fill: true
                        }

                    ]

                },

                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: "top"
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }

            });

        }

        function deviceIcon(device) {

            if (device === "Mobile")
                return '<i class="fa-solid fa-mobile-screen"></i>';

            if (device === "Tablet")
                return '<i class="fa-solid fa-tablet-screen-button"></i>';

            return '<i class="fa-solid fa-desktop"></i>';

        }

        $.post("{{ route('visitor.worldmap') }}", function(data) {

            const mapData = data;

            new jsVectorMap({
                selector: "#worldMap",
                map: "world",
                zoomButtons: true,

                regionStyle: {
                    initial: {
                        fill: "#e4e4e4"
                    },
                    hover: {
                        fill: "#0d6efd",
                        cursor: "pointer"
                    }
                },

                series: {
                    regions: [{
                        attribute: "fill",
                        values: mapData,
                        scale: ["#C8EEFF", "#0071A4"],
                        normalizeFunction: "polynomial"
                    }]
                },

                onRegionTooltipShow: function(event, tooltip, code) {

                    let country = tooltip._tooltip.textContent;
                    let visits = mapData[code] ?? 0;

                    tooltip._tooltip.innerHTML =
                        `<b>${country}</b><br>Visitors: ${visits}`;
                }

            });

        });

    });
</script>
