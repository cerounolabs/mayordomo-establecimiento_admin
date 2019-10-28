$(document).ready(function() {
	var codEstablecimiento	= document.getElementById('tableCodigo').className;	
	var urlEstablecimiento	= 'https://www.cerouno.me/mayordomo_api/public/v1/default/500/'+codEstablecimiento;
	var urlEstCategiria		= 'https://www.cerouno.me/mayordomo_api/public/v1/establecimiento/600/'+codEstablecimiento;
	var urlEstPropietario	= 'https://www.cerouno.me/mayordomo_api/public/v1/establecimiento/600/'+codEstablecimiento;
	
	$('#tableLoad').DataTable({
		processing	: true,
		destroy		: true,
		searching	: false,
		paging		: false,
		lengthChange: true,
		info		: false,
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
			url					: urlEstablecimiento,
			dataSrc				: 'data'
		},
		columnDefs	: [
			{ targets			: [0],	visible : false,searchable : false,	orderData : [0, 0] },
			{ targets			: [1],	visible : true,	searchable : true,	orderData : [1, 0] },
			{ targets			: [2],	visible : false,searchable : false,	orderData : [2, 0] },
			{ targets			: [3],	visible : true,	searchable : true,	orderData : [3, 0] },
			{ targets			: [4],	visible : true,	searchable : true,	orderData : [4, 0] },
			{ targets			: [5],	visible : true,	searchable : true,	orderData : [5, 0] },
			{ targets			: [6],	visible : false,searchable : false,	orderData : [6, 0] },
			{ targets			: [7],	visible : false,searchable : false,	orderData : [7, 0] },
			{ targets			: [8],	visible : false,searchable : false,	orderData : [8, 0] },
			{ targets			: [9],	visible : false,searchable : false,	orderData : [9, 0] },
			{ targets			: [10],	visible : false,searchable : false,	orderData : [10, 0] },
			{ targets			: [11],	visible : false,searchable : false,	orderData : [11, 0] },
		],
		columns		: [
			{ data				: 'establecimiento_codigo', name : 'establecimiento_codigo'},
			{ render			: function (data, type, full, meta) {return '<a href="../public/establecimiento.php" role="button" class="btn btn-primary" title="Ver Detalle"><i class="ti-eye"></i>&nbsp;</a>';}},
			{ data				: 'tipo_estado_nombre', name : 'tipo_estado_nombre'},
			{ data				: 'establecimiento_nombre', name : 'establecimiento_nombre'},
			{ data				: 'establecimiento_codigo_sigor', name : 'establecimiento_codigo_sigor'},
			{ data				: 'distrito_nombre', name : 'distrito_nombre'},
			{ data				: 'establecimiento_observacion', name : 'establecimiento_observacion'},
			{ data				: 'establecimiento_empresa_nombre', name : 'establecimiento_empresa_nombre'},
			{ data				: 'establecimiento_usuario', name : 'establecimiento_usuario'},
			{ data				: 'establecimiento_fecha_hora', name : 'establecimiento_fecha_hora'},
			{ data				: 'establecimiento_ip', name : 'establecimiento_ip'},
			{ render			: function (data, type, full, meta) {return '<a href="../public/establecimiento_crud.php?mode=R&codigo=' + full.establecimiento_codigo + '" role="button" class="btn btn-primary" title="Ver"><i class="ti-eye"></i>&nbsp;</a>&nbsp;<a href="../public/establecimiento_crud.php?mode=U&codigo=' + full.establecimiento_codigo + '" role="button" class="btn btn-success" title="Editar"><i class="ti-pencil"></i>&nbsp;</a></a>&nbsp;<a href="../public/establecimiento_crud.php?mode=D&codigo=' + full.establecimiento_codigo + '" role="button" class="btn btn-danger" title="Eliminar"><i class="ti-trash"></i>&nbsp;</a>';}},
		]
	});

	$('#tableLoadDetalle').DataTable({
		processing	: true,
		destroy		: true,
		searching	: false,
		paging		: false,
		lengthChange: true,
		info		: false,
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
			url					: urlEstCategiria,
			dataSrc				: 'data'
		},
		columnDefs	: [
			{ targets			: [0],	visible : false,searchable : false,	orderData : [0, 0] },
			{ targets			: [1],	visible : true,	searchable : true,	orderData : [1, 0] },
			{ targets			: [2],	visible : true,	searchable : true,	orderData : [2, 0] },
			{ targets			: [3],	visible : true,	searchable : true,	orderData : [3, 0] },
			{ targets			: [4],	visible : true,	searchable : true,	orderData : [4, 0] }
		],
		columns		: [
			{ data				: 'establecimiento_codigo', name : 'establecimiento_codigo'},
			{ data				: 'tipo_estado_nombre', name : 'tipo_estado_nombre'},
			{ data				: 'establecimiento_nombre', name : 'establecimiento_nombre'},
			{ data				: 'persona_completo', name : 'persona_completo'},
			{ data				: 'persona_documento', name : 'persona_documento'}
		]
	});

	$('#tableLoadPropietario').DataTable({
		processing	: true,
		destroy		: true,
		searching	: false,
		paging		: false,
		lengthChange: true,
		info		: false,
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
			url					: urlEstPropietario,
			dataSrc				: 'data'
		},
		columnDefs	: [
			{ targets			: [0],	visible : false,searchable : false,	orderData : [0, 0] },
			{ targets			: [1],	visible : true,	searchable : true,	orderData : [1, 0] },
			{ targets			: [2],	visible : true,	searchable : true,	orderData : [2, 0] },
			{ targets			: [3],	visible : true,	searchable : true,	orderData : [3, 0] },
			{ targets			: [4],	visible : true,	searchable : true,	orderData : [4, 0] }
		],
		columns		: [
			{ data				: 'establecimiento_codigo', name : 'establecimiento_codigo'},
			{ data				: 'tipo_estado_nombre', name : 'tipo_estado_nombre'},
			{ data				: 'establecimiento_nombre', name : 'establecimiento_nombre'},
			{ data				: 'persona_completo', name : 'persona_completo'},
			{ data				: 'persona_documento', name : 'persona_documento'}
		]
	});
});