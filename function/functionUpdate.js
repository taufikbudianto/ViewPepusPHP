function searchData(){
	var id = $('#kodesearch').val();
	var kecamatan=[];
	var desa=[];
	$.ajax({
		url : "/perpustakaan/GetData/anggotadetail.php?id="+id,
		type : "get",
		dataType : 'json',
		success : function(data) {
			var trHTML = '';
			for (var i = data.length - 2; i >= 0; i--) {
				trHTML += '<tr><td>' + data[i].iuran + '</td><td>'
						+ data[i].createdon + '</td><td>'
						+ data[i].createdon + '</td><td style="text-align:right">'
						+ data[i].jumlah + '</td></tr>';
				//alert(data[i].jumlah);
			}
			$('#bodyTable2').append(trHTML);
		}
	});
	$.ajax({
		url : "/perpustakaan/GetData/getDataById.php?id="+id,
		type : "get",
		dataType : 'json',
		success : function(data) {
			//alert(JSON.stringify(data));
			$('#kodeanggota').val(data.id);
			//nama
			$(':input[id="nama"]').prop('disabled', false);
			$('#nama').val(data.nama);
			//alamat
			$(':input[id="alamat"]').prop('disabled', false);
			$('#alamat').val(data.alamat);
			//provinsi
			$(':input[id="provinsi"]').prop('disabled', false);
			$('#provinsi').val(data.provinsi);
			//kota
			$.ajax({
				url : "/perpustakaan/GetData/getKota.php?data=kota&provinsi="+data.provinsi,
				type : "get",
				dataType : 'json',
				success : function(data2) {
					var trHTML = '<option value='+data.kota+'>'+data.namakota+'</option>';
					for (var i = 0; i < data2.length; i++) {
						trHTML += '<option value=' + data2[i].id + '>' + data2[i].name
								+ '</option>';
						var opt = document.createElement('option');
						opt.value = data2[i].id;
						opt.innerHTML = data2[i].name;
					}
					$('#kota').html(trHTML);
				}
			
			});
			$(':input[id="kota"]').prop('disabled', false);
			$('#kota').val(data.kota);
			//kecamatan
			$(':input[id="kecamatan"]').prop('disabled', false);
			$.ajax({
				url : "/perpustakaan/GetData/getKota.php?data=kecamatan&provinsi="+data.kota,
				type : "get",
				dataType : 'json',
				success : function(data2) {
					var trHTML = '<option value='+data.kecamatan+'>'+data.namakec+'</option>';
					for (var i = 0; i < data2.length; i++) {
						trHTML += '<option value=' + data2[i].id + '>' + data2[i].name
								+ '</option>';
						var opt = document.createElement('option');
						opt.value = data2[i].id;
						opt.innerHTML = data2[i].name;
					}
					$('#kecamatan').html(trHTML);
				}
			
			});
	
			//kelurahan
			$(':input[id="kelurahan"]').prop('disabled', false);
			$.ajax({
				url : "/perpustakaan/GetData/getKota.php?data=kelurahan&provinsi="+data.kecamatan,
				type : "get",
				dataType : 'json',
				success : function(data2) {
					var trHTML = '<option value='+data.kelurahan+'>'+data.namadesa+'</option>';
					for (var i = 0; i < data2.length; i++) {
						trHTML += '<option value=' + data2[i].id + '>' + data2[i].name
								+ '</option>';
						var opt = document.createElement('option');
						opt.value = data2[i].id;
						opt.innerHTML = data2[i].name;
					}
					$('#kelurahan').html(trHTML);
				}
			
			});
			//email
			$(':input[id="email"]').prop('disabled', false);
			$('#email').val(data.email);
			//notelp
			$(':input[id="notelp"]').prop('disabled', false);
			$('#notelp').val(data.notelp);
			//noreg
			$('#noreg').val(data.noreg);
			
			//masaaktif
			$('#masaaktifkartu').val(data.card);
			$('#masaaktifanggota').val(data.anggota);
		}
	})
}
function addTable() {
	alert("test");
}
