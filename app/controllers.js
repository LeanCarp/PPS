app.controller('PedidosCtr', ['$scope','customService', function ($scope, customService) {
  customService.getNotificaciones().success(function(data){
    if(data.code===200){
      $scope.notificaciones=data.notificaciones;
    }
  });

  $scope.aCocina=function(idNotificacion){
    var notificacion = $scope.notificaciones.find(notificacion => notificacion.id==idNotificacion);
    notificacion.tipoNotificacion='2';
  };

  $scope.enCamino=function(idNotificacion){
    var notificacion = $scope.notificaciones.find(notificacion => notificacion.id==idNotificacion);
    notificacion.tipoNotificacion='3';
  };

  $scope.atender=function(idNotificacion){
    customService.atendNotifications(idNotificacion).success(function(data){
      if(data.code===200){
        console.log(idNotificacion);
        let notificacion  = $scope.notificaciones.find(notificacion => notificacion.id==idNotificacion);
        notificacion.atendido=true;
      }
    });

  };
}]);

app.controller('EstadoMesasController', ["$scope", "$http", "customService", "$location", "$route", "$interval", function ($scope, $http, customService, $location, $route, $interval) {
  // https://github.com/Paco-Cervantes/Materialize-Messages
  // https://www.jqueryscript.net/other/Tiny-jQuery-Modal-Extension-For-Materialize-Framework-materializeMessages-js.html
 
  // Llamadas al CutosmService Inicio
    $scope.loadMesasData = ( firstTimeLoad = true ) => {
      customService.getMesasPorEstado()
      .success(function(data){
        switch(data.code) {
            case 200:
                if( firstTimeLoad )
                  $scope.mesas = data.mesas;
                else
                {
                  data.mesas.forEach( (m)=>{
                    let mesaIndexInScope = $scope.mesas.findIndex( (ms)=>ms.id==m.id );
                    if(mesaIndexInScope != -1)
                    {
                      //Si la mesa Paso de DISPONIBLE -> OCUPADA, o bien, de OCUPADA -> DISPONIBLE
                      if(
                        ( $scope.mesaLibre($scope.mesas[ mesaIndexInScope ]) && ! $scope.mesaLibre(m) )
                        ||
                        ( ! $scope.mesaLibre($scope.mesas[ mesaIndexInScope ]) && $scope.mesaLibre(m) )
                      )
                      { 
                        $scope.mesas[ mesaIndexInScope ] = m;
                      }
                      //Si la mesa esta y sigue ocupada, OCUPADA -> OCUPADA
                      else
                      {
                        $scope.mesas[ mesaIndexInScope ].ticket = m.ticket;
                        $scope.mesas[ mesaIndexInScope ].notificaciones = m.notificaciones;
                      }
                    }
                    else
                    {
                      $scope.mesas.push(m);
                    }
                  });
                }
                break;
            case 0:
                $scope.mesas = [];
                break;
            default:
                $scope.mesas = [];
        }
        console.log($scope.mesas);
      })
      .error( () => Materialize.toast("Ah ocurrido un problema al traer las mesas, reintentelo mas tarde") );
    }

    $scope.loadElementosMenu = () => {
      //Obtenemos las categorias con sus elementos para mostrar en el detalle PERO
      //Depuramos y dejamos solo un Array con todos los productos sin distingir por Categoria
      customService.getElementoMenu().success(
        (d) => { 
          $scope.elementosDelMenu = d.categorias
            .map(e => e.comidas)
            .reduce((ac, val)=> ac.concat(val), []);
          console.log( $scope.elementosDelMenu );
        } 
      );
    }
  // Llamadas al CutosmService Inicio

  $scope.mesaLibre = function( mesa){
    return (mesa.idSesion == '' || mesa.ticket == false);
  };

  $scope.classTableFreeOrTaken = function( mesa){
    return ( $scope.mesaLibre(mesa) ? 'table__time-taken_free': '');
  };

  // Manejo de notificaciones Inicio
    $scope.getNotificacionesPorTipo = function( notificaciones, tipoNotificacion, estaAtendida = false){
      if( notificaciones == false || notificaciones.length == 0)
      {
        return [];
      }
      else
      {
        return notificaciones.filter(noti => (noti.atendido == estaAtendida && noti.tipoNotificacion==tipoNotificacion) );
      }
    };

    $scope.getNotificacionesMozo = function( mesa){
      return $scope.getNotificacionesPorTipo( mesa.notificaciones, 1);
    };

    $scope.getNotificacionesPorPago = function( mesa, tarjetaOefectivo = null){
      //tarjetaOefectivo = 'tarjeta'
      //tarjetaOefectivo = 'efectivo'
      //tarjetaOefectivo = null  -> ambas
      let notificacionesPago = $scope.getNotificacionesPorTipo( mesa.notificaciones, 2);
      return notificacionesPago.filter( 
        noti => (
          noti.data != null &&
          (
            tarjetaOefectivo == null ||
            noti.data.formaDePago == tarjetaOefectivo
          )
        )
      );
    };

    $scope.countNotificacionesMozo = function( mesa){
      return (
        (mesa.idSesion == '' || mesa.ticket == false) ?
        0:
        $scope.getNotificacionesMozo(mesa).length
      );
    };

    $scope.hasWaiterNotifications = function( mesa){
      return (
        $scope.countNotificacionesMozo( mesa) == 0 ?
        '':
        'active active-waiter'
      );
    };

    $scope.countNotificacionesPagoTarjeta = function( mesa){
      return (
        $scope.mesaLibre(mesa) ?
        0:
        $scope.getNotificacionesPorPago( mesa, 'tarjeta').length
      );
    };

    $scope.hasPayByCardNotifications = function( mesa){
      return (
        $scope.countNotificacionesPagoTarjeta( mesa) == 0 ?
        '':
        'active active-card'
      );
    };

    $scope.countNotificacionesPagoEfectivo = function( mesa){
      return (
        $scope.mesaLibre(mesa) ?
        0:
        $scope.getNotificacionesPorPago( mesa, 'efectivo').length
      );
    };

    $scope.hasPayByCashNotifications = function( mesa){
      return (
        $scope.countNotificacionesPagoEfectivo( mesa) == 0 ?
        '':
        'active active-cash'
      );
    };
  // Manejo de notificaciones Fin
  
  //Manejo de pedidos Inicio
    $scope.getFechaHoraMesaTomada = function( mesa){
        return (
          $scope.mesaLibre(mesa) ?
          '00:00:00' :
          mesa.ticket.fechaHoraInicio
        );
    };

    $scope.getPedidosPorEstado = function(  ticket, estadoLineas){
      return ticket.lineas.filter(line => line.estado == estadoLineas);
    };

    $scope.countPedidosConEstado = function( ticket, estadoLineas){
      return (
        ( ticket == false ) ?
        0:
        $scope.getPedidosPorEstado(ticket, estadoLineas).length
      );
    };

    $scope.countPedidosSinTomar = function( mesa){ return $scope.countPedidosConEstado(mesa.ticket, 1); };

    $scope.countPedidosEnCocina = function( mesa){ return $scope.countPedidosConEstado(mesa.ticket, 2); };

    $scope.countPedidosEntregados = function( mesa){ return $scope.countPedidosConEstado(mesa.ticket, 3); };
  //Manejo de pedidos Fin

  $scope.getTotalDelTicketDeLaMesa = function( mesa){
    if( $scope.mesaLibre(mesa) )
    {
      return 0;
    }
    else
    {
      let lineasValidas = mesa.ticket.lineas.filter(line => (line.estado == 1 || line.estado == 2 || line.estado == 3) );
      return lineasValidas.reduce((acumulador, line) => (acumulador + line.precioFinalActual), 0);
    }
  };

  $scope.cobrar = function(mesa){
    //Solo se cobra si el ticket de la mesa tiene un TOTAL > 0 y
    //que todas sus Ordenes esten Entregadas
    let pedidosSinTomar = $scope.countPedidosSinTomar(mesa),
        pedidosEnCocina = $scope.countPedidosEnCocina(mesa);
    if( mesa.ticket.total == 0 || pedidosSinTomar>0 || pedidosEnCocina>0 )
    {
      return false;
    }

    customService.closeMesaAndTicket( mesa.id, mesa.ticket.id)
    .success(function(data){
      if(data.code==200){
        Materialize.toast('Mesa '+mesa.numero+' cerrada exitosamente !', 3500);
        $route.reload();
      }
      else
        Materialize.toast('Ocurrio un error, reintentelo luego.', 3500);
    })
    .error( () => Materialize.toast('Error de conección a <b>internet</b>.', 3500) );
  };

  $scope.openModalPedidos = function(mesa){
    //Solo se abre el Modal, si la mesa tiene un ticker asignado y tiene al menos 1 orden realizada
    if( mesa.ticket && mesa.ticket.lineas.length>0 )
    {
      $scope.detalleMesa = mesa;
      $('#modal-detalles').modal('open');
    }
  };

  $scope.textoEstadoPedido = function( numeroEstado) {
    let texto;
    switch(numeroEstado) {
      case 0:
          texto = 'Cancelado';
          break;
      case 1:
          texto = 'Pedido';
          break;
      case 2:
          texto = 'En Cocina';
          break;
      case 3:
          texto = 'Enviado';
          break;
      default:
          texto = '( ¿? )';
    }
    return texto;
  }

  $scope.comidaNombre = function( idComida){
    return $scope.elementosDelMenu.find( (e) => e.id==idComida ).nombre;
  };

  //Initialize MODAL component
  $('.modal').modal();

  //Intervalo para actualizar datos de las mesas Inicio
    let refreshInterval;
    $scope.startRefreshTableData = function() {
      //La primera vez se carga manual, el resto lo refresca el TimerInterval
      $scope.loadMesasData();
      // Tambien por ser la primera (y unica tambien) que se carga los elemetos del Menu
      $scope.loadElementosMenu();

      // Don't start twice the refresh process
      if ( angular.isDefined(refreshInterval) ) return;

      refreshInterval = $interval( ()=>$scope.loadMesasData(false), 5000);
    };

    $scope.stopRefreshTableData = function() {
      if (angular.isDefined(refreshInterval)) {
        $interval.cancel(refreshInterval);
        refreshInterval = undefined;
      }
    };

    $scope.$on('$destroy', function() {
      // Make sure that the interval is destroyed too
      $scope.stopRefreshTableData();
    });

    //Inicio del evento de refresh de informacion
    $scope.startRefreshTableData();
  //Intervalo para actualizar datos de las mesas Fin

}]);

app.controller('CategoriasAderezosCtr', ["$scope", "$http", "customService", "$location", "$route", "$interval", function ($scope, $http, customService, $location, $route, $interval) {
  customService.getConceptos()
    .success( data => {
      if(data.code==200)
        $scope.categorias = data.tipos;
      else
        Materialize.toast('Categorias de aderezos no encontradas.', 3500);
    })
    .error(() => Materialize.toast('Error al obtener las categorias de aderezos.', 3500));



}]);

app.controller('DefaultCtr', ['$scope','$location', '$routeParams', function ($scope, $location, $routeParams) {
  $scope.openModal = selector => {
    $(selector).modal('open');
  }
}]);

app.controller('MesasCtr', ['$scope', '$location', '$routeParams', 'customService', function ($scope, $location, $routeParams, customService) {

  // Indica si se está agregando o modificando. Útil para reutilizar la vista de agregar/modificar mesa.
  $scope.isAdding = $location.path().split('/')[2] === 'agregar';
  
  // Obtiene todas las mesas.
  customService.getMesasPorEstado()
    .success(data => $scope.mesas = data.mesas)
    .error(() => Materialize.toast('Error al obtener las mesas.', 3500));
        
  // Si hay un parámetro "id" en la ruta, se está modificando, así que busca la mesa correspondinte.
  // Si no, define una mesa sin número pero habilitada (valor por defecto) para agregar una nueva.
  if ($routeParams.id)
    customService.getMesa($routeParams.id)
      .success(data => {
        $scope.mesa = data.mesa;
        $scope.mesa.numero = parseInt($scope.mesa.numero);
        $scope.mesa.habilitada = $scope.mesa.habilitada === '1';
      })
      .error(() => Materialize.toast(`Error al obtener la mesa con ID ${$routeParams.id}.`, 3500));
  else
    $scope.mesa = { habilitada: true };

  // Cambia el estado de una mesa (habilitada/deshabilitada).
  $scope.toggleEstadoMesa = mesa => {
    mesa.habilitada = !mesa.habilitada;

    customService.updateMesa(mesa)
      .success(() => Materialize.toast(`Mesa ${mesa.numero} ${mesa.habilitada ? '' : 'des'}habilitada`, 3500))
      .error(() => {
        mesa.habilitada = !mesa.habilitada;
        Materialize.toast(`Error al habilitar o deshabilitar la mesa ${mesa.numero}.`, 3500)
      });
  }

  // Agrega una nueva mesa.
  $scope.addMesa = mesa => {
    customService.addMesa(mesa)
      .success(() => Materialize.toast(`Mesa ${mesa.numero} agregada correctamente.`, 3500))
      .error(() => Materialize.toast(`Error. No se pudo agregar la mesa ${mesa.numero}.`, 3500));

    $location.path('/mesas');
  }

  // Actualiza una mesa existente.
  $scope.updateMesa = mesa => {
    customService.updateMesa(mesa)
      .success(() => Materialize.toast(`Mesa ${mesa.numero} modificada correctamente.`, 3500))
      .error(() => Materialize.toast(`Error. No se pudo modificar la mesa ${mesa.numero}.`, 3500));

    $location.path('/mesas');
  } 

  // Si el usuario está en la lista de mesas, inicializa los objetos.
  // De esta manera evita errores resultantes de utilizar elementos del DOM que no existen en otras vistas.
  if ($location.path() === '/mesas') {
    // Inicializa las modals.
    $('.modal').modal({
      complete: () => $scope.QRCode.clear() // Al cerrarse, limpia el código QR.
    });

    // Inicializa el número de mesa a mostrar en la modal y el código QR.
    $scope.numeroMesa = 0;
    $scope.QRCode = new QRCode(document.getElementById("qrcode"), $scope.numeroMesa);
  }

  // Abre una modal con el código QR de la mesa correspondiente.
  $scope.openQRCode = mesa => {
    $scope.numeroMesa = mesa.numero;
    $scope.QRCode.makeCode(mesa.dataQR);
    $('#modalQRCode').modal('open');
  }

  // Cierra la modal con el código QR.
  $scope.closeQRCode = () => $('#modalQRCode').modal('close');

  // Abre el diálogo de impresión del navegador para imprimir el código QR de la mesa.
  // TO DO: Imprimir de otra manera, sin utilizar estilos que afecten a toda la página.
  //        Ver media query en main.css.
  $scope.printQRCode = () => {
    console.log('Imprimiendo...');
    print();
  }
}]);
