
function atualizaCoordenadas(){
	url = "https://maps.googleapis.com/maps/api/geocode/json?key="+ google_maps_api_key +"&address=" 
				 + $('#endereco').val() 
			+', '+ $('#bairro').val() 
			+', '+ $('#numero').val() 
			+', '+ $('#cidade').val() 
			+', '+ $('#estado').val();
	jQuery.ajax({
		type: "GET",
		url: url,
		success: function(data){
			if( data.results[0].geometry.location.lat )
				$('#latitude').val( data.results[0].geometry.location.lat );
			if( data.results[0].geometry.location.lng )
				$('#longitude').val( data.results[0].geometry.location.lng );
		}
	});
}

$(document).on('blur', '#cep', function() { 
	var cep = $(this).val().replace(/\D/g, '');
	if( cep ){
	$("#endereco").attr("disabled", true);
	$("#bairro").attr("disabled", true);
	$("#cidade").attr("disabled", true);
	$("#estado").attr("disabled", true);
	jQuery.ajax({
		type: "GET",
		url: "https://viacep.com.br/ws/"+ cep +"/json/",
		success: function( dados ){
			if( dados.logradouro )
				$("#endereco").val(dados.logradouro);
			if( dados.bairro )
				$("#bairro").val(dados.bairro);
			if( dados.uf )
				$("#estado").val(dados.uf);
			if( dados.localidade )
				$("#cidade").val(dados.localidade);

			atualizaCoordenadas();
		},
		complete: function(){
			$("#endereco").removeAttr("disabled");
			$("#bairro").removeAttr("disabled");
			$("#cidade").removeAttr("disabled");
			$("#estado").removeAttr("disabled");
		}
	});
	}
});

$(document).ready(function(){
	$("#cep").blur(function(){
		setTimeout(function(){
			atualizaCoordenadas();
		}, 1000);
	});
	$('#endereco').blur(function(){
		atualizaCoordenadas();
	});
	$('#bairro').blur(function(){
		atualizaCoordenadas();
	});
	$('#cidade').change(function(){
		atualizaCoordenadas();
	});
	$('#estado').change(function(){
		atualizaCoordenadas();
	});
});