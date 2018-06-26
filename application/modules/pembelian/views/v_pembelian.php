<div class="x_panel">
    <div class="x_title">
    <h2><button type="button" class="add btn btn-primary"><i class="fa fa-plus-square"></i> Tambah Data </button></h2>
<div class="clearfix"></div>
</div>
<table class="table table-hover table-responsive" id="datatables">
<thead>
    <tr>
        <th>Nomor</th>
        <th>Supplier</th>
        <th>Produk</th>
        <th>Tanggal Pembelian</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>nota</th>
        <th>Status Pembelian</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    <?php $no=1;
    foreach($datatables->result() as $row){
        echo "<tr>";
        echo "<td>".$no."</td>";
        echo "<td>".$row->nama_supplier."</td>";
        echo "<td>".$row->kode_produk."</td>";
        echo "<td>".$row->tanggal_pembelian."</td>";
        echo "<td>".$row->harga_pembelian."</td>";
        echo "<td>".$row->qty_pembelian."</td>";
        echo "<td>".$row->nota_pembelian."</td>";
        echo "<td>".$row->status_pembelian."</td>";
        echo "<td>
            <button type='button' class='btn btn-success btn-xs' onclick=edit('".$row->id_pembelian."') ><i class='fa fa-edit'></i></button>
            <button type='button' class='btn btn-danger btn-xs' onclick=del('".$row->id_pembelian."') ><i class='fa fa-trash'></i></button>
            </td>";
        echo "</tr>";
       
    $no++;} ?>
</tbody>
</table>
</div>
<style type="text/css">@import url("<?php echo base_url() . 'js/datatables/bootstrap-datetimepicker.min.css'; ?>");</style> 
<style type="text/css">@import url("<?php echo base_url() . 'js/datatables/jquery.dataTables.min.css'; ?>");</style>
<script type='text/javascript' src="<?php echo base_url(); ?>js/datatables/jquery.dataTables.min.js"></script>
<script type='text/javascript' src="<?php echo base_url(); ?>js/datatables/dataTables.bootstrap.js"></script>
<script type='text/javascript' src="<?php echo base_url(); ?>js/datatables/bootstrap-datetimepicker.min.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#datatables').dataTable();
        $('.add').click(function(){
            $('#addModal').modal('show');
            $('#form')[0].reset();
        });
        $('#save').click(function(){
            $.ajax({
                url :"<?php echo site_url();?>pembelian/addPembelian",
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
                url :"<?php echo site_url();?>pembelian/newPembelian",
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
    $.getJSON('<?php echo site_url();?>/pembelian/editPembelian/'+id,
        function( response ) {
            $("#editModal").modal('show');
            $("#nsupplier_id").val(response['supplier_id']);
            $("#nproduk_id").val(response['produk_id']);
            $("#ntanggal").val(response['tanggal_pembelian']);
            $("#nnota").val(response['nota_pembelian']);
            $("#nstatus").val(response['status_pembelian']);
            $("#nharga").val(response['harga_pembelian']);
            $("#njumlah").val(response['jumlah_pembelian']);
            $("#nqty").val(response['qty_pembelian']);         
            $("#oid").val(response['id_pembelian']);
        }
    );
    }
    function del(id){
    if(confirm('Yakin menghapus data ?')){
        $.ajax({
                url :"<?php echo site_url();?>/pembelian/deletePembelian/"+id,
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
                      <label class="control-label col-sm-3 col-sm-3 col-xs-12">Kode Supplier</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <select name="supplier_id" id="supplier_id">
                            <option id="supplier_id" value="none" selected="selected">---------Pilih Supplier--------</option>
                            <?php foreach($suppliers as $s):?>
                            <option value="<?php echo $s['id_supplier'] ?>"><?php echo $s['nama_supplier']?></option>
                            <?php endforeach;?>
                        </select>
                      </div>
                    </div>
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
                      <label class="control-label col-sm-3 col-sm-3 col-xs-12">Tanggal</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="date" class="form-control has_datetime" id="tanggal" name="tanggal" placeholder="yyyy-mm-dd" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3 col-sm-3 col-xs-12">Harga</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" id="harga" name="harga" placeholder="harga pembelian" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3 col-sm-3 col-xs-12">Jumlah</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="number" class="form-control" id="qty" name="qty" placeholder="jumlah pembelian" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3 col-sm-3 col-xs-12">Nota</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" id="nota" name="nota" placeholder="nota pembelian" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3 col-sm-3 col-xs-12">Status</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                       <select id="status" name="status"> 
                           <option id="status" value="Lunas">Lunas</option>
                           <option id="status" value="Hutang">Hutang</option>
                       </select>
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
            <form class="form-horizontal form-label-left" id="form" name="form">
                    <div class="form-group">
                      <label class="control-label col-sm-3 col-sm-3 col-xs-12">Kode Supplier</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <select name="supplier_id" id="supplier_id">
                            <option id="nsupplier_id" value="none" selected="selected">---------Pilih Supplier--------</option>
                            <?php foreach($suppliers as $s):?>
                            <option value="<?php echo $s['id_supplier'] ?>"><?php echo $s['nama_supplier']?></option>
                            <?php endforeach;?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3 col-sm-3 col-xs-12">Kode Produk</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <select name="produk_id" id="produk_id">
                        <option id="nproduk_id" value="" selected="selected">---------Pilih Produk---------</option>
                        <?php foreach($products as $p):?>
                        <option value="<?php echo $p['id_produk'] ?>"><?php echo $p['nama_produk']?></option>
                        <?php endforeach;?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3 col-sm-3 col-xs-12">Tanggal Pembelian</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="date" class="form-control has_datetime" id="ntanggal" name="ntanggal" placeholder="tanggal pembelian" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3 col-sm-3 col-xs-12">Harga Pembelian</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" id="nharga" name="nharga" placeholder="harga pembelian" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3 col-sm-3 col-xs-12">Jumlah Pembelian</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="number" class="form-control" id="nqty" name="nqty" placeholder="jumlah pembelian" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3 col-sm-3 col-xs-12">Nota Pembelian</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" id="nnota" name="nnota" placeholder="nota pembelian" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3 col-sm-3 col-xs-12">Status Pembelian</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                       <select id="nstatus" name="nstatus"> 
                           <option id="status" value="Lunas">Lunas</option>
                           <option id="status" value="Hutang">Hutang</option>
                       </select>
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
<script type="text/javascript">
    $(".has_datetime").datetimepicker({format: 'YYYY-MM-DD'});
</script> 