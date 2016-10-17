<div class="row">
    <div class="col-md-12">
        <h1 class="page-head-line">REPLY SMS</h1>
        <h1 class="page-subhead-line">Membalas SMS masuk. </h1>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    FORM SMS Reply
                </div>
                <div class="panel-body">
                    <form role="form">
                        <div class="form-group">
                            <label>Tujuan</label>
                            <?php echo form_dropdown('tujuan', $tujuan, $this->input->post('tujuan'), 'class=form-control') ?>
                        </div>
                        <div class="form-group">
                            <label>Pesan yang akan dikirim</label>
                            <textarea class="form-control" style="height: 200px;"></textarea>
                        </div>    
                        <button type="submit" class="btn btn-info">Send Message </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>