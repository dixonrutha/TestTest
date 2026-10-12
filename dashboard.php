<link rel="stylesheet" href="<?= base_url('assets/css/majik2.css') ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap">

<style>
/* =====================================================================
   MAJIK PREMIUM DASHBOARD — self-contained styles (prefix .mj-)
   ===================================================================== */
.mj-dash {
    --blue: #0779BC;
    --blue-2: #0a9ad6;
    --navy: #0b1d36;
    --green: #7DC243;
    --teal: #13b5a6;
    --amber: #f5a524;
    --red: #ef4462;
    --violet: #7c5cff;
    --ink: #0f1b2d;
    --ink-2: #44526a;
    --muted: #8a96aa;
    --line: #edf0f6;
    --soft: #f6f8fc;
    --card: #ffffff;
    --radius: 18px;
    --shadow: 0 1px 2px rgba(15, 27, 45, .04), 0 12px 32px -16px rgba(15, 27, 45, .18);
    font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    color: var(--ink);
    background: #f3f6fb;
    padding: 24px;
    border-radius: 24px;
    -webkit-font-smoothing: antialiased;
}
.mj-dash *, .mj-dash *::before, .mj-dash *::after { box-sizing: border-box; }
.mj-dash p, .mj-dash h1, .mj-dash h2, .mj-dash h3, .mj-dash h4, .mj-dash ul { margin: 0; padding: 0; }
.mj-dash ul { list-style: none; }

/* ---------- Layout grids ---------- */
.mj-grid { display: grid; gap: 24px; margin-bottom: 24px; }
.mj-grid-4 { grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 16px; }
.mj-grid-main { grid-template-columns: minmax(0, 1.55fr) minmax(0, 1fr); }
.mj-grid-3 { grid-template-columns: repeat(3, minmax(0, 1fr)); }
@media (max-width: 1199.98px) {
    .mj-grid-main { grid-template-columns: 1fr; }
    .mj-grid-3 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    .mj-grid-4 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
}
@media (max-width: 767.98px) {
    .mj-dash { padding: 16px; border-radius: 0; }
    .mj-grid { gap: 16px; margin-bottom: 16px; }
    .mj-grid-3, .mj-grid-4 { grid-template-columns: 1fr; }
}

/* ---------- Hero banner ---------- */
.mj-hero {
    position: relative;
    overflow: hidden;
    border-radius: 24px;
    padding: 28px;
    margin-bottom: 24px;
    color: #fff;
    background:
        radial-gradient(600px 300px at 100% 0%, rgba(125, 194, 67, .35), transparent 60%),
        radial-gradient(500px 280px at 0% 100%, rgba(10, 154, 214, .45), transparent 60%),
        linear-gradient(135deg, #0b1d36 0%, #0b3a66 55%, #0779BC 100%);
    box-shadow: 0 24px 48px -24px rgba(7, 121, 188, .55);
}
.mj-hero::after {
    content: "";
    position: absolute;
    right: -80px;
    top: -80px;
    width: 280px;
    height: 280px;
    border-radius: 50%;
    border: 40px solid rgba(255, 255, 255, .05);
    pointer-events: none;
}
.mj-hero-top { position: relative; z-index: 1; display: flex; flex-wrap: wrap; align-items: flex-start; justify-content: space-between; gap: 16px; margin-bottom: 24px; }
.mj-hero-eyebrow { font-size: 12px; font-weight: 600; letter-spacing: .14em; text-transform: uppercase; color: rgba(255, 255, 255, .65); margin-bottom: 6px; }
.mj-hero-title { font-size: 28px; font-weight: 800; letter-spacing: -.02em; color: #fff; line-height: 1.15; }
.mj-hero-sub { font-size: 14px; color: rgba(255, 255, 255, .72); margin-top: 6px; }
.mj-hero-date { display: inline-flex; align-items: center; gap: 8px; font-size: 13px; font-weight: 600; padding: 10px 16px; border-radius: 999px; background: rgba(255, 255, 255, .12); border: 1px solid rgba(255, 255, 255, .18); color: #fff; backdrop-filter: blur(8px); }
.mj-hero-date .mj-live { width: 8px; height: 8px; border-radius: 50%; background: var(--green); box-shadow: 0 0 0 4px rgba(125, 194, 67, .25); }

.mj-hero .mj-grid-4 { position: relative; z-index: 1; margin-bottom: 0; }
.mj-glass {
    padding: 18px;
    border-radius: 16px;
    background: rgba(255, 255, 255, .08);
    border: 1px solid rgba(255, 255, 255, .14);
    backdrop-filter: blur(10px);
    min-width: 0;
}
.mj-glass-head { display: flex; align-items: center; gap: 10px; margin-bottom: 14px; }
.mj-glass-icon { width: 34px; height: 34px; border-radius: 10px; display: flex; align-items: center; justify-content: center; background: rgba(255, 255, 255, .14); color: #fff; flex-shrink: 0; }
.mj-glass-icon svg { width: 18px; height: 18px; }
.mj-glass-label { font-size: 12px; font-weight: 600; letter-spacing: .06em; text-transform: uppercase; color: rgba(255, 255, 255, .72); }
.mj-glass-value { font-size: 26px; font-weight: 800; letter-spacing: -.02em; color: #fff; line-height: 1.1; font-variant-numeric: tabular-nums; overflow-wrap: anywhere; }
.mj-glass-foot { display: flex; flex-wrap: wrap; align-items: center; gap: 6px 8px; margin-top: 10px; font-size: 12px; color: rgba(255, 255, 255, .7); }
.mj-glass-foot strong { color: #fff; font-weight: 600; }

/* ---------- Trend pills ---------- */
.mj-pill { display: inline-flex; align-items: center; gap: 4px; padding: 3px 9px; border-radius: 999px; font-size: 11.5px; font-weight: 700; white-space: nowrap; font-variant-numeric: tabular-nums; }
.mj-pill.up { color: #2f7a12; background: #eaf7df; }
.mj-pill.down { color: #c4183c; background: #fde8ec; }
.mj-pill.flat { color: var(--muted); background: var(--soft); }
.mj-hero .mj-pill.up { color: #c9f59f; background: rgba(125, 194, 67, .22); }
.mj-hero .mj-pill.down { color: #ffc1cc; background: rgba(239, 68, 98, .25); }
.mj-hero .mj-pill.flat { color: rgba(255, 255, 255, .8); background: rgba(255, 255, 255, .12); }

/* ---------- Cards ---------- */
.mj-card { background: var(--card); border: 1px solid var(--line); border-radius: var(--radius); box-shadow: var(--shadow); display: flex; flex-direction: column; min-width: 0; overflow: hidden; }
.mj-card-head { display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 12px; padding: 20px 22px 0; }
.mj-card-title-wrap { display: flex; align-items: center; gap: 12px; min-width: 0; }
.mj-icon { width: 42px; height: 42px; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.mj-icon svg { width: 20px; height: 20px; }
.mj-icon.blue { background: #e6f2fa; color: var(--blue); }
.mj-icon.green { background: #eef8e6; color: #5a9e22; }
.mj-icon.teal { background: #e3f7f5; color: var(--teal); }
.mj-icon.amber { background: #fff4e0; color: #d48806; }
.mj-icon.violet { background: #efebff; color: var(--violet); }
.mj-icon.red { background: #fde8ec; color: var(--red); }
.mj-card-title { font-size: 16px; font-weight: 700; color: var(--ink); letter-spacing: -.01em; line-height: 1.25; }
.mj-card-sub { font-size: 12.5px; color: var(--muted); margin-top: 2px; }
.mj-card-body { padding: 18px 22px 22px; flex: 1; min-width: 0; }

.mj-chip { display: inline-flex; align-items: center; gap: 6px; padding: 7px 12px; border-radius: 999px; background: var(--soft); font-size: 12px; font-weight: 600; color: var(--ink-2); white-space: nowrap; }
.mj-chip b { color: var(--ink); font-weight: 700; }

/* ---------- Charts ---------- */
.mj-chart { min-height: 300px; margin: 0 -10px; }

/* Mini stat row under chart */
.mj-stats { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 12px; margin-top: 8px; }
.mj-stat { padding: 14px; border-radius: 14px; background: var(--soft); min-width: 0; }
.mj-stat-label { font-size: 11px; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; color: var(--muted); }
.mj-stat-value { font-size: 20px; font-weight: 800; letter-spacing: -.01em; margin: 6px 0 8px; font-variant-numeric: tabular-nums; overflow-wrap: anywhere; }
@media (max-width: 575.98px) { .mj-stats { grid-template-columns: 1fr; } }

/* ---------- Majikans donut + legend ---------- */
.mj-donut-wrap { position: relative; }
.mj-donut-center { position: absolute; inset: 0; display: flex; flex-direction: column; align-items: center; justify-content: center; pointer-events: none; }
.mj-donut-center b { font-size: 26px; font-weight: 800; letter-spacing: -.02em; }
.mj-donut-center span { font-size: 11px; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; color: var(--muted); }
.mj-status li { display: flex; align-items: center; gap: 10px; padding: 10px 0; border-top: 1px dashed var(--line); font-size: 13.5px; }
.mj-status li:first-child { border-top: 0; }
.mj-status .name { font-weight: 600; }
.mj-status .count { margin-left: auto; font-weight: 700; font-variant-numeric: tabular-nums; }
.mj-status .pct { min-width: 58px; text-align: right; font-size: 12px; font-weight: 700; padding: 3px 8px; border-radius: 8px; background: var(--soft); color: var(--ink-2); font-variant-numeric: tabular-nums; }
.mj-dot { width: 10px; height: 10px; border-radius: 50%; display: inline-block; flex-shrink: 0; }
.mj-dot.excellent { background: var(--blue); }
.mj-dot.good { background: var(--green); }
.mj-dot.normal { background: var(--amber); }
.mj-dot.dormant { background: var(--red); }

/* ---------- Customer base ---------- */
.mj-base-hero { position: relative; overflow: hidden; border-radius: 16px; padding: 22px; color: #fff; background: linear-gradient(135deg, #5a9e22 0%, #7DC243 55%, #13b5a6 100%); margin-bottom: 16px; }
.mj-base-hero::after { content: ""; position: absolute; right: -40px; bottom: -60px; width: 180px; height: 180px; border-radius: 50%; background: rgba(255, 255, 255, .12); }
.mj-base-hero span { position: relative; z-index: 1; font-size: 12px; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; color: rgba(255, 255, 255, .85); }
.mj-base-hero b { position: relative; z-index: 1; display: block; font-size: 38px; font-weight: 800; letter-spacing: -.03em; line-height: 1.1; margin-top: 6px; font-variant-numeric: tabular-nums; }
.mj-base-list li { display: flex; align-items: center; gap: 12px; padding: 12px 0; border-top: 1px dashed var(--line); }
.mj-base-list li:first-child { border-top: 0; }
.mj-base-list .mj-icon { width: 36px; height: 36px; border-radius: 10px; }
.mj-base-list .mj-icon svg { width: 17px; height: 17px; }
.mj-base-list .label { font-size: 13.5px; font-weight: 600; }
.mj-base-list .hint { font-size: 12px; color: var(--muted); }
.mj-base-list .value { margin-left: auto; font-size: 18px; font-weight: 800; font-variant-numeric: tabular-nums; }

/* ---------- Tabs (self-contained, no Bootstrap JS needed) ---------- */
.mj-tabs { display: inline-flex; flex-wrap: wrap; gap: 2px; padding: 4px; border-radius: 12px; background: var(--soft); margin-bottom: 16px; }
.mj-tab { appearance: none; border: 0; background: transparent; cursor: pointer; padding: 7px 14px; border-radius: 9px; font: inherit; font-size: 12.5px; font-weight: 700; color: var(--muted); white-space: nowrap; transition: background .15s, color .15s; }
.mj-tab:hover { color: var(--ink); }
.mj-tab:focus { outline: none; }
.mj-tab:focus-visible { outline: 2px solid var(--blue); outline-offset: 1px; }
.mj-tab.is-active { background: #fff; color: var(--ink); box-shadow: 0 1px 2px rgba(15, 27, 45, .08), 0 2px 8px -2px rgba(15, 27, 45, .12); }
.mj-pane { display: none; }
.mj-pane.is-active { display: block; animation: mjFade .2s ease; }
@keyframes mjFade { from { opacity: 0; transform: translateY(4px); } to { opacity: 1; transform: none; } }

/* ---------- Apps performance ---------- */
.mj-channels { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
.mj-channel { border-radius: 14px; padding: 16px; border: 1px solid var(--line); min-width: 0; }
.mj-channel.waba { background: linear-gradient(180deg, #f1fbf4 0%, #fff 100%); }
.mj-channel.app { background: linear-gradient(180deg, #eef6fd 0%, #fff 100%); }
.mj-channel-head { display: flex; align-items: center; gap: 8px; font-size: 13px; font-weight: 700; margin-bottom: 14px; }
.mj-channel-head .mj-icon { width: 30px; height: 30px; border-radius: 9px; }
.mj-channel-head .mj-icon svg { width: 15px; height: 15px; }
.mj-channel-row + .mj-channel-row { margin-top: 12px; }
.mj-channel-row span { display: block; font-size: 11px; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; color: var(--muted); }
.mj-channel-row b { display: block; font-size: 20px; font-weight: 800; letter-spacing: -.01em; margin-top: 2px; font-variant-numeric: tabular-nums; overflow-wrap: anywhere; }
.mj-share { margin-top: 16px; }
.mj-share-bar { display: flex; height: 10px; border-radius: 999px; overflow: hidden; background: var(--soft); }
.mj-share-bar .waba { background: #25d366; }
.mj-share-bar .app { background: var(--blue); }
.mj-share-legend { display: flex; justify-content: space-between; margin-top: 8px; font-size: 12px; color: var(--muted); }
.mj-share-legend b { color: var(--ink); }

/* ---------- Leaderboards ---------- */
.mj-active { display: flex; align-items: center; gap: 10px; padding: 8px 14px 8px 8px; border-radius: 14px; background: var(--soft); flex-shrink: 0; }
.mj-active .mj-icon { width: 34px; height: 34px; border-radius: 10px; }
.mj-active .mj-icon svg { width: 16px; height: 16px; }
.mj-active span { display: block; font-size: 10.5px; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; color: var(--muted); line-height: 1.2; }
.mj-active b { display: block; font-size: 18px; font-weight: 800; line-height: 1.2; font-variant-numeric: tabular-nums; }

.mj-board { max-height: 380px; overflow-y: auto; margin: 0 -8px; padding: 0 8px; }
.mj-board::-webkit-scrollbar { width: 6px; }
.mj-board::-webkit-scrollbar-thumb { background: #dfe4ee; border-radius: 3px; }
.mj-row { display: flex; align-items: center; gap: 12px; padding: 10px 8px; border-radius: 12px; transition: background .15s; }
.mj-row:hover { background: var(--soft); }
.mj-row + .mj-row { margin-top: 2px; }
.mj-rank { width: 24px; text-align: center; font-size: 12px; font-weight: 800; color: var(--muted); flex-shrink: 0; }
.mj-medal { width: 24px; height: 24px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; font-size: 11px; font-weight: 800; color: #fff; }
.mj-medal.gold { background: linear-gradient(135deg, #ffd56b, #f0a500); box-shadow: 0 4px 10px -4px rgba(240, 165, 0, .8); }
.mj-medal.silver { background: linear-gradient(135deg, #dfe6ef, #9aa8bb); box-shadow: 0 4px 10px -4px rgba(154, 168, 187, .8); }
.mj-medal.bronze { background: linear-gradient(135deg, #f2b98a, #c8783c); box-shadow: 0 4px 10px -4px rgba(200, 120, 60, .8); }
.mj-avatar { width: 36px; height: 36px; border-radius: 11px; display: flex; align-items: center; justify-content: center; font-size: 14px; font-weight: 800; flex-shrink: 0; text-transform: uppercase; }
.mj-row:nth-child(5n+1) .mj-avatar { background: #e6f2fa; color: var(--blue); }
.mj-row:nth-child(5n+2) .mj-avatar { background: #eef8e6; color: #5a9e22; }
.mj-row:nth-child(5n+3) .mj-avatar { background: #efebff; color: var(--violet); }
.mj-row:nth-child(5n+4) .mj-avatar { background: #fff4e0; color: #d48806; }
.mj-row:nth-child(5n+5) .mj-avatar { background: #e3f7f5; color: var(--teal); }
.mj-row-main { flex: 1; min-width: 0; }
.mj-row-top { display: flex; align-items: baseline; gap: 10px; }
.mj-row-name { font-size: 13.5px; font-weight: 600; color: var(--ink); overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
.mj-row-value { margin-left: auto; font-size: 13.5px; font-weight: 800; color: var(--ink); white-space: nowrap; font-variant-numeric: tabular-nums; }
.mj-row-value small { font-size: 11px; font-weight: 600; color: var(--muted); margin-left: 3px; }
.mj-row-bar { height: 5px; border-radius: 999px; background: var(--soft); margin-top: 7px; overflow: hidden; }
.mj-row-bar span { display: block; height: 100%; border-radius: 999px; background: linear-gradient(90deg, var(--blue), var(--blue-2)); }
.mj-row:hover .mj-row-bar { background: #e9edf5; }
.mj-board.green .mj-row-bar span { background: linear-gradient(90deg, #5a9e22, var(--green)); }
.mj-board.violet .mj-row-bar span { background: linear-gradient(90deg, #6a46ff, #9d86ff); }
.mj-empty { text-align: center; padding: 36px 12px; color: var(--muted); font-size: 13px; }
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

    <!-- =============================== HERO =============================== -->
    <section class="mj-hero">
        <div class="mj-hero-top">
            <div>
                <p class="mj-hero-eyebrow">Business Overview</p>
                <h1 class="mj-hero-title">Performance Dashboard</h1>
                <p class="mj-hero-sub">Revenue, refills, customers and channels at a glance.</p>
            </div>
            <span class="mj-hero-date"><span class="mj-live"></span><?= date('l, d M Y') ?></span>
        </div>

        <div class="mj-grid mj-grid-4">
            <div class="mj-glass">
                <div class="mj-glass-head">
                    <span class="mj-glass-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></span>
                    <span class="mj-glass-label">Revenue Today</span>
                </div>
                <p class="mj-glass-value"><?= number_format($majik_revenue_today->revenue, 0) ?></p>
                <div class="mj-glass-foot">
                    <span class="mj-pill <?= $rev_day_class ?>"><?= $rev_day_text ?></span>
                    <span>vs yesterday</span>
                </div>
                <div class="mj-glass-foot">Yesterday payments <strong><?= number_format($yesterday_revenue, 2) ?></strong></div>
                <div class="mj-glass-foot">Delivery fee <strong><?= number_format($majik_delivery_today->delivery, 0) ?></strong></div>
            </div>

            <div class="mj-glass">
                <div class="mj-glass-head">
                    <span class="mj-glass-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg></span>
                    <span class="mj-glass-label">Revenue This Month</span>
                </div>
                <p class="mj-glass-value"><?= number_format($majik_revenue_mtd->revenue, 0) ?></p>
                <div class="mj-glass-foot">
                    <span class="mj-pill <?= $rev_month_class ?>"><?= $rev_month_text ?></span>
                    <span>vs last month</span>
                </div>
                <div class="mj-glass-foot">Delivery fee <strong><?= number_format($majik_delivery_mnth->delivery, 0) ?></strong></div>
            </div>

            <div class="mj-glass">
                <div class="mj-glass-head">
                    <span class="mj-glass-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg></span>
                    <span class="mj-glass-label">Revenue This Year</span>
                </div>
                <p class="mj-glass-value"><?= number_format($majik_revenue_ytd->revenue, 0) ?></p>
                <div class="mj-glass-foot">
                    <span class="mj-pill <?= $rev_year_class ?>"><?= $rev_year_text ?></span>
                    <span>vs last year</span>
                </div>
                <div class="mj-glass-foot">Delivery fee <strong><?= number_format($majik_delivery_yr->delivery, 0) ?></strong></div>
            </div>

            <div class="mj-glass">
                <div class="mj-glass-head">
                    <span class="mj-glass-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"/></svg></span>
                    <span class="mj-glass-label">Refills Today</span>
                </div>
                <p class="mj-glass-value"><?= number_format($majik_order_today->majik_order, 0) ?></p>
                <div class="mj-glass-foot">
                    <span class="mj-pill <?= $ord_day_class ?>"><?= $ord_day_text ?></span>
                    <span>vs yesterday</span>
                </div>
                <div class="mj-glass-foot">Yesterday refills <strong><?= number_format($yesterday_order, 0) ?></strong></div>
            </div>
        </div>
    </section>

    <!-- =============================== CHARTS =============================== -->
    <div class="mj-grid mj-grid-main">

        <!-- Revenue Analysis -->
        <div class="mj-card">
            <div class="mj-card-head">
                <div class="mj-card-title-wrap">
                    <span class="mj-icon blue"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></span>
                    <div>
                        <h3 class="mj-card-title">Revenue Analysis</h3>
                        <p class="mj-card-sub">Monthly revenue &middot; Year <?= date('Y') ?></p>
                    </div>
                </div>
                <span class="mj-chip">YTD <b><?= number_format($majik_revenue_ytd->revenue, 0) ?></b></span>
            </div>
            <div class="mj-card-body">
                <div id="revenuegraph" class="mj-chart"></div>
            </div>
        </div>

        <!-- Refills Analysis -->
        <div class="mj-card">
            <div class="mj-card-head">
                <div class="mj-card-title-wrap">
                    <span class="mj-icon green"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"/></svg></span>
                    <div>
                        <h3 class="mj-card-title">Refills Analysis</h3>
                        <p class="mj-card-sub">Monthly refills &middot; Year <?= date('Y') ?></p>
                    </div>
                </div>
            </div>
            <div class="mj-card-body">
                <div id="refillgraph" class="mj-chart" style="min-height: 220px;"></div>
                <div class="mj-stats">
                    <div class="mj-stat">
                        <p class="mj-stat-label">Today</p>
                        <p class="mj-stat-value"><?= number_format($majik_order_today->majik_order, 0) ?></p>
                        <span class="mj-pill <?= $ord_day_class ?>"><?= $ord_day_text ?></span>
                    </div>
                    <div class="mj-stat">
                        <p class="mj-stat-label">Month</p>
                        <p class="mj-stat-value"><?= number_format($majik_order_mtd->majik_order, 0) ?></p>
                        <span class="mj-pill <?= $ord_month_class ?>"><?= $ord_month_text ?></span>
                    </div>
                    <div class="mj-stat">
                        <p class="mj-stat-label">Year</p>
                        <p class="mj-stat-value"><?= number_format($majik_order_ytd->majik_order, 0) ?></p>
                        <span class="mj-pill <?= $ord_year_class ?>"><?= $ord_year_text ?></span>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- =============================== MAJIKANS / CUSTOMERS / APPS =============================== -->
    <div class="mj-grid mj-grid-3">

        <!-- Majikans Performance -->
        <div class="mj-card">
            <div class="mj-card-head">
                <div class="mj-card-title-wrap">
                    <span class="mj-icon violet"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"/><path d="M22 12A10 10 0 0 0 12 2v10z"/></svg></span>
                    <div>
                        <h3 class="mj-card-title">Majikans Performance</h3>
                        <p class="mj-card-sub">Activity status breakdown</p>
                    </div>
                </div>
            </div>
            <div class="mj-card-body">
                <div class="mj-donut-wrap">
                    <div id="majikansdonut" style="min-height: 210px;"></div>
                    <div class="mj-donut-center"><b><?= number_format($sub_total, 0) ?></b><span>Majikans</span></div>
                </div>
                <ul class="mj-status">
                    <?php
                    foreach ($counts as $p) {
                        $pct = ($sub_total > 0) ? ($p->count / $sub_total * 100) : 0;
                        if ($p->sub_stat_dormancy == 'E') { $label = 'Excellent'; $dot = 'excellent'; }
                        elseif ($p->sub_stat_dormancy == 'G') { $label = 'Good'; $dot = 'good'; }
                        elseif ($p->sub_stat_dormancy == 'N') { $label = 'Normal'; $dot = 'normal'; }
                        elseif ($p->sub_stat_dormancy == 'D') { $label = 'Dormant'; $dot = 'dormant'; }
                        else { continue; }
                    ?>
                    <li>
                        <span class="mj-dot <?= $dot ?>"></span>
                        <span class="name"><?= $label ?></span>
                        <span class="count"><?= number_format($p->count, 0) ?></span>
                        <span class="pct"><?= number_format($pct, 1) ?>%</span>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>

        <!-- Customer Base -->
        <div class="mj-card">
            <div class="mj-card-head">
                <div class="mj-card-title-wrap">
                    <span class="mj-icon teal"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></span>
                    <div>
                        <h3 class="mj-card-title">Customer Base</h3>
                        <p class="mj-card-sub">Majikan sign-ups</p>
                    </div>
                </div>
            </div>
            <div class="mj-card-body">
                <div class="mj-base-hero">
                    <span>Total Majikans</span>
                    <b><?= number_format($majik_cust->majik_customer, 0) ?></b>
                </div>
                <ul class="mj-base-list">
                    <li>
                        <span class="mj-icon blue"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></span>
                        <div><p class="label">Today</p><p class="hint">New sign-ups</p></div>
                        <span class="value"><?= number_format($majik_cust_today->majik_cust, 0) ?></span>
                    </li>
                    <li>
                        <span class="mj-icon teal"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="3" y1="10" x2="21" y2="10"/></svg></span>
                        <div><p class="label">This month</p><p class="hint"><?= date('F Y') ?></p></div>
                        <span class="value"><?= number_format($majik_cust_mtd->majik_cust, 0) ?></span>
                    </li>
                    <li>
                        <span class="mj-icon amber"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg></span>
                        <div><p class="label">This year</p><p class="hint">Year <?= date('Y') ?></p></div>
                        <span class="value"><?= number_format($majik_cust_ytd->majik_cust, 0) ?></span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Apps Performance -->
        <div class="mj-card mj-tabset">
            <div class="mj-card-head">
                <div class="mj-card-title-wrap">
                    <span class="mj-icon blue"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg></span>
                    <div>
                        <h3 class="mj-card-title">Apps Performance</h3>
                        <p class="mj-card-sub">WABA vs App &middot; <?= date('M Y') ?></p>
                    </div>
                </div>
            </div>
            <div class="mj-card-body">
                <div class="mj-tabs">
                    <button type="button" class="mj-tab is-active" data-target="appsDay">Today</button>
                    <button type="button" class="mj-tab" data-target="appsMonth">This Month</button>
                </div>

                <!-- Day -->
                <div class="mj-pane is-active" id="appsDay">
                    <?php foreach ($daily_data as $data):
                        $total_rev = $data['waba_revenue'] + $data['app_revenue'];
                        $waba_share = ($total_rev > 0) ? round($data['waba_revenue'] / $total_rev * 100) : 50;
                    ?>
                    <div class="mj-channels">
                        <div class="mj-channel waba">
                            <div class="mj-channel-head"><span class="mj-icon green"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg></span>WABA</div>
                            <div class="mj-channel-row"><span>Revenue</span><b><?= number_format($data['waba_revenue'], 0) ?></b></div>
                            <div class="mj-channel-row"><span>Refills</span><b><?= number_format($data['waba_refills'], 0) ?></b></div>
                        </div>
                        <div class="mj-channel app">
                            <div class="mj-channel-head"><span class="mj-icon blue"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg></span>App</div>
                            <div class="mj-channel-row"><span>Revenue</span><b><?= number_format($data['app_revenue'], 0) ?></b></div>
                            <div class="mj-channel-row"><span>Refills</span><b><?= number_format($data['app_refills'], 0) ?></b></div>
                        </div>
                    </div>
                    <div class="mj-share">
                        <div class="mj-share-bar"><span class="waba" style="width: <?= $waba_share ?>%;"></span><span class="app" style="width: <?= 100 - $waba_share ?>%;"></span></div>
                        <div class="mj-share-legend"><span>WABA <b><?= $waba_share ?>%</b></span><span>Revenue share</span><span>App <b><?= 100 - $waba_share ?>%</b></span></div>
                    </div>
                    <?php endforeach; ?>
                    <?php if (empty($daily_data)) { ?><p class="mj-empty">No data available</p><?php } ?>
                </div>

                <!-- Month -->
                <div class="mj-pane" id="appsMonth">
                    <?php foreach ($monthly_data as $mtddata):
                        $total_rev = $mtddata['waba_revenue'] + $mtddata['app_revenue'];
                        $waba_share = ($total_rev > 0) ? round($mtddata['waba_revenue'] / $total_rev * 100) : 50;
                    ?>
                    <div class="mj-channels">
                        <div class="mj-channel waba">
                            <div class="mj-channel-head"><span class="mj-icon green"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg></span>WABA</div>
                            <div class="mj-channel-row"><span>Revenue</span><b><?= number_format($mtddata['waba_revenue'], 0) ?></b></div>
                            <div class="mj-channel-row"><span>Refills</span><b><?= number_format($mtddata['waba_refills'], 0) ?></b></div>
                        </div>
                        <div class="mj-channel app">
                            <div class="mj-channel-head"><span class="mj-icon blue"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg></span>App</div>
                            <div class="mj-channel-row"><span>Revenue</span><b><?= number_format($mtddata['app_revenue'], 0) ?></b></div>
                            <div class="mj-channel-row"><span>Refills</span><b><?= number_format($mtddata['app_refills'], 0) ?></b></div>
                        </div>
                    </div>
                    <div class="mj-share">
                        <div class="mj-share-bar"><span class="waba" style="width: <?= $waba_share ?>%;"></span><span class="app" style="width: <?= 100 - $waba_share ?>%;"></span></div>
                        <div class="mj-share-legend"><span>WABA <b><?= $waba_share ?>%</b></span><span>Revenue share</span><span>App <b><?= 100 - $waba_share ?>%</b></span></div>
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
                <div class="mj-card-title-wrap">
                    <span class="mj-icon amber"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg></span>
                    <div>
                        <h3 class="mj-card-title">Drivers Performance</h3>
                        <p class="mj-card-sub"><?= date('M Y') ?></p>
                    </div>
                </div>
                <div class="mj-active">
                    <span class="mj-icon amber"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg></span>
                    <div><span>Active</span><b><?= number_format($majik_active_drivers->majik_drivers, 0) ?></b></div>
                </div>
            </div>
            <div class="mj-card-body">
                <div class="mj-tabs">
                    <button type="button" class="mj-tab is-active" data-target="driversDay">Today</button>
                    <button type="button" class="mj-tab" data-target="driversMonth">This Month</button>
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
                            <span class="mj-rank"><?php if ($rank == 1) { ?><span class="mj-medal gold">1</span><?php } elseif ($rank == 2) { ?><span class="mj-medal silver">2</span><?php } elseif ($rank == 3) { ?><span class="mj-medal bronze">3</span><?php } else { echo $rank; } ?></span>
                            <span class="mj-avatar"><?= htmlspecialchars(substr($vl->md_first, 0, 1)) ?></span>
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
                            <span class="mj-rank"><?php if ($rank == 1) { ?><span class="mj-medal gold">1</span><?php } elseif ($rank == 2) { ?><span class="mj-medal silver">2</span><?php } elseif ($rank == 3) { ?><span class="mj-medal bronze">3</span><?php } else { echo $rank; } ?></span>
                            <span class="mj-avatar"><?= htmlspecialchars(substr($ref->md_first, 0, 1)) ?></span>
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
                <div class="mj-card-title-wrap">
                    <span class="mj-icon green"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></span>
                    <div>
                        <h3 class="mj-card-title">Customer Performance</h3>
                        <p class="mj-card-sub"><?= date('M Y') ?></p>
                    </div>
                </div>
                <div class="mj-active">
                    <span class="mj-icon green"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg></span>
                    <div><span>Active</span><b><?= number_format($majik_active_customers->Total, 0) ?></b></div>
                </div>
            </div>
            <div class="mj-card-body">
                <div class="mj-tabs">
                    <button type="button" class="mj-tab is-active" data-target="custRevenue">Revenue</button>
                    <button type="button" class="mj-tab" data-target="custVolume">Volume</button>
                    <button type="button" class="mj-tab" data-target="custRefills">Refills</button>
                </div>

                <div class="mj-pane is-active" id="custRevenue">
                    <div class="mj-board green">
                        <?php
                        $max = 0;
                        foreach ($majik_customer_revenue as $vl) { if ($vl->total_revenue > $max) $max = $vl->total_revenue; }
                        $rank = 0;
                        foreach ($majik_customer_revenue as $vl) { $rank++;
                        ?>
                        <div class="mj-row">
                            <span class="mj-rank"><?php if ($rank == 1) { ?><span class="mj-medal gold">1</span><?php } elseif ($rank == 2) { ?><span class="mj-medal silver">2</span><?php } elseif ($rank == 3) { ?><span class="mj-medal bronze">3</span><?php } else { echo $rank; } ?></span>
                            <span class="mj-avatar"><?= htmlspecialchars(substr($vl->sub_name, 0, 1)) ?></span>
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
                    <div class="mj-board green">
                        <?php
                        $max = 0;
                        foreach ($majik_customer_volume as $msv) { if ($msv->total_volume > $max) $max = $msv->total_volume; }
                        $rank = 0;
                        foreach ($majik_customer_volume as $msv) { $rank++;
                        ?>
                        <div class="mj-row">
                            <span class="mj-rank"><?php if ($rank == 1) { ?><span class="mj-medal gold">1</span><?php } elseif ($rank == 2) { ?><span class="mj-medal silver">2</span><?php } elseif ($rank == 3) { ?><span class="mj-medal bronze">3</span><?php } else { echo $rank; } ?></span>
                            <span class="mj-avatar"><?= htmlspecialchars(substr($msv->sub_name, 0, 1)) ?></span>
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
                    <div class="mj-board green">
                        <?php
                        $max = 0;
                        foreach ($majik_customer_refills as $msre) { if ($msre->order_count > $max) $max = $msre->order_count; }
                        $rank = 0;
                        foreach ($majik_customer_refills as $msre) { $rank++;
                        ?>
                        <div class="mj-row">
                            <span class="mj-rank"><?php if ($rank == 1) { ?><span class="mj-medal gold">1</span><?php } elseif ($rank == 2) { ?><span class="mj-medal silver">2</span><?php } elseif ($rank == 3) { ?><span class="mj-medal bronze">3</span><?php } else { echo $rank; } ?></span>
                            <span class="mj-avatar"><?= htmlspecialchars(substr($msre->sub_name, 0, 1)) ?></span>
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
                <div class="mj-card-title-wrap">
                    <span class="mj-icon violet"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg></span>
                    <div>
                        <h3 class="mj-card-title">Stores Performance</h3>
                        <p class="mj-card-sub"><?= date('M Y') ?></p>
                    </div>
                </div>
                <div class="mj-active">
                    <span class="mj-icon violet"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg></span>
                    <div><span>Active</span><b><?= number_format($majik_store->majik_store, 0) ?></b></div>
                </div>
            </div>
            <div class="mj-card-body">
                <div class="mj-tabs">
                    <button type="button" class="mj-tab is-active" data-target="storeRevenue">Revenue</button>
                    <button type="button" class="mj-tab" data-target="storeVolume">Volume</button>
                    <button type="button" class="mj-tab" data-target="storeRefills">Refills</button>
                </div>

                <div class="mj-pane is-active" id="storeRevenue">
                    <div class="mj-board violet">
                        <?php
                        $max = 0;
                        foreach ($majik_store_revenue as $msr) { if ($msr->total_revenue > $max) $max = $msr->total_revenue; }
                        $rank = 0;
                        foreach ($majik_store_revenue as $msr) { $rank++;
                        ?>
                        <div class="mj-row">
                            <span class="mj-rank"><?php if ($rank == 1) { ?><span class="mj-medal gold">1</span><?php } elseif ($rank == 2) { ?><span class="mj-medal silver">2</span><?php } elseif ($rank == 3) { ?><span class="mj-medal bronze">3</span><?php } else { echo $rank; } ?></span>
                            <span class="mj-avatar"><?= htmlspecialchars(substr($msr->store_name, 0, 1)) ?></span>
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
                    <div class="mj-board violet">
                        <?php
                        $max = 0;
                        foreach ($majik_store_volume as $msv) { if ($msv->total_volume > $max) $max = $msv->total_volume; }
                        $rank = 0;
                        foreach ($majik_store_volume as $msv) { $rank++;
                        ?>
                        <div class="mj-row">
                            <span class="mj-rank"><?php if ($rank == 1) { ?><span class="mj-medal gold">1</span><?php } elseif ($rank == 2) { ?><span class="mj-medal silver">2</span><?php } elseif ($rank == 3) { ?><span class="mj-medal bronze">3</span><?php } else { echo $rank; } ?></span>
                            <span class="mj-avatar"><?= htmlspecialchars(substr($msv->store_name, 0, 1)) ?></span>
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
                    <div class="mj-board violet">
                        <?php
                        $max = 0;
                        foreach ($majik_store_refills as $msre) { if ($msre->sub_count > $max) $max = $msre->sub_count; }
                        $rank = 0;
                        foreach ($majik_store_refills as $msre) { $rank++;
                        ?>
                        <div class="mj-row">
                            <span class="mj-rank"><?php if ($rank == 1) { ?><span class="mj-medal gold">1</span><?php } elseif ($rank == 2) { ?><span class="mj-medal silver">2</span><?php } elseif ($rank == 3) { ?><span class="mj-medal bronze">3</span><?php } else { echo $rank; } ?></span>
                            <span class="mj-avatar"><?= htmlspecialchars(substr($msre->point_name, 0, 1)) ?></span>
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
var chartFont = "'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif";

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
        chart: { height: 330, type: 'area', toolbar: { show: false }, fontFamily: chartFont, zoom: { enabled: false } },
        colors: ['#0779BC'],
        series: [{ name: 'Revenue', data: monthData }],
        stroke: { curve: 'smooth', width: 3 },
        fill: { type: 'gradient', gradient: { shadeIntensity: 1, opacityFrom: 0.38, opacityTo: 0.02, stops: [0, 95, 100] } },
        markers: { size: 0, strokeColors: '#fff', strokeWidth: 3, hover: { size: 6 } },
        dataLabels: { enabled: false },
        grid: { borderColor: '#edf0f6', strokeDashArray: 4, padding: { left: 6, right: 6 } },
        xaxis: {
            categories: months,
            axisBorder: { show: false },
            axisTicks: { show: false },
            crosshairs: { stroke: { color: '#0779BC', dashArray: 4 } },
            labels: { style: { colors: '#8a96aa', fontSize: '12px', fontWeight: 500 } }
        },
        yaxis: {
            min: 0,
            forceNiceScale: true,
            labels: { style: { colors: '#8a96aa', fontSize: '12px', fontWeight: 500 }, formatter: shortNumber }
        },
        tooltip: { y: { formatter: function (val) { return Number(val).toLocaleString(); } } }
    }).render();
}

function initRefillGraph() {
    var el = document.querySelector('#refillgraph');
    if (!el) return;

    var refillData = [<?= implode(',', array_map(function($r) { return (float) $r->sub_count; }, $refill)) ?>];
    while (refillData.length < months.length) refillData.push(0);

    new ApexCharts(el, {
        chart: { height: 230, type: 'bar', toolbar: { show: false }, fontFamily: chartFont },
        colors: ['#7DC243'],
        series: [{ name: 'Refills', data: refillData }],
        plotOptions: { bar: { columnWidth: '52%', borderRadius: 6 } },
        fill: { type: 'gradient', gradient: { type: 'vertical', gradientToColors: ['#13b5a6'], opacityFrom: 1, opacityTo: 0.9, stops: [0, 100] } },
        dataLabels: { enabled: false },
        grid: { borderColor: '#edf0f6', strokeDashArray: 4, padding: { left: 6, right: 6 } },
        xaxis: {
            categories: months,
            axisBorder: { show: false },
            axisTicks: { show: false },
            labels: { style: { colors: '#8a96aa', fontSize: '11px', fontWeight: 500 } }
        },
        yaxis: {
            min: 0,
            forceNiceScale: true,
            labels: { style: { colors: '#8a96aa', fontSize: '11px', fontWeight: 500 }, formatter: shortNumber }
        },
        tooltip: { y: { formatter: function (val) { return Number(val).toLocaleString(); } } }
    }).render();
}

function initMajikansDonut() {
    var el = document.querySelector('#majikansdonut');
    if (!el) return;

    var labels = [], values = [], colors = [];
    <?php foreach ($counts as $p) { ?>
    <?php if ($p->sub_stat_dormancy == 'E') { ?>labels.push('Excellent'); values.push(<?= (float) $p->count ?>); colors.push('#0779BC');<?php } ?>
    <?php if ($p->sub_stat_dormancy == 'G') { ?>labels.push('Good'); values.push(<?= (float) $p->count ?>); colors.push('#7DC243');<?php } ?>
    <?php if ($p->sub_stat_dormancy == 'N') { ?>labels.push('Normal'); values.push(<?= (float) $p->count ?>); colors.push('#f5a524');<?php } ?>
    <?php if ($p->sub_stat_dormancy == 'D') { ?>labels.push('Dormant'); values.push(<?= (float) $p->count ?>); colors.push('#ef4462');<?php } ?>
    <?php } ?>

    new ApexCharts(el, {
        chart: { height: 220, type: 'donut', fontFamily: chartFont },
        series: values,
        labels: labels,
        colors: colors,
        stroke: { width: 3, colors: ['#fff'] },
        legend: { show: false },
        dataLabels: { enabled: false },
        plotOptions: { pie: { donut: { size: '74%' } } },
        tooltip: { y: { formatter: function (val) { return Number(val).toLocaleString(); } } }
    }).render();
}
</script>
