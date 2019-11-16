$(document).ready(function() {
	var codigo		= document.getElementById('tableCodigo').className;	
	var urlDominio	= 'https://www.cerouno.me/mayordomo_api/public/v1/default/100';
	
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
			{ targets			: [6],	visible : true,	searchable : true,	orderData : [6, 0] },
			{ targets			: [7],	visible : false,searchable : false,	orderData : [7, 0] },
			{ targets			: [8],	visible : false,searchable : false,	orderData : [8, 0] },
			{ targets			: [9],	visible : false,searchable : false,	orderData : [9, 0] },
			{ targets			: [10],	visible : false,searchable : false,	orderData : [10, 0] },
			{ targets			: [11],	visible : false,searchable : false,	orderData : [11, 0] }
		],
		columns		: [
			{ data				: 'pais_codigo', name : 'pais_codigo'},
			{ data				: 'tipo_estado_nombre', name : 'tipo_estado_nombre'},
			{ data				: 'pais_nombre', name : 'pais_nombre'},
			{ data				: 'pais_iso3166_char2', name : 'pais_iso3166_char2'},
			{ data				: 'pais_iso3166_char3', name : 'pais_iso3166_char3'},
			{ data				: 'pais_iso3166_numero', name : 'pais_iso3166_numero'},
			{ data				: 'pais_observacion', name : 'pais_observacion'},
			{ data				: 'pais_empresa_nombre', name : 'pais_empresa_nombre'},
			{ data				: 'pais_usuario', name : 'pais_usuario'},
			{ data				: 'pais_fecha_hora', name : 'pais_fecha_hora'},
			{ data				: 'pais_ip', name : 'pais_ip'},
			{ render			: function (data, type, full, meta) {return '<a href="../public/pais_crud.php?mode=R&codigo=' + full.pais_codigo + '" role="button" class="btn btn-primary" title="Ver"><i class="ti-eye"></i>&nbsp;</a>&nbsp;<a href="../public/pais_crud.php?mode=U&codigo=' + full.pais_codigo + '" role="button" class="btn btn-success"  title="Editar"><i class="ti-pencil"></i>&nbsp;</a></a>&nbsp;<a href="../public/pais_crud.php?mode=D&codigo=' + full.pais_codigo + '" role="button" class="btn btn-danger" title="Eliminar"><i class="ti-trash"></i>&nbsp;</a>';}},
		]
	});
});