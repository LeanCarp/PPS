<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Test</title>
  <link rel="stylesheet" href="https://code.jquery.com/qunit/qunit-2.1.1.css">
</head>
<body>
  <div id="qunit"></div>

  <div id="qunit-fixture"></div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
  <script>
    jQuery.ajaxSetup({async:false});
    function api(ruta, data ={})
    {
        var respuesta;
        $.post(ruta, data, function (responses) {
        console.log(responses);
        respuesta = responses;
      }, "json");
      return respuesta;
    }
  </script>
  <script src="https://code.jquery.com/qunit/qunit-2.1.1.js"></script>
  <script src="assets/js/testsCajero.js"></script>
</body>
</html>