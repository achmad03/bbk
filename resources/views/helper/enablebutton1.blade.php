<script>
    var hasil1 = document.getElementById('jmlpesan');
	var totals={{$total}};
	var no=1;
    var cop=0;
function valcheck(id){
    if(document.getElementsByClassName('indexhasilternak')[id].checked==true){
        cop++;
        document.getElementById('btnbayar').disabled = false;
    }else if(document.getElementsByClassName('indexhasilternak')[id].checked==false){
        cop--;
    }if(cop==0){
        document.getElementById('btnbayar').disabled = true;
    }
}

	// vanilla javascript


    function tambah(id){
		hasil1=document.getElementById('jmlpesan'+id).value;
		if(hasil1<100){
			no=hasil1;
			no++;
			document.getElementById('jmlpesan'+id).value=no;
			var dum=document.getElementById('hargajual'+id).value;
			totals=totals+parseInt(dum);
			hitung(id);	
		}
		tes(id);
	}

	function kurang(id){
		hasil1=document.getElementById('jmlpesan'+id).value;
		if(hasil1>1){
			no=hasil1;
			no--;
			document.getElementById('jmlpesan'+id).value=no;
			var dum=document.getElementById('hargajual'+id).value;
			totals=totals-parseInt(dum);
			hitung(id);		
		}
		tes(id);
	}

	function hitung(id){
			var total=document.getElementById('jmlpesan'+id).value*document.getElementById('hargajual'+id).value;
			document.getElementById('totalbayar'+id).innerHTML = formatRupiah(total, 'Rp. ') +",00";			
			document.getElementById('totalbayar').innerHTML = "Total Bayar : "+ formatRupiah(totals, 'Rp. ') +",00";
	}

	function ganti(id){
		no=document.getElementById('jmlpesan'+id).value;
		no1=document.getElementById('persediaan1'+id).value;
		if(no==0){
			no=1;
			document.getElementById('jmlpesan'+id).value=no;
		}else if(no-1>=no1-1){
			no=no1;
			document.getElementById('jmlpesan'+id).value=no;
		}
		var dum=document.getElementById('hargajual'+id).value;
		totals=document.getElementById('jmlpesan'+id).value*parseInt(dum);
		hitung(id);
		tes(id);
	}


	function tes(id){
	var persediaan = document.getElementById('persediaan1'+id);
		if(no==1){
			document.getElementById('btnmin'+id).disabled=true;
			document.getElementById('btnadd'+id).disabled=false;
		}else if(no==persediaan.value){
			document.getElementById('btnmin'+id).disabled=false;
			document.getElementById('btnadd'+id).disabled=true;
		}else if(no>1&&no<persediaan.value){
			document.getElementById('btnmin'+id).disabled=false;
			document.getElementById('btnadd'+id).disabled=false;
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


</script>