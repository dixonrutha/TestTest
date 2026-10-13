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
            <div class="cc-tile-value"><?= number_format($stats['total']) ?></div>
            <div class="cc-tile-sub">All time via ChuoCredit</div>
        </div>
    </div>
    <div class="col-6 col-lg-3 mg-b-10">
        <div class="cc-tile">
            <div class="cc-tile-label">Today</div>
            <div class="cc-tile-value"><?= number_format($stats['today']) ?></div>
            <div class="cc-tile-sub"><?= date('d M Y') ?></div>
        </div>
    </div>
    <div class="col-6 col-lg-3 mg-b-10">
        <div class="cc-tile">
            <div class="cc-tile-label">This Month</div>
            <div class="cc-tile-value"><?= number_format($stats['month']) ?></div>
            <div class="cc-tile-sub"><?= date('F Y') ?></div>
        </div>
    </div>
    <div class="col-6 col-lg-3 mg-b-10">
        <div class="cc-tile">
            <div class="cc-tile-label">Fees Collected</div>
            <div class="cc-tile-value"><span style="font-size: 14px; color: #8392a5">TZS</span> <?= number_format($stats['fees']) ?></div>
            <div class="cc-tile-sub">Registration fees</div>
        </div>
    </div>
</div>

<div class="row mg-b-15">
    <div class="col-lg-6 mg-b-10">
        <div class="cc-tile">
            <div class="cc-tile-label">Gender</div>
            <div class="cc-row">
                <span>Female</span>
                <strong><?= $stats['female'] ?> <span style="color:#8392a5;font-weight:400">(<?= $stats['female_pct'] ?>%)</span></strong>
            </div>
            <div class="cc-row">
                <span>Male</span>
                <strong><?= $stats['male'] ?> <span style="color:#8392a5;font-weight:400">(<?= $stats['male_pct'] ?>%)</span></strong>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mg-b-10">
        <div class="cc-tile">
            <div class="cc-tile-label">By Campus</div>
            <?php if (empty($stats['campuses'])) { ?>
                <div class="cc-tile-sub">No registrations yet</div>
            <?php } ?>
            <?php foreach ($stats['campuses'] as $campus => $count) { ?>
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
        <h6 class="mg-b-0"><strong>ChuoCredit Subscribers</strong> <span class="badge badge-info"><?= $stats['total'] ?></span></h6>
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
