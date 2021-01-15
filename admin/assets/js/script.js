// Custom file input
// $("#input-repl-1").fileinput({
// uploadUrl: "/file-upload-batch/2",
// autoReplace: true,
// maxFileCount: 1,
// allowedFileExtensions: ["jpg", "png", "gif"]
// });
$(document).ready(function () {
	// Var Data
	let inputFile = $('#inputGroupFile04');
	var fileName = inputFile.data("filename");
	console.dir(inputFile);

	// If filename exist
	inputFile.next('.custom-file-label').html(fileName);

	inputFile.on('change', function () {
		//get the file name
		var fileName = $(this).val();
		// Remove fakepath
		var cleanFileName = fileName.replace('C:\\fakepath\\', " ");
		//replace the "Choose a file" label
		$(this).next('.custom-file-label').html(cleanFileName);
	});
	$('#inputGroupFile04').change(function () {
		var input = this;
		var url = $(this).val();
		var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
		if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#img').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		} else {
			$('#img').attr('src', '/assets/no_preview.png');
		}
	});

	// let number = Array.from(document.querySelectorAll('.inputPrice'));
	// let numberCount = number.map(item => item.id);
	// console.log(numberCount);

	$('#selCategory').change(function () {
		let idOld = $(this).val();
		let id = parseInt(idOld);
		// console.log(id);
		$.ajax({
			url: "http://www.tokuonline.com/admin/product/getCategorySub",
			type: "POST",
			data: {
				id: id
			},
			async: true,
			dataType: 'json',
			success: function (data) {
				console.log(data);
				// id_category = Object.keys(data);
				// city_name = Object.values(data);
				// console.log(data);

				let html = '';
				let i;
				for (i = 0; i < data.length; i++) {
					html += "<option value='" + data[i]['id_sub'] + "'>" + data[i]['name'] + "</option>";
				}
				// // html += '<option value=' + data[99] + '-' + data[99] + '>' + data[99] + '</option>';
				$('#selCategorySub').html(html);

				// for (i = 0; i < data.length; i++) {
				//     console.log(data[i]['city_id']);
			}



			// }
		});

		return false;
	});
});
// var input = document.getElementById('priceInput');
// input.addEventListener('keyup', function (e) {
// 	var number_string = bilangan.replace(/[^,\d]/g, '').toString(),
// 		split = number_string.split(','),
// 		sisa = split[0].length % 3,
// 		rupiah = split[0].substr(0, sisa),
// 		ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);

// 	if (ribuan) {
// 		separator = sisa ? '.' : '';
// 		rupiah += separator + ribuan.join('.');
// 	}

// 	rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
// 	return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
// });

// function inputNumber(type, wh) {
// 	let input = document.getElementById('priceInput' + type + wh);
// 	console.log(input);
// }
