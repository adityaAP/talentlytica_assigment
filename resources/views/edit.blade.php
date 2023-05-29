<div class="modal-header">
<h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Nilai Baru</h5>
<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form>
    <div class="mb-3 row">
        <label class="col-sm-12 col-form-label">Nama</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="namae" name="namae" value="<?=$n != '' ? $n->nama : ''; ?>" placeholder="masukan Nama">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-12 col-form-label">Email</label>
        <div class="col-sm-12">
            <input type="email" class="form-control" id="emaile" name="emaile" value="<?=$n != '' ? $n->email : ''; ?>" placeholder="masukan Email">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-12 col-form-label">Nilai X</label>
        <div class="col-sm-12">
            <select class="form-control" id="nilai_xe" name="nilai_xe">
                <option readonly>-- Pilih Nilai --</option>
                <?php 
                    for ($i=1; $i < 34; $i++) { ?>
                       <option <?=$n != '' && $n->nilai_x == $i ? 'selected' : ''; ?> value="<?=$i?>"><?=$i?></option>
                <?php }
                ?>
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-12 col-form-label">Nilai Y</label>
        <div class="col-sm-12">
            <select class="form-control" id="nilai_ye" name="nilai_ye">
                <option readonly>-- Pilih Nilai --</option>
                <?php 
                    for ($i=1; $i < 24; $i++) { ?>
                       <option <?=$n != '' && $n->nilai_y == $i ? 'selected' : ''; ?> value="<?=$i?>"><?=$i?></option>
                <?php }
                ?>
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-12 col-form-label">Nilai Z</label>
        <div class="col-sm-12">
            <select class="form-control" id="nilai_ze" name="nilai_ze">
                <option readonly>-- Pilih Nilai --</option>
                <?php 
                    for ($i=1; $i < 19; $i++) { ?>
                       <option <?=$n != '' && $n->nilai_z == $i ? 'selected' : ''; ?> value="<?=$i?>"><?=$i?></option>
                <?php }
                ?>
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-12 col-form-label">Nilai W</label>
        <div class="col-sm-12">
            <select class="form-control" id="nilai_we" name="nilai_we">
                <option readonly>-- Pilih Nilai --</option>
                <?php 
                    for ($i=1; $i < 14; $i++) { ?>
                       <option <?=$n != '' && $n->nilai_w == $i ? 'selected' : ''; ?> value="<?=$i?>"><?=$i?></option>
                <?php }
                ?>
            </select>
        </div>
    </div>
</form>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<button id="editproses" type="button" class="btn btn-primary btn-filter"><i id="loading"></i>
    Simpan
</button>
</div>
<script>
        $('#editproses').on('click',function(){
            $('#loading').addClass('fa fa-spinner fa-spin fa-fw');
            axios({
            method: "post",
            url: "{{ route('nilai.update.proses') }}",
            data: {
                id: '{{ $n->id }}',
                nama: $('#namae').val(),
                email: $('#emaile').val(),
                nilai_x: $('#nilai_xe').val(),
                nilai_y: $('#nilai_ye').val(),
                nilai_z: $('#nilai_ze').val(),
                nilai_w: $('#nilai_we').val(),
            },
            headers: { "Content-Type": "multipart/form-data" },
            })
            .then(function (response) {
                $('#loading').removeClass('fa fa-spinner fa-spin fa-fw');
                Swal.fire({
                    icon: 'success',
                    title:response.data.message
                }).then(() => {
                    location.reload();
                })		
            })
            .catch(function (response) {
                $('#loading').removeClass('fa fa-spinner fa-spin fa-fw');
                Swal.fire({
                    icon: 'error',
                    title:'Gagal Tambah Nilai Baru'
                })		
            });
    });
</script>