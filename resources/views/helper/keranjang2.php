<script>
	var lastnum; var newnum;
	var angka; 
	var hasil1 = document.getElementById('jmlpesan');
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

</script>