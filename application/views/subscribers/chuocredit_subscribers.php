<?php
// ---------- Dashboard figures (computed from $subscribers) ----------
$today = date('Y-m-d');
$month = date('Y-m');
$total = count($subscribers);
$today_count = 0;
$month_count = 0;
$total_fees = 0;
$female = 0;
$male = 0;
$campus_counts = [];

// Registrations per day for the last 14 days (oldest first)
$daily = [];
for ($d = 13; $d >= 0; $d--) {
    $daily[date('Y-m-d', strtotime("-$d days"))] = 0;
}

foreach ($subscribers as $s) {
    $reg_day = date('Y-m-d', strtotime($s->sub_registration_date));
    if ($reg_day === $today) {
        $today_count++;
    }
    if (substr($reg_day, 0, 7) === $month) {
        $month_count++;
    }
    if (isset($daily[$reg_day])) {
        $daily[$reg_day]++;
    }
    $total_fees += (float)$s->sub_fee_amount;
    if ($s->gender === 'F') {
        $female++;
    } else {
        $male++;
    }
    $campus = !empty($s->campus_name) ? $s->campus_name : $s->campus_code;
    $campus_counts[$campus] = ($campus_counts[$campus] ?? 0) + 1;
}
arsort($campus_counts);
$daily_max = max(1, max($daily));
$female_pct = $total > 0 ? round($female * 100 / $total) : 0;
$male_pct = $total > 0 ? 100 - $female_pct : 0;
?>
<style>
    #table_td{
        padding: 5px 5px;
    }
    .cc-tile{
        border: 1px solid #e3e7ed;
        border-radius: 6px;
        padding: 14px 16px;
        background: #fff;
        height: 100%;
    }
    .cc-tile-label{
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: .5px;
        color: #8392a5;
        margin-bottom: 6px;
    }
    .cc-tile-value{
        font-size: 26px;
        font-weight: 600;
        color: #1c273c;
        line-height: 1.1;
    }
    .cc-tile-sub{
        font-size: 12px;
        color: #8392a5;
        margin-top: 4px;
    }
    .cc-chart{
        display: flex;
        align-items: flex-end;
        gap: 6px;
        height: 140px;
        padding-top: 18px;
        border-bottom: 1px solid #e3e7ed;
    }
    .cc-bar-col{
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-end;
        height: 100%;
        position: relative;
    }
    .cc-bar{
        width: 100%;
        max-width: 26px;
        background: #0168fa;
        border-radius: 4px 4px 0 0;
        min-height: 2px;
    }
    .cc-bar-col:hover .cc-bar{
        background: #0148ae;
    }
    .cc-bar-val{
        font-size: 10px;
        color: #596882;
        margin-bottom: 2px;
    }
    .cc-axis{
        display: flex;
        gap: 6px;
        margin-top: 4px;
    }
    .cc-axis span{
        flex: 1;
        text-align: center;
        font-size: 10px;
        color: #8392a5;
    }
    .cc-split{
        display: flex;
        height: 10px;
        border-radius: 5px;
        overflow: hidden;
        background: #e3e7ed;
        gap: 2px;
    }
    .cc-split div{
        height: 100%;
    }
    .cc-row{
        display: flex;
        justify-content: space-between;
        font-size: 13px;
        padding: 6px 0;
        border-bottom: 1px solid #f0f2f7;
    }
    .cc-row:last-child{
        border-bottom: 0;
    }
</style>

<!-- ================= DASHBOARD ================= -->
<div class="row mg-b-15">
    <div class="col-6 col-lg-3 mg-b-10">
        <div class="cc-tile">
            <div class="cc-tile-label">Total Registered</div>
            <div class="cc-tile-value"><?= number_format($total) ?></div>
            <div class="cc-tile-sub">All time via ChuoCredit</div>
        </div>
    </div>
    <div class="col-6 col-lg-3 mg-b-10">
        <div class="cc-tile">
            <div class="cc-tile-label">Today</div>
            <div class="cc-tile-value"><?= number_format($today_count) ?></div>
            <div class="cc-tile-sub"><?= date('d M Y') ?></div>
        </div>
    </div>
    <div class="col-6 col-lg-3 mg-b-10">
        <div class="cc-tile">
            <div class="cc-tile-label">This Month</div>
            <div class="cc-tile-value"><?= number_format($month_count) ?></div>
            <div class="cc-tile-sub"><?= date('F Y') ?></div>
        </div>
    </div>
    <div class="col-6 col-lg-3 mg-b-10">
        <div class="cc-tile">
            <div class="cc-tile-label">Fees Collected</div>
            <div class="cc-tile-value"><span style="font-size: 14px; color: #8392a5">TZS</span> <?= number_format($total_fees) ?></div>
            <div class="cc-tile-sub">Registration fees</div>
        </div>
    </div>
</div>

<div class="row mg-b-15">
    <div class="col-lg-8 mg-b-10">
        <div class="cc-tile">
            <div class="cc-tile-label">Registrations – last 14 days</div>
            <div class="cc-chart">
                <?php foreach ($daily as $day => $count) { ?>
                    <div class="cc-bar-col" title="<?= date('d M Y', strtotime($day)) ?>: <?= $count ?> registration<?= $count == 1 ? '' : 's' ?>">
                        <?php if ($count > 0) { ?><div class="cc-bar-val"><?= $count ?></div><?php } ?>
                        <div class="cc-bar" style="height: <?= round($count * 100 / $daily_max) ?>%"></div>
                    </div>
                <?php } ?>
            </div>
            <div class="cc-axis">
                <?php foreach ($daily as $day => $count) { ?>
                    <span><?= date('d', strtotime($day)) ?></span>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="col-lg-4 mg-b-10">
        <div class="cc-tile">
            <div class="cc-tile-label">Gender</div>
            <div class="cc-split mg-b-10" title="Female <?= $female ?> · Male <?= $male ?>">
                <?php if ($female > 0) { ?><div style="width: <?= $female_pct ?>%; background: #0168fa"></div><?php } ?>
                <?php if ($male > 0) { ?><div style="width: <?= $male_pct ?>%; background: #7cb3fd"></div><?php } ?>
            </div>
            <div class="cc-row">
                <span><span style="display:inline-block;width:10px;height:10px;border-radius:2px;background:#0168fa"></span> Female</span>
                <strong><?= $female ?> <span style="color:#8392a5;font-weight:400">(<?= $female_pct ?>%)</span></strong>
            </div>
            <div class="cc-row">
                <span><span style="display:inline-block;width:10px;height:10px;border-radius:2px;background:#7cb3fd"></span> Male</span>
                <strong><?= $male ?> <span style="color:#8392a5;font-weight:400">(<?= $male_pct ?>%)</span></strong>
            </div>

            <div class="cc-tile-label mg-t-15">By Campus</div>
            <?php if (empty($campus_counts)) { ?>
                <div class="cc-tile-sub">No registrations yet</div>
            <?php } ?>
            <?php foreach ($campus_counts as $campus => $count) { ?>
                <div class="cc-row">
                    <span><?= html_escape($campus) ?></span>
                    <strong><?= $count ?></strong>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<!-- ================= TABLE ================= -->
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h6 class="mg-b-0"><strong>ChuoCredit Subscribers</strong> <span class="badge badge-info"><?= $total ?></span></h6>
    </div>
    <div class="card-body">
        <div id="txtHint">
            <table id="sub-table" class="table-bordered table-striped" style="border-collapse: collapse; width: 100%">
                <thead class="thead-dark">
                    <tr>
                        <th style="font-size: 13px">Reg. Code</th>
                        <th style="font-size: 13px">Name</th>
                        <th style="font-size: 13px">Campus</th>
                        <th style="font-size: 13px">Mobile</th>
                        <th style="font-size: 13px">Email</th>
                        <th style="font-size: 13px">Gender</th>
                        <th style="font-size: 13px">Amount</th>
                        <th style="font-size: 13px">Reg. Date</th>
                        <th style="font-size: 13px">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($subscribers as $s) {
                        if ($s->record_stat === 'OPEN') {
                            $stat = '<span class="badge badge-success">Open</span>';
                        } else {
                            $stat = '<span class="badge badge-secondary">' . html_escape($s->record_stat) . '</span>';
                        }
                        ?>
                        <tr>
                            <td id="table_td"><?= html_escape($s->waba_reg_code) ?></td>
                            <td id="table_td"><?= html_escape($s->sub_name) ?></td>
                            <td id="table_td"><?= html_escape(!empty($s->campus_name) ? $s->campus_name : $s->campus_code) ?></td>
                            <td id="table_td"><?= html_escape($s->mobile) ?></td>
                            <td id="table_td"><?= html_escape($s->email) ?></td>
                            <td id="table_td" style="text-align: center"><?= html_escape($s->gender) ?></td>
                            <td id="table_td" style="text-align: right"><?= number_format((float)$s->sub_fee_amount) ?></td>
                            <td id="table_td" data-order="<?= strtotime($s->sub_registration_date) ?>"><?= date('d-M-Y H:i', strtotime($s->sub_registration_date)) ?></td>
                            <td id="table_td" style="text-align: center"><?= $stat ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(function () {
        $('#sub-table').DataTable({
            order: [],
            autoWidth: true,
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: 'Show _MENU_ entries',
            }
        });
    });
</script>
