<script>
	var lastnum; var newnum;
	var angka; 
	var hasil1 = document.getElementById('jmlpesan');
	document.getElementById("btnadd").addEventListener("click", tambah);
	document.getElementById("btnmin").addEventListener("click", kurang);
	var no=1;

	function hanyaAngka(evt, limitNum) {
		var charCode = (evt.which) ? evt.which : event.keyCode
		if ((charCode > 31 && (charCode < 48 || charCode > 57))||(evt.value.length > limitNum))
		{			
			return false;
		}else{
			return true;
		}
	}

    function limitText(limitField, limitNum) {
        if (limitField.value.length > limitNum) {
            limitField.value = limitField.value.substring(0, limitNum);
        }
    }

	function radio(name){
		var select=document.getElementById(name).value;
		if(select.checked==true){
			select.checked==false;
		}
	}


	function tambah(){
		if(hasil1.value<100){
			no++;
			hasil1.value=no;
			var total=document.getElementById('jmlpesan').value*{{$ps->harga_jual}};
			document.getElementById('totalbayar').innerHTML = "Total Bayar | Rp."+ total +",-";
		}
	}
	function kurang(){
		if(hasil1.value>1){
			no--;
			hasil1.value=no;
			var total=document.getElementById('jmlpesan').value*{{$ps->harga_jual}};
			document.getElementById('totalbayar').innerHTML = "Total Bayar | Rp."+ total +",-";
		}
	}
</script>