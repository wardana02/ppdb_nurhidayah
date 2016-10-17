<div class="row">
    <div class="col-md-12">
        <h1 class="page-head-line">MANAGEMENT ADMIN</h1>
        <h1 class="page-subhead-line">Menambahkan, mengubah, dan menghapus Administrator. </h1> 
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="pull-right" style="margin-top: -70px;">
            <a href="#admin_input" data-toggle="modal" data-target="#admin_input" class="btn btn-default">Tambah Admin</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-condensed table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>No. HP</th>
                        <th>Username</th>
                        <th>Terakhir Login</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $no=1;
                foreach($admin as $d)
                {
                    echo "<tr>
                            <td>".$no."</td>
                            <td>".$d->namalengkap."</td>
                            <td>".$d->email."</td>
                            <td>".$d->nohp."</td>
                            <td>".$d->username."</td>
                            <td>".$d->lastlogin."</td>
                            <td>Edit</td>
                            <td>Blokir</td>
                          </tr>";
                    $no++;
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- MODAL form input -->
<?php 
echo Tb::modal(array(
    'id' => 'admin_input',
    'header' => 'Admin Form',
    'body' => $this->load->view('admin/add_admin', array(), true),
    )); 
?>

<script type="text/javascript">
    $(document).ready(function(){
        $('#btnSimpan').click(function(){
            var namalengkap = $('#namalengkap').val();
            var email = $('#email').val();
            var nohp = $('#nohp').val();
            var username = $('#username').val();
            var password = ('#password').val();
            var password2 = $('#password2').val();
            
            $.ajax({
                type : "POST",
                url : "<?php echo base_url() ?>admin/simpan_admin",
                beforeSend : function(){
                    $('.table').html('Loading....');
                },
                data = "namalengkap="+namalengkap+"&email="+email+"&nohp="+nohp+"&username="+username+"&password="+password+"&password2="+password2,
                success : function(html){
                    $('#admin_input').hide();
                }
            });
        });
    });
</script>