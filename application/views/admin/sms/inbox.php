<div class="row">
    <div class="col-md-12">
        <h1 class="page-head-line">SMS INBOX</h1>
        <!-- <h1 class="page-subhead-line">Menampilkan semua SMS masuk. </h1> -->
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered table-condensed table-striped table-hover">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>SMS</th>
                        <th>Bls</th>
                        <th>Del</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no=1 + $this->uri->segment(3);
                    foreach ($inbox as $r)
                    {
                        echo "<tr>
                                <td>".$no."</td>
                                <td>".$r['sms']."</td>
                                <td>".anchor("management/sms_reply/".$r['sender'],img(base_url().'assets/images/reply.png'))."</td>
                                <td>".anchor("management/del_sms_inbox/".$r['id'],img(base_url().'assets/images/delete.png'),array('onclick'=>'return confirm(\'Yakin akan menghapus SMS ini?\')'))."</td>
                            </tr>";
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
           <div class="pull-right" style="margin-top: -25px;"><?php echo $page; ?></div>
        </div>
    </div>
</div>