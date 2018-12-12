//Pour voir le modal bootstrap qui vas permettre en même temps de faire l'appel ajax
$(document).ready(function () {
  $('.modal_modif_materiel').click(function (event) {
    $.ajax({
      type: "POST",
      url: "../php/switchcase_materiel.php",
      data: "etat=3&id=" + $(this).val(),
      success: function (msg, statut) {
        var dataJson = jQuery.parseJSON(msg);
        var user = dataJson.materiel;
        console.log(user);
        $('#Mnom_materiel').val(user["0"].nom_materiel);
        var etat = user["0"].etat_materiel;
        setSelectedIndex(document.getElementById("Metat_materiel"), etat);
        $('#Mdescriptif_materiel').val(user["0"].descriptif_materiel);
        $('#Mid').val(user["0"].id_materiel);
        var type = user["0"].id_type_materiel;
        setSelectedIndex(document.getElementById("Mtype_materiel"), type);
        $('#modifier_materiel').modal('show');

      },
      error: function (resultat, statut, erreur) {
        alert(statut);
      }
    });
  });
  $('.delete_confirm').on('click', function () {
    var id = $(this).val();
    $.confirm({
      theme: 'supervan',
      title: "Suppression du matériel",
      content: 'Êtes-vous sûr de vouloir supprimer ce matériel ?',
      buttons: {
        Valider: function () { deletemateriel(id) },
        Annuler: function () {
        }
      }
    });
  });
  $('.delete_logement').on('click', function () {
    var id = $(this).val();
    $.confirm({
      theme: 'supervan',
      title: "Suppression de logement",
      content: 'Êtes-vous sûr de vouloir supprimer ce logement ?',
      buttons: {
        Valider: function () { deletelogement(id) },
        Annuler: function () {
        }
      }
    });
  });
  $('.modal_transfert').click(function (event) {
    var id = $(this).val();
    $('#Mtid').val(id);
  });
  $('.modal_retour').click(function (event) {
    var id = $(this).val();
    $('#Mrid').val(id);
    
  });
  // ***
});
function deletemateriel(id) {
  $.ajax({
    type: "POST",
    url: "../php/switchcase_materiel.php",
    data: "etat=5&id=" + id,
    success: function (msg, statut) {
      window.location = "./page_materiel.php";
    },
    error: function (resultat, statut, erreur) {
      alert(statut);
    }
  });
}
function deletelogement(id) {
  $.ajax({
    type: "POST",
    url: "../php/switchcase_materiel.php",
    data: "etat=9&id="+id,
    success: function (msg, statut) {
      window.location = "./page_materiel.php";
    },
    error: function (resultat, statut, erreur) {
      alert(statut);
    }
  });
}

function setSelectedIndex(s, valsearch){
  // Loop through all the items in drop down list
  for (i = 0; i< s.options.length; i++){
    if (s.options[i].value == valsearch) {
      // Item is found. Set its property and exit
      s.options[i].selected = true;
      break;
    }
  }
  return;
}
