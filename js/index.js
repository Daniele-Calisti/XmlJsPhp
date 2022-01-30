window.onload = () => {
  loadXml('../xml/index.xml');
}

function loadXml(xml) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      createXmlTable(this);
    }
  };
  xhttp.open("GET", xml, true);
  xhttp.send();
}

function createXmlTable(xml) {
  var i;
  var xmlDoc = xml.responseXML;
  var table="<tr><th>Modello</th><th>Anno</th><th>Prezzo</th><th>Quantita</th><th>Elimina prodotto</th><th>Modifica prodotto</th></tr>";
  var root = xmlDoc.getElementsByTagName("articolo");
  for (i = 0; i <root.length; i++) { 
    let id = i+1;
    let modello = root[i].getElementsByTagName("modello")[0].childNodes[0].nodeValue;
    let anno = root[i].getElementsByTagName("anno")[0].childNodes[0].nodeValue;
    let prezzo = root[i].getElementsByTagName("prezzo")[0].childNodes[0].nodeValue;
    let qnt = root[i].getElementsByTagName("quantita")[0].childNodes[0].nodeValue;

    //Aggiungo gli id per gestire la modifica dell'elemento

    table += "<tr><td>" +
    modello +
    "</td><td>" +
    anno +
    "</td><td>" +
    prezzo +
    "€ </td><td>" +
    qnt +
    "</td><td>" +
    "<button class='btn btn-danger' onclick=\"deleteXml('"+id+"')\"><i class='fas fa-times'></i></button>" +
    "</td><td>" + 
    "<button class='btn btn-warning' onclick=\"editXml('"+id+"','"+modello+"','"+anno+"','"+prezzo+"','"+qnt+"')\"><i class='fas fa-edit'></i></button>" +
    "</td></tr>"
    ;
  }
  document.getElementById("xmlTable").innerHTML = table;
}

/*
  Funzione per filtrare la tabella
*/
function filterTable() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("filter");
  filter = input.value.toUpperCase();
  table = document.getElementById("xmlTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}