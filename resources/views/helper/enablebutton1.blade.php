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
			var total=document.getElementById('jmlpesan'+id).value*document.getElementById('hargajual'+id).value;
			document.getElementById('totalbayar'+id).innerHTML = "Rp."+ total +",-";
			var dum=document.getElementById('hargajual'+id).value;
			totals=totals+parseInt(dum);
			document.getElementById('totalbayar').innerHTML = "Total Bayar : Rp."+ totals +",-";
		}
	}
	function kurang(id){
		hasil1=document.getElementById('jmlpesan'+id).value;
		if(hasil1>1){
			no=hasil1;
			no--;
			hasil1.value=no;
			document.getElementById('jmlpesan'+id).value=no;
			var total=document.getElementById('jmlpesan'+id).value*document.getElementById('hargajual'+id).value;
			document.getElementById('totalbayar'+id).innerHTML = "Rp."+ total +",-";
			var hasil=(totals-document.getElementById('hargajual'+id).value);
			var dum=document.getElementById('hargajual'+id).value;
			totals=totals-parseInt(dum);
			document.getElementById('totalbayar').innerHTML = "Total Bayar : Rp."+ totals +",-";
		}
	}


</script>