$("#txtBuscar").keyup(function () {
  buscar();
});

function buscar() {
  // Obtener el valor de la barra de búsqueda
  var searchTerm = $("#txtBuscar").val().toLowerCase();

  var resultadosEncontrados = false;

  // Filtrar las filas de la tabla según el término de búsqueda
  $("tbody tr").each(function () {
      var textoFila = $(this).text().toLowerCase();
      if (textoFila.includes(searchTerm)) {
          $(this).show();
          resultadosEncontrados = true;
      } else {
          $(this).hide();
      }
  });

  if (resultadosEncontrados) {
      $("#alertaNoResultados").hide();
  } else {
      $("#alertaNoResultados").show();
  }
}