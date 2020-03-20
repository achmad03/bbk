@if($id1=='tambah')
	<form id="frmFoto" method="POST" action="/produk/foto" enctype="multipart/form-data">
@else
	<form id="frmFoto" method="POST" action="/produk/rincian/{{$id1}}/{{$id2}}" enctype="multipart/form-data">
@endif
    {{ csrf_field() }}
    <div id="myModal2" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<h6 class="modal-title">Ganti Foto</h6>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!-- body modal -->
				<div class="modal-body">
					<p>Pilih File Foto</p>
				</div>
				<!-- footer modal -->
				<div class="modal-footer">
                    <?php echo cl_image_upload_tag('image_id'); ?>
					<button type="button" class="btn btn-success btn-sm" data-dismiss="modal" onclick="this.form.submit();">Proses Selanjutnya</button>
				</div>
			</div>
		</div>
    </div>
</form>