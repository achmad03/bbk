<script>
	var lastnum; var newnum;
	var angka; 
	var hasil1 = document.getElementById('jmlpesan');
	var persediaan = document.getElementById('persediaan1');
	var total=document.getElementById('jmlpesan').value*{{$data1->harga_jual}};
	document.getElementById('totalbayar').innerHTML =formatRupiah(total, 'Rp. ')+',00';
	document.getElementById("btnadd").addEventListener("click", tambah);
	document.getElementById("btnmin").addEventListener("click", kurang);
	var no=1;document.getElementById('btnmin').disabled=true;

	function hanyaAngka(evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
		{			
			return false;
		}else{
			return true;
		}
	}

	function formatRupiah(angka, prefix){
			var number_string = angka.toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}

	function ganti(){
		no=document.getElementById('jmlpesan').value;
		no1=document.getElementById('persediaan1').value;
		if(no==0){
			no=1;
			hasil1.value=no;
		}else if(no>=no1-1){
			no=persediaan.value;
			hasil1.value=no;
		}
		var total=document.getElementById('jmlpesan').value*{{$data1->harga_jual}};
		document.getElementById('totalbayar').innerHTML =formatRupiah(total, 'Rp. ')+',00';
		tes();
	}

	function tes(){
		if(no==1){
			document.getElementById('btnmin').disabled=true;
			document.getElementById('btnadd').disabled=false;
		}else if(no==persediaan.value){
			document.getElementById('btnmin').disabled=false;
			document.getElementById('btnadd').disabled=true;
		}else if(no>1&&no<persediaan.value){
			document.getElementById('btnmin').disabled=false;
			document.getElementById('btnadd').disabled=false;
		}
	}
    

	function radio(name){
		var select=document.getElementById(name).value;
		if(select.checked==true){
			select.checked==false;
		}
	}


	function tambah(){
		if(no<persediaan.value){
			no++;
			hasil1.value=no;
			var total=document.getElementById('jmlpesan').value*{{$data1->harga_jual}};
			document.getElementById('totalbayar').innerHTML =formatRupiah(total, 'Rp. ')+',00';
			document.getElementById('btnadd').disabled=false;
		}
		tes();
	}
	function kurang(){
		if(hasil1.value>1){
			no--;
			hasil1.value=no;
			var total=document.getElementById('jmlpesan').value*{{$data1->harga_jual}};
			document.getElementById('totalbayar').innerHTML =formatRupiah(total, 'Rp. ')+',00';
			document.getElementById('btnmin').disabled=false;
		}
		tes();
	}
</script>