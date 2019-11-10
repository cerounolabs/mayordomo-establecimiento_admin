$(document).ready(function() {
	var codigo		= document.getElementById('tableCodigo').className;	
	var urlDominio	= 'https://www.cerouno.me/mayordomo_api/public/v1/default/040/dominio/'+codigo;
	
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
			{ targets			: [0],	visible : true,	searchable : true,	orderData : [0, 0] },
			{ targets			: [1],	visible : true,	searchable : true,	orderData : [1, 0] },
			{ targets			: [2],	visible : true,	searchable : true,	orderData : [2, 0] },
			{ targets			: [3],	visible : true,	searchable : true,	orderData : [3, 0] },
			{ targets			: [4],	visible : false,searchable : false,	orderData : [4, 0] },
			{ targets			: [5],	visible : true,	searchable : true,	orderData : [5, 0] },
			{ targets			: [6],	visible : false,searchable : false,	orderData : [6, 0] },
			{ targets			: [7],	visible : false,searchable : false,	orderData : [7, 0] },
			{ targets			: [8],	visible : false,searchable : false,	orderData : [8, 0] },
			{ targets			: [9],	visible : false,searchable : false,	orderData : [9, 0] },
			{ targets			: [10],	visible : true,	searchable : true,	orderData : [10, 0] }
		],
		columns		: [
			{ data				: 'tipo_estado_nombre', name : 'tipo_estado_nombre'},
			{ data				: 'tipo_dominio1_nombre', name : 'tipo_dominio1_nombre'},
			{ data				: 'tipo_dominio2_nombre', name : 'tipo_dominio2_nombre'},
			{ data				: 'tipo_dominio3_nombre', name : 'tipo_dominio3_nombre'},
			{ data				: 'tipo_dominio', name : 'tipo_dominio'},
			{ data				: 'tipo_observacion', name : 'tipo_observacion'},
			{ data				: 'tipo_empresa_nombre', name : 'tipo_empresa_nombre'},
			{ data				: 'tipo_usuario', name : 'tipo_usuario'},
			{ data				: 'tipo_fecha_hora', name : 'tipo_fecha_hora'},
			{ data				: 'tipo_ip', name : 'tipo_ip'},
			{ render			: function (data, type, full, meta) {return '<a href="../public/dominiotri_crud.php?dominio='+ full.tipo_dominio +'&mode=R&dominio1='+ full.tipo_dominio1_codigo +'&dominio2=' + full.tipo_dominio2_codigo + '&dominio3=' + full.tipo_dominio3_codigo + '" role="button" class="btn btn-primary" title="Ver"><i class="ti-eye"></i>&nbsp;</a>&nbsp;<a href="../public/dominiotri_crud.php?dominio='+ full.tipo_dominio +'&mode=U&dominio1='+ full.tipo_dominio1_codigo +'&dominio2=' + full.tipo_dominio2_codigo + '&dominio3=' + full.tipo_dominio3_codigo + '" role="button" class="btn btn-success" title="Editar"><i class="ti-pencil"></i>&nbsp;</a></a>&nbsp;<a href="../public/dominiotri_crud.php?dominio='+ full.tipo_dominio +'&mode=D&dominio1='+ full.tipo_dominio1_codigo +'&dominio2=' + full.tipo_dominio2_codigo + '&dominio3=' + full.tipo_dominio3_codigo + '" role="button" class="btn btn-danger" title="Eliminar"><i class="ti-trash"></i>&nbsp;</a>';}},
		]
	});
});