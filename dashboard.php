<link rel="stylesheet" href="<?= base_url('assets/css/majik2.css') ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600&display=swap">

<style>
/* =====================================================================
   MAJIK DASHBOARD — soft cards, Majik blue #0779BC + grey #a6a9b7 (prefix .mj-)
   ===================================================================== */
.mj-dash {
    --frame: #f1f2f5;
    --card: #ffffff;
    --blue: #0779BC;
    --blue-dark: #055d91;
    --blue-soft: #e8f2f9;
    --grey: #a6a9b7;
    --grey-soft: #eceef2;
    --ink: #1b1d26;
    --ink-2: #444756;
    --muted: #868a9b;
    --line: #e7e8ee;
    --up: #2f9e44;
    --down: #e5484d;
    font-family: 'Outfit', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Arial, sans-serif;
    font-size: 13px;
    font-weight: 400;
    color: var(--ink);
    background: var(--frame);
    border-radius: 28px;
    padding: 24px;
    -webkit-font-smoothing: antialiased;
}
.mj-dash *, .mj-dash *::before, .mj-dash *::after { box-sizing: border-box; }
.mj-dash p, .mj-dash h1, .mj-dash h2, .mj-dash h3, .mj-dash ul { margin: 0; padding: 0; }
.mj-dash ul { list-style: none; }
.mj-dash .num { font-variant-numeric: tabular-nums; }

/* ---------- Layout ---------- */
.mj-grid { display: grid; gap: 18px; margin-bottom: 18px; }
.mj-grid:last-child { margin-bottom: 0; }
.mj-grid-top { grid-template-columns: minmax(0, 1.45fr) minmax(0, 1fr); }
.mj-grid-3 { grid-template-columns: repeat(3, minmax(0, 1fr)); }
@media (max-width: 1199.98px) {
    .mj-grid-top { grid-template-columns: 1fr; }
    .mj-grid-3 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
}
@media (max-width: 767.98px) {
    .mj-dash { padding: 14px; border-radius: 0; }
    .mj-grid { gap: 14px; margin-bottom: 14px; }
    .mj-grid-3 { grid-template-columns: 1fr; }
}

/* ---------- Top bar ---------- */
.mj-topbar { display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 14px; margin: 4px 4px 22px; }
.mj-hello { display: flex; align-items: center; gap: 14px; }
.mj-logo { width: 40px; height: 40px; border-radius: 50%; background: var(--blue); color: #fff; display: flex; align-items: center; justify-content: center; font-size: 17px; font-weight: 600; }
.mj-hello h1 { font-size: 20px; font-weight: 400; letter-spacing: -.01em; }
.mj-hello p { font-size: 13px; color: var(--muted); margin-top: 2px; }
.mj-topbar-right { display: flex; align-items: center; gap: 10px; }
.mj-round { height: 38px; min-width: 38px; padding: 0 16px; border-radius: 999px; background: var(--card); display: inline-flex; align-items: center; justify-content: center; gap: 8px; font-size: 13px; color: var(--ink-2); }
.mj-round svg { width: 16px; height: 16px; color: var(--blue); }

/* ---------- Card ---------- */
.mj-card { background: var(--card); border-radius: 20px; padding: 22px; display: flex; flex-direction: column; min-width: 0; position: relative; overflow: hidden; }
.mj-card-head { display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 12px; margin-bottom: 18px; }
.mj-card-title { display: flex; align-items: center; gap: 10px; font-size: 16px; font-weight: 500; letter-spacing: -.01em; }
.mj-ico { width: 36px; height: 36px; border-radius: 50%; border: 1px solid var(--line); display: inline-flex; align-items: center; justify-content: center; flex-shrink: 0; color: var(--blue); background: var(--blue-soft); border-color: transparent; }
.mj-ico svg { width: 16px; height: 16px; }
.mj-label { font-size: 13px; color: var(--ink-2); }
.mj-small { font-size: 12px; color: var(--muted); }

/* ---------- Segmented pills ---------- */
.mj-seg { display: inline-flex; padding: 4px; border-radius: 999px; background: var(--grey-soft); gap: 2px; flex-wrap: wrap; }
.mj-tab { appearance: none; border: 0; background: transparent; cursor: pointer; font: inherit; font-size: 13px; color: var(--muted); padding: 6px 14px; border-radius: 999px; }
.mj-tab:focus { outline: none; }
.mj-tab:focus-visible { outline: 2px solid var(--blue); outline-offset: 1px; }
.mj-tab.is-active { background: var(--blue); color: #fff; box-shadow: 0 1px 3px rgba(0, 0, 0, .08); }
.mj-seg.sm .mj-tab { font-size: 12px; padding: 5px 11px; }
.mj-pane { display: none; }
.mj-pane.is-active { display: block; }

/* ---------- Pills & trends ---------- */
.mj-pill { display: inline-flex; align-items: center; gap: 8px; height: 36px; padding: 0 14px; border-radius: 999px; font-size: 12.5px; white-space: nowrap; }
.mj-pill.dark { background: var(--blue); color: #fff; }
.mj-pill.dark b { color: #fff; font-weight: 600; }
.mj-pill.outline { border: 1px solid var(--grey); color: var(--ink-2); }
.mj-pill.outline b { font-weight: 500; }
.mj-pill svg { width: 15px; height: 15px; }
.mj-trend { font-size: 12px; font-weight: 500; white-space: nowrap; }
.mj-trend.up { color: var(--up); }
.mj-trend.down { color: var(--down); }
.mj-trend.flat { color: var(--muted); }
.mj-chip { display: inline-flex; align-items: center; gap: 6px; padding: 5px 12px; border-radius: 999px; background: #fff; font-size: 12px; color: var(--ink-2); }

/* ---------- Revenue balance card ---------- */
.mj-balance-top { display: flex; flex-wrap: wrap; align-items: flex-start; justify-content: space-between; gap: 16px; margin-bottom: 24px; }
.mj-balance-meta { text-align: right; }
.mj-balance-meta b { display: block; font-size: 17px; color: var(--blue); font-weight: 400; margin-top: 4px; }
.mj-big { font-size: 40px; font-weight: 400; letter-spacing: -.03em; line-height: 1.05; margin: 6px 0 8px; overflow-wrap: anywhere; }
.mj-balance-bottom { display: flex; flex-wrap: wrap; align-items: center; gap: 10px; margin-top: 22px; }
.mj-go { margin-left: auto; width: 56px; height: 56px; border-radius: 50%; background: var(--blue); display: flex; align-items: center; justify-content: center; color: #fff; flex-shrink: 0; }
.mj-go svg { width: 22px; height: 22px; }
@media (max-width: 575.98px) { .mj-big { font-size: 32px; } .mj-go { display: none; } .mj-balance-meta { text-align: left; } }

/* ---------- Lime refills card ---------- */
.mj-card.accent { background: linear-gradient(140deg, var(--blue) 0%, var(--blue-dark) 100%); color: #fff; }
.mj-card.accent .mj-label { color: rgba(255, 255, 255, .85); }
.mj-star { position: absolute; right: 8px; top: 12px; width: 160px; height: 160px; color: rgba(255, 255, 255, .08); pointer-events: none; }
.mj-badge { position: relative; display: inline-flex; align-items: center; gap: 10px; height: 36px; padding: 0 4px 0 14px; border-radius: 999px; background: rgba(255, 255, 255, .16); color: #fff; font-size: 12px; letter-spacing: .1em; }
.mj-badge i { width: 28px; height: 28px; border-radius: 50%; background: #fff; color: var(--blue); display: flex; align-items: center; justify-content: center; font-style: normal; }
.mj-badge i svg { width: 14px; height: 14px; }
.mj-accent-body { position: relative; margin-top: 22px; }
.mj-accent-body .mj-big { font-size: 38px; display: inline-block; margin-right: 10px; vertical-align: middle; }
.mj-tiles { position: relative; display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-top: 20px; }
.mj-tile { background: rgba(255, 255, 255, .13); border-radius: 14px; padding: 12px 14px; min-width: 0; }
.mj-tile .mj-trend { color: #fff; }
.mj-tile p { font-size: 12px; color: rgba(255, 255, 255, .8); }
.mj-tile b { display: block; font-size: 19px; font-weight: 400; margin: 6px 0 2px; overflow-wrap: anywhere; }

/* ---------- Analysis chart card ---------- */
.mj-chart { min-height: 260px; margin: -8px -10px 0; }
.mj-chart-summary { display: flex; flex-wrap: wrap; gap: 28px; margin-bottom: 10px; }
.mj-chart-summary div p { font-size: 12px; color: var(--muted); }
.mj-chart-summary div b { display: block; font-size: 18px; font-weight: 400; margin-top: 2px; }

/* ---------- Majikans ring ---------- */
.mj-ring { position: relative; width: 180px; margin: 0 auto; }
.mj-ring-center { position: absolute; inset: 0; display: flex; flex-direction: column; align-items: center; justify-content: center; pointer-events: none; }
.mj-ring-center b { font-size: 22px; color: var(--blue); font-weight: 400; letter-spacing: -.02em; }
.mj-ring-center span { font-size: 12px; color: var(--muted); }
.mj-note { display: flex; justify-content: center; margin: 16px 0 18px; }
.mj-note span { display: inline-flex; align-items: center; gap: 8px; padding: 7px 14px; border: 1px solid var(--line); border-radius: 999px; font-size: 12.5px; }
.mj-note svg { color: var(--blue); }
.mj-note b { color: var(--blue); font-weight: 500; }
.mj-legend { display: grid; grid-template-columns: 1fr 1fr; gap: 10px 16px; font-size: 13px; }
.mj-legend li { display: flex; align-items: center; gap: 8px; min-width: 0; }
.mj-legend i { width: 10px; height: 10px; border-radius: 50%; flex-shrink: 0; }
.mj-legend span { color: var(--muted); margin-left: auto; }

/* ---------- Apps performance (progress rows) ---------- */
.mj-amount { font-size: 30px; font-weight: 400; letter-spacing: -.03em; line-height: 1.1; overflow-wrap: anywhere; }
.mj-dash .mj-progress { margin-top: 20px; }
.mj-progress li + li { margin-top: 16px; }
.mj-progress-top { display: flex; justify-content: space-between; gap: 10px; font-size: 13px; margin-bottom: 7px; }
.mj-progress-top span { color: var(--muted); }
.mj-progress-top b { font-weight: 400; color: var(--ink-2); }
.mj-progress li.lead .mj-progress-top span { color: var(--ink); }
.mj-bar { position: relative; height: 7px; border-radius: 999px; background: var(--grey-soft); }
.mj-bar > span { position: absolute; left: 0; top: 0; bottom: 0; border-radius: 999px; background: var(--grey); }
.mj-progress li.lead .mj-bar > span { background: var(--blue); }
.mj-bar em { position: absolute; top: 50%; transform: translate(-50%, -50%); padding: 2px 8px; border-radius: 999px; background: var(--blue-dark); color: #fff; font-style: normal; font-size: 11px; white-space: nowrap; }

/* ---------- Customer base ---------- */
.mj-stat-rows li { display: flex; align-items: center; gap: 12px; padding: 11px 0; border-top: 1px solid var(--line); }
.mj-stat-rows li:first-child { border-top: 0; }
.mj-stat-rows .ttl { font-size: 13.5px; }
.mj-stat-rows .sub { font-size: 12px; color: var(--muted); margin-top: 2px; }
.mj-stat-rows .val { margin-left: auto; font-size: 15px; font-weight: 500; color: var(--blue); white-space: nowrap; }

/* ---------- Leaderboards (transaction style) ---------- */
.mj-head-actions { display: flex; align-items: center; gap: 10px; }
.mj-active { display: inline-flex; align-items: center; gap: 6px; padding: 5px 12px; border-radius: 999px; background: var(--blue-soft); font-size: 12px; color: var(--muted); }
.mj-active b { color: var(--blue); font-weight: 600; font-size: 13px; }
.mj-list { max-height: 400px; overflow-y: auto; margin: 0 -10px; padding: 0 10px; }
.mj-list::-webkit-scrollbar { width: 5px; }
.mj-list::-webkit-scrollbar-thumb { background: var(--line); border-radius: 3px; }
.mj-item { display: flex; align-items: center; gap: 12px; padding: 11px 0; border-top: 1px solid var(--line); }
.mj-item:first-child { border-top: 0; padding: 10px 12px; margin: 0 -12px 4px; border: 1px solid #cfe4f2; background: var(--blue-soft); border-radius: 14px; }
.mj-avatar { width: 34px; height: 34px; border-radius: 50%; border: 1px solid var(--line); background: #fff; display: flex; align-items: center; justify-content: center; font-size: 13px; font-weight: 500; color: var(--grey); text-transform: uppercase; flex-shrink: 0; }
.mj-item-main { flex: 1; min-width: 0; }
.mj-item-name { font-size: 13.5px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
.mj-item-sub { font-size: 11.5px; color: var(--muted); margin-top: 2px; }
.mj-item:first-child .mj-item-sub { color: var(--blue); }
.mj-item:first-child .mj-avatar { background: var(--blue); border-color: var(--blue); color: #fff; }
.mj-item-val { font-size: 13.5px; font-weight: 500; white-space: nowrap; font-variant-numeric: tabular-nums; }
.mj-item-val small { font-size: 11px; font-weight: 400; color: var(--muted); margin-left: 3px; }
.mj-empty { text-align: center; padding: 34px 10px; color: var(--muted); }
</style>

<?php
/* ---------- Trend calculations ---------- */

// Revenue today vs yesterday
$today_revenue = $majik_revenue_today->revenue;
$yesterday_revenue = $majik_revenue_yesterday->revenue;
if ($yesterday_revenue > 0) {
    $rev_day_change = (($today_revenue - $yesterday_revenue) / $yesterday_revenue) * 100;
    $rev_day_class = $rev_day_change > 0 ? 'up' : ($rev_day_change < 0 ? 'down' : 'flat');
    $rev_day_text = ($rev_day_change > 0 ? '+' : ($rev_day_change < 0 ? '-' : '')) . number_format(abs($rev_day_change), 1) . '%';
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
    $rev_month_text = ($rev_month_change > 0 ? '+' : ($rev_month_change < 0 ? '-' : '')) . number_format(abs($rev_month_change), 1) . '%';
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
    $rev_year_text = ($rev_year_change > 0 ? '+' : ($rev_year_change < 0 ? '-' : '')) . number_format(abs($rev_year_change), 1) . '%';
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
    $ord_day_text = ($ord_day_change > 0 ? '+' : ($ord_day_change < 0 ? '-' : '')) . number_format(abs($ord_day_change), 1) . '%';
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
    $ord_month_text = ($ord_month_change > 0 ? '+' : ($ord_month_change < 0 ? '-' : '')) . number_format(abs($ord_month_change), 1) . '%';
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
    $ord_year_text = ($ord_year_change > 0 ? '+' : ($ord_year_change < 0 ? '-' : '')) . number_format(abs($ord_year_change), 1) . '%';
} else {
    $ord_year_class = 'flat';
    $ord_year_text = 'N/A';
}

// Majikans totals
$sub_total = 0;
$sub_healthy = 0;
foreach ($counts as $p) {
    $sub_total = $sub_total + $p->count;
    if ($p->sub_stat_dormancy == 'E' || $p->sub_stat_dormancy == 'G') {
        $sub_healthy = $sub_healthy + $p->count;
    }
}
$healthy_pct = ($sub_total > 0) ? ($sub_healthy / $sub_total * 100) : 0;
?>

<body>

<div class="app">
<div class="app-wrap">
<div class="app-container">
<div class="app-main1" id="main">
<div class="mj-dash">

    <!-- =============================== TOP BAR =============================== -->
    <div class="mj-topbar">
        <div class="mj-hello">
            <span class="mj-logo">M</span>
            <div>
                <h1>Hello, welcome back</h1>
                <p>Here is how Majik is performing today</p>
            </div>
        </div>
        <div class="mj-topbar-right">
            <span class="mj-round">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                <?= date('D, d M Y') ?>
            </span>
        </div>
    </div>

    <!-- =============================== ROW 1 =============================== -->
    <div class="mj-grid mj-grid-top">

        <!-- Revenue (balance style) -->
        <div class="mj-card mj-tabset">
            <div class="mj-balance-top">
                <div class="mj-seg">
                    <button type="button" class="mj-tab is-active" data-target="revToday">Today</button>
                    <button type="button" class="mj-tab" data-target="revMonth">Month</button>
                    <button type="button" class="mj-tab" data-target="revYear">Year</button>
                </div>
                <div class="mj-balance-meta">
                    <p class="mj-small">Revenue year to date</p>
                    <b class="num"><?= number_format($majik_revenue_ytd->revenue, 0) ?></b>
                </div>
            </div>

            <div class="mj-pane is-active" id="revToday">
                <p class="mj-label">Revenue today</p>
                <p class="mj-big num"><?= number_format($majik_revenue_today->revenue, 0) ?></p>
                <p><span class="mj-trend <?= $rev_day_class ?>"><?= $rev_day_text ?></span> <span class="mj-small">vs yesterday</span></p>
                <div class="mj-balance-bottom">
                    <span class="mj-pill dark"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>Delivery fee <b class="num"><?= number_format($majik_delivery_today->delivery, 0) ?></b></span>
                    <span class="mj-pill outline">Yesterday payments <b class="num"><?= number_format($yesterday_revenue, 2) ?></b></span>
                    <span class="mj-go"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><line x1="7" y1="17" x2="17" y2="7"/><polyline points="7 7 17 7 17 17"/></svg></span>
                </div>
            </div>

            <div class="mj-pane" id="revMonth">
                <p class="mj-label">Revenue this month</p>
                <p class="mj-big num"><?= number_format($majik_revenue_mtd->revenue, 0) ?></p>
                <p><span class="mj-trend <?= $rev_month_class ?>"><?= $rev_month_text ?></span> <span class="mj-small">vs last month</span></p>
                <div class="mj-balance-bottom">
                    <span class="mj-pill dark"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>Delivery fee <b class="num"><?= number_format($majik_delivery_mnth->delivery, 0) ?></b></span>
                    <span class="mj-go"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><line x1="7" y1="17" x2="17" y2="7"/><polyline points="7 7 17 7 17 17"/></svg></span>
                </div>
            </div>

            <div class="mj-pane" id="revYear">
                <p class="mj-label">Revenue this year</p>
                <p class="mj-big num"><?= number_format($majik_revenue_ytd->revenue, 0) ?></p>
                <p><span class="mj-trend <?= $rev_year_class ?>"><?= $rev_year_text ?></span> <span class="mj-small">vs last year</span></p>
                <div class="mj-balance-bottom">
                    <span class="mj-pill dark"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>Delivery fee <b class="num"><?= number_format($majik_delivery_yr->delivery, 0) ?></b></span>
                    <span class="mj-go"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><line x1="7" y1="17" x2="17" y2="7"/><polyline points="7 7 17 7 17 17"/></svg></span>
                </div>
            </div>
        </div>

        <!-- Refills (blue card) -->
        <div class="mj-card accent">
            <svg class="mj-star" viewBox="0 0 100 100" fill="currentColor"><path d="M50 0 C54 30 70 46 100 50 C70 54 54 70 50 100 C46 70 30 54 0 50 C30 46 46 30 50 0 Z"/></svg>
            <div>
                <span class="mj-badge">REFILLS <i><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"/></svg></i></span>
            </div>
            <div class="mj-accent-body">
                <p class="mj-label">Refills today</p>
                <p><span class="mj-big num"><?= number_format($majik_order_today->majik_order, 0) ?></span><span class="mj-chip"><span class="mj-trend <?= $ord_day_class ?>"><?= $ord_day_text ?></span> vs yesterday</span></p>
                <p class="mj-small" style="color: rgba(255, 255, 255, .75);">Yesterday refills: <?= number_format($yesterday_order, 0) ?></p>
            </div>
            <div class="mj-tiles">
                <div class="mj-tile">
                    <p>This month</p>
                    <b class="num"><?= number_format($majik_order_mtd->majik_order, 0) ?></b>
                    <span class="mj-trend <?= $ord_month_class ?>"><?= $ord_month_text ?></span> <span class="mj-small" style="color: rgba(255, 255, 255, .75);">vs last month</span>
                </div>
                <div class="mj-tile">
                    <p>This year</p>
                    <b class="num"><?= number_format($majik_order_ytd->majik_order, 0) ?></b>
                    <span class="mj-trend <?= $ord_year_class ?>"><?= $ord_year_text ?></span> <span class="mj-small" style="color: rgba(255, 255, 255, .75);">vs last year</span>
                </div>
            </div>
        </div>

    </div>

    <!-- =============================== ROW 2 : ANALYSIS CHART =============================== -->
    <div class="mj-grid">
        <div class="mj-card mj-tabset">
            <div class="mj-card-head">
                <div class="mj-card-title">
                    <span class="mj-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></span>
                    Analysis <span class="mj-small">Year <?= date('Y') ?></span>
                </div>
                <div class="mj-seg">
                    <button type="button" class="mj-tab is-active" data-target="chartRevenue">Revenue</button>
                    <button type="button" class="mj-tab" data-target="chartRefills">Refills</button>
                </div>
            </div>

            <div class="mj-pane is-active" id="chartRevenue">
                <div class="mj-chart-summary">
                    <div><p>Year to date</p><b class="num"><?= number_format($majik_revenue_ytd->revenue, 0) ?></b></div>
                    <div><p>This month</p><b class="num"><?= number_format($majik_revenue_mtd->revenue, 0) ?></b></div>
                </div>
                <div id="revenuegraph" class="mj-chart"></div>
            </div>
            <div class="mj-pane" id="chartRefills">
                <div class="mj-chart-summary">
                    <div><p>Year to date</p><b class="num"><?= number_format($majik_order_ytd->majik_order, 0) ?></b></div>
                    <div><p>This month</p><b class="num"><?= number_format($majik_order_mtd->majik_order, 0) ?></b></div>
                </div>
                <div id="refillgraph" class="mj-chart"></div>
            </div>
        </div>
    </div>

    <!-- =============================== ROW 3 =============================== -->
    <div class="mj-grid mj-grid-3">

        <!-- Majikans Performance (ring) -->
        <div class="mj-card">
            <div class="mj-card-head">
                <div class="mj-card-title">
                    <span class="mj-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"/><path d="M22 12A10 10 0 0 0 12 2v10z"/></svg></span>
                    Majikans
                </div>
                <span class="mj-chip" style="border: 1px solid var(--line);">Performance</span>
            </div>
            <div class="mj-ring">
                <div id="majikansdonut" style="min-height: 180px;"></div>
                <div class="mj-ring-center"><b class="num"><?= number_format($sub_total, 0) ?></b><span>Majikans</span></div>
            </div>
            <div class="mj-note"><span><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>Excellent or good <b><?= number_format($healthy_pct, 1) ?>%</b></span></div>
            <ul class="mj-legend">
                <?php
                foreach ($counts as $p) {
                    if ($p->sub_stat_dormancy == 'E') { $label = 'Excellent'; $color = '#055d91'; }
                    elseif ($p->sub_stat_dormancy == 'G') { $label = 'Good'; $color = '#0779BC'; }
                    elseif ($p->sub_stat_dormancy == 'N') { $label = 'Normal'; $color = '#a6a9b7'; }
                    elseif ($p->sub_stat_dormancy == 'D') { $label = 'Dormant'; $color = '#dfe1e8'; }
                    else { continue; }
                ?>
                <li><i style="background: <?= $color ?>;"></i><?= $label ?> <span class="num"><?= number_format($p->count, 0) ?></span></li>
                <?php } ?>
            </ul>
        </div>

        <!-- Apps Performance (earning style) -->
        <div class="mj-card mj-tabset">
            <div class="mj-card-head">
                <div class="mj-card-title">
                    <span class="mj-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg></span>
                    Apps
                </div>
                <div class="mj-seg sm">
                    <button type="button" class="mj-tab is-active" data-target="appsDay">Day</button>
                    <button type="button" class="mj-tab" data-target="appsMonth">Month</button>
                </div>
            </div>

            <div class="mj-pane is-active" id="appsDay">
                <?php foreach ($daily_data as $data):
                    $total_rev = $data['waba_revenue'] + $data['app_revenue'];
                    $total_ref = $data['waba_refills'] + $data['app_refills'];
                    $waba_rev_pct = ($total_rev > 0) ? round($data['waba_revenue'] / $total_rev * 100) : 0;
                    $app_rev_pct = ($total_rev > 0) ? 100 - $waba_rev_pct : 0;
                    $waba_ref_pct = ($total_ref > 0) ? round($data['waba_refills'] / $total_ref * 100) : 0;
                    $app_ref_pct = ($total_ref > 0) ? 100 - $waba_ref_pct : 0;
                ?>
                <p class="mj-amount num"><?= number_format($total_rev, 0) ?></p>
                <p class="mj-small" style="margin-top: 6px;">Today's revenue from WABA and App</p>
                <ul class="mj-progress">
                    <li class="<?= $waba_rev_pct >= $app_rev_pct ? 'lead' : '' ?>">
                        <div class="mj-progress-top"><span>WABA revenue</span><b class="num"><?= number_format($data['waba_revenue'], 0) ?></b></div>
                        <div class="mj-bar"><span style="width: <?= $waba_rev_pct ?>%;"></span><?php if ($waba_rev_pct >= $app_rev_pct && $total_rev > 0) { ?><em style="left: <?= max(10, min(90, $waba_rev_pct)) ?>%;"><?= $waba_rev_pct ?>%</em><?php } ?></div>
                    </li>
                    <li class="<?= $app_rev_pct > $waba_rev_pct ? 'lead' : '' ?>">
                        <div class="mj-progress-top"><span>App revenue</span><b class="num"><?= number_format($data['app_revenue'], 0) ?></b></div>
                        <div class="mj-bar"><span style="width: <?= $app_rev_pct ?>%;"></span><?php if ($app_rev_pct > $waba_rev_pct) { ?><em style="left: <?= max(10, min(90, $app_rev_pct)) ?>%;"><?= $app_rev_pct ?>%</em><?php } ?></div>
                    </li>
                    <li>
                        <div class="mj-progress-top"><span>WABA refills</span><b class="num"><?= number_format($data['waba_refills'], 0) ?></b></div>
                        <div class="mj-bar"><span style="width: <?= $waba_ref_pct ?>%;"></span></div>
                    </li>
                    <li>
                        <div class="mj-progress-top"><span>App refills</span><b class="num"><?= number_format($data['app_refills'], 0) ?></b></div>
                        <div class="mj-bar"><span style="width: <?= $app_ref_pct ?>%;"></span></div>
                    </li>
                </ul>
                <?php endforeach; ?>
                <?php if (empty($daily_data)) { ?><p class="mj-empty">No data available</p><?php } ?>
            </div>

            <div class="mj-pane" id="appsMonth">
                <?php foreach ($monthly_data as $mtddata):
                    $total_rev = $mtddata['waba_revenue'] + $mtddata['app_revenue'];
                    $total_ref = $mtddata['waba_refills'] + $mtddata['app_refills'];
                    $waba_rev_pct = ($total_rev > 0) ? round($mtddata['waba_revenue'] / $total_rev * 100) : 0;
                    $app_rev_pct = ($total_rev > 0) ? 100 - $waba_rev_pct : 0;
                    $waba_ref_pct = ($total_ref > 0) ? round($mtddata['waba_refills'] / $total_ref * 100) : 0;
                    $app_ref_pct = ($total_ref > 0) ? 100 - $waba_ref_pct : 0;
                ?>
                <p class="mj-amount num"><?= number_format($total_rev, 0) ?></p>
                <p class="mj-small" style="margin-top: 6px;">This month's revenue from WABA and App</p>
                <ul class="mj-progress">
                    <li class="<?= $waba_rev_pct >= $app_rev_pct ? 'lead' : '' ?>">
                        <div class="mj-progress-top"><span>WABA revenue</span><b class="num"><?= number_format($mtddata['waba_revenue'], 0) ?></b></div>
                        <div class="mj-bar"><span style="width: <?= $waba_rev_pct ?>%;"></span><?php if ($waba_rev_pct >= $app_rev_pct && $total_rev > 0) { ?><em style="left: <?= max(10, min(90, $waba_rev_pct)) ?>%;"><?= $waba_rev_pct ?>%</em><?php } ?></div>
                    </li>
                    <li class="<?= $app_rev_pct > $waba_rev_pct ? 'lead' : '' ?>">
                        <div class="mj-progress-top"><span>App revenue</span><b class="num"><?= number_format($mtddata['app_revenue'], 0) ?></b></div>
                        <div class="mj-bar"><span style="width: <?= $app_rev_pct ?>%;"></span><?php if ($app_rev_pct > $waba_rev_pct) { ?><em style="left: <?= max(10, min(90, $app_rev_pct)) ?>%;"><?= $app_rev_pct ?>%</em><?php } ?></div>
                    </li>
                    <li>
                        <div class="mj-progress-top"><span>WABA refills</span><b class="num"><?= number_format($mtddata['waba_refills'], 0) ?></b></div>
                        <div class="mj-bar"><span style="width: <?= $waba_ref_pct ?>%;"></span></div>
                    </li>
                    <li>
                        <div class="mj-progress-top"><span>App refills</span><b class="num"><?= number_format($mtddata['app_refills'], 0) ?></b></div>
                        <div class="mj-bar"><span style="width: <?= $app_ref_pct ?>%;"></span></div>
                    </li>
                </ul>
                <?php endforeach; ?>
                <?php if (empty($monthly_data)) { ?><p class="mj-empty">No data available</p><?php } ?>
            </div>
        </div>

        <!-- Customer Base -->
        <div class="mj-card">
            <div class="mj-card-head">
                <div class="mj-card-title">
                    <span class="mj-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></span>
                    Customer Base
                </div>
            </div>
            <p class="mj-small">Total Majikans</p>
            <p class="mj-amount num" style="margin: 4px 0 14px;"><?= number_format($majik_cust->majik_customer, 0) ?></p>
            <ul class="mj-stat-rows">
                <li>
                    <span class="mj-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></span>
                    <div><p class="ttl">New today</p><p class="sub"><?= date('d M Y') ?></p></div>
                    <span class="val num">+<?= number_format($majik_cust_today->majik_cust, 0) ?></span>
                </li>
                <li>
                    <span class="mj-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="3" y1="10" x2="21" y2="10"/></svg></span>
                    <div><p class="ttl">New this month</p><p class="sub"><?= date('F Y') ?></p></div>
                    <span class="val num">+<?= number_format($majik_cust_mtd->majik_cust, 0) ?></span>
                </li>
                <li>
                    <span class="mj-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg></span>
                    <div><p class="ttl">New this year</p><p class="sub">Year <?= date('Y') ?></p></div>
                    <span class="val num">+<?= number_format($majik_cust_ytd->majik_cust, 0) ?></span>
                </li>
            </ul>
        </div>

    </div>

    <!-- =============================== ROW 4 : LEADERBOARDS =============================== -->
    <div class="mj-grid mj-grid-3">

        <!-- Drivers -->
        <div class="mj-card mj-tabset">
            <div class="mj-card-head">
                <div class="mj-card-title">
                    <span class="mj-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg></span>
                    Drivers
                </div>
                <span class="mj-active">Active <b class="num"><?= number_format($majik_active_drivers->majik_drivers, 0) ?></b></span>
            </div>
            <div class="mj-seg sm" style="margin-bottom: 16px; align-self: flex-start;">
                <button type="button" class="mj-tab is-active" data-target="driversDay">Today</button>
                <button type="button" class="mj-tab" data-target="driversMonth">This month</button>
            </div>

            <div class="mj-pane is-active" id="driversDay">
                <div class="mj-list">
                    <?php $rank = 0; foreach ($trip_day as $vl) { $rank++; ?>
                    <div class="mj-item">
                        <span class="mj-avatar"><?= htmlspecialchars(substr($vl->md_first, 0, 1)) ?></span>
                        <div class="mj-item-main"><p class="mj-item-name"><?= htmlspecialchars($vl->md_first) ?></p><p class="mj-item-sub"><?= $rank == 1 ? 'Top driver today' : 'Rank #' . $rank ?></p></div>
                        <span class="mj-item-val"><?= number_format($vl->trips, 0) ?><small>trips</small></span>
                    </div>
                    <?php } ?>
                    <?php if (empty($trip_day)) { ?><p class="mj-empty">No trips recorded yet</p><?php } ?>
                </div>
            </div>
            <div class="mj-pane" id="driversMonth">
                <div class="mj-list">
                    <?php $rank = 0; foreach ($trip_mnt as $ref) { $rank++; ?>
                    <div class="mj-item">
                        <span class="mj-avatar"><?= htmlspecialchars(substr($ref->md_first, 0, 1)) ?></span>
                        <div class="mj-item-main"><p class="mj-item-name"><?= htmlspecialchars($ref->md_first) ?></p><p class="mj-item-sub"><?= $rank == 1 ? 'Top driver this month' : 'Rank #' . $rank ?></p></div>
                        <span class="mj-item-val"><?= number_format($ref->trips, 0) ?><small>trips</small></span>
                    </div>
                    <?php } ?>
                    <?php if (empty($trip_mnt)) { ?><p class="mj-empty">No trips recorded yet</p><?php } ?>
                </div>
            </div>
        </div>

        <!-- Customers -->
        <div class="mj-card mj-tabset">
            <div class="mj-card-head">
                <div class="mj-card-title">
                    <span class="mj-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></span>
                    Customers
                </div>
                <span class="mj-active">Active <b class="num"><?= number_format($majik_active_customers->Total, 0) ?></b></span>
            </div>
            <div class="mj-seg sm" style="margin-bottom: 16px; align-self: flex-start;">
                <button type="button" class="mj-tab is-active" data-target="custRevenue">Revenue</button>
                <button type="button" class="mj-tab" data-target="custVolume">Volume</button>
                <button type="button" class="mj-tab" data-target="custRefills">Refills</button>
            </div>

            <div class="mj-pane is-active" id="custRevenue">
                <div class="mj-list">
                    <?php $rank = 0; foreach ($majik_customer_revenue as $vl) { $rank++; ?>
                    <div class="mj-item">
                        <span class="mj-avatar"><?= htmlspecialchars(substr($vl->sub_name, 0, 1)) ?></span>
                        <div class="mj-item-main"><p class="mj-item-name"><?= htmlspecialchars($vl->sub_name) ?></p><p class="mj-item-sub"><?= $rank == 1 ? 'Top customer' : 'Rank #' . $rank ?></p></div>
                        <span class="mj-item-val"><?= number_format($vl->total_revenue, 0) ?></span>
                    </div>
                    <?php } ?>
                    <?php if (empty($majik_customer_revenue)) { ?><p class="mj-empty">No data available</p><?php } ?>
                </div>
            </div>
            <div class="mj-pane" id="custVolume">
                <div class="mj-list">
                    <?php $rank = 0; foreach ($majik_customer_volume as $msv) { $rank++; ?>
                    <div class="mj-item">
                        <span class="mj-avatar"><?= htmlspecialchars(substr($msv->sub_name, 0, 1)) ?></span>
                        <div class="mj-item-main"><p class="mj-item-name"><?= htmlspecialchars($msv->sub_name) ?></p><p class="mj-item-sub"><?= $rank == 1 ? 'Top customer' : 'Rank #' . $rank ?></p></div>
                        <span class="mj-item-val"><?= number_format($msv->total_volume, 0) ?><small>L</small></span>
                    </div>
                    <?php } ?>
                    <?php if (empty($majik_customer_volume)) { ?><p class="mj-empty">No data available</p><?php } ?>
                </div>
            </div>
            <div class="mj-pane" id="custRefills">
                <div class="mj-list">
                    <?php $rank = 0; foreach ($majik_customer_refills as $msre) { $rank++; ?>
                    <div class="mj-item">
                        <span class="mj-avatar"><?= htmlspecialchars(substr($msre->sub_name, 0, 1)) ?></span>
                        <div class="mj-item-main"><p class="mj-item-name"><?= htmlspecialchars($msre->sub_name) ?></p><p class="mj-item-sub"><?= $rank == 1 ? 'Top customer' : 'Rank #' . $rank ?></p></div>
                        <span class="mj-item-val"><?= number_format($msre->order_count, 0) ?><small>refills</small></span>
                    </div>
                    <?php } ?>
                    <?php if (empty($majik_customer_refills)) { ?><p class="mj-empty">No data available</p><?php } ?>
                </div>
            </div>
        </div>

        <!-- Stores -->
        <div class="mj-card mj-tabset">
            <div class="mj-card-head">
                <div class="mj-card-title">
                    <span class="mj-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg></span>
                    Stores
                </div>
                <span class="mj-active">Active <b class="num"><?= number_format($majik_store->majik_store, 0) ?></b></span>
            </div>
            <div class="mj-seg sm" style="margin-bottom: 16px; align-self: flex-start;">
                <button type="button" class="mj-tab is-active" data-target="storeRevenue">Revenue</button>
                <button type="button" class="mj-tab" data-target="storeVolume">Volume</button>
                <button type="button" class="mj-tab" data-target="storeRefills">Refills</button>
            </div>

            <div class="mj-pane is-active" id="storeRevenue">
                <div class="mj-list">
                    <?php $rank = 0; foreach ($majik_store_revenue as $msr) { $rank++; ?>
                    <div class="mj-item">
                        <span class="mj-avatar"><?= htmlspecialchars(substr($msr->store_name, 0, 1)) ?></span>
                        <div class="mj-item-main"><p class="mj-item-name"><?= htmlspecialchars($msr->store_name) ?></p><p class="mj-item-sub"><?= $rank == 1 ? 'Top store' : 'Rank #' . $rank ?></p></div>
                        <span class="mj-item-val"><?= number_format($msr->total_revenue, 0) ?></span>
                    </div>
                    <?php } ?>
                    <?php if (empty($majik_store_revenue)) { ?><p class="mj-empty">No data available</p><?php } ?>
                </div>
            </div>
            <div class="mj-pane" id="storeVolume">
                <div class="mj-list">
                    <?php $rank = 0; foreach ($majik_store_volume as $msv) { $rank++; ?>
                    <div class="mj-item">
                        <span class="mj-avatar"><?= htmlspecialchars(substr($msv->store_name, 0, 1)) ?></span>
                        <div class="mj-item-main"><p class="mj-item-name"><?= htmlspecialchars($msv->store_name) ?></p><p class="mj-item-sub"><?= $rank == 1 ? 'Top store' : 'Rank #' . $rank ?></p></div>
                        <span class="mj-item-val"><?= number_format($msv->total_volume, 0) ?><small>L</small></span>
                    </div>
                    <?php } ?>
                    <?php if (empty($majik_store_volume)) { ?><p class="mj-empty">No data available</p><?php } ?>
                </div>
            </div>
            <div class="mj-pane" id="storeRefills">
                <div class="mj-list">
                    <?php $rank = 0; foreach ($majik_store_refills as $msre) { $rank++; ?>
                    <div class="mj-item">
                        <span class="mj-avatar"><?= htmlspecialchars(substr($msre->point_name, 0, 1)) ?></span>
                        <div class="mj-item-main"><p class="mj-item-name"><?= htmlspecialchars($msre->point_name) ?></p><p class="mj-item-sub"><?= $rank == 1 ? 'Top store' : 'Rank #' . $rank ?></p></div>
                        <span class="mj-item-val"><?= number_format($msre->sub_count, 0) ?><small>refills</small></span>
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
    var target = tab.getAttribute('data-target');
    document.getElementById(target).classList.add('is-active');

    // The refills chart is drawn the first time its tab is opened (hidden charts render at 0 width).
    if (target === 'chartRefills' && typeof ApexCharts !== 'undefined') initRefillGraph();
});

/* ---------- Charts ---------- */
document.addEventListener('DOMContentLoaded', function () {
    if (typeof ApexCharts !== 'undefined') {
        initRevenueGraph();
        initMajikansDonut();
    }
});

var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
var chartFont = "Outfit, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Arial, sans-serif";
var axisLabel = { colors: '#868a9b', fontSize: '11px' };

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
        chart: { height: 260, type: 'area', toolbar: { show: false }, zoom: { enabled: false }, fontFamily: chartFont },
        colors: ['#0779BC'],
        series: [{ name: 'Revenue', data: monthData }],
        stroke: { curve: 'smooth', width: 2.5 },
        fill: { type: 'gradient', gradient: { opacityFrom: 0.28, opacityTo: 0.02, stops: [0, 100] } },
        markers: { size: 0, strokeColors: '#ffffff', strokeWidth: 3, hover: { size: 6 } },
        dataLabels: { enabled: false },
        grid: { borderColor: '#eceef2', strokeDashArray: 4, padding: { left: 6, right: 22 } },
        xaxis: { categories: months, axisBorder: { show: false }, axisTicks: { show: false }, labels: { style: axisLabel } },
        yaxis: { min: 0, forceNiceScale: true, labels: { style: axisLabel, formatter: shortNumber } },
        tooltip: { y: { formatter: function (val) { return Number(val).toLocaleString(); } } }
    }).render();
}

var refillDrawn = false;
function initRefillGraph() {
    var el = document.querySelector('#refillgraph');
    if (!el || refillDrawn) return;
    refillDrawn = true;

    var refillData = [<?= implode(',', array_map(function($r) { return (float) $r->sub_count; }, $refill)) ?>];
    while (refillData.length < months.length) refillData.push(0);

    new ApexCharts(el, {
        chart: { height: 260, type: 'bar', toolbar: { show: false }, fontFamily: chartFont },
        colors: ['#a6a9b7'],
        series: [{ name: 'Refills', data: refillData }],
        plotOptions: { bar: { columnWidth: '38%', borderRadius: 8, borderRadiusApplication: 'end' } },
        dataLabels: { enabled: false },
        states: { hover: { filter: { type: 'darken', value: 0.75 } } },
        grid: { borderColor: '#eceef2', strokeDashArray: 4, padding: { left: 6, right: 22 } },
        xaxis: { categories: months, axisBorder: { show: false }, axisTicks: { show: false }, labels: { style: axisLabel } },
        yaxis: { min: 0, forceNiceScale: true, labels: { style: axisLabel, formatter: shortNumber } },
        tooltip: { y: { formatter: function (val) { return Number(val).toLocaleString(); } } }
    }).render();
}

function initMajikansDonut() {
    var el = document.querySelector('#majikansdonut');
    if (!el) return;

    var labels = [], values = [], colors = [];
    <?php foreach ($counts as $p) { ?>
    <?php if ($p->sub_stat_dormancy == 'E') { ?>labels.push('Excellent'); values.push(<?= (float) $p->count ?>); colors.push('#055d91');<?php } ?>
    <?php if ($p->sub_stat_dormancy == 'G') { ?>labels.push('Good'); values.push(<?= (float) $p->count ?>); colors.push('#0779BC');<?php } ?>
    <?php if ($p->sub_stat_dormancy == 'N') { ?>labels.push('Normal'); values.push(<?= (float) $p->count ?>); colors.push('#a6a9b7');<?php } ?>
    <?php if ($p->sub_stat_dormancy == 'D') { ?>labels.push('Dormant'); values.push(<?= (float) $p->count ?>); colors.push('#dfe1e8');<?php } ?>
    <?php } ?>

    new ApexCharts(el, {
        chart: { height: 190, type: 'donut', fontFamily: chartFont },
        series: values,
        labels: labels,
        colors: colors,
        stroke: { width: 6, colors: ['#fff'] },
        legend: { show: false },
        dataLabels: { enabled: false },
        plotOptions: { pie: { donut: { size: '84%' } } },
        tooltip: { y: { formatter: function (val) { return Number(val).toLocaleString(); } } }
    }).render();
}
</script>
