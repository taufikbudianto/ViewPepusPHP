$(document).ready(function() {
	var testing = false;
	$(document).on('click', '.test', function (x) {
		x.preventDefault();
		var id =$('#nama').val();
		$.ajax({
			url : "http://localhost:8080/perpustakaan/GetData/getDatabyid.php?id="+id,
			type : "get",
			dataType : 'json',
			success : function(data) {
				if(data==""){
					alert("gagal");
					testing = false;
				}else{
					alert("succes")
					testing = true;
                    $('form').attr('action', 'http://localhost:8080/perpustakaan/addNewAnggota.php');
                    $('form').submit();
				}
				
			}
		});
		 return testing;
	})
	
})