<div class="x_panel">
    <div class="x_title">
    <h2><button type="button" class="add btn btn-primary"><i class="fa fa-plus-square"></i> Tambah Data </button></h2>
<div class="clearfix"></div>
</div>
<table class="table table-striped table-responsive" id="datatables">
<thead>
    <tr>
        <th>Nomor</th>
        <th>Supplier</th>
        <th>Tanggal Pembelian</th>
        <th>Nota Pembelian</th>
        <th>Status Pembelian</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    <?php $no=1;
    foreach($datatables->result() as $row){
        echo "<tr>";
        echo "<td>".$no."</td>";
        echo "<td>".$row->supplier_id."</td>";
        echo "<td>".$row->tanggal_pembelian."</td>";
        echo "<td>".$row->nota_pembelian."</td>";
        echo "<td>".$row->status_pembelian."</td>";
        echo "<td>
            <button type='button' class='btn btn-primary btn-xs' onclick=edit('".$row->id_pembelian."') ><i class='fa fa-edit'></i></button>
            <button type='button' class='btn btn-warning btn-xs' onclick=del('".$row->id_pembelian."') ><i class='fa fa-trash'></i></button>
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
                url :"<?php echo site_url();?>/pembelian/addPembelian",
                type:"post",
                data:$("#form").serialize(),
                success:function(){
                    $('#addModal').modal('hide');
                    $('#addModal').on('hidden', function(){
                        $('#addModal2').modal('show')
                    })
                    //location.reload();
                }
            })
        });
        $('#saveEdit').click(function(){
            $.ajax({
                url :"<?php echo site_url();?>/pembelian/newPembelian",
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
            $("#ntanggal").val(response['tanggal_pembelian']);
            $("#nnota").val(response['nota_pembelian']);
            $("#nstatus").val(response['status_pembelian']);
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
                    <div class="form-group">
                      <label class="control-label col-sm-3 col-sm-3 col-xs-12">Status Pembelian</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" id="status" name="status" placeholder="status pembelian" />
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
                      <label class="control-label col-sm-3 col-sm-3 col-xs-12">Tanggal Pembelian</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="hidden" class="form-control" id="oid" name="oid" />
                        <input size="16" type="text" value="" readonly class="form_datetime" id="ntanggal" name="ntanggal" placeholder="Tanggal Pembelian" />
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
                        <input type="text" class="form-control" id="nstatus" name="nstatus" placeholder="status pembelian" />
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
    $(".form_datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii'});
</script> 