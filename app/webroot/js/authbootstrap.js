$(document).ready(function(){
	var timeajax = 0;
	$('#DocumentoOutOutorganteSearch').keyup(function(){
		text = $(this).val();
		clearTimeout(timeajax);
		if (text.length > 3) {	
			timeajax = setTimeout(ajaxsearch, 2000, text);
		}	
	});
	
	var ajaxsearch = function(text) {
		$('#DocumentoOutOutorganteSearch').attr('disabled','disabled');
		$('#DocumentoOutOutorganteId option').remove();
		$.ajax({
			dataType: 'json',
			url: '/sys/Documentos/ajaxSacado/'+text,
			success: function(data) {
				$.each(data, function(index, value) {
					$('#DocumentoOutOutorganteId').append('<option value="'+index+'">'+value+'</option>')
				});
				$('#DocumentoOutOutorganteSearch').removeAttr('disabled');
			}
		});
	}
		
	//console.log('jQuery Ready...');
	form_auto = $('.form-autosubmit');
	form_auto.submit();
	
	$('.btn-popover').popover({
		'html':true,
		'placement':'left',
		'content': $('.filter-panel').html(),
		'title':'Filtros'
	}).tooltip({
		'placement':'top',
	});
		
	// Configura Escolha do Projeto
	$('#EscolhaProjetoId').change(function(){
		$(this).parent().submit();
	});
	
	// Teclas de Atalho
	
	/*
	$(document).on('keypress', null, 'c', function(){
		location.href = '/caritas/chamadas/add'	
	}
	);
	*/
	
	// Fix para erros de formulario
	$('.form-control').parent('.error').each(function() {
		$(this).addClass('has-error');
	});
});


