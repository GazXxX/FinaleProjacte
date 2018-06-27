<div class="x_panel">
    <div class="x_title">
    <h2><button type="button" class="add btn btn-primary"><i class="fa fa-plus-square"></i> Tambah Data </button></h2>
<div class="clearfix"></div>
</div>
<table class="table table-hover table-responsive" id="datatables">
<thead>
    <tr>
        <th>Nomor</th>
        <th>Kode Produk</th>
        <th>Tanggal Penjualan</th>
        <th>Harga</th>
        <th>Keterangan</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    <?php $no=1;
    foreach($datatables->result() as $row){
        echo "<tr>";
        echo "<td>".$no."</td>";
        echo "<td>".$row->kode_produk." </td>";
        echo "<td>".$row->tanggal_penjualan."</td>";
        echo "<td>".$row->harga_penjualan."</td>";
        echo "<td>".$row->keterangan."</td>";
        echo "<td>
            <button type='button' class='btn btn-success btn-xs' onclick=edit('".$row->id_penjualan."') ><i class='fa fa-edit'></i></button>
            <button type='button' class='btn btn-danger btn-xs' onclick=del('".$row->id_penjualan."') ><i class='fa fa-trash'></i></button>
            </td>";
        echo "</tr>";
       
    $no++;} ?>
</tbody>
</table>
</div>
 
<style type="text/css">@import url("<?php echo base_url() . 'js/datatables/jquery.dataTables.min.css'; ?>");</style>
<script type='text/javascript' src="<?php echo base_url(); ?>js/datatables/jquery.dataTables.min.js"></script>
<script type='text/javascript' src="<?php echo base_url(); ?>js/datatables/dataTables.bootstrap.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#datatables').dataTable();
        $('.add').click(function(){
            $('#addModal').modal('show');
            $('#form')[0].reset();
        });
        $('#save').click(function(){
            $.ajax({
                url :"<?php echo site_url();?>penjualan/addPenjualan",
                type:"post",
                data:$("#form").serialize(),
                success:function(){
                    $('#addModal').modal('hide');
                    location.reload();
                },
                error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
        }
            })
        });
        $('#saveEdit').click(function(){
            $.ajax({
                url :"<?php echo site_url();?>/penjualan/newPenjualan",
                type:"post",
                data:$("#form2").serialize(),
                success:function(){
                    $('#editModal').modal('hide');
                    location.reload();
                }
            })
        });
    });
   function edit(id){
    $.getJSON('<?php echo site_url();?>/penjualan/editPenjualan/'+id,
        function( response ) {
            $("#editModal").modal('show');
            $("#nproduk_id").val(response['produk_id']);
            $("#ntanggal").val(response['tanggal_penjualan']);
            $("#nharga").val(response['harga_penjualan']);
            $("#nketerangan").val(response['keterangan']);
            $("#oid").val(response['id_penjualan']);
        }
    );
    }
    function del(id){
    if(confirm('Yakin menghapus data ?')){
        $.ajax({
                url :"<?php echo site_url();?>/penjualan/deletePenjualan/"+id,
                type:"post",
                success:function(){
                    location.reload();
                }
            })
        }
    }
</script>
<div class="modal fade bs-example-modal-lg" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width:500px;">
        <div class="modal-content">
 
            <div class="modal-header" style="background:#343a40;">
                <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
            </div>
            <div class="modal-body">
            <form class="form-horizontal form-label-left" id="form" name="form">
                   <div class="form-group">
                      <label class="control-label col-sm-3 col-sm-3 col-xs-12">Kode Produk</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <select name="produk_id" id="produk_id">
                        <option id="produk_id" value="none" selected="selected">---------Pilih Produk---------</option>
                        <?php foreach($products as $p):?>
                        <option value="<?php echo $p['id_produk'] ?>"><?php echo $p['nama_produk']?></option>
                        <?php endforeach;?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3 col-sm-3 col-xs-12">Tanggal Penjualan</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="tanggal penjualan" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3 col-sm-3 col-xs-12">Harga Penjualan</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" id="harga" name="harga" placeholder="harga penjualan" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3 col-sm-3 col-xs-12">Keterangan</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="keterangan" />
                      </div>
                    </div>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="save">Simpan</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-lg" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width:500px;">
        <div class="modal-content">
 
            <div class="modal-header" style="background:#343a40;">
                <h4 class="modal-title" id="myModalLabel">Edit Data</h4>
            </div>
            <div class="modal-body">
            <form class="form-horizontal form-label-left" id="form2" name="form2">
                   <div class="form-group">
                      <label class="control-label col-sm-3 col-sm-3 col-xs-12">Kode Produk</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <select name="nproduk_id" id="nproduk_id">
                        <option id="nproduk_id" value="" selected="selected">---------Pilih Produk---------</option>
                        <?php foreach($products as $p):?>
                        <option value="<?php echo $p['id_produk'] ?>"><?php echo $p['nama_produk']?></option>
                        <?php endforeach;?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3 col-sm-3 col-xs-12">Tanggal Penjualan</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="hidden" class="form-control" id="oid" name="oid" />
                        <input type="date" class="form-control" id="ntanggal" name="ntanggal" placeholder="tanggal penjualan" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3 col-sm-3 col-xs-12">Harga Penjualan</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" id="nharga" name="nharga" placeholder="harga penjualan" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3 col-sm-3 col-xs-12">Keterangan</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" id="nketerangan" name="nketerangan" placeholder="keterangan" />
                      </div>
                    </div>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="saveEdit">Simpan</button>
            </div>
        </div>
    </div>
</div>