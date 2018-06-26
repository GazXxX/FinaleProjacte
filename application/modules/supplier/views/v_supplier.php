<div class="x_panel">
    <div class="x_title">
    <h2><button type="button" class="add btn btn-primary"><i class="fa fa-plus-square"></i> Tambah Data </button></h2>
<div class="clearfix"></div>
</div>
<table class="table table-hover table-responsive" id="datatables">
<thead>
    <tr>
        <th>Nomor</th>
        <th>Nama Supplier</th>
        <th>Kontak Supplier</th>
        <th>Alamat</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    <?php $no=1;
    foreach($datatables->result() as $row){
        echo "<tr>";
        echo "<td>".$no."</td>";
        echo "<td>".$row->nama_supplier."</td>";
        echo "<td>".$row->kontak_supplier."</td>";
        echo "<td>".$row->alamat."</td>";
        echo "<td>
            <button type='button' class='btn btn-success btn-xs' onclick=edit('".$row->id_supplier."') ><i class='fa fa-edit'></i></button>
            <button type='button' class='btn btn-danger btn-xs' onclick=del('".$row->id_supplier."') ><i class='fa fa-trash'></i></button>
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
                url :"<?php echo site_url();?>/supplier/addSupplier",
                type:"post",
                data:$("#form").serialize(),
                success:function(){
                    $('#addModal').modal('hide');
                    location.reload();
                }
            })
        });
        $('#saveEdit').click(function(){
            $.ajax({
                url :"<?php echo site_url();?>/supplier/newSupplier",
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
    $.getJSON('<?php echo site_url();?>/supplier/editSupplier/'+id,
        function( response ) {
            $("#editModal").modal('show');
            $("#nnama").val(response['nama_supplier']);
            $("#nkontak").val(response['kontak_supplier']);
            $("#nalamat").val(response['alamat']);
            $("#oid").val(response['id_supplier']);
        }
    );
    }
    function del(id){
    if(confirm('Yakin menghapus data ?')){
        $.ajax({
                url :"<?php echo site_url();?>/supplier/deleteSupplier/"+id,
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
                      <label class="control-label col-sm-3 col-sm-3 col-xs-12">Nama Supplier</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="nama supplier" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3 col-sm-3 col-xs-12">Kontak</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="number" class="form-control" id="kontak" name="kontak" placeholder="nomer hp" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3 col-sm-3 col-xs-12">Alamat</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="textarea" class="form-control" id="alamat" name="alamat" placeholder="alamat" />
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
                      <label class="control-label col-sm-3 col-sm-3 col-xs-12">Nama Supplier</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="hidden" class="form-control" id="oid" name="oid" />
                        <input type="text" class="form-control" id="nnama" name="nnama" placeholder="nama supplier" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3 col-sm-3 col-xs-12">Kontak</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="number" class="form-control" id="nkontak" name="nkontak" placeholder="nomer hp" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3 col-sm-3 col-xs-12">Alamat</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="textarea" class="form-control" id="nalamat" name="nalamat" placeholder="alamat" />
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