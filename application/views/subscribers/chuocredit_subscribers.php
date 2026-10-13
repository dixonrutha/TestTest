<style>
    #table_td{
        padding: 5px 5px;
    }
</style>
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h6 class="mg-b-0"><strong>ChuoCredit Subscribers</strong> <span class="badge badge-info"><?= count($subscribers) ?></span></h6>
    </div>
    <div class="card-body">
        <div id="txtHint">
            <table id="sub-table" class="table-bordered table-striped" style="border-collapse: collapse">
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
                            <td id="table_td"><?= date('d-M-Y H:i', strtotime($s->sub_registration_date)) ?></td>
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
