<!doctype html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

</head>
<body>
    <div class="container" style="margin-top:5%">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah Data Nilai
                    </button>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">Nama</th>
                                    <th rowspan="2">Email</th>
                                    <th colspan="4">Nilai</th>
                                    <th rowspan="2">Action</th>
                                </tr>
                                <tr>
                                    <th>X</th>
                                    <th>Y</th>
                                    <th>Z</th>
                                    <th>W</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>                
            </div>
        </div>
        <div class="row" id="body-laporan">
            
        </div>
    </div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
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
					<input type="text" class="form-control" id="nama" name="nama" value="" placeholder="masukan Nama">
				</div>
            </div>
            <div class="mb-3 row">
			    <label class="col-sm-12 col-form-label">Email</label>
				<div class="col-sm-12">
					<input type="email" class="form-control" id="email" name="email" value="" placeholder="masukan Email">
				</div>
            </div>
            <div class="mb-3 row">
			    <label class="col-sm-12 col-form-label">Nilai X</label>
				<div class="col-sm-12">
					<select class="form-control" id="nilai_x" name="nilai_x">
                        <option readonly>-- Pilih Nilai --</option>
                        <?php 
                            for ($i=1; $i < 34; $i++) { ?>
                               <option value="<?=$i?>"><?=$i?></option>
                        <?php }
                        ?>
                    </select>
				</div>
            </div>
            <div class="mb-3 row">
			    <label class="col-sm-12 col-form-label">Nilai Y</label>
				<div class="col-sm-12">
                    <select class="form-control" id="nilai_y" name="nilai_y">
                        <option readonly>-- Pilih Nilai --</option>
                        <?php 
                            for ($i=1; $i < 24; $i++) { ?>
                               <option value="<?=$i?>"><?=$i?></option>
                        <?php }
                        ?>
                    </select>
				</div>
            </div>
            <div class="mb-3 row">
			    <label class="col-sm-12 col-form-label">Nilai Z</label>
				<div class="col-sm-12">
                    <select class="form-control" id="nilai_z" name="nilai_z">
                        <option readonly>-- Pilih Nilai --</option>
                        <?php 
                            for ($i=1; $i < 19; $i++) { ?>
                               <option value="<?=$i?>"><?=$i?></option>
                        <?php }
                        ?>
                    </select>
				</div>
            </div>
            <div class="mb-3 row">
			    <label class="col-sm-12 col-form-label">Nilai W</label>
				<div class="col-sm-12">
                    <select class="form-control" id="nilai_w" name="nilai_w">
                        <option readonly>-- Pilih Nilai --</option>
                        <?php 
                            for ($i=1; $i < 14; $i++) { ?>
                               <option value="<?=$i?>"><?=$i?></option>
                        <?php }
                        ?>
                    </select>
				</div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button id="tambahphproses" type="button" class="btn btn-primary btn-filter"><i id="loading"></i>
			Simpan
		</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="modaledit" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content" id="body-edit"></div>
	</div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable({
            responsive: true,
            processing: true,
            serverSide: false,
            ajax: {
                url: '{{ route('data.nilai') }}',
                type: 'post',
				data: { "_token": "{{ csrf_token() }}" }
            },
            columns: [
                {data: 'DT_RowIndex', width: '5%', orderable: true, searchable: true},
                {data: 'nama', orderable: true, searchable: true},
                {data: 'email', orderable: true, searchable: true},
                {data: 'nilai_x', orderable: true, searchable: true},
                {data: 'nilai_y', orderable: true, searchable: true},
                {data: 'nilai_z', orderable: true, searchable: true},
                {data: 'nilai_w', orderable: true, searchable: true},
                {data: 'action'},
            ],
        });
    } );
    </script>
<script>
        $('#tambahphproses').on('click',function(){
            $('#loading').addClass('fa fa-spinner fa-spin fa-fw');
            axios({
            method: "post",
            url: "{{ route('nilai.tambah') }}",
            data: {
                nama: $('#nama').val(),
                email: $('#email').val(),
                nilai_x: $('#nilai_x').val(),
                nilai_y: $('#nilai_y').val(),
                nilai_z: $('#nilai_z').val(),
                nilai_w: $('#nilai_w').val(),
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
    $('#myTable tbody').on('click', '.hapus', function () {
            let id = this.id;
            Swal.fire({
              title: 'Anda Yakin ingin menghapus data ini?',
              text: "Data tidak bisa dikembalikan !",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
              if (result.isConfirmed) {
                Swal.fire("Silahkan Tungu ....")
			    Swal.showLoading()
                $.ajax({
                  url: '{{ route('nilai.hapus') }}',
                  type: 'post',
                  data: {
					id:id,
					_token: "{{ csrf_token() }}"
				},
                  dataType: 'json',
                  success: function(data){
                    Swal.fire({
                        text: data.message,
                        icon: data.status,
                        buttonsStyling: !1,
                        confirmButtonText: "Ok!",
                        customClass:{
                           confirmButton: "btn btn-light"
                        }
                    }).then((result) => {
						if (result.isConfirmed) {
							location.reload();
						}
					})
                  }
                });
              }
            })
        })
</script>
<script>
    $(document).ready(function(){
        function getEdit(id) {
         $('#body-edit').html('<div class="card"><h2 style="text-align: center;">Loading...</h2></div>');
			var url = `{{ url('/nilai-update') }}/${id}`;
            $.get(url, function(data) {
                $('#body-edit').html(data);
            });
        }
		$('#myTable tbody').on('click', '.edit', function () {
            var id = this.id;
            getEdit(id)
        })

    });
    $(document).ready(function(){
        $('#myTable tbody').on('click', '.lihatlaporan', function () {
            var id = this.id;
            getLaporan(id)
        })
        function getLaporan(id) {
         $('#body-laporan').html('<div class="card"  style="margin-top:2%" ><h2 style="text-align: center;">Loading...</h2></div>');
			var url = `{{ url('/laporan-nilai') }}/${id}`;
            $.get(url, function(data) {
                $('#body-laporan').html(data);
            });
        }
    });
</script>
</html>