<script>
	var lastnum; var newnum;
	var angka; 
	var hasil1 = document.getElementById('persediaan');
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
		}
	}
	function kurang(){
		if(hasil1.value>1){
			no--;
			hasil1.value=no;
		}
	}

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
        //alert(e.target.result);
      document.getElementById("imghide").style.display = "none";
      document.getElementById("dumfoto").style.display = "block";
      $('#dumfoto').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#foto").change(function() {
  readURL(this);
});

$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

</script>