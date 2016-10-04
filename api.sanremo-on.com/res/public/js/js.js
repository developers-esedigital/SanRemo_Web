$('input[name="nacimiento"]').daterangepicker({
	singleDatePicker: true,
	showDropdowns: true,
	format: 'YYYY-MM-DD'
});

var substringMatcher = function(strs) {
	return function findMatches(q, cb) {
		var matches, substringRegex;

		// an array that will be populated with substring matches
		matches = [];

		// regex used to determine if a string contains the substring `q`
		substrRegex = new RegExp(q, 'i');

		// iterate through the pool of strings and for any string that
		// contains the substring `q`, add it to the `matches` array
		$.each(strs, function(i, str) {
			if (substrRegex.test(str)) {
				matches.push(str);
			}
		});

		cb(matches);
	};
};

function generate(layout, msg, type) {
	var n = noty({
		text: msg,
		type: type,
		// dismissQueue: true,
		timeout: '2000',
		layout: 'top',
		theme: 'defaultTheme'
	});
	console.log('html: ' + n.options.id);
}
$('#login-form').on('submit', function(evt) {
	evt.preventDefault();
	$.post($(this).attr('action'), $(this).serialize(), function(data, textStatus, xhr) {
		if (data.code == 500)
			generate('top', data.msg, 'alert');
		else {
			// console.log(data.url);
			window.location = data.url;
		}
	});
	return false;
})
// $('[data-ajax]').on('change', function() {
// 	$.post('getUserByEmail', {
// 		email: $(this).val()
// 	}, function(data, textStatus, xhr) {
// 		if (data) {
// 			$('.profile-img').attr('src', base_url + 'public/uploads/' + data.foto);
// 		}
// 	});
// });
$.getJSON("getNacionalidades", function(nacionalidades) {
	$('input[name="nacionalidad"]').typeahead({
		hint: true,
		highlight: true,
		minLength: 1
	}, {
		name: 'nacionalidades',
		source: substringMatcher(nacionalidades)
	});
});
$('input[name="repassword"]').on('change', function() {
	if ($('input[name="password"]').val() != $('input[name="repassword"]').val()) {
		generate('top', 'El password no coincide', 'alert');
		$('input[name="repassword"]').focus();
		$('input[name="repassword"]').val('');

	}
});
$('#register input[name="email"]').on('change', function() {
	var elem = $(this);
	$.ajax({
			url: 'getUserByEmail',
			type: 'POST',
			dataType: 'json',
			data: {
				email: elem.val()
			},
			async: true
		})
		.done(function(data, textStatus, xhr) {
			if (data) {
				generate('top', 'Existe un usuario con el email: '+elem.val(), 'alert');
				elem.val('');
				setTimeout(elem.focus(),0);
			}
		});
});
$('#register').on('submit', function(evt) {
	evt.preventDefault();
	if ($('input[name="password"]').val() != $('input[name="repassword"]').val()) {
		generate('top', 'El password no coincide', 'alert');
		$('input[name="repassword"]').val('');
		$.ajax({
				url: 'getUserByEmail',
				type: 'POST',
				dataType: 'json',
				data: {
					email: $(this).val()
				},
				async: true
			})
			.done(function(data, textStatus, xhr) {
				console.log(data);
				if (data) {
					generate('top', 'Existe un usuario con ese email', 'alert');
					return false;
				}
			});
		return false;
	}
	var postData = new FormData();
	var files = $('input[name="foto"]').prop('files')[0];
	postData.append('image', files);

	$('input[type="email"],input[type="text"],input[type="password"],input[type="hidden"]').each(function(index, el) {
		postData.append(el.name, el.value.trim());
	});

	$.ajax({
		url: $('#register').attr('action'),
		type: "POST",
		data: postData,
		processData: false,
		contentType: false,
		success: function(data, textStatus, jqXHR) {
			console.log(data);
			if (typeof(data) == 'object') {
				if (data.code == 200) {
					window.location = data.url;
				} else {
					generate('top', data.msg, 'alert');
				}
			} else {
				generate('top', 'Ya hay un usuario registrado con ese email, por favor agregue otro o solicite un nuevo password con el administrador.', 'alert');
			}
		},
		error: function(jqXHR, textStatus, errorThrown) {
			generate('top', 'Error al procesar intente más tarde', 'alert');
			//if fails     
		}
	});
	/*$.post(,{contenttype:false, processdata:false,data : data}, function(data, textStatus, xhr) {
		console.log(data);
	});*/
	return false;
})
$('input[name="foto"]').fileinput({
	showUpload: false,
	browseClass: "btn btn-primary",
	language: 'es',
	allowedFileExtensions: ['jpg', 'png', 'gif'],
	previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
});
