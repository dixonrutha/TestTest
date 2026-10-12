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

    <!-- ===================== ROW 1 : REVENUE & REFILLS ===================== -->
    <div class="row">

        <!-- Revenue Analysis -->
        <div class="col-12 col-lg-7 mj-col">
            <div class="mj-card">
                <div class="mj-card-head">
                    <h4 class="mj-card-title"><span class="mj-accent"></span>Revenue Analysis</h4>
                    <span class="mj-card-sub">Year <?= date('Y') ?></span>
                </div>
                <div class="mj-card-body">
                    <div id="revenuegraph" class="mj-chart"></div>
                </div>
                <div class="mj-kpis">

                    <!-- Today -->
                    <div class="mj-kpi">
                        <?php
                        $today_revenue = $majik_revenue_today->revenue;
                        $yesterday_revenue = $majik_revenue_yesterday->revenue;

                        if ($yesterday_revenue > 0) {
                            $percentage_change = (($today_revenue - $yesterday_revenue) / $yesterday_revenue) * 100;
                            if ($percentage_change > 0) {
                                $icon = 'ion-md-arrow-up';
                                $class = 'is-up';
                            } else if ($percentage_change < 0) {
                                $icon = 'ion-md-arrow-down';
                                $class = 'is-down';
                            } else {
                                $icon = '';
                                $class = 'is-flat';
                            }
                            $percentage_change = number_format(abs($percentage_change), 1) . '%';
                        } else {
                            $percentage_change = 'N/A';
                            $icon = '';
                            $class = 'is-flat';
                        }
                        ?>
                        <p class="mj-kpi-label">Today</p>
                        <p class="mj-kpi-value"><?= number_format($majik_revenue_today->revenue, 0) ?></p>
                        <span class="mj-trend <?php echo $class; ?>"><i class="icon <?php echo $icon; ?>"></i> <?php echo $percentage_change; ?></span>
                        <span class="mj-trend-note">vs yesterday</span>
                        <p class="mj-kpi-meta">Yesterday payments: <strong><?php echo number_format($yesterday_revenue, 2); ?></strong></p>
                        <p class="mj-kpi-meta">Delivery fee: <strong><?= number_format($majik_delivery_today->delivery, 0) ?></strong></p>
                    </div>

                    <!-- Month -->
                    <div class="mj-kpi">
                        <?php
                        $current_month_revenue = $majik_revenue_current_month->revenue;
                        $previous_month_revenue = $majik_revenue_previous_month->revenue;

                        if ($previous_month_revenue > 0) {
                            $percentage_change = (($current_month_revenue - $previous_month_revenue) / $previous_month_revenue) * 100;
                            if ($percentage_change > 0) {
                                $icon = 'ion-md-arrow-up';
                                $class = 'is-up';
                            } else if ($percentage_change < 0) {
                                $icon = 'ion-md-arrow-down';
                                $class = 'is-down';
                            } else {
                                $icon = '';
                                $class = 'is-flat';
                            }
                            $percentage_change = number_format(abs($percentage_change), 1) . '%';
                        } else {
                            $percentage_change = 'N/A';
                            $icon = '';
                            $class = 'is-flat';
                        }
                        ?>
                        <p class="mj-kpi-label">Month</p>
                        <p class="mj-kpi-value"><?= number_format($majik_revenue_mtd->revenue, 0) ?></p>
                        <span class="mj-trend <?php echo $class; ?>"><i class="icon <?php echo $icon; ?>"></i> <?php echo $percentage_change; ?></span>
                        <span class="mj-trend-note">vs last month</span>
                        <p class="mj-kpi-meta">Delivery fee: <strong><?= number_format($majik_delivery_mnth->delivery, 0) ?></strong></p>
                    </div>

                    <!-- Year -->
                    <div class="mj-kpi">
                        <?php
                        $current_year_revenue = $majik_revenue_current_year->revenue;
                        $previous_year_revenue = $majik_revenue_previous_year->revenue;

                        if ($previous_year_revenue > 0) {
                            $percentage_change = (($current_year_revenue - $previous_year_revenue) / $previous_year_revenue) * 100;
                            if ($percentage_change > 0) {
                                $icon = 'ion-md-arrow-up';
                                $class = 'is-up';
                            } else if ($percentage_change < 0) {
                                $icon = 'ion-md-arrow-down';
                                $class = 'is-down';
                            } else {
                                $icon = '';
                                $class = 'is-flat';
                            }
                            $percentage_change = number_format(abs($percentage_change), 1) . '%';
                        } else {
                            $percentage_change = 'N/A';
                            $icon = '';
                            $class = 'is-flat';
                        }
                        ?>
                        <p class="mj-kpi-label">Year</p>
                        <p class="mj-kpi-value"><?= number_format($majik_revenue_ytd->revenue, 0) ?></p>
                        <span class="mj-trend <?php echo $class; ?>"><i class="icon <?php echo $icon; ?>"></i> <?php echo $percentage_change; ?></span>
                        <span class="mj-trend-note">vs last year</span>
                        <p class="mj-kpi-meta">Delivery fee: <strong><?= number_format($majik_delivery_yr->delivery, 0) ?></strong></p>
                    </div>

                </div>
            </div>
        </div>

        <!-- Refills Analysis -->
        <div class="col-12 col-lg-5 mj-col">
            <div class="mj-card">
                <div class="mj-card-head">
                    <h4 class="mj-card-title"><span class="mj-accent is-green"></span>Refills Analysis</h4>
                    <span class="mj-card-sub">Year <?= date('Y') ?></span>
                </div>
                <div class="mj-card-body">
                    <div id="refillgraph" class="mj-chart"></div>
                </div>
                <div class="mj-kpis">

                    <!-- Today -->
                    <div class="mj-kpi">
                        <?php
                        $today_order = $majik_order_today->majik_order;
                        $yesterday_order = $majik_order_yesterday->majik_order;

                        if ($yesterday_order > 0) {
                            $percentage_change = (($today_order - $yesterday_order) / $yesterday_order) * 100;
                            if ($percentage_change > 0) {
                                $icon = 'ion-md-arrow-up';
                                $class = 'is-up';
                            } else if ($percentage_change < 0) {
                                $icon = 'ion-md-arrow-down';
                                $class = 'is-down';
                            } else {
                                $icon = '';
                                $class = 'is-flat';
                            }
                            $percentage_change = number_format(abs($percentage_change), 1) . '%';
                        } else {
                            $percentage_change = 'N/A';
                            $icon = '';
                            $class = 'is-flat';
                        }
                        ?>
                        <p class="mj-kpi-label">Today</p>
                        <p class="mj-kpi-value"><?= number_format($majik_order_today->majik_order, 0) ?></p>
                        <span class="mj-trend <?php echo $class; ?>"><i class="icon <?php echo $icon; ?>"></i> <?php echo $percentage_change; ?></span>
                        <span class="mj-trend-note">vs yesterday</span>
                        <p class="mj-kpi-meta">Yesterday refills: <strong><?php echo number_format($yesterday_order, 0); ?></strong></p>
                    </div>

                    <!-- Month -->
                    <div class="mj-kpi">
                        <?php
                        $current_month_order = $majik_order_current_month->majik_order;
                        $previous_month_order = $majik_order_previous_month->majik_order;

                        if ($previous_month_order > 0) {
                            $percentage_change = (($current_month_order - $previous_month_order) / $previous_month_order) * 100;
                            if ($percentage_change > 0) {
                                $icon = 'ion-md-arrow-up';
                                $class = 'is-up';
                            } else if ($percentage_change < 0) {
                                $icon = 'ion-md-arrow-down';
                                $class = 'is-down';
                            } else {
                                $icon = '';
                                $class = 'is-flat';
                            }
                            $percentage_change = number_format(abs($percentage_change), 1) . '%';
                        } else {
                            $percentage_change = 'N/A';
                            $icon = '';
                            $class = 'is-flat';
                        }
                        ?>
                        <p class="mj-kpi-label">Month</p>
                        <p class="mj-kpi-value"><?= number_format($majik_order_mtd->majik_order, 0) ?></p>
                        <span class="mj-trend <?php echo $class; ?>"><i class="icon <?php echo $icon; ?>"></i> <?php echo $percentage_change; ?></span>
                        <span class="mj-trend-note">vs last month</span>
                    </div>

                    <!-- Year -->
                    <div class="mj-kpi">
                        <?php
                        $current_year_order = $majik_order_current_year->majik_order;
                        $previous_year_order = $majik_order_previous_year->majik_order;

                        if ($previous_year_order > 0) {
                            $percentage_change = (($current_year_order - $previous_year_order) / $previous_year_order) * 100;
                            if ($percentage_change > 0) {
                                $icon = 'ion-md-arrow-up';
                                $class = 'is-up';
                            } else if ($percentage_change < 0) {
                                $icon = 'ion-md-arrow-down';
                                $class = 'is-down';
                            } else {
                                $icon = '';
                                $class = 'is-flat';
                            }
                            $percentage_change = number_format(abs($percentage_change), 1) . '%';
                        } else {
                            $percentage_change = 'N/A';
                            $icon = '';
                            $class = 'is-flat';
                        }
                        ?>
                        <p class="mj-kpi-label">Year</p>
                        <p class="mj-kpi-value"><?= number_format($majik_order_ytd->majik_order, 0) ?></p>
                        <span class="mj-trend <?php echo $class; ?>"><i class="icon <?php echo $icon; ?>"></i> <?php echo $percentage_change; ?></span>
                        <span class="mj-trend-note">vs last year</span>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <!-- ===================== ROW 2 : MAJIKANS / CUSTOMER BASE / APPS ===================== -->
    <div class="row">

        <!-- Majikans Performance -->
        <?php
        $sub_total = 0;
        foreach ($counts as $p) {
            $sub_total = $sub_total + $p->count;
        }
        ?>
        <div class="col-12 col-md-6 col-xl-4 mj-col">
            <div class="mj-card">
                <div class="mj-card-head">
                    <h4 class="mj-card-title">Majikans Performance</h4>
                    <span class="mj-card-sub"><?= number_format($sub_total, 0) ?> total</span>
                </div>
                <div class="mj-card-body">
                    <ul class="mj-status">
                        <?php
                        foreach ($counts as $p) {
                            $pct = ($sub_total > 0) ? ($p->count / $sub_total * 100) : 0;

                            if ($p->sub_stat_dormancy == 'E') {
                                $label = 'Excellent';
                                $color = 'mj-c-excellent';
                            } elseif ($p->sub_stat_dormancy == 'G') {
                                $label = 'Good';
                                $color = 'mj-c-good';
                            } elseif ($p->sub_stat_dormancy == 'N') {
                                $label = 'Normal';
                                $color = 'mj-c-normal';
                            } elseif ($p->sub_stat_dormancy == 'D') {
                                $label = 'Dormant';
                                $color = 'mj-c-dormant';
                            } else {
                                continue;
                            }
                            ?>
                            <li>
                                <div class="mj-status-row">
                                    <span class="mj-dot <?= $color ?>"></span>
                                    <span class="mj-status-name"><?= $label ?></span>
                                    <span class="mj-status-count"><?= number_format($p->count, 0) ?></span>
                                    <span class="mj-status-pct"><?= number_format($pct, 1) ?>%</span>
                                </div>
                                <div class="mj-bar"><span class="<?= $color ?>" style="width: <?= round($pct, 1) ?>%;"></span></div>
                            </li>
                        <?php } ?>
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
                        <p class="mj-hero-value"><?= number_format($majik_cust->majik_customer, 0) ?></p>
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
                    <ul class="nav mj-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#appsDay" role="tab">Day</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#appsMonth" role="tab">Monthly</a>
                        </li>
                    </ul>
                    <div class="tab-content">

                        <!-- Day -->
                        <div class="tab-pane fade show active" id="appsDay" role="tabpanel">
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
                                        <?php foreach ($daily_data as $data): ?>
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

                        <!-- Monthly -->
                        <div class="tab-pane fade" id="appsMonth" role="tabpanel">
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
                                        <?php foreach ($monthly_data as $mtddata): ?>
                                        <tr>
                                            <td class="mj-right"><?= number_format($mtddata['waba_revenue'], 0) ?></td>
                                            <td class="mj-right"><?= number_format($mtddata['waba_refills'], 0) ?></td>
                                            <td class="mj-right mj-group-start"><?= number_format($mtddata['app_revenue'], 0) ?></td>
                                            <td class="mj-right"><?= number_format($mtddata['app_refills'], 0) ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- ===================== ROW 3 : DRIVERS / CUSTOMERS / STORES ===================== -->
    <div class="row">

        <!-- Drivers Performance -->
        <div class="col-12 col-lg-6 col-xl-4 mj-col">
            <div class="mj-card">
                <div class="mj-card-head">
                    <h4 class="mj-card-title">Drivers Performance <span class="mj-card-sub"><?= date('M Y') ?></span></h4>
                    <div class="mj-stat-chip">
                        <span class="mj-stat-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                        </span>
                        <span>
                            <span class="mj-stat-label">Active</span>
                            <span class="mj-stat-value"><?= number_format($majik_active_drivers->majik_drivers, 0) ?></span>
                        </span>
                    </div>
                </div>
                <div class="mj-card-body">
                    <ul class="nav mj-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#driversDay" role="tab">Day</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#driversMonth" role="tab">Monthly</a></li>
                    </ul>
                    <div class="tab-content">

                        <div class="tab-pane fade show active" id="driversDay" role="tabpanel">
                            <div class="mj-table-wrap mj-scroll">
                                <table class="mj-table">
                                    <thead>
                                        <tr><th>Driver</th><th class="mj-right">Trips</th></tr>
                                    </thead>
                                    <tbody>
                                        <?php $rank = 0; foreach ($trip_day as $vl) { $rank++; ?>
                                        <tr>
                                            <td><div class="mj-name"><span class="mj-rank <?= $rank <= 3 ? 'is-top' : '' ?>"><?= $rank ?></span><span><?= htmlspecialchars($vl->md_first) ?></span></div></td>
                                            <td class="mj-right"><?= number_format($vl->trips, 0) ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="driversMonth" role="tabpanel">
                            <div class="mj-table-wrap mj-scroll">
                                <table class="mj-table">
                                    <thead>
                                        <tr><th>Driver</th><th class="mj-right">Trips</th></tr>
                                    </thead>
                                    <tbody>
                                        <?php $rank = 0; foreach ($trip_mnt as $ref) { $rank++; ?>
                                        <tr>
                                            <td><div class="mj-name"><span class="mj-rank <?= $rank <= 3 ? 'is-top' : '' ?>"><?= $rank ?></span><span><?= htmlspecialchars($ref->md_first) ?></span></div></td>
                                            <td class="mj-right"><?= number_format($ref->trips, 0) ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Customer Performance -->
        <div class="col-12 col-lg-6 col-xl-4 mj-col">
            <div class="mj-card">
                <div class="mj-card-head">
                    <h4 class="mj-card-title">Customer Performance <span class="mj-card-sub"><?= date('M Y') ?></span></h4>
                    <div class="mj-stat-chip">
                        <span class="mj-stat-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                        </span>
                        <span>
                            <span class="mj-stat-label">Active</span>
                            <span class="mj-stat-value"><?= number_format($majik_active_customers->Total, 0) ?></span>
                        </span>
                    </div>
                </div>
                <div class="mj-card-body">
                    <ul class="nav mj-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#custRevenue" role="tab">Revenue</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#custVolume" role="tab">Volume</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#custRefills" role="tab">Refills</a></li>
                    </ul>
                    <div class="tab-content">

                        <div class="tab-pane fade show active" id="custRevenue" role="tabpanel">
                            <div class="mj-table-wrap mj-scroll">
                                <table class="mj-table">
                                    <thead>
                                        <tr><th>Customer</th><th class="mj-right">Total Revenue</th></tr>
                                    </thead>
                                    <tbody>
                                        <?php $rank = 0; foreach ($majik_customer_revenue as $vl) { $rank++; ?>
                                        <tr>
                                            <td><div class="mj-name"><span class="mj-rank <?= $rank <= 3 ? 'is-top' : '' ?>"><?= $rank ?></span><span><?= htmlspecialchars($vl->sub_name) ?></span></div></td>
                                            <td class="mj-right"><?= number_format($vl->total_revenue, 0) ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="custVolume" role="tabpanel">
                            <div class="mj-table-wrap mj-scroll">
                                <table class="mj-table">
                                    <thead>
                                        <tr><th>Customer</th><th class="mj-right">Volume</th></tr>
                                    </thead>
                                    <tbody>
                                        <?php $rank = 0; foreach ($majik_customer_volume as $msv) { $rank++; ?>
                                        <tr>
                                            <td><div class="mj-name"><span class="mj-rank <?= $rank <= 3 ? 'is-top' : '' ?>"><?= $rank ?></span><span><?= htmlspecialchars($msv->sub_name) ?></span></div></td>
                                            <td class="mj-right"><?= number_format($msv->total_volume, 0) ?><span class="mj-unit">L</span></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="custRefills" role="tabpanel">
                            <div class="mj-table-wrap mj-scroll">
                                <table class="mj-table">
                                    <thead>
                                        <tr><th>Customer</th><th class="mj-right">Refills</th></tr>
                                    </thead>
                                    <tbody>
                                        <?php $rank = 0; foreach ($majik_customer_refills as $msre) { $rank++; ?>
                                        <tr>
                                            <td><div class="mj-name"><span class="mj-rank <?= $rank <= 3 ? 'is-top' : '' ?>"><?= $rank ?></span><span><?= htmlspecialchars($msre->sub_name) ?></span></div></td>
                                            <td class="mj-right"><?= number_format($msre->order_count, 0) ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Stores Performance -->
        <div class="col-12 col-lg-6 col-xl-4 mj-col">
            <div class="mj-card">
                <div class="mj-card-head">
                    <h4 class="mj-card-title">Stores Performance <span class="mj-card-sub"><?= date('M Y') ?></span></h4>
                    <div class="mj-stat-chip">
                        <span class="mj-stat-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                        </span>
                        <span>
                            <span class="mj-stat-label">Active</span>
                            <span class="mj-stat-value"><?= number_format($majik_store->majik_store, 0) ?></span>
                        </span>
                    </div>
                </div>
                <div class="mj-card-body">
                    <ul class="nav mj-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#storeRevenue" role="tab">Revenue</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#storeVolume" role="tab">Volume</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#storeRefills" role="tab">Refills</a></li>
                    </ul>
                    <div class="tab-content">

                        <div class="tab-pane fade show active" id="storeRevenue" role="tabpanel">
                            <div class="mj-table-wrap mj-scroll">
                                <table class="mj-table">
                                    <thead>
                                        <tr><th>Store</th><th class="mj-right">Total Revenue</th></tr>
                                    </thead>
                                    <tbody>
                                        <?php $rank = 0; foreach ($majik_store_revenue as $msr) { $rank++; ?>
                                        <tr>
                                            <td><div class="mj-name"><span class="mj-rank <?= $rank <= 3 ? 'is-top' : '' ?>"><?= $rank ?></span><span><?= htmlspecialchars($msr->store_name) ?></span></div></td>
                                            <td class="mj-right"><?= number_format($msr->total_revenue, 0) ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="storeVolume" role="tabpanel">
                            <div class="mj-table-wrap mj-scroll">
                                <table class="mj-table">
                                    <thead>
                                        <tr><th>Store</th><th class="mj-right">Volume</th></tr>
                                    </thead>
                                    <tbody>
                                        <?php $rank = 0; foreach ($majik_store_volume as $msv) { $rank++; ?>
                                        <tr>
                                            <td><div class="mj-name"><span class="mj-rank <?= $rank <= 3 ? 'is-top' : '' ?>"><?= $rank ?></span><span><?= htmlspecialchars($msv->store_name) ?></span></div></td>
                                            <td class="mj-right"><?= number_format($msv->total_volume, 0) ?><span class="mj-unit">L</span></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="storeRefills" role="tabpanel">
                            <div class="mj-table-wrap mj-scroll">
                                <table class="mj-table">
                                    <thead>
                                        <tr><th>Store</th><th class="mj-right">Refills</th></tr>
                                    </thead>
                                    <tbody>
                                        <?php $rank = 0; foreach ($majik_store_refills as $msre) { $rank++; ?>
                                        <tr>
                                            <td><div class="mj-name"><span class="mj-rank <?= $rank <= 3 ? 'is-top' : '' ?>"><?= $rank ?></span><span><?= htmlspecialchars($msre->point_name) ?></span></div></td>
                                            <td class="mj-right"><?= number_format($msre->sub_count, 0) ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
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
</div>

<script src="<?= base_url('assets/js/vendors.js') ?>"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    if (typeof ApexCharts !== 'undefined') {
        initRevenueGraph();
        initRefillGraph();
    }
});

var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

// 1200000 -> 1.2M, 1500 -> 1.5K
function shortNumber(value) {
    var abs = Math.abs(value);
    if (abs >= 1000000) return (value / 1000000).toFixed(abs >= 10000000 ? 0 : 1).replace('.0', '') + 'M';
    if (abs >= 1000) return (value / 1000).toFixed(abs >= 10000 ? 0 : 1).replace('.0', '') + 'K';
    return Math.round(value);
}

function initRevenueGraph() {
    var revenuegraph = document.querySelector('#revenuegraph');
    if (!revenuegraph) return;

    var monthData = [<?= implode(',', array_map(function($a) { return (float) $a->total_amount; }, $amount)) ?>];
    while (monthData.length < months.length) {
        monthData.push(0);
    }

    new ApexCharts(revenuegraph, {
        chart: { height: 300, type: 'bar', toolbar: { show: false }, fontFamily: 'inherit' },
        colors: ['#0779BC'],
        plotOptions: { bar: { columnWidth: '45%', borderRadius: 4 } },
        dataLabels: { enabled: false },
        series: [{ name: 'Revenue', data: monthData }],
        grid: { borderColor: '#e8ecf3', strokeDashArray: 4 },
        xaxis: {
            categories: months,
            axisBorder: { show: false },
            axisTicks: { show: false },
            labels: { style: { colors: '#8392a5' } }
        },
        yaxis: {
            min: 0,
            forceNiceScale: true,
            labels: { style: { colors: '#8392a5' }, formatter: shortNumber }
        },
        tooltip: { y: { formatter: function (val) { return Number(val).toLocaleString(); } } }
    }).render();
}

function initRefillGraph() {
    var refillgraph = document.querySelector('#refillgraph');
    if (!refillgraph) return;

    var refillData = [<?= implode(',', array_map(function($r) { return (float) $r->sub_count; }, $refill)) ?>];
    while (refillData.length < months.length) {
        refillData.push(0);
    }

    new ApexCharts(refillgraph, {
        chart: { height: 300, type: 'bar', toolbar: { show: false }, fontFamily: 'inherit' },
        colors: ['#7DC243'],
        plotOptions: { bar: { columnWidth: '45%', borderRadius: 4 } },
        dataLabels: { enabled: false },
        series: [{ name: 'Refills', data: refillData }],
        grid: { borderColor: '#e8ecf3', strokeDashArray: 4 },
        xaxis: {
            categories: months,
            axisBorder: { show: false },
            axisTicks: { show: false },
            labels: { style: { colors: '#8392a5' } }
        },
        yaxis: {
            min: 0,
            forceNiceScale: true,
            labels: { style: { colors: '#8392a5' }, formatter: shortNumber }
        },
        tooltip: { y: { formatter: function (val) { return Number(val).toLocaleString(); } } }
    }).render();
}
</script>
