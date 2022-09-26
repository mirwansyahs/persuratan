<div class="card">
    <div class="card-header">
        <h3 class="card-title">Ubah <?=@$headerTitle?></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form id="form1" method="POST" action="<?=base_url()?>admin/suratkeluar/editProccess/<?=$id?>" enctype="multipart/form-data">
            <div class="row">
            <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputjudul_surat">Judul <span class="text-sm text-danger">*</span></label>
                        <input type="text" id="inputjudul_surat" class="form-control form-control-sm" name="judul_surat" required value="<?=$data->judul_surat?>">
                    </div>
                    <div class="form-group">
                        <label for="inputTanggal">Tanggal Surat <span class="text-sm text-danger">*</span></label>
                        <input type="date" id="inputTanggal" class="form-control form-control-sm" name="tanggal_surat" required autocomplete="off" value="<?=$data->tanggal_surat?>">
                    </div>
                    <div class="form-group">
                        <label for="inputberkas">Berkas <small>(<a href="<?=base_url()?>"><span class="fa fa-check text-success"> <?=$data->file_surat?></span></a>)</small></label>
                        <input type="file" id="inputberkas" class="form-control form-control-sm" name="file_surat" autocomplete="off">
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 text-left">
                            <button type="button" onclick="javascript:{window.history.back()}" class="btn btn-danger">
                                <i class="fas fa-chevron-left"></i> Kembali
                            </button>
                        </div>
                        
                        <div class="col-md-6 text-right">
                            <button type="submit" class="btn btn-info" id="btnSubmit">
                                <i class="far fa-save"></i> Simpan
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                </div>
            </div>
        </form>
    </div>
</div>

<?=$this->session->flashdata('msg')?>

<!-- InputMask -->
<script src="<?=base_url()?>assets/plugins/moment/moment.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=base_url()?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?=base_url()?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});

//Date picker
$('#inputDOB').datetimepicker({
    format: 'L'
});

$('#btnSubmit').click(function()
{
    // add();
});

function add()
{
    $.ajax({
        url     : '<?=base_url()?>admin/suratkeluar/addProccess',
        type    : 'POST',
        data    : $('#form1').serialize(),
        success : function(response)
        {
            response = JSON.parse(response);
            if (response.succ)
            {
                swal.fire("Yeayyyy!", response.msg, "success");
                $('#form1').clear();
            }
            else
            {
                swal.fire("Oooppsss!", response.msg, "error");
            }
        },
        error   : function(err)
        {
            swal.fire("Oooppsss!", "Anda tidak terhubung ke server.", "error");
        }
    });
}
</script>