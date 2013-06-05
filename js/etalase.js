function pilihKategoriTambahIklan(_url){
	var select_kategori = $("#select_kategori_tambah_iklan").val();

	console.log("pilih ini" + select_kategori);

	$.ajax({
	  url: _url+"index.php/api/getSubKategori/"+select_kategori,
	  cache: false
	}).done(function(msg) {
	  

	  var obj = eval("(function(){return " +msg+ ";})()");
	  var count = obj.length;
	  var result = "<option value=>Pilih sub kategori</option>";

	  for (i=0;i<count;i++) {
	  	result = result+"<option value='"+obj[i].id+"'>"+obj[i].nama+"</option>";
	  }
	  console.log(result);
	  $("#select_subkategori_tambah_iklan").html(result);
	  // console.log(obj[1].id);
	  // console.log(obj[2].nama);

	});
}

function pilihProvinsiTambahIklan(_url){
	var select_kategori = $("#select_provinsi_tambah_iklan").val();

	console.log("pilih ini" + select_kategori);

	$.ajax({
	  url: _url+"index.php/api/getKota/"+select_kategori,
	  cache: false
	}).done(function(msg) {
	  

	  var obj = eval("(function(){return " +msg+ ";})()");
	  var count = obj.length;
	  var result = "<option value=>Pilih kota</option>";

	  for (i=0;i<count;i++) {
	  	result = result+"<option value='"+obj[i].id+"'>"+obj[i].nama+"</option>";
	  }
	  console.log(result);
	  $("#select_kota_tambah_iklan").html(result);
	  // console.log(obj[1].id);
	  // console.log(obj[2].nama);

	});
}