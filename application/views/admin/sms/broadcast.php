<div class="row">
    <div class="col-md-12">
        <h1 class="page-head-line">SMS BROADCAST</h1>
        <h1 class="page-subhead-line">Mengirim SMS masal ke pendaftar. </h1>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    FORM SMS BROADCAST
                </div>
                <div class="panel-body">
                    <form role="form" name="broadcast" method="POST" action="<?php echo site_url()."management/send_broadcast"; ?>">
                        <div class="form-group">
                            <label>Tujuan</label>
                            <select class="form-control" name="tujuan">
                                <option value="1">Belum Aktivasi</option>
                                <option value="2">Pendaftar Aktif</option>
                            </select>
                            
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
    </div>
</div>