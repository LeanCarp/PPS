	var b = "./";

/*Obtener Tickets*/
	//#1
	QUnit.test( "Obtener tickets: Para mesa 1 y 2, todos los tickets", 
		function( assert ) {
			var data = api(b+"Tickets/obtener/1.2");
	 		assert.ok( data.code == 200 && data.Tickets.length==3, "Se devuelve 200, La cantidad de Tickets es 3");
		});

	//#2
	QUnit.test( "Obtener tickets: Para mesa 1 y 2, solo los pagos", 
		function( assert ) {
			var data = api(b+"Tickets/obtener/1.2/true");
	 		assert.ok( data.code == 200 && data.Tickets.length==1, "Se devuelve 200, 1 Ticket pago");
		});

	//#3
	QUnit.test( "Obtener tickets: Para mesa 1 y 2, solo los NO pagos", 
		function( assert ) {
			var data = api(b+"Tickets/obtener/1.2/false");
	 		assert.ok( data.code == 200 && data.Tickets.length==2, "Se devuelve 200, 2 Tickets NO pagos");
		});

	//#4
	QUnit.test( "Obtener tickets: Para ninguna mesa, todos los Tickets", 
		function( assert ) {
			var data = api(b+"Tickets/obtener/");
	 		assert.ok( data.code == 401, "Se devuelve 401, Error en los parámetros");
		});
/**/

/*setHabilitada Mesas*/
	//#5
	QUnit.test( "setHabilitada: Deshabilitar mesa 2", 
		function( assert ) {
			var data = api(b+"Mesas/setHabilitada/2/0",{casaDeComidas:1});
	 		assert.ok( data.code == 200, "Se devuelve 200, mesa 2 DESHABILITADA");
		});

	//#6
	QUnit.test( "setHabilitada: Habilitar mesa 2", 
		function( assert ) {
			var data = api(b+"Mesas/setHabilitada/2/1",{casaDeComidas:1});
	 		assert.ok( data.code == 200, "Se devuelve 200, mesa 2 HABILITADA");
		});

	//#7
	QUnit.test( "setHabilitada: Deshabilitar mesa 1", 
		function( assert ) {
			var data = api(b+"Mesas/setHabilitada/1/0",{casaDeComidas:1});
	 		assert.ok( data.code == 200, "Se devuelve 200, mesa 1 DESHABILITADA");
		});

	//#8
	QUnit.test( "setHabilitada: Parametro NULOS", 
		function( assert ) {
			var data = api(b+"Mesas/setHabilitada/1/",{casaDeComidas:1});
	 		assert.ok( data.code == 401, "Se devuelve 401, parametros nulos");
		});
/**/

/*Obtener Mesas*/
	//#9
	QUnit.test( "Obtener Mesas: Mesas HABILITADAS", 
		function( assert ) {
			var data = api(b+"Mesas/obtener/1",{casaDeComidas:1});
	 		assert.ok( data.code == 200 && data.mesas.length==2, "Se devuelve 200, hay 2 mesas habilitadas");
		});

	//#10
	QUnit.test( "Obtener Mesas: Mesas DESHABILITADAS", 
		function( assert ) {
			var data = api(b+"Mesas/obtener/0",{casaDeComidas:1});
	 		assert.ok( data.code == 200 && data.mesas.length==1, "Se devuelve 200, hay 1 mesa deshabilitada");
		});

	//#11
	QUnit.test( "Obtener Mesas: Todas las Mesas", 
		function( assert ) {
			var data = api(b+"Mesas/obtener/",{casaDeComidas:1});
	 		assert.ok( data.code == 200 && data.mesas.length==3, "Se devuelve 200, hay 3 mesas");
		});

	//#12
	QUnit.test( "Obtener Mesas: No hay mesas en casa de comidas ID = 2", 
		function( assert ) {
			var data = api(b+"Mesas/obtener/0",{casaDeComidas:2});
	 		assert.ok( data.code == 403 && data.mesas.length==0, "Se devuelve 403, NO hay mesas");
		});
/**/

/*Cerrar Sesiones*/ 
	//#13
	QUnit.test( "Cerrar Sesiones: Cierra la MesaID=1 de casadecomidaID = 1", 
		function( assert ) {
			var data = api(b+"Mesas/cerrarSesiones/1",{casaDeComidas:1});
	 		assert.ok( data.code == 200, "Se devuelve 200, mesa 1 Sesion Cerrada ");
		});

	//#14
	QUnit.test( "Cerrar Sesiones: Cierra las MesasIDd=2.3 de casadecomidaID = 1", 
		function( assert ) {
			var data = api(b+"Mesas/cerrarSesiones/2.3",{casaDeComidas:1});
	 		assert.ok( data.code == 200, "Se devuelve 200, mesas MesasIDd=2,3 Cerradas");
		});

	//#15
	QUnit.test( "Cerrar Sesiones: Error de Servidor o de Parametros NULL", 
		function( assert ) {
			var data = api(b+"Mesas/cerrarSesiones/",{casaDeComidas:1});
	 		assert.ok( data.code == 401, "Se devuelve 401, Parametro NULL");
		});
/**/

/*Atender Notificaciones*/ 
	//#16
	QUnit.test( "Atender Notificaciones: Establece como atendida la NotificacionID=1 de casadecomidaID = 1", 
		function( assert ) {
			var data = api(b+"Notificaciones/atender/1",{casaDeComidas:1});
	 		assert.ok( data.code == 200, "Se devuelve 200, notificacion 1 atendida");
		});

	//#17
	QUnit.test( "Atender Notificaciones: Establece como atendidas las NotificacionesIDs=1,2 de casadecomidaID = 1", 
		function( assert ) {
			var data = api(b+"Notificaciones/atender/1.2",{casaDeComidas:1});
	 		assert.ok( data.code == 200, "Se devuelve 200, notificacion 1 atendida");
		});

	//18
	QUnit.test( "Atender Notificaciones: No se le pasa ninguna notificacion", 
		function( assert ) {
			var data = api(b+"Notificaciones/atender/",{casaDeComidas:1});
	 		assert.ok( data.code == 401, "Se devuelve 401, Error de parámetros ");
		});	
/**/

/*Obtener Notificaciones*/
	//#19
	QUnit.test( "Obtener Notificaciones: Obtiene todas las Notificaciones de casadecomidasID=1", 
		function( assert ) {
			var data = api(b+"Notificaciones/obtener/todas",{casaDeComidas:1});
	 		assert.ok( data.code == 200 && data.notificaciones.length==2, "Se devuelve 200, notificacion 1 atendida");
		});

	//#20
	QUnit.test( "Obtener Notificaciones: Obtiene las Notificaciones sin atender de casadecomidasID=1", 
		function( assert ) {
			var data = api(b+"Notificaciones/obtener/todas/0",{casaDeComidas:1});
	 		assert.ok( data.code == 403 && data.notificaciones.length==0, "Se devuelve 403, no hay notificaciones sin atender");
		});

	//#21
	QUnit.test( "Obtener Notificaciones: Obtiene las Notificaciones atendidas de casadecomidasID=1", 
		function( assert ) {
			var data = api(b+"Notificaciones/obtener/todas/1",{casaDeComidas:1});
	 		assert.ok( data.code == 200 && data.notificaciones.length==2, "Se devuelve 200, 2 notificaciones atendidas");
		});

	//#22
	QUnit.test( "Obtener Notificaciones: Obtiene todas las Notificaciones", 
		function( assert ) {
			var data = api(b+"Notificaciones/obtener/",{casaDeComidas:1});
	 		assert.ok( data.code == 200 && data.notificaciones.length==2, "Se devuelve 200, 2 notificaciones atendidas");
		});
/**/

/*Setear Comida Eliminada*/
	//#23
	QUnit.test( "Setear Eliminada: Comida 4 eliminada", 
		function( assert ) {
			var data = api(b+"Comidas/setEliminada/4/1");
	 		assert.ok( data.code == 200, "Se devuelve 200, comidaID=4 eliminada");
		});

	//#24
	QUnit.test( "Setear Eliminada: Comida 5.6 NO eliminada", 
		function( assert ) {
			var data = api(b+"Comidas/setEliminada/5.6/0");
	 		assert.ok( data.code == 200, "Se devuelve 200, comidasIDs=5.6 NO eliminadas");
		});

	//#25
	QUnit.test( "Setear Eliminada: Parametro NULL", 
		function( assert ) {
			var data = api(b+"Comidas/setEliminada/5.6/");
	 		assert.ok( data.code == 401, "Se devuelve 401, Valor Eliminada NULL");
		});

	//#26
	QUnit.test( "Setear Eliminada: Parametro NULL", 
		function( assert ) {
			var data = api(b+"Comidas/setEliminada//4");
	 		assert.ok( data.code == 401, "Se devuelve 401, Valor Comida NULL");
		});
/**/

/*Setear Comdia Disponible*/
	//#27
	QUnit.test( "Setear Disponible: Comida 4 Disponible", 
		function( assert ) {
			var data = api(b+"Comidas/setDisponible/4/1");
	 		assert.ok( data.code == 200, "Se devuelve 200, comidaID=4 eliminada");
		});

	//#28
	QUnit.test( "Setear Disponible: Comida 5.6 NO Disponible", 
		function( assert ) {
			var data = api(b+"Comidas/setDisponible/5.6/0");
	 		assert.ok( data.code == 200, "Se devuelve 200, comidasIDs=5.6 eliminadas");
		});

	//#29
	QUnit.test( "Setear Disponible: Parametro NULL", 
		function( assert ) {
			var data = api(b+"Comidas/setDisponible/5.6/");
	 		assert.ok( data.code == 401, "Se devuelve 401, Valor Disponible NULL");
		});

	//#30
	QUnit.test( "Setear Disponible: Parametro NULL", 
		function( assert ) {
			var data = api(b+"Comidas/setDisponible//3");
	 		assert.ok( data.code == 401, "Se devuelve 401, Valor Comida NULL");
		});
/**/

/*Obtener Comidas*/
	//#31
	QUnit.test( "Obtener Comidas: todas las Categorias", 
		function( assert ) {
			var data = api(b+"Comidas/obtener/",{casaDeComidas:1});
	 		assert.ok( data.code == 200 && data.categorias.length==5, "Se devuelve 200, hay 5 categorias");
		});

	//#32
	QUnit.test( "Obtener Comidas: todas las Comidas de categoriaID=1", 
		function( assert ) {
			var data = api(b+"Comidas/obtener/1",{casaDeComidas:1});
	 		assert.ok( data.code == 200 && data.categorias[0].comidas.length==2, "Se devuelve 200, 2 comidas en categoriaID=1");
		});

	//#33
	QUnit.test( "Obtener Comidas: todas las Comidas de categoriasIDs=1.2", 
		function( assert ) {
			var data = api(b+"Comidas/obtener/1.2",{casaDeComidas:1});
	 		assert.ok( data.code == 200 && data.categorias[0].comidas.length==2 && data.categorias[1].comidas.length==3, "Se devuelve 200, hay 2 comidas en categoriaID=1 y 3 Comidas en categoriaID=2");
		});

	//#34
	QUnit.test( "Obtener Comidas: No hay Comidas en casa de comidas ID = 2", 
		function( assert ) {
			var data = api(b+"Comidas/obtener/",{casaDeComidas:2});
	 		assert.ok( data.code == 403, "NO hay Comidas");
		});
/**/

/*Obtener Conceptos*/
	//#35
	QUnit.test( "Obtener Conceptos: todas las Categorias", 
		function( assert ) {
			var data = api(b+"Conceptos/obtener/",{casaDeComidas:1});
	 		assert.ok( data.code == 200 && data.tipos.length==3, "Se devuelve 200, hay 3 tipos de conceptos");
		});

	//#36
	QUnit.test( "Obtener Conceptos: todas las Conceptos de tipoconceptoID=1", 
		function( assert ) {
			var data = api(b+"Conceptos/obtener/1",{casaDeComidas:1});
	 		assert.ok( data.code == 200 && data.tipos[0].conceptos.length==14, "Se devuelve 200, 14 conceptos para tipoconceptoID=1");
		});

	//#37
	QUnit.test( "Obtener Conceptos: todas las Conceptos de tiposIDs=1.2", 
		function( assert ) {
			var data = api(b+"Conceptos/obtener/1.2",{casaDeComidas:1});
	 		assert.ok( data.code == 200 && data.tipos[0].conceptos.length==14 && data.tipos[1].conceptos.length==5, "Se devuelve 200, hay 14 conceptos en tipoID=1 y 5 conceptos en tipoID=2");
		});

	//#38
	QUnit.test( "Obtener Conceptos: No hay Conceptos en casa de Conceptos ID = 2", 
		function( assert ) {
			var data = api(b+"Conceptos/obtener/",{casaDeComidas:2});
	 		assert.ok( data.code == 403, "NO hay tipos de conceptos");
		});
/**/

/*Pagar Tickets*/
	//#39
	QUnit.test( "Pagar ticket: Ticket 4 mesa 1", 
		function( assert ) {
			var data = api(b+"Tickets/pagar/4/1");
	 		assert.ok( data.code == 200, "Se devuelve 200, ticket pago y mesa cerrada");
		});

	//#40
	QUnit.test( "Pagar ticket: Parametros nulos", 
		function( assert ) {
			var data = api(b+"Tickets/pagar//1");
	 		assert.ok( data.code == 401, "Se devuelve 401, error de parametros");
		});
/**/
	