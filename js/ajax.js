const insertBtn = document.getElementById('insertBtn');
let modello, anno,prezzo,quantita;

insertBtn.addEventListener('click', () => {
  modello = getElement('modello',true);
  anno = getElement('anno',true);
  prezzo = getElement('prezzo',true);
  quantita = getElement('qnt',true);
  insert_data(modello,anno,prezzo,quantita);

  $("#insertRecord").modal('hide');
});

/*
  Prendere l'elemento html dal js
  id --> String, id dell'elemento html da prendere
  retValue --> Boolean, True se voglio il valore, false altrimenti
*/
const getElement = (id, retValue) =>
{
    let el = document.getElementById(id)
    return retValue ? el.value : el;
}

const insert_data = (modello,anno,prezzo,quantita) =>
{
  if(modello == '' || anno == '' || prezzo == '' || quantita == '')
    alert('Compilare tutti i campi del form!');
  else
  {
      $.ajax({
         url:"../php/insertXml.php",
         method:"POST",
         data:{modello,anno,prezzo,quantita},
         success:function(data)
         {
            let i = 0;
            let interval;

            interval = setInterval(() => {
              if(i == 0)
                alert("Prodotto inserito con successo!");
              else
              {
                clearInterval(interval);
                interval = null;
                location.reload(true);
              }
              i++;
            }, i == 0 ? 500 : 3000);
         }
      });
  }
  
}

const deleteXml = id =>
{
    if(confirm("Sei sicuro di voler eliminare questo elemento?"))
    {
        $.ajax({
           url:"../php/deleteXml.php",
           method:"POST",
           data:{id},
           success:function(data)
           {
              let i = 0;
              let interval;

              interval = setInterval(() => {
                if(i == 0)
                  alert("Prodotto eliminato con successo!");
                else
                {
                  clearInterval(interval);
                  interval = null;
                  location.reload(true);
                }
                i++;
              }, i == 0 ? 500 : 3000);
           }
        });
    }
}

const editXml = (id,modello,anno,prezzo,qnt) =>
{
  let edit = getElement('editBtn',false);
  //console.log(id + " " + modello + " " + anno + " " + prezzo + " " + qnt);
  setValue('editModello',modello);
  setValue('editAnno',anno);
  setValue('editPrezzo',prezzo);
  setValue('editQnt',qnt);
  setValue('idArticolo',id);

  $("#editRecord").modal('show');
}

const edit = () => {
    let modello = getElement('editModello',true);
    let anno = getElement('editAnno',true);
    let prezzo = getElement('editPrezzo',true);
    let qnt = getElement('editQnt',true);
    let id = getElement('idArticolo',true);

    if(modello == '' || anno == '' || prezzo == '' || qnt == '')
      alert('Compilare tutti i campi del form!');
    else
      edit_data(id,modello,anno,prezzo,qnt);

    $("#editRecord").modal('hide');
}

const edit_data = (id,modello,anno,prezzo,quantita) =>
{
  $.ajax({
     url:"../php/editXml.php",
     method:"POST",
     data:{id,modello,anno,prezzo,quantita},
     success:function(data)
     {
        let i = 0;
        let interval;

        interval = setInterval(() => {
          if(i == 0)
            alert("Prodotto modificato con successo!");
          else
          {
            clearInterval(interval);
            interval = null;
            location.reload(true);
          }
          i++;
        }, i == 0 ? 500 : 3000);
     }
  });  
}

const setValue = (id,val) => {
  document.getElementById(id).value = val;
}
