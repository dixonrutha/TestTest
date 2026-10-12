<link rel="stylesheet" href="<?= base_url('assets/css/majik2.css') ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap">

<style>
/* =====================================================================
   MAJIK DASHBOARD — clean, neutral styles (prefix .mj-)
   One accent colour (brand blue); green / red only for trends.
   ===================================================================== */
.mj-dash {
    --accent: #0779BC;
    --accent-soft: #e8f2f9;
    --ink: #111827;
    --ink-2: #374151;
    --muted: #6b7280;
    --faint: #9ca3af;
    --line: #e5e7eb;
    --soft: #f9fafb;
    --card: #ffffff;
    --up: #15803d;
    --down: #b91c1c;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
    font-size: 14px;
    color: var(--ink);
    background: #f4f5f7;
    padding: 28px;
    -webkit-font-smoothing: antialiased;
}
.mj-dash *, .mj-dash *::before, .mj-dash *::after { box-sizing: border-box; }
.mj-dash p, .mj-dash h1, .mj-dash h2, .mj-dash h3, .mj-dash ul { margin: 0; padding: 0; }
.mj-dash ul { list-style: none; }
.mj-dash .num { font-variant-numeric: tabular-nums; }

/* ---------- Layout ---------- */
.mj-grid { display: grid; gap: 20px; margin-bottom: 20px; }
.mj-grid-4 { grid-template-columns: repeat(4, minmax(0, 1fr)); }
.mj-grid-main { grid-template-columns: minmax(0, 1.6fr) minmax(0, 1fr); }
.mj-grid-3 { grid-template-columns: repeat(3, minmax(0, 1fr)); }
@media (max-width: 1199.98px) {
    .mj-grid-main { grid-template-columns: 1fr; }
    .mj-grid-3, .mj-grid-4 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
}
@media (max-width: 767.98px) {
    .mj-dash { padding: 16px; }
    .mj-grid { gap: 16px; margin-bottom: 16px; }
    .mj-grid-3, .mj-grid-4 { grid-template-columns: 1fr; }
}

/* ---------- Page header ---------- */
.mj-header { display: flex; flex-wrap: wrap; align-items: flex-end; justify-content: space-between; gap: 12px; margin-bottom: 24px; }
.mj-title { font-size: 22px; font-weight: 600; letter-spacing: -.01em; color: var(--ink); }
.mj-subtitle { font-size: 13px; color: var(--muted); margin-top: 4px; }
.mj-date { font-size: 13px; color: var(--ink-2); padding: 7px 12px; border: 1px solid var(--line); border-radius: 8px; background: var(--card); }

/* ---------- Card ---------- */
.mj-card { background: var(--card); border: 1px solid var(--line); border-radius: 12px; display: flex; flex-direction: column; min-width: 0; }
.mj-card-head { display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 12px; padding: 18px 20px; border-bottom: 1px solid var(--line); }
.mj-card-title { font-size: 15px; font-weight: 600; color: var(--ink); }
.mj-card-sub { font-size: 12.5px; color: var(--muted); margin-top: 2px; }
.mj-card-body { padding: 20px; flex: 1; min-width: 0; }
.mj-meta { font-size: 12.5px; color: var(--muted); white-space: nowrap; }
.mj-meta b { color: var(--ink); font-weight: 600; }

/* ---------- KPI cards ---------- */
.mj-kpi { padding: 20px; }
.mj-kpi-label { font-size: 13px; font-weight: 500; color: var(--muted); }
.mj-kpi-value { font-size: 26px; font-weight: 600; letter-spacing: -.02em; color: var(--ink); margin: 8px 0 10px; line-height: 1.15; overflow-wrap: anywhere; }
.mj-kpi-row { display: flex; flex-wrap: wrap; align-items: center; gap: 6px; font-size: 12.5px; color: var(--muted); }
.mj-kpi-foot { margin-top: 14px; padding-top: 12px; border-top: 1px solid var(--line); display: flex; flex-direction: column; gap: 4px; }
.mj-kpi-foot div { display: flex; justify-content: space-between; gap: 8px; font-size: 12.5px; color: var(--muted); }
.mj-kpi-foot b { color: var(--ink-2); font-weight: 500; }

/* ---------- Trend ---------- */
.mj-trend { font-size: 12.5px; font-weight: 600; white-space: nowrap; }
.mj-trend.up { color: var(--up); }
.mj-trend.down { color: var(--down); }
.mj-trend.flat { color: var(--faint); }

/* ---------- Charts ---------- */
.mj-chart { min-height: 280px; margin: -6px -8px 0; }

/* Summary strip (under refills chart) */
.mj-summary { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); border-top: 1px solid var(--line); }
.mj-summary > div { padding: 16px 20px; border-left: 1px solid var(--line); min-width: 0; }
.mj-summary > div:first-child { border-left: 0; }
.mj-summary .label { font-size: 12.5px; color: var(--muted); }
.mj-summary .value { font-size: 18px; font-weight: 600; margin: 4px 0 2px; overflow-wrap: anywhere; }

/* ---------- Simple list rows ---------- */
.mj-list li { display: flex; align-items: center; gap: 10px; padding: 11px 0; border-top: 1px solid var(--line); font-size: 13.5px; }
.mj-list li:first-child { border-top: 0; padding-top: 0; }
.mj-list li:last-child { padding-bottom: 0; }
.mj-list .name { color: var(--ink-2); }
.mj-list .value { margin-left: auto; font-weight: 600; }
.mj-list .pct { width: 52px; text-align: right; color: var(--muted); font-size: 12.5px; }
.mj-swatch { width: 10px; height: 10px; border-radius: 3px; flex-shrink: 0; }

/* Donut */
.mj-donut { position: relative; margin-bottom: 12px; }
.mj-donut-center { position: absolute; inset: 0; display: flex; flex-direction: column; align-items: center; justify-content: center; pointer-events: none; }
.mj-donut-center b { font-size: 22px; font-weight: 600; }
.mj-donut-center span { font-size: 12px; color: var(--muted); }

/* Customer base */
.mj-big { padding-bottom: 18px; margin-bottom: 18px; border-bottom: 1px solid var(--line); }
.mj-big .label { font-size: 13px; color: var(--muted); }
.mj-big .value { font-size: 34px; font-weight: 600; letter-spacing: -.02em; margin-top: 6px; }

/* ---------- Tabs ---------- */
.mj-tabs { display: flex; gap: 20px; border-bottom: 1px solid var(--line); margin: -4px 0 16px; }
.mj-tab { appearance: none; background: none; border: 0; border-bottom: 2px solid transparent; margin-bottom: -1px; padding: 0 0 10px; font: inherit; font-size: 13px; font-weight: 500; color: var(--muted); cursor: pointer; }
.mj-tab:hover { color: var(--ink); }
.mj-tab:focus { outline: none; }
.mj-tab:focus-visible { outline: 2px solid var(--accent); outline-offset: 2px; }
.mj-tab.is-active { color: var(--ink); border-bottom-color: var(--accent); }
.mj-pane { display: none; }
.mj-pane.is-active { display: block; }

/* ---------- Apps comparison table ---------- */
.mj-table { width: 100%; border-collapse: collapse; font-size: 13.5px; }
.mj-table th { text-align: right; font-size: 12px; font-weight: 500; color: var(--muted); padding: 0 0 10px; }
.mj-table th:first-child, .mj-table td:first-child { text-align: left; }
.mj-table td { text-align: right; padding: 12px 0; border-top: 1px solid var(--line); font-variant-numeric: tabular-nums; }
.mj-table td:first-child { color: var(--ink-2); }
.mj-table td b { font-weight: 600; }
.mj-share { margin-top: 18px; }
.mj-share-label { display: flex; justify-content: space-between; font-size: 12.5px; color: var(--muted); margin-bottom: 8px; }
.mj-share-label b { color: var(--ink); font-weight: 600; }
.mj-share-bar { display: flex; height: 6px; border-radius: 3px; overflow: hidden; background: var(--line); }
.mj-share-bar span { background: var(--accent); }

/* ---------- Leaderboards ---------- */
.mj-active { text-align: right; }
.mj-active span { display: block; font-size: 12px; color: var(--muted); }
.mj-active b { display: block; font-size: 18px; font-weight: 600; line-height: 1.3; }

.mj-board { max-height: 360px; overflow-y: auto; }
.mj-board::-webkit-scrollbar { width: 6px; }
.mj-board::-webkit-scrollbar-thumb { background: var(--line); border-radius: 3px; }
.mj-row { display: flex; align-items: center; gap: 12px; padding: 10px 4px 10px 0; border-top: 1px solid var(--line); }
.mj-row:first-child { border-top: 0; padding-top: 2px; }
.mj-rank { width: 20px; font-size: 12.5px; color: var(--faint); font-variant-numeric: tabular-nums; flex-shrink: 0; }
.mj-row:nth-child(-n+3) .mj-rank { color: var(--ink); font-weight: 600; }
.mj-row-main { flex: 1; min-width: 0; }
.mj-row-top { display: flex; align-items: baseline; gap: 10px; }
.mj-row-name { font-size: 13.5px; color: var(--ink-2); overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
.mj-row-value { margin-left: auto; font-size: 13.5px; font-weight: 600; white-space: nowrap; font-variant-numeric: tabular-nums; }
.mj-row-value small { font-size: 12px; font-weight: 400; color: var(--muted); margin-left: 3px; }
.mj-row-bar { height: 4px; border-radius: 2px; background: #f0f1f3; margin-top: 7px; overflow: hidden; }
.mj-row-bar span { display: block; height: 100%; border-radius: 2px; background: var(--accent); opacity: .85; }
.mj-empty { text-align: center; padding: 32px 12px; color: var(--muted); font-size: 13px; }
</style>

<?php
/* ---------- Trend calculations ---------- */

// Revenue today vs yesterday
$today_revenue = $majik_revenue_today->revenue;
$yesterday_revenue = $majik_revenue_yesterday->revenue;
if ($yesterday_revenue > 0) {
    $rev_day_change = (($today_revenue - $yesterday_revenue) / $yesterday_revenue) * 100;
    $rev_day_class = $rev_day_change > 0 ? 'up' : ($rev_day_change < 0 ? 'down' : 'flat');
    $rev_day_text = ($rev_day_change > 0 ? '&#9650; ' : ($rev_day_change < 0 ? '&#9660; ' : '')) . number_format(abs($rev_day_change), 1) . '%';
} else {
    $rev_day_class = 'flat';
    $rev_day_text = 'N/A';
}

// Revenue month vs previous month
$current_month_revenue = $majik_revenue_current_month->revenue;
$previous_month_revenue = $majik_revenue_previous_month->revenue;
if ($previous_month_revenue > 0) {
    $rev_month_change = (($current_month_revenue - $previous_month_revenue) / $previous_month_revenue) * 100;
    $rev_month_class = $rev_month_change > 0 ? 'up' : ($rev_month_change < 0 ? 'down' : 'flat');
    $rev_month_text = ($rev_month_change > 0 ? '&#9650; ' : ($rev_month_change < 0 ? '&#9660; ' : '')) . number_format(abs($rev_month_change), 1) . '%';
} else {
    $rev_month_class = 'flat';
    $rev_month_text = 'N/A';
}

// Revenue year vs previous year
$current_year_revenue = $majik_revenue_current_year->revenue;
$previous_year_revenue = $majik_revenue_previous_year->revenue;
if ($previous_year_revenue > 0) {
    $rev_year_change = (($current_year_revenue - $previous_year_revenue) / $previous_year_revenue) * 100;
    $rev_year_class = $rev_year_change > 0 ? 'up' : ($rev_year_change < 0 ? 'down' : 'flat');
    $rev_year_text = ($rev_year_change > 0 ? '&#9650; ' : ($rev_year_change < 0 ? '&#9660; ' : '')) . number_format(abs($rev_year_change), 1) . '%';
} else {
    $rev_year_class = 'flat';
    $rev_year_text = 'N/A';
}

// Refills today vs yesterday
$today_order = $majik_order_today->majik_order;
$yesterday_order = $majik_order_yesterday->majik_order;
if ($yesterday_order > 0) {
    $ord_day_change = (($today_order - $yesterday_order) / $yesterday_order) * 100;
    $ord_day_class = $ord_day_change > 0 ? 'up' : ($ord_day_change < 0 ? 'down' : 'flat');
    $ord_day_text = ($ord_day_change > 0 ? '&#9650; ' : ($ord_day_change < 0 ? '&#9660; ' : '')) . number_format(abs($ord_day_change), 1) . '%';
} else {
    $ord_day_class = 'flat';
    $ord_day_text = 'N/A';
}

// Refills month vs previous month
$current_month_order = $majik_order_current_month->majik_order;
$previous_month_order = $majik_order_previous_month->majik_order;
if ($previous_month_order > 0) {
    $ord_month_change = (($current_month_order - $previous_month_order) / $previous_month_order) * 100;
    $ord_month_class = $ord_month_change > 0 ? 'up' : ($ord_month_change < 0 ? 'down' : 'flat');
    $ord_month_text = ($ord_month_change > 0 ? '&#9650; ' : ($ord_month_change < 0 ? '&#9660; ' : '')) . number_format(abs($ord_month_change), 1) . '%';
} else {
    $ord_month_class = 'flat';
    $ord_month_text = 'N/A';
}

// Refills year vs previous year
$current_year_order = $majik_order_current_year->majik_order;
$previous_year_order = $majik_order_previous_year->majik_order;
if ($previous_year_order > 0) {
    $ord_year_change = (($current_year_order - $previous_year_order) / $previous_year_order) * 100;
    $ord_year_class = $ord_year_change > 0 ? 'up' : ($ord_year_change < 0 ? 'down' : 'flat');
    $ord_year_text = ($ord_year_change > 0 ? '&#9650; ' : ($ord_year_change < 0 ? '&#9660; ' : '')) . number_format(abs($ord_year_change), 1) . '%';
} else {
    $ord_year_class = 'flat';
    $ord_year_text = 'N/A';
}

// Majikans total
$sub_total = 0;
foreach ($counts as $p) {
    $sub_total = $sub_total + $p->count;
}
?>

<body>

<div class="app">
<div class="app-wrap">
<div class="app-container">
<div class="app-main1" id="main">
<div class="mj-dash">

    <!-- =============================== HEADER =============================== -->
    <div class="mj-header">
        <div>
            <h1 class="mj-title">Dashboard</h1>
            <p class="mj-subtitle">Revenue, refills and performance overview</p>
        </div>
        <span class="mj-date"><?= date('l, d M Y') ?></span>
    </div>

    <!-- =============================== KPI CARDS =============================== -->
    <div class="mj-grid mj-grid-4">
        <div class="mj-card mj-kpi">
            <p class="mj-kpi-label">Revenue today</p>
            <p class="mj-kpi-value num"><?= number_format($majik_revenue_today->revenue, 0) ?></p>
            <div class="mj-kpi-row"><span class="mj-trend <?= $rev_day_class ?>"><?= $rev_day_text ?></span> vs yesterday</div>
            <div class="mj-kpi-foot">
                <div>Yesterday payments <b class="num"><?= number_format($yesterday_revenue, 2) ?></b></div>
                <div>Delivery fee <b class="num"><?= number_format($majik_delivery_today->delivery, 0) ?></b></div>
            </div>
        </div>

        <div class="mj-card mj-kpi">
            <p class="mj-kpi-label">Revenue this month</p>
            <p class="mj-kpi-value num"><?= number_format($majik_revenue_mtd->revenue, 0) ?></p>
            <div class="mj-kpi-row"><span class="mj-trend <?= $rev_month_class ?>"><?= $rev_month_text ?></span> vs last month</div>
            <div class="mj-kpi-foot">
                <div>Delivery fee <b class="num"><?= number_format($majik_delivery_mnth->delivery, 0) ?></b></div>
            </div>
        </div>

        <div class="mj-card mj-kpi">
            <p class="mj-kpi-label">Revenue this year</p>
            <p class="mj-kpi-value num"><?= number_format($majik_revenue_ytd->revenue, 0) ?></p>
            <div class="mj-kpi-row"><span class="mj-trend <?= $rev_year_class ?>"><?= $rev_year_text ?></span> vs last year</div>
            <div class="mj-kpi-foot">
                <div>Delivery fee <b class="num"><?= number_format($majik_delivery_yr->delivery, 0) ?></b></div>
            </div>
        </div>

        <div class="mj-card mj-kpi">
            <p class="mj-kpi-label">Refills today</p>
            <p class="mj-kpi-value num"><?= number_format($majik_order_today->majik_order, 0) ?></p>
            <div class="mj-kpi-row"><span class="mj-trend <?= $ord_day_class ?>"><?= $ord_day_text ?></span> vs yesterday</div>
            <div class="mj-kpi-foot">
                <div>Yesterday refills <b class="num"><?= number_format($yesterday_order, 0) ?></b></div>
            </div>
        </div>
    </div>

    <!-- =============================== CHARTS =============================== -->
    <div class="mj-grid mj-grid-main">

        <div class="mj-card">
            <div class="mj-card-head">
                <div>
                    <h2 class="mj-card-title">Revenue Analysis</h2>
                    <p class="mj-card-sub">Monthly revenue, <?= date('Y') ?></p>
                </div>
                <span class="mj-meta">Year to date <b class="num"><?= number_format($majik_revenue_ytd->revenue, 0) ?></b></span>
            </div>
            <div class="mj-card-body">
                <div id="revenuegraph" class="mj-chart"></div>
            </div>
        </div>

        <div class="mj-card">
            <div class="mj-card-head">
                <div>
                    <h2 class="mj-card-title">Refills Analysis</h2>
                    <p class="mj-card-sub">Monthly refills, <?= date('Y') ?></p>
                </div>
            </div>
            <div class="mj-card-body">
                <div id="refillgraph" class="mj-chart" style="min-height: 200px;"></div>
            </div>
            <div class="mj-summary">
                <div>
                    <p class="label">Today</p>
                    <p class="value num"><?= number_format($majik_order_today->majik_order, 0) ?></p>
                    <span class="mj-trend <?= $ord_day_class ?>"><?= $ord_day_text ?></span>
                </div>
                <div>
                    <p class="label">Month</p>
                    <p class="value num"><?= number_format($majik_order_mtd->majik_order, 0) ?></p>
                    <span class="mj-trend <?= $ord_month_class ?>"><?= $ord_month_text ?></span>
                </div>
                <div>
                    <p class="label">Year</p>
                    <p class="value num"><?= number_format($majik_order_ytd->majik_order, 0) ?></p>
                    <span class="mj-trend <?= $ord_year_class ?>"><?= $ord_year_text ?></span>
                </div>
            </div>
        </div>

    </div>

    <!-- =============================== MAJIKANS / CUSTOMERS / APPS =============================== -->
    <div class="mj-grid mj-grid-3">

        <!-- Majikans Performance -->
        <div class="mj-card">
            <div class="mj-card-head">
                <div>
                    <h2 class="mj-card-title">Majikans Performance</h2>
                    <p class="mj-card-sub">Activity status</p>
                </div>
            </div>
            <div class="mj-card-body">
                <div class="mj-donut">
                    <div id="majikansdonut" style="min-height: 190px;"></div>
                    <div class="mj-donut-center"><b class="num"><?= number_format($sub_total, 0) ?></b><span>Total</span></div>
                </div>
                <ul class="mj-list">
                    <?php
                    foreach ($counts as $p) {
                        $pct = ($sub_total > 0) ? ($p->count / $sub_total * 100) : 0;
                        if ($p->sub_stat_dormancy == 'E') { $label = 'Excellent'; $color = '#0b4f7c'; }
                        elseif ($p->sub_stat_dormancy == 'G') { $label = 'Good'; $color = '#0779BC'; }
                        elseif ($p->sub_stat_dormancy == 'N') { $label = 'Normal'; $color = '#7fb9dc'; }
                        elseif ($p->sub_stat_dormancy == 'D') { $label = 'Dormant'; $color = '#d1d5db'; }
                        else { continue; }
                    ?>
                    <li>
                        <span class="mj-swatch" style="background: <?= $color ?>;"></span>
                        <span class="name"><?= $label ?></span>
                        <span class="value num"><?= number_format($p->count, 0) ?></span>
                        <span class="pct num"><?= number_format($pct, 1) ?>%</span>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>

        <!-- Customer Base -->
        <div class="mj-card">
            <div class="mj-card-head">
                <div>
                    <h2 class="mj-card-title">Customer Base</h2>
                    <p class="mj-card-sub">Majikan sign-ups</p>
                </div>
            </div>
            <div class="mj-card-body">
                <div class="mj-big">
                    <p class="label">Total Majikans</p>
                    <p class="value num"><?= number_format($majik_cust->majik_customer, 0) ?></p>
                </div>
                <ul class="mj-list">
                    <li><span class="name">New today</span><span class="value num"><?= number_format($majik_cust_today->majik_cust, 0) ?></span></li>
                    <li><span class="name">New this month</span><span class="value num"><?= number_format($majik_cust_mtd->majik_cust, 0) ?></span></li>
                    <li><span class="name">New this year</span><span class="value num"><?= number_format($majik_cust_ytd->majik_cust, 0) ?></span></li>
                </ul>
            </div>
        </div>

        <!-- Apps Performance -->
        <div class="mj-card mj-tabset">
            <div class="mj-card-head">
                <div>
                    <h2 class="mj-card-title">Apps Performance</h2>
                    <p class="mj-card-sub">WABA vs App, <?= date('M Y') ?></p>
                </div>
            </div>
            <div class="mj-card-body">
                <div class="mj-tabs">
                    <button type="button" class="mj-tab is-active" data-target="appsDay">Today</button>
                    <button type="button" class="mj-tab" data-target="appsMonth">This month</button>
                </div>

                <div class="mj-pane is-active" id="appsDay">
                    <?php foreach ($daily_data as $data):
                        $total_rev = $data['waba_revenue'] + $data['app_revenue'];
                        $waba_share = ($total_rev > 0) ? round($data['waba_revenue'] / $total_rev * 100) : 0;
                    ?>
                    <table class="mj-table">
                        <thead><tr><th>Channel</th><th>Revenue</th><th>Refills</th></tr></thead>
                        <tbody>
                            <tr><td>WABA</td><td><b><?= number_format($data['waba_revenue'], 0) ?></b></td><td><?= number_format($data['waba_refills'], 0) ?></td></tr>
                            <tr><td>App</td><td><b><?= number_format($data['app_revenue'], 0) ?></b></td><td><?= number_format($data['app_refills'], 0) ?></td></tr>
                        </tbody>
                    </table>
                    <div class="mj-share">
                        <div class="mj-share-label"><span>WABA share of revenue</span><b class="num"><?= $waba_share ?>%</b></div>
                        <div class="mj-share-bar"><span style="width: <?= $waba_share ?>%;"></span></div>
                    </div>
                    <?php endforeach; ?>
                    <?php if (empty($daily_data)) { ?><p class="mj-empty">No data available</p><?php } ?>
                </div>

                <div class="mj-pane" id="appsMonth">
                    <?php foreach ($monthly_data as $mtddata):
                        $total_rev = $mtddata['waba_revenue'] + $mtddata['app_revenue'];
                        $waba_share = ($total_rev > 0) ? round($mtddata['waba_revenue'] / $total_rev * 100) : 0;
                    ?>
                    <table class="mj-table">
                        <thead><tr><th>Channel</th><th>Revenue</th><th>Refills</th></tr></thead>
                        <tbody>
                            <tr><td>WABA</td><td><b><?= number_format($mtddata['waba_revenue'], 0) ?></b></td><td><?= number_format($mtddata['waba_refills'], 0) ?></td></tr>
                            <tr><td>App</td><td><b><?= number_format($mtddata['app_revenue'], 0) ?></b></td><td><?= number_format($mtddata['app_refills'], 0) ?></td></tr>
                        </tbody>
                    </table>
                    <div class="mj-share">
                        <div class="mj-share-label"><span>WABA share of revenue</span><b class="num"><?= $waba_share ?>%</b></div>
                        <div class="mj-share-bar"><span style="width: <?= $waba_share ?>%;"></span></div>
                    </div>
                    <?php endforeach; ?>
                    <?php if (empty($monthly_data)) { ?><p class="mj-empty">No data available</p><?php } ?>
                </div>
            </div>
        </div>

    </div>

    <!-- =============================== LEADERBOARDS =============================== -->
    <div class="mj-grid mj-grid-3">

        <!-- Drivers Performance -->
        <div class="mj-card mj-tabset">
            <div class="mj-card-head">
                <div>
                    <h2 class="mj-card-title">Drivers Performance</h2>
                    <p class="mj-card-sub"><?= date('M Y') ?></p>
                </div>
                <div class="mj-active"><span>Active</span><b class="num"><?= number_format($majik_active_drivers->majik_drivers, 0) ?></b></div>
            </div>
            <div class="mj-card-body">
                <div class="mj-tabs">
                    <button type="button" class="mj-tab is-active" data-target="driversDay">Today</button>
                    <button type="button" class="mj-tab" data-target="driversMonth">This month</button>
                </div>

                <div class="mj-pane is-active" id="driversDay">
                    <div class="mj-board">
                        <?php
                        $max = 0;
                        foreach ($trip_day as $vl) { if ($vl->trips > $max) $max = $vl->trips; }
                        $rank = 0;
                        foreach ($trip_day as $vl) { $rank++;
                        ?>
                        <div class="mj-row">
                            <span class="mj-rank"><?= $rank ?></span>
                            <div class="mj-row-main">
                                <div class="mj-row-top"><span class="mj-row-name"><?= htmlspecialchars($vl->md_first) ?></span><span class="mj-row-value"><?= number_format($vl->trips, 0) ?><small>trips</small></span></div>
                                <div class="mj-row-bar"><span style="width: <?= $max > 0 ? round($vl->trips / $max * 100) : 0 ?>%;"></span></div>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if (empty($trip_day)) { ?><p class="mj-empty">No trips recorded yet</p><?php } ?>
                    </div>
                </div>

                <div class="mj-pane" id="driversMonth">
                    <div class="mj-board">
                        <?php
                        $max = 0;
                        foreach ($trip_mnt as $ref) { if ($ref->trips > $max) $max = $ref->trips; }
                        $rank = 0;
                        foreach ($trip_mnt as $ref) { $rank++;
                        ?>
                        <div class="mj-row">
                            <span class="mj-rank"><?= $rank ?></span>
                            <div class="mj-row-main">
                                <div class="mj-row-top"><span class="mj-row-name"><?= htmlspecialchars($ref->md_first) ?></span><span class="mj-row-value"><?= number_format($ref->trips, 0) ?><small>trips</small></span></div>
                                <div class="mj-row-bar"><span style="width: <?= $max > 0 ? round($ref->trips / $max * 100) : 0 ?>%;"></span></div>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if (empty($trip_mnt)) { ?><p class="mj-empty">No trips recorded yet</p><?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Customer Performance -->
        <div class="mj-card mj-tabset">
            <div class="mj-card-head">
                <div>
                    <h2 class="mj-card-title">Customer Performance</h2>
                    <p class="mj-card-sub"><?= date('M Y') ?></p>
                </div>
                <div class="mj-active"><span>Active</span><b class="num"><?= number_format($majik_active_customers->Total, 0) ?></b></div>
            </div>
            <div class="mj-card-body">
                <div class="mj-tabs">
                    <button type="button" class="mj-tab is-active" data-target="custRevenue">Revenue</button>
                    <button type="button" class="mj-tab" data-target="custVolume">Volume</button>
                    <button type="button" class="mj-tab" data-target="custRefills">Refills</button>
                </div>

                <div class="mj-pane is-active" id="custRevenue">
                    <div class="mj-board">
                        <?php
                        $max = 0;
                        foreach ($majik_customer_revenue as $vl) { if ($vl->total_revenue > $max) $max = $vl->total_revenue; }
                        $rank = 0;
                        foreach ($majik_customer_revenue as $vl) { $rank++;
                        ?>
                        <div class="mj-row">
                            <span class="mj-rank"><?= $rank ?></span>
                            <div class="mj-row-main">
                                <div class="mj-row-top"><span class="mj-row-name"><?= htmlspecialchars($vl->sub_name) ?></span><span class="mj-row-value"><?= number_format($vl->total_revenue, 0) ?></span></div>
                                <div class="mj-row-bar"><span style="width: <?= $max > 0 ? round($vl->total_revenue / $max * 100) : 0 ?>%;"></span></div>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if (empty($majik_customer_revenue)) { ?><p class="mj-empty">No data available</p><?php } ?>
                    </div>
                </div>

                <div class="mj-pane" id="custVolume">
                    <div class="mj-board">
                        <?php
                        $max = 0;
                        foreach ($majik_customer_volume as $msv) { if ($msv->total_volume > $max) $max = $msv->total_volume; }
                        $rank = 0;
                        foreach ($majik_customer_volume as $msv) { $rank++;
                        ?>
                        <div class="mj-row">
                            <span class="mj-rank"><?= $rank ?></span>
                            <div class="mj-row-main">
                                <div class="mj-row-top"><span class="mj-row-name"><?= htmlspecialchars($msv->sub_name) ?></span><span class="mj-row-value"><?= number_format($msv->total_volume, 0) ?><small>L</small></span></div>
                                <div class="mj-row-bar"><span style="width: <?= $max > 0 ? round($msv->total_volume / $max * 100) : 0 ?>%;"></span></div>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if (empty($majik_customer_volume)) { ?><p class="mj-empty">No data available</p><?php } ?>
                    </div>
                </div>

                <div class="mj-pane" id="custRefills">
                    <div class="mj-board">
                        <?php
                        $max = 0;
                        foreach ($majik_customer_refills as $msre) { if ($msre->order_count > $max) $max = $msre->order_count; }
                        $rank = 0;
                        foreach ($majik_customer_refills as $msre) { $rank++;
                        ?>
                        <div class="mj-row">
                            <span class="mj-rank"><?= $rank ?></span>
                            <div class="mj-row-main">
                                <div class="mj-row-top"><span class="mj-row-name"><?= htmlspecialchars($msre->sub_name) ?></span><span class="mj-row-value"><?= number_format($msre->order_count, 0) ?><small>refills</small></span></div>
                                <div class="mj-row-bar"><span style="width: <?= $max > 0 ? round($msre->order_count / $max * 100) : 0 ?>%;"></span></div>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if (empty($majik_customer_refills)) { ?><p class="mj-empty">No data available</p><?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stores Performance -->
        <div class="mj-card mj-tabset">
            <div class="mj-card-head">
                <div>
                    <h2 class="mj-card-title">Stores Performance</h2>
                    <p class="mj-card-sub"><?= date('M Y') ?></p>
                </div>
                <div class="mj-active"><span>Active</span><b class="num"><?= number_format($majik_store->majik_store, 0) ?></b></div>
            </div>
            <div class="mj-card-body">
                <div class="mj-tabs">
                    <button type="button" class="mj-tab is-active" data-target="storeRevenue">Revenue</button>
                    <button type="button" class="mj-tab" data-target="storeVolume">Volume</button>
                    <button type="button" class="mj-tab" data-target="storeRefills">Refills</button>
                </div>

                <div class="mj-pane is-active" id="storeRevenue">
                    <div class="mj-board">
                        <?php
                        $max = 0;
                        foreach ($majik_store_revenue as $msr) { if ($msr->total_revenue > $max) $max = $msr->total_revenue; }
                        $rank = 0;
                        foreach ($majik_store_revenue as $msr) { $rank++;
                        ?>
                        <div class="mj-row">
                            <span class="mj-rank"><?= $rank ?></span>
                            <div class="mj-row-main">
                                <div class="mj-row-top"><span class="mj-row-name"><?= htmlspecialchars($msr->store_name) ?></span><span class="mj-row-value"><?= number_format($msr->total_revenue, 0) ?></span></div>
                                <div class="mj-row-bar"><span style="width: <?= $max > 0 ? round($msr->total_revenue / $max * 100) : 0 ?>%;"></span></div>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if (empty($majik_store_revenue)) { ?><p class="mj-empty">No data available</p><?php } ?>
                    </div>
                </div>

                <div class="mj-pane" id="storeVolume">
                    <div class="mj-board">
                        <?php
                        $max = 0;
                        foreach ($majik_store_volume as $msv) { if ($msv->total_volume > $max) $max = $msv->total_volume; }
                        $rank = 0;
                        foreach ($majik_store_volume as $msv) { $rank++;
                        ?>
                        <div class="mj-row">
                            <span class="mj-rank"><?= $rank ?></span>
                            <div class="mj-row-main">
                                <div class="mj-row-top"><span class="mj-row-name"><?= htmlspecialchars($msv->store_name) ?></span><span class="mj-row-value"><?= number_format($msv->total_volume, 0) ?><small>L</small></span></div>
                                <div class="mj-row-bar"><span style="width: <?= $max > 0 ? round($msv->total_volume / $max * 100) : 0 ?>%;"></span></div>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if (empty($majik_store_volume)) { ?><p class="mj-empty">No data available</p><?php } ?>
                    </div>
                </div>

                <div class="mj-pane" id="storeRefills">
                    <div class="mj-board">
                        <?php
                        $max = 0;
                        foreach ($majik_store_refills as $msre) { if ($msre->sub_count > $max) $max = $msre->sub_count; }
                        $rank = 0;
                        foreach ($majik_store_refills as $msre) { $rank++;
                        ?>
                        <div class="mj-row">
                            <span class="mj-rank"><?= $rank ?></span>
                            <div class="mj-row-main">
                                <div class="mj-row-top"><span class="mj-row-name"><?= htmlspecialchars($msre->point_name) ?></span><span class="mj-row-value"><?= number_format($msre->sub_count, 0) ?><small>refills</small></span></div>
                                <div class="mj-row-bar"><span style="width: <?= $max > 0 ? round($msre->sub_count / $max * 100) : 0 ?>%;"></span></div>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if (empty($majik_store_refills)) { ?><p class="mj-empty">No data available</p><?php } ?>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
</div>
</div>
</div>
</div>

<script src="<?= base_url('assets/js/vendors.js') ?>"></script>

<script>
/* ---------- Tabs (no Bootstrap JS needed) ---------- */
document.addEventListener('click', function (e) {
    var tab = e.target.closest ? e.target.closest('.mj-tab') : null;
    if (!tab) return;
    var set = tab.closest('.mj-tabset');
    var tabs = set.querySelectorAll('.mj-tab');
    var panes = set.querySelectorAll('.mj-pane');
    for (var i = 0; i < tabs.length; i++) tabs[i].classList.remove('is-active');
    for (var j = 0; j < panes.length; j++) panes[j].classList.remove('is-active');
    tab.classList.add('is-active');
    document.getElementById(tab.getAttribute('data-target')).classList.add('is-active');
});

/* ---------- Charts ---------- */
document.addEventListener('DOMContentLoaded', function () {
    if (typeof ApexCharts !== 'undefined') {
        initRevenueGraph();
        initRefillGraph();
        initMajikansDonut();
    }
});

var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
var chartFont = "Inter, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Arial, sans-serif";
var axisLabel = { colors: '#6b7280', fontSize: '12px' };

// 1200000 -> 1.2M, 1500 -> 1.5K
function shortNumber(value) {
    var abs = Math.abs(value);
    if (abs >= 1000000) return (value / 1000000).toFixed(abs >= 10000000 ? 0 : 1).replace('.0', '') + 'M';
    if (abs >= 1000) return (value / 1000).toFixed(abs >= 10000 ? 0 : 1).replace('.0', '') + 'K';
    return Math.round(value);
}

function initRevenueGraph() {
    var el = document.querySelector('#revenuegraph');
    if (!el) return;

    var monthData = [<?= implode(',', array_map(function($a) { return (float) $a->total_amount; }, $amount)) ?>];
    while (monthData.length < months.length) monthData.push(null); // future months stay empty

    new ApexCharts(el, {
        chart: { height: 300, type: 'area', toolbar: { show: false }, zoom: { enabled: false }, fontFamily: chartFont },
        colors: ['#0779BC'],
        series: [{ name: 'Revenue', data: monthData }],
        stroke: { curve: 'smooth', width: 2 },
        fill: { type: 'gradient', gradient: { opacityFrom: 0.18, opacityTo: 0, stops: [0, 100] } },
        markers: { size: 0, hover: { size: 5 } },
        dataLabels: { enabled: false },
        grid: { borderColor: '#eef0f3', padding: { left: 4, right: 8 } },
        xaxis: { categories: months, axisBorder: { show: false }, axisTicks: { show: false }, labels: { style: axisLabel } },
        yaxis: { min: 0, forceNiceScale: true, labels: { style: axisLabel, formatter: shortNumber } },
        tooltip: { y: { formatter: function (val) { return Number(val).toLocaleString(); } } }
    }).render();
}

function initRefillGraph() {
    var el = document.querySelector('#refillgraph');
    if (!el) return;

    var refillData = [<?= implode(',', array_map(function($r) { return (float) $r->sub_count; }, $refill)) ?>];
    while (refillData.length < months.length) refillData.push(0);

    new ApexCharts(el, {
        chart: { height: 220, type: 'bar', toolbar: { show: false }, fontFamily: chartFont },
        colors: ['#0779BC'],
        series: [{ name: 'Refills', data: refillData }],
        plotOptions: { bar: { columnWidth: '50%', borderRadius: 3 } },
        dataLabels: { enabled: false },
        states: { hover: { filter: { type: 'darken', value: 0.85 } } },
        grid: { borderColor: '#eef0f3', padding: { left: 4, right: 8 } },
        xaxis: { categories: months, axisBorder: { show: false }, axisTicks: { show: false }, labels: { style: { colors: '#6b7280', fontSize: '11px' } } },
        yaxis: { min: 0, forceNiceScale: true, tickAmount: 4, labels: { style: { colors: '#6b7280', fontSize: '11px' }, formatter: shortNumber } },
        tooltip: { y: { formatter: function (val) { return Number(val).toLocaleString(); } } }
    }).render();
}

function initMajikansDonut() {
    var el = document.querySelector('#majikansdonut');
    if (!el) return;

    var labels = [], values = [], colors = [];
    <?php foreach ($counts as $p) { ?>
    <?php if ($p->sub_stat_dormancy == 'E') { ?>labels.push('Excellent'); values.push(<?= (float) $p->count ?>); colors.push('#0b4f7c');<?php } ?>
    <?php if ($p->sub_stat_dormancy == 'G') { ?>labels.push('Good'); values.push(<?= (float) $p->count ?>); colors.push('#0779BC');<?php } ?>
    <?php if ($p->sub_stat_dormancy == 'N') { ?>labels.push('Normal'); values.push(<?= (float) $p->count ?>); colors.push('#7fb9dc');<?php } ?>
    <?php if ($p->sub_stat_dormancy == 'D') { ?>labels.push('Dormant'); values.push(<?= (float) $p->count ?>); colors.push('#d1d5db');<?php } ?>
    <?php } ?>

    new ApexCharts(el, {
        chart: { height: 200, type: 'donut', fontFamily: chartFont },
        series: values,
        labels: labels,
        colors: colors,
        stroke: { width: 2, colors: ['#fff'] },
        legend: { show: false },
        dataLabels: { enabled: false },
        plotOptions: { pie: { donut: { size: '76%' } } },
        tooltip: { y: { formatter: function (val) { return Number(val).toLocaleString(); } } }
    }).render();
}
</script>
