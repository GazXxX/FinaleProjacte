<div class="x_panel">
    <div class="x_title">
    <h2><button type="button" class="add btn btn-primary"><i class="fa fa-plus-square"></i> Tambah Data </button></h2>
<div class="clearfix"></div>
</div>
<table class="table table-striped table-responsive" id="datatables">
<thead>
    <tr>
        <th>Nomor</th>
        <th>Kode Produk</th>
        <th>Nama Produk</th>
        <th>Jumlah Produk</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    <?php $no=1;
    foreach($datatables->result() as $row){
        echo "<tr>";
        echo "<td>".$no."</td>";
        echo "<td>".$row->kode_produk."</td>";
        echo "<td>".$row->nama_produk."</td>";
        echo "<td>".$row->qty_produk."</td>";
        echo "<td>
            <button type='button' class='btn btn-primary btn-xs' onclick=edit('".$row->id_produk."') ><i class='fa fa-edit'></i></button>
            <button type='button' class='btn btn-warning btn-xs' onclick=del('".$row->id_produk."') ><i class='fa fa-trash'></i></button>
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
                url :"<?php echo site_url();?>/produk/addProduk",
                type:"post",
                data:$("#form").serialize(),
                success:function(){
                    $('#addModal').modal('hide');
                    // $('#addModal').on('hidden', function(){
                    //     $('#addModal2').modal('show')
                    // })
                    //location.reload();
                    $('#addModal2').modal('show')
                    
                }
            })
        });
        $('#saveEdit').click(function(){
            $.ajax({
                url :"<?php echo site_url();?>/produk/newProduk",
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
    $.getJSON('<?php echo site_url();?>/produk/editProduk/'+id,
        function( response ) {
            $("#editModal").modal('show');
            $("#nnama").val(response['nama_produk']);
            $("#nkode").val(response['kode_produk']);
            $("#nqty").val(response['qty_produk']);
            $("#oid").val(response['id_produk']);
        }
    );
    }
    function del(id){
    if(confirm('Yakin menghapus data ?')){
        $.ajax({
                url :"<?php echo site_url();?>/produk/deleteProduk/"+id,
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
                        <input type="text" class="form-control" id="kode" name="kode" placeholder="kode produk" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3 col-sm-3 col-xs-12">Nama Produk</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="nama produk" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3 col-sm-3 col-xs-12">Jumlah</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="number" class="form-control" id="qty" name="qty" placeholder="qty produk" />
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

<!-- modal 2 -->
<div class="modal fade bs-example-modal-lg" id="addModal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width:500px;">
        <div class="modal-content">
 
            <div class="modal-header" style="background:#343a40;">
                <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
            </div>
            <div class="modal-body">
            <form class="form-horizontal form-label-left" id="form" name="form">
                    <div class="form-group">
                      <label class="control-label col-sm-3 col-sm-3 col-xs-12">Tanggal Pembelian</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="tanggal pembelian" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3 col-sm-3 col-xs-12">Nota Pembelian</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" id="nota" name="nota" placeholder="nota pembelian" />
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
                        <input type="hidden" class="form-control" id="oid" name="oid" />
                        <input type="text" class="form-control" id="nkode" name="nkode" placeholder="kode produk" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3 col-sm-3 col-xs-12">Nama Produk</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" id="nnama" name="nnama" placeholder="nama produk" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3 col-sm-3 col-xs-12">Jumlah</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="number" class="form-control" id="nqty" name="nqty" placeholder="qty produk" />
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