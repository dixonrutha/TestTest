<link rel="stylesheet" href="<?= base_url('assets/css/majik2.css') ?>">

<style>
/* ===== Majik dashboard — scoped styles (prefix .mj-) ===== */
.mj-dash {
    --mj-blue: #0779BC;
    --mj-blue-soft: rgba(7, 121, 188, .10);
    --mj-green: #7DC243;
    --mj-green-soft: rgba(125, 194, 67, .14);
    --mj-red: #dc3545;
    --mj-red-soft: rgba(220, 53, 69, .10);
    --mj-amber: #f0ad00;
    --mj-teal: #0cb2a6;
    --mj-ink: #1c273c;
    --mj-muted: #8392a5;
    --mj-line: #e8ecf3;
    --mj-surface: #ffffff;
    --mj-subtle: #f6f8fb;
    padding: 4px 0 8px;
    color: var(--mj-ink);
}
.mj-dash .mj-num { font-variant-numeric: tabular-nums; }

/* Page header */
.mj-page-head { display: flex; flex-wrap: wrap; align-items: flex-end; justify-content: space-between; gap: 8px; margin-bottom: 20px; }
.mj-page-title { margin: 0; font-size: 22px; font-weight: 600; color: var(--mj-ink); }
.mj-page-sub { margin: 2px 0 0; font-size: 13px; color: var(--mj-muted); }
.mj-date-chip { font-size: 12px; font-weight: 600; color: var(--mj-blue); background: var(--mj-blue-soft); padding: 6px 12px; border-radius: 999px; }

/* Grid spacing */
.mj-dash .mj-col { margin-bottom: 24px; display: flex; flex-direction: column; }
.mj-dash .mj-col > .mj-card { flex: 1; }

/* Card */
.mj-card { background: var(--mj-surface); border: 1px solid var(--mj-line); border-radius: 12px; box-shadow: 0 1px 2px rgba(16, 24, 40, .04), 0 6px 16px rgba(16, 24, 40, .04); display: flex; flex-direction: column; min-width: 0; overflow: hidden; }
.mj-card-head { display: flex; align-items: center; justify-content: space-between; gap: 12px; padding: 16px 20px; border-bottom: 1px solid var(--mj-line); }
.mj-card-title { margin: 0; font-size: 15px; font-weight: 600; color: var(--mj-ink); line-height: 1.3; }
.mj-card-sub { display: block; margin-top: 2px; font-size: 12px; font-weight: 400; color: var(--mj-muted); }
.mj-card-body { padding: 16px 20px; flex: 1; min-width: 0; }
.mj-card-body.mj-flush { padding: 0; }
.mj-accent { width: 4px; height: 18px; border-radius: 2px; background: var(--mj-blue); display: inline-block; margin-right: 10px; vertical-align: -3px; }
.mj-accent.is-green { background: var(--mj-green); }

/* "Active" chip in card headers */
.mj-stat-chip { display: flex; align-items: center; gap: 10px; padding: 6px 12px 6px 6px; border-radius: 10px; background: var(--mj-subtle); flex-shrink: 0; }
.mj-stat-chip .mj-stat-icon { width: 32px; height: 32px; border-radius: 8px; background: var(--mj-blue-soft); color: var(--mj-blue); display: flex; align-items: center; justify-content: center; }
.mj-stat-chip .mj-stat-icon svg { width: 16px; height: 16px; }
.mj-stat-chip .mj-stat-label { display: block; font-size: 10px; font-weight: 600; letter-spacing: .06em; text-transform: uppercase; color: var(--mj-muted); line-height: 1.2; }
.mj-stat-chip .mj-stat-value { display: block; font-size: 17px; font-weight: 600; color: var(--mj-ink); line-height: 1.2; }

/* KPI strip under charts */
.mj-kpis { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); border-top: 1px solid var(--mj-line); }
.mj-kpi { padding: 16px 20px; border-right: 1px solid var(--mj-line); min-width: 0; }
.mj-kpi:last-child { border-right: 0; }
.mj-kpi-label { font-size: 11px; font-weight: 600; letter-spacing: .06em; text-transform: uppercase; color: var(--mj-muted); margin: 0 0 6px; }
.mj-kpi-value { font-size: 22px; font-weight: 600; color: var(--mj-ink); margin: 0 0 8px; line-height: 1.15; overflow-wrap: anywhere; }
.mj-kpi-meta { font-size: 12px; color: var(--mj-muted); margin: 6px 0 0; }
.mj-kpi-meta strong { color: var(--mj-ink); font-weight: 600; }
@media (max-width: 575.98px) {
    .mj-kpis { grid-template-columns: 1fr; }
    .mj-kpi { border-right: 0; border-bottom: 1px solid var(--mj-line); }
    .mj-kpi:last-child { border-bottom: 0; }
}

/* Trend pill */
.mj-trend { display: inline-flex; align-items: center; gap: 3px; font-size: 11px; font-weight: 600; padding: 2px 8px; border-radius: 999px; white-space: nowrap; }
.mj-trend.is-up { color: #3f7d16; background: var(--mj-green-soft); }
.mj-trend.is-down { color: var(--mj-red); background: var(--mj-red-soft); }
.mj-trend.is-flat { color: var(--mj-muted); background: var(--mj-subtle); }
.mj-trend-note { font-size: 11px; color: var(--mj-muted); margin-left: 4px; }

/* Charts */
.mj-chart { min-height: 300px; margin: 0 -8px; }

/* Segmented tabs */
.mj-tabs { display: inline-flex; flex-wrap: wrap; gap: 2px; padding: 3px; margin: 0 0 14px; background: var(--mj-subtle); border-radius: 8px; list-style: none; border: 0; }
.mj-tabs .nav-item { margin: 0; }
.mj-tabs .nav-link { display: block; padding: 5px 12px; font-size: 12px; font-weight: 600; color: var(--mj-muted); border: 0; border-radius: 6px; background: transparent; white-space: nowrap; }
.mj-tabs .nav-link:hover { color: var(--mj-ink); }
.mj-tabs .nav-link.active { color: var(--mj-ink); background: var(--mj-surface); box-shadow: 0 1px 2px rgba(16, 24, 40, .08); }
.mj-dash .tab-pane { min-height: auto; }

/* Tables */
.mj-table-wrap { border: 1px solid var(--mj-line); border-radius: 10px; overflow: hidden; }
.mj-scroll { max-height: 340px; overflow-y: auto; }
.mj-table { width: 100%; margin: 0; border-collapse: separate; border-spacing: 0; font-size: 13px; }
.mj-table th { position: sticky; top: 0; z-index: 1; background: var(--mj-subtle); font-size: 11px; font-weight: 600; letter-spacing: .04em; text-transform: uppercase; color: var(--mj-muted); padding: 9px 12px; border-bottom: 1px solid var(--mj-line); text-align: left; white-space: nowrap; }
.mj-table td { padding: 9px 12px; border-bottom: 1px solid var(--mj-line); color: var(--mj-ink); vertical-align: middle; }
.mj-table tbody tr:last-child td { border-bottom: 0; }
.mj-table tbody tr:hover td { background: #fafbfd; }
.mj-table .mj-right { text-align: right; font-variant-numeric: tabular-nums; }
.mj-table .mj-center { text-align: center; }
.mj-table .mj-group-start { border-left: 1px solid var(--mj-line); }
.mj-table .mj-unit { font-size: 11px; color: var(--mj-muted); margin-left: 2px; }
.mj-table .mj-empty td { text-align: center; color: var(--mj-muted); padding: 24px 12px; }
.mj-rank { display: inline-flex; align-items: center; justify-content: center; width: 22px; height: 22px; border-radius: 6px; font-size: 11px; font-weight: 600; color: var(--mj-muted); background: var(--mj-subtle); margin-right: 8px; flex-shrink: 0; }
.mj-rank.is-top { color: #fff; background: var(--mj-blue); }
.mj-name { display: flex; align-items: center; min-width: 0; }
.mj-name span:last-child { overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }

/* Majikans performance list */
.mj-status { margin: 0; padding: 0; list-style: none; }
.mj-status li { padding: 12px 0; border-bottom: 1px solid var(--mj-line); }
.mj-status li:first-child { padding-top: 0; }
.mj-status li:last-child { border-bottom: 0; padding-bottom: 0; }
.mj-status-row { display: flex; align-items: center; gap: 10px; margin-bottom: 8px; font-size: 13px; }
.mj-status-row .mj-status-name { font-weight: 600; }
.mj-status-row .mj-status-count { margin-left: auto; font-weight: 600; font-variant-numeric: tabular-nums; }
.mj-status-row .mj-status-pct { width: 52px; text-align: right; color: var(--mj-muted); font-variant-numeric: tabular-nums; }
.mj-bar { height: 6px; border-radius: 3px; background: var(--mj-subtle); overflow: hidden; }
.mj-bar > span { display: block; height: 100%; border-radius: 3px; }
.mj-dot { width: 10px; height: 10px; border-radius: 50%; flex-shrink: 0; display: inline-block; }
.mj-c-excellent { background: var(--mj-blue); }
.mj-c-good { background: var(--mj-green); }
.mj-c-normal { background: var(--mj-amber); }
.mj-c-dormant { background: var(--mj-red); }
.mj-c-teal { background: var(--mj-teal); }

/* Customer base */
.mj-hero { text-align: center; padding: 8px 0 20px; margin-bottom: 16px; border-bottom: 1px solid var(--mj-line); }
.mj-hero-value { font-size: 34px; font-weight: 600; letter-spacing: -.02em; color: var(--mj-ink); margin: 0; line-height: 1.1; }
.mj-hero-label { font-size: 11px; font-weight: 600; letter-spacing: .08em; text-transform: uppercase; color: var(--mj-muted); margin: 6px 0 0; }
.mj-split { margin: 0; padding: 0; list-style: none; }
.mj-split li { display: flex; align-items: center; gap: 10px; padding: 10px 12px; border-radius: 8px; font-size: 13px; }
.mj-split li + li { margin-top: 6px; }
.mj-split li:nth-child(odd) { background: var(--mj-subtle); }
.mj-split .mj-split-label { font-weight: 500; }
.mj-split .mj-split-value { margin-left: auto; font-weight: 600; font-variant-numeric: tabular-nums; }
.mj-split .mj-split-hint { font-size: 11px; color: var(--mj-muted); }
</style>

<?php
// Shared helper for the "vs previous period" indicators (UI only).
$mj_trend = function ($current, $previous) {
    if ($previous > 0) {
        $change = round((($current - $previous) / $previous) * 100, 1);
        if ($change > 0) {
            return ['text' => number_format(abs($change), 1) . '%', 'icon' => 'ion-md-arrow-up', 'class' => 'is-up'];
        }
        if ($change < 0) {
            return ['text' => number_format(abs($change), 1) . '%', 'icon' => 'ion-md-arrow-down', 'class' => 'is-down'];
        }
        return ['text' => '0.0%', 'icon' => '', 'class' => 'is-flat'];
    }
    return ['text' => 'N/A', 'icon' => '', 'class' => 'is-flat'];
};

$mj_e = function ($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
};

$mj_chip_icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>';

// Revenue
$today_revenue          = $majik_revenue_today->revenue;
$yesterday_revenue      = $majik_revenue_yesterday->revenue;
$current_month_revenue  = $majik_revenue_current_month->revenue;
$previous_month_revenue = $majik_revenue_previous_month->revenue;
$current_year_revenue   = $majik_revenue_current_year->revenue;
$previous_year_revenue  = $majik_revenue_previous_year->revenue;

// Refills
$today_order          = $majik_order_today->majik_order;
$yesterday_order      = $majik_order_yesterday->majik_order;
$current_month_order  = $majik_order_current_month->majik_order;
$previous_month_order = $majik_order_previous_month->majik_order;
$current_year_order   = $majik_order_current_year->majik_order;
$previous_year_order  = $majik_order_previous_year->majik_order;

$revenue_kpis = [
    [
        'label' => 'Today',
        'value' => $majik_revenue_today->revenue,
        'trend' => $mj_trend($today_revenue, $yesterday_revenue),
        'note'  => 'vs yesterday',
        'meta'  => [
            'Yesterday payments' => number_format($yesterday_revenue, 2),
            'Delivery fee'       => number_format($majik_delivery_today->delivery, 0),
        ],
    ],
    [
        'label' => 'Month',
        'value' => $majik_revenue_mtd->revenue,
        'trend' => $mj_trend($current_month_revenue, $previous_month_revenue),
        'note'  => 'vs last month',
        'meta'  => ['Delivery fee' => number_format($majik_delivery_mnth->delivery, 0)],
    ],
    [
        'label' => 'Year',
        'value' => $majik_revenue_ytd->revenue,
        'trend' => $mj_trend($current_year_revenue, $previous_year_revenue),
        'note'  => 'vs last year',
        'meta'  => ['Delivery fee' => number_format($majik_delivery_yr->delivery, 0)],
    ],
];

$refill_kpis = [
    [
        'label' => 'Today',
        'value' => $majik_order_today->majik_order,
        'trend' => $mj_trend($today_order, $yesterday_order),
        'note'  => 'vs yesterday',
        'meta'  => ['Yesterday refills' => number_format($yesterday_order, 0)],
    ],
    [
        'label' => 'Month',
        'value' => $majik_order_mtd->majik_order,
        'trend' => $mj_trend($current_month_order, $previous_month_order),
        'note'  => 'vs last month',
        'meta'  => [],
    ],
    [
        'label' => 'Year',
        'value' => $majik_order_ytd->majik_order,
        'trend' => $mj_trend($current_year_order, $previous_year_order),
        'note'  => 'vs last year',
        'meta'  => [],
    ],
];

// Majikans performance
$sub_total = 0;
foreach ($counts as $p) {
    $sub_total = $sub_total + $p->count;
}
$mj_status_map = [
    'E' => ['label' => 'Excellent', 'class' => 'mj-c-excellent'],
    'G' => ['label' => 'Good',      'class' => 'mj-c-good'],
    'N' => ['label' => 'Normal',    'class' => 'mj-c-normal'],
    'D' => ['label' => 'Dormant',   'class' => 'mj-c-dormant'],
];
?>

<body>

<div class="app">
<div class="app-wrap">
<div class="app-container">
<div class="app-main1 mj-dash" id="main">

    <!-- Page header -->
    <div class="mj-page-head">
        <div>
            <h3 class="mj-page-title">Dashboard</h3>
            <p class="mj-page-sub">Revenue, refills and performance overview</p>
        </div>
        <span class="mj-date-chip"><?= date('D, d M Y') ?></span>
    </div>

    <!-- ===== Row 1: Revenue & Refills ===== -->
    <div class="row">
        <?php
        $mj_chart_cards = [
            ['col' => 'col-lg-7', 'title' => 'Revenue Analysis', 'accent' => '',          'chart' => 'revenuegraph', 'kpis' => $revenue_kpis],
            ['col' => 'col-lg-5', 'title' => 'Refills Analysis', 'accent' => ' is-green', 'chart' => 'refillgraph',  'kpis' => $refill_kpis],
        ];
        foreach ($mj_chart_cards as $card): ?>
        <div class="col-12 <?= $card['col'] ?> mj-col">
            <div class="mj-card">
                <div class="mj-card-head">
                    <h4 class="mj-card-title">
                        <span class="mj-accent<?= $card['accent'] ?>"></span><?= $card['title'] ?>
                    </h4>
                    <span class="mj-card-sub">Year <?= date('Y') ?></span>
                </div>
                <div class="mj-card-body">
                    <div id="<?= $card['chart'] ?>" class="mj-chart"></div>
                </div>
                <div class="mj-kpis">
                    <?php foreach ($card['kpis'] as $kpi): ?>
                    <div class="mj-kpi">
                        <p class="mj-kpi-label"><?= $kpi['label'] ?></p>
                        <p class="mj-kpi-value mj-num"><?= number_format($kpi['value'], 0) ?></p>
                        <span class="mj-trend <?= $kpi['trend']['class'] ?>">
                            <?php if ($kpi['trend']['icon']): ?><i class="icon <?= $kpi['trend']['icon'] ?>"></i><?php endif; ?>
                            <?= $kpi['trend']['text'] ?>
                        </span>
                        <span class="mj-trend-note"><?= $kpi['note'] ?></span>
                        <?php foreach ($kpi['meta'] as $meta_label => $meta_value): ?>
                        <p class="mj-kpi-meta"><?= $meta_label ?>: <strong class="mj-num"><?= $meta_value ?></strong></p>
                        <?php endforeach; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- ===== Row 2: Majikans / Customer base / Apps ===== -->
    <div class="row">

        <!-- Majikans Performance -->
        <div class="col-12 col-md-6 col-xl-4 mj-col">
            <div class="mj-card">
                <div class="mj-card-head">
                    <h4 class="mj-card-title">Majikans Performance</h4>
                    <span class="mj-card-sub mj-num"><?= number_format($sub_total, 0) ?> total</span>
                </div>
                <div class="mj-card-body">
                    <ul class="mj-status">
                        <?php foreach ($counts as $p):
                            if (!isset($mj_status_map[$p->sub_stat_dormancy])) continue;
                            $status = $mj_status_map[$p->sub_stat_dormancy];
                            $pct = $sub_total > 0 ? $p->count / $sub_total * 100 : 0;
                        ?>
                        <li>
                            <div class="mj-status-row">
                                <span class="mj-dot <?= $status['class'] ?>"></span>
                                <span class="mj-status-name"><?= $status['label'] ?></span>
                                <span class="mj-status-count"><?= number_format($p->count, 0) ?></span>
                                <span class="mj-status-pct"><?= number_format($pct, 1) ?>%</span>
                            </div>
                            <div class="mj-bar"><span class="<?= $status['class'] ?>" style="width: <?= round($pct, 1) ?>%"></span></div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Customer Base -->
        <div class="col-12 col-md-6 col-xl-4 mj-col">
            <div class="mj-card">
                <div class="mj-card-head">
                    <h4 class="mj-card-title">Customer Base</h4>
                    <span class="mj-card-sub">New Majikans</span>
                </div>
                <div class="mj-card-body">
                    <div class="mj-hero">
                        <p class="mj-hero-value mj-num"><?= number_format($majik_cust->majik_customer, 0) ?></p>
                        <p class="mj-hero-label">Total Majikans</p>
                    </div>
                    <ul class="mj-split">
                        <li>
                            <span class="mj-dot mj-c-excellent"></span>
                            <span class="mj-split-label">Today</span>
                            <span class="mj-split-value"><?= number_format($majik_cust_today->majik_cust, 0) ?></span>
                        </li>
                        <li>
                            <span class="mj-dot mj-c-teal"></span>
                            <span class="mj-split-label">This month</span>
                            <span class="mj-split-value"><?= number_format($majik_cust_mtd->majik_cust, 0) ?></span>
                        </li>
                        <li>
                            <span class="mj-dot mj-c-normal"></span>
                            <span class="mj-split-label">This year</span>
                            <span class="mj-split-value"><?= number_format($majik_cust_ytd->majik_cust, 0) ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Apps Performance -->
        <div class="col-12 col-xl-4 mj-col">
            <div class="mj-card">
                <div class="mj-card-head">
                    <h4 class="mj-card-title">Apps Performance</h4>
                    <span class="mj-card-sub"><?= date('M Y') ?></span>
                </div>
                <div class="mj-card-body">
                    <ul class="nav mj-tabs" id="mjAppsTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="mj-apps-day-tab" data-toggle="tab" data-bs-toggle="tab" href="#mj-apps-day" role="tab" aria-controls="mj-apps-day" aria-selected="true">Day</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="mj-apps-month-tab" data-toggle="tab" data-bs-toggle="tab" href="#mj-apps-month" role="tab" aria-controls="mj-apps-month" aria-selected="false">Monthly</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <?php
                        $mj_app_panes = [
                            ['id' => 'mj-apps-day',   'rows' => $daily_data,   'active' => true],
                            ['id' => 'mj-apps-month', 'rows' => $monthly_data, 'active' => false],
                        ];
                        foreach ($mj_app_panes as $pane): ?>
                        <div class="tab-pane fade<?= $pane['active'] ? ' show active' : '' ?>" id="<?= $pane['id'] ?>" role="tabpanel" aria-labelledby="<?= $pane['id'] ?>-tab">
                            <div class="mj-table-wrap">
                                <table class="mj-table">
                                    <thead>
                                        <tr>
                                            <th colspan="2" class="mj-center">WABA</th>
                                            <th colspan="2" class="mj-center mj-group-start">App</th>
                                        </tr>
                                        <tr>
                                            <th class="mj-right">Revenue</th>
                                            <th class="mj-right">Refills</th>
                                            <th class="mj-right mj-group-start">Revenue</th>
                                            <th class="mj-right">Refills</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (empty($pane['rows'])): ?>
                                        <tr class="mj-empty"><td colspan="4">No data available</td></tr>
                                        <?php endif; ?>
                                        <?php foreach ($pane['rows'] as $data): ?>
                                        <tr>
                                            <td class="mj-right"><?= number_format($data['waba_revenue'], 0) ?></td>
                                            <td class="mj-right"><?= number_format($data['waba_refills'], 0) ?></td>
                                            <td class="mj-right mj-group-start"><?= number_format($data['app_revenue'], 0) ?></td>
                                            <td class="mj-right"><?= number_format($data['app_refills'], 0) ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== Row 3: Drivers / Customers / Stores leaderboards ===== -->
    <?php
    // Each leaderboard: header chip + tabs, every tab = [label, rows, name field, value field, unit]
    $mj_boards = [
        [
            'id'     => 'mj-drivers',
            'title'  => 'Drivers Performance',
            'active' => $majik_active_drivers->majik_drivers,
            'name'   => 'Driver',
            'tabs'   => [
                ['label' => 'Day',     'value_head' => 'Trips', 'rows' => $trip_day, 'name_field' => 'md_first', 'value_field' => 'trips', 'unit' => ''],
                ['label' => 'Monthly', 'value_head' => 'Trips', 'rows' => $trip_mnt, 'name_field' => 'md_first', 'value_field' => 'trips', 'unit' => ''],
            ],
        ],
        [
            'id'     => 'mj-customers',
            'title'  => 'Customer Performance',
            'active' => $majik_active_customers->Total,
            'name'   => 'Customer',
            'tabs'   => [
                ['label' => 'Revenue', 'value_head' => 'Total Revenue', 'rows' => $majik_customer_revenue, 'name_field' => 'sub_name', 'value_field' => 'total_revenue', 'unit' => ''],
                ['label' => 'Volume',  'value_head' => 'Volume',        'rows' => $majik_customer_volume,  'name_field' => 'sub_name', 'value_field' => 'total_volume',  'unit' => 'L'],
                ['label' => 'Refills', 'value_head' => 'Refills',       'rows' => $majik_customer_refills, 'name_field' => 'sub_name', 'value_field' => 'order_count',   'unit' => ''],
            ],
        ],
        [
            'id'     => 'mj-stores',
            'title'  => 'Stores Performance',
            'active' => $majik_store->majik_store,
            'name'   => 'Store',
            'tabs'   => [
                ['label' => 'Revenue', 'value_head' => 'Total Revenue', 'rows' => $majik_store_revenue, 'name_field' => 'store_name', 'value_field' => 'total_revenue', 'unit' => ''],
                ['label' => 'Volume',  'value_head' => 'Volume',        'rows' => $majik_store_volume,  'name_field' => 'store_name', 'value_field' => 'total_volume',  'unit' => 'L'],
                ['label' => 'Refills', 'value_head' => 'Refills',       'rows' => $majik_store_refills, 'name_field' => 'point_name', 'value_field' => 'sub_count',     'unit' => ''],
            ],
        ],
    ];
    ?>
    <div class="row">
        <?php foreach ($mj_boards as $board): ?>
        <div class="col-12 col-lg-6 col-xl-4 mj-col">
            <div class="mj-card">
                <div class="mj-card-head">
                    <h4 class="mj-card-title">
                        <?= $board['title'] ?>
                        <span class="mj-card-sub"><?= date('M Y') ?></span>
                    </h4>
                    <div class="mj-stat-chip">
                        <span class="mj-stat-icon"><?= $mj_chip_icon ?></span>
                        <span>
                            <span class="mj-stat-label">Active</span>
                            <span class="mj-stat-value mj-num"><?= number_format($board['active'], 0) ?></span>
                        </span>
                    </div>
                </div>
                <div class="mj-card-body">
                    <ul class="nav mj-tabs" id="<?= $board['id'] ?>-tabs" role="tablist">
                        <?php foreach ($board['tabs'] as $t => $tab):
                            $pane_id = $board['id'] . '-' . $t; ?>
                        <li class="nav-item">
                            <a class="nav-link<?= $t === 0 ? ' active' : '' ?>" id="<?= $pane_id ?>-tab" data-toggle="tab" data-bs-toggle="tab" href="#<?= $pane_id ?>" role="tab" aria-controls="<?= $pane_id ?>" aria-selected="<?= $t === 0 ? 'true' : 'false' ?>"><?= $tab['label'] ?></a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="tab-content">
                        <?php foreach ($board['tabs'] as $t => $tab):
                            $pane_id = $board['id'] . '-' . $t; ?>
                        <div class="tab-pane fade<?= $t === 0 ? ' show active' : '' ?>" id="<?= $pane_id ?>" role="tabpanel" aria-labelledby="<?= $pane_id ?>-tab">
                            <div class="mj-table-wrap mj-scroll">
                                <table class="mj-table">
                                    <thead>
                                        <tr>
                                            <th><?= $board['name'] ?></th>
                                            <th class="mj-right"><?= $tab['value_head'] ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (empty($tab['rows'])): ?>
                                        <tr class="mj-empty"><td colspan="2">No data available</td></tr>
                                        <?php endif; ?>
                                        <?php $rank = 0; foreach ($tab['rows'] as $row): $rank++; ?>
                                        <tr>
                                            <td>
                                                <div class="mj-name">
                                                    <span class="mj-rank<?= $rank <= 3 ? ' is-top' : '' ?>"><?= $rank ?></span>
                                                    <span><?= $mj_e($row->{$tab['name_field']}) ?></span>
                                                </div>
                                            </td>
                                            <td class="mj-right">
                                                <?= number_format($row->{$tab['value_field']}, 0) ?><?php if ($tab['unit']): ?><span class="mj-unit"><?= $tab['unit'] ?></span><?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

</div>
</div>
</div>
</div>

<script src="<?= base_url('assets/js/vendors.js') ?>"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    if (typeof ApexCharts !== 'undefined') {
        initRevenueGraph();
        initRefillGraph();
    }
});

var MJ_MONTHS = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

function mjPad(data) {
    var padded = data.slice();
    while (padded.length < MJ_MONTHS.length) padded.push(0);
    return padded;
}

function mjShort(value) {
    var abs = Math.abs(value);
    if (abs >= 1e6) return (value / 1e6).toFixed(abs >= 1e7 ? 0 : 1).replace(/\.0$/, '') + 'M';
    if (abs >= 1e3) return (value / 1e3).toFixed(abs >= 1e4 ? 0 : 1).replace(/\.0$/, '') + 'K';
    return Math.round(value).toString();
}

function mjBarOptions(color, name, data, valueFormatter) {
    return {
        chart: {
            height: 300,
            type: 'bar',
            toolbar: { show: false },
            fontFamily: 'inherit',
            animations: { speed: 400 }
        },
        colors: [color],
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '45%',
                borderRadius: 4,
                borderRadiusApplication: 'end'
            }
        },
        dataLabels: { enabled: false },
        series: [{ name: name, data: mjPad(data) }],
        grid: {
            borderColor: '#e8ecf3',
            strokeDashArray: 4,
            xaxis: { lines: { show: false } },
            padding: { left: 8, right: 8 }
        },
        xaxis: {
            categories: MJ_MONTHS,
            axisBorder: { show: false },
            axisTicks: { show: false },
            labels: { style: { colors: '#8392a5', fontSize: '11px' } }
        },
        yaxis: {
            min: 0,
            forceNiceScale: true,
            labels: {
                style: { colors: '#8392a5', fontSize: '11px' },
                formatter: mjShort
            }
        },
        states: { hover: { filter: { type: 'darken', value: 0.9 } } },
        tooltip: {
            y: { formatter: valueFormatter }
        }
    };
}

function initRevenueGraph() {
    var el = document.querySelector('#revenuegraph');
    if (!el) return;

    var monthData = <?= json_encode(array_map(function ($a) { return (float) $a->total_amount; }, $amount)) ?>;

    new ApexCharts(el, mjBarOptions('#0779BC', 'Revenue', monthData, function (val) {
        return Number(val).toLocaleString();
    })).render();
}

function initRefillGraph() {
    var el = document.querySelector('#refillgraph');
    if (!el) return;

    var refillData = <?= json_encode(array_map(function ($r) { return (float) $r->sub_count; }, $refill)) ?>;

    new ApexCharts(el, mjBarOptions('#7DC243', 'Refills', refillData, function (val) {
        return Number(val).toLocaleString();
    })).render();
}
</script>
