function myFunction() {
    if(confirm("Desea cancelar?")){
      var edit = $('input[name="edit"]').val();
      var year = $('input[name="year"]').val();
      var idempresa = $('input[name="idempresa"]').val();
      if(edit == "true-1"){
        year++;
        window.location.href = "https://cursoprofesional.net/comparacionActivos.php?year="+year+"&elegir="+idempresa;
      }
      else if(edit)
       window.location.href = "https://cursoprofesional.net/comparacionActivos.php?year="+year+"&elegir="+idempresa;
    }
  }