$(document).ready(function() {
	var codigo		= document.getElementById('tableCodigo').className;	
	var urlDominio	= 'https://www.cerouno.me/mayordomo_api/public/v1/default/400';
	
	$('#tableLoad').DataTable({
		processing	: true,
		destroy		: true,
		searching	: true,
		paging		: true,
		lengthChange: true,
		info		: true,
		language	: {
            lengthMenu: "Mostrar _MENU_ registros por pagina",
            zeroRecords: "Nothing found - sorry",
            info: "Mostrando pagina _PAGE_ de _PAGES_",
            infoEmpty: "No hay registros disponibles.",
			infoFiltered: "(Filtrado de _MAX_ registros totales)",
			sZeroRecords: "No se encontraron resultados",
			sSearch: "buscar",
			oPaginate: {
				sFirst:    "Primero",
				sLast:     "Último",
				sNext:     "Siguiente",
				sPrevious: "Anterior"
			},
        },
		ajax		: {
			type				: 'GET',
			cache				: false,
			crossDomain			: true,
			crossOrigin			: true,
			contentType			: 'application/json; charset=utf-8',
			dataType			: 'json',
			url				: urlDominio,
			dataSrc				: 'data'
		},
		columnDefs	: [
			{ targets			: [0],	visible : false,searchable : false,	orderData : [0, 0] },
			{ targets			: [1],	visible : true,	searchable : true,	orderData : [1, 0] },
			{ targets			: [2],	visible : true,	searchable : true,	orderData : [2, 0] },
			{ targets			: [3],	visible : true,	searchable : true,	orderData : [3, 0] },
			{ targets			: [4],	visible : true,	searchable : true,	orderData : [4, 0] },
			{ targets			: [5],	visible : true,	searchable : true,	orderData : [5, 0] },
			{ targets			: [6],	visible : false,searchable : false,	orderData : [6, 0] },
			{ targets			: [7],	visible : true,	searchable : true,	orderData : [7, 0] },
			{ targets			: [8],	visible : false,searchable : false,	orderData : [8, 0] },
			{ targets			: [9],	visible : false,searchable : false,	orderData : [9, 0] },
			{ targets			: [10],	visible : false,searchable : false,	orderData : [10, 0] },
			{ targets			: [11],	visible : false,searchable : false,	orderData : [11, 0] },
			{ targets			: [12],	visible : false,searchable : false,	orderData : [12, 0] },
			{ targets			: [13],	visible : true,	searchable : true,	orderData : [13, 0] }
		],
		columns		: [
			{ data				: 'persona_codigo', name : 'persona_codigo'},
			{ data				: 'tipo_estado_nombre', name : 'tipo_estado_nombre'},
			{ data				: 'tipo_persona_nombre', name : 'tipo_persona_nombre'},
			{ data				: 'tipo_documento_nombre', name : 'tipo_documento_nombre'},
			{ data				: 'persona_documento', name : 'persona_documento'},
			{ data				: 'persona_completo', name : 'persona_completo'},
			{ data				: 'persona_telefono', name : 'persona_telefono'},
			{ data				: 'persona_email', name : 'persona_email'},
			{ data				: 'persona_observacion', name : 'persona_observacion'},
			{ data				: 'persona_empresa_nombre', name : 'persona_empresa_nombre'},
			{ data				: 'persona_usuario', name : 'persona_usuario'},
			{ data				: 'persona_fecha_hora', name : 'persona_fecha_hora'},
			{ data				: 'persona_ip', name : 'persona_ip'},
			{ render			: function (data, type, full, meta) {return '<a href="../public/persona_crud.php?mode=R&codigo=' + full.persona_codigo + '" role="button" class="btn btn-primary" title="Ver"><i class="ti-eye"></i>&nbsp;</a>&nbsp;<a href="../public/persona_crud.php?mode=U&codigo=' + full.persona_codigo + '" role="button" class="btn btn-success" title="Editar"><i class="ti-pencil"></i>&nbsp;</a></a>&nbsp;<a href="../public/persona_crud.php?mode=D&codigo=' + full.persona_codigo + '" role="button" class="btn btn-danger" title="Eliminar"><i class="ti-trash"></i>&nbsp;</a>';}},
		]
	});
});