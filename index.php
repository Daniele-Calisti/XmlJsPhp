<!DOCTYPE html>
<html>
  <head>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <script src="https://kit.fontawesome.com/98eef4eaef.js" crossorigin="anonymous"></script>

      <!-- Quando aggiorno la pagina rimuovo sempre la cache per evitare che la tabella non sia modificata-->
      <meta http-equiv="Cache-control" content="no-cache">
      <meta http-equiv="Expires" content="-1">

      <title>Xml Js PHP</title>
  </head>
  <body>

  <h1 class="title">Applicazione dell' xml al php e al javascript</h1>

  <center>
    <button type="button" class="modalInsert btn btn-info" data-toggle="modal" data-target="#insertRecord">Aggiungi record</button>
  </center>

  <div class="modal fade" id="editRecord" tabindex="-1" role="dialog" aria-labelledby="editRecord" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Modifica record</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- oninput per non far inserire numeri decimali nei campi anno e quantita-->
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Modello:</label>
              <input type="text" class="form-control" id="editModello" required>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Anno:</label>
              <input type="number" step="1" value="<?=date('Y')?>" class="form-control" id="editAnno" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Prezzo:</label>
              <input type="number" step="0.01" class="form-control" id="editPrezzo" required>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Quantita:</label>
              <input type="number" step="1" value="1" class="form-control" id="editQnt" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
            </div>
            <input type="hidden" id="idArticolo">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
          <button type="button" class="btn btn-primary" id="editBtn" onclick="edit()">Modifica</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="insertRecord" tabindex="-1" role="dialog" aria-labelledby="insertRecord" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Inserisci un nuovo record</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Modello:</label>
              <input type="text" class="form-control" id="modello" required>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Anno:</label>
              <input type="number" step="1" value="<?=date('Y')?>" class="form-control" id="anno" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Prezzo:</label>
              <input type="number" step="0.01" class="form-control" id="prezzo" required>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Quantita:</label>
              <input type="number" step="1" value="1" class="form-control" id="qnt" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
          <button type="button" class="btn btn-primary" id="insertBtn">Inserisci</button>
        </div>
      </div>
    </div>
  </div>

  <br><br>
  <input type="text" id="filter" onkeyup="filterTable()" placeholder="Ricerca il modello..." title="Type in a name">

  <table style="padding: 5%; text-align: center;" id="xmlTable" class="table table-striped table-bordered table-sm"></table>

  <script src="js/index.js"></script>
  <!-- Script ajax-->
  <script src="js/ajax.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>