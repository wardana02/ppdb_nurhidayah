<div class="row">
    <div class="col-md-12">
        <h1 class="page-head-line">REPLY SMS</h1>
        <!-- <h1 class="page-subhead-line">Membalas SMS masuk. </h1> -->
    </div>
</div>
<div class="row">
    <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    FORM SMS Reply
                </div>
                <div class="panel-body">
                    <form role="form" name="reply" method="POST" action="<?php echo site_url().'management/send_reply' ?>">
                        <div class="form-group">
                            <label>Tujuan</label>
                            <input type="text" class="form-control" name="tujuan" value="<?php echo $this->uri->segment(3) ?>" readonly="true" />
                        </div>
                        <div class="form-group">
                            <label>Pesan yang akan dikirim</label>
                            <textarea class="form-control" name="pesan" style="height: 200px;"></textarea>
                        </div>    
                        <button type="submit" class="btn btn-info">Send Message </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">SMS SEBELUMNYA</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed table-bordered">
                            <tbody>
                                <?php
                                    function waktu($tgl)
                                    {
                                        $x = explode(" ", $tgl);
                                        $y = explode("-", $x[0]);
                                        return $y[2].'-'.$y[1].'-'.$y[0].' '.$x[1];
                                    }
                                    foreach($hinbox as $h)
                                    {
                                        echo "<tr><td>".$h['sms']." <br /><span class='small'>pada: ".waktu($h['waktu'])."</small></td></tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>