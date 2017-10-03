function getValue(ele) {
	// alert(ele.value);
	$.ajax({
		url : "/perpustakaan/GetData/getKota.php?data=kota&provinsi="
				+ ele.value,
		type : "get",
		dataType : 'json',
		success : function(data) {
			var trHTML = '<option value=></option>';
			select = document.getElementById('kota');
			for (var i = 0; i < data.length; i++) {
				trHTML += '<option value=' + data[i].id + '>' + data[i].name
						+ '</option>';
				/*
				 * var opt = document.createElement('option'); opt.value =
				 * data[i].id; opt.innerHTML = data[i].name;
				 * select.appendChild(opt);
				 */
			}
			$('#kota').html(trHTML);
			$('#kecamatan').html('');
			$('#kelurahan').html('');
		}
	})
}

function getValueKota(ele) {
	// alert(ele.value);
	$.ajax({
		url : "/perpustakaan/GetData/getKota.php?data=kecamatan&provinsi="
				+ ele.value,
		type : "get",
		dataType : 'json',
		success : function(data) {
			var trHTML = '<option value=></option>';
			select = document.getElementById('kecamatan');
			for (var i = 0; i < data.length; i++) {
				trHTML += '<option value=' + data[i].id + '>' + data[i].name
						+ '</option>';
				var opt = document.createElement('option');
				opt.value = data[i].id;
				opt.innerHTML = data[i].name;
				// select.appendChild(opt);
			}
			$('#kecamatan').html(trHTML);
			$('#kelurahan').html('');
		}
	})
}
function getValueKelurahan(ele) {

	$.ajax({
		url : "/perpustakaan/GetData/getKota.php?data=kelurahan&provinsi="
				+ ele.value,
		type : "get",
		dataType : 'json',
		success : function(data) {
			select = document.getElementById('kelurahan');
			var trHTML = '<option value=></option>';
			for (var i = 0; i < data.length; i++) {
				trHTML += '<option value=' + data[i].id + '>' + data[i].name
						+ '</option>';
				var opt = document.createElement('option');
				opt.value = data[i].id;
				opt.innerHTML = data[i].name;
			}
			$('#kelurahan').html(trHTML);
		}
	})
}
function saveData() {
	var nama = $('#nama').val();
	var alamat = $('#alamat').val();
	var provinsi = $('#provinsi').val();
	var kota = $('#kota').val();
	var kecamatan = $('#kecamatan').val();
	var kelurahan = $('#kelurahan').val();
	var email = $('#email').val();
	var notelp = $('#notelp').val();
	var dataJson = {'nama':nama,'alamat':alamat,'idprovinsi':provinsi,'idkota':kota,
			'idkecamatan':kecamatan,'idkelurahan':kelurahan,'email':email,'notelp':notelp,
			'header':{'detail':[{'tipeiuran':'3','jumlah':'5000'},
				{'tipeiuran':'2','jumlah':'25000'},{'tipeiuran':'1','jumlah':'50000'}]}};
	$.ajax({
		url : "http://localhost:8081/save/anggota",
		type : "post",
		dataType : 'json',
		contentType: "application/json",
		data :JSON.stringify(dataJson),
		success : function(data) {
		}
	});
	
	alert("sukses");
}
$(document).ready(
		function() {
			$(':input[id="add"]').prop('disabled', true);
			$.ajax({
				url : "/perpustakaan/GetData/getDataIuran.php",
				type : "get",
				dataType : 'json',
				success : function(data) {
					// alert(JSON.stringify(data));
					var arr = [];
					arr[0] = "1 Tahun";
					arr[1] = "3 Bulan";
					arr[2] = "";
					tr = document.getElementById('tableDataBody');
					var trHTML = '';
					for (var i = data.length - 2; i >= 0; i--) {
						trHTML += '<tr><td>' + data[i].jenis + '</td><td>'
								+ arr[i] + '</td><td style="text-align:right">'
								+ data[i].jumlah + '</td></tr>';
					}
					$('#tableDataBody').append(trHTML);
				}

			})
		});
