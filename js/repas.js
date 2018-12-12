$(document).ready(function() {
    $('.delete_plat').on('click', function () {
      var id = $(this).val();
      $.confirm({
          theme: 'supervan',
          title: 'Suppression du plat',
          content: 'Êtes-vous sûr de vouloir supprimer ce plat zdd?',
          buttons: {
              Valider: function () {deleteplat(id);},
              Annuler: function () {
              }
          }
      });
    });
    $('.delete_formule').on('click', function () {
      var id = $(this).val();
      $.confirm({
          theme: 'supervan',
          title: 'Suppression de la formule',
          content: 'Êtes-vous sûr de vouloir supprimer cette formule ?',
          buttons: {
              Valider: function () {deleteformule(id);},
              Annuler: function () {
              }
          }
      });
    });
    $('.delete_boisson_confirm').on('click', function () {
      var id = $(this).val();
      $.confirm({
          theme: 'supervan',
          title: 'Suppression de la boisson',
          content: 'Êtes-vous sûr de vouloir supprimer cette boisson ?',
          buttons: {
              Valider: function () {deleteboisson(id);},
              Annuler: function () {
              }
          }
      });
    });
    $('.modal_modif_plat').on('click', function (){
      var id = $(this).val()
      $.ajax({
          type: "POST",
          url: "../php/switchcase_repas.php",
          data: "type=10&id="+id,
          success : function(msg, statut){
            var dataJson = jQuery.parseJSON(msg);
            var user=dataJson.Plat;
            $('#Mnom_plat').val(user["0"].nom_plat);
            var type_plat = user["0"].id_typeplat;
            console.log(type_plat);
            setSelectedIndex(document.getElementById("Mtype_plat"), type_plat);
            $('#Mid_plat').val(user["0"].id_plat);
            $('#modalModif_plat').modal('show');
          },
          error: function(resultat, statut, erreur){
            console.log(resultat);
            alert (statut);
          },
      });
    });
    $('.modal_modif_formule').on('click', function (){
      var id = $(this).val();
      $.ajax({
          type: "POST",
          url: "../php/switchcase_repas.php",
          data: "type=12&id="+id,
          success : function(msg, statut){
            console.log(msg);
            var dataJson = jQuery.parseJSON(msg);
            var user=dataJson.Formule;
            $('#Mnom_formule').val(user["0"].nom_formule);
            console.log(user);
            setSelectedIndex(document.getElementById("Mtype_formule"), user["0"].id_typeformule);
            setSelectedIndex(document.getElementById("Maccompagne_formule"), user["0"].id_plat);
            setSelectedIndex(document.getElementById("Mviande_formule"), user["1"].id_plat);
            setSelectedIndex(document.getElementById("Mboisson_formule"), user["0"].id_boisson);
            $('#Mid_formule').val(user["0"].id_formule);
            $('#Mid_accompagne').val(user["1"].id_plat);
            $('#Mid_viande').val(user["0"].id_plat);
            $('#MFid_boisson').val(user["0"].id_boisson);
            $('#modalModif_formule').modal('show');
          },
          error: function(resultat, statut, erreur){
            console.log(resultat);
            alert (statut);
          },
      });
    });
    $('.modal_modif_boisson').on('click', function (){
      var id = $(this).val();
      $.ajax({
          type: "POST",
          url: "../php/switchcase_repas.php",
          data: "type=11&id="+id,
          success : function(msg, statut){
            var dataJson = jQuery.parseJSON(msg);
            var user=dataJson.Boisson;
            $('#Mnom_boisson').val(user["0"].nom_boisson);
            $('#Malcool').val(user["0"].alcoolise);
            if(user["0"].alcoolise == "1"){
              document.getElementById("Malcool").checked = true;
            }else{
              document.getElementById("Malcool").checked = false;
            }

            $('#Mid_boisson').val(user["0"].id_boisson);
            $('#modalModif_boisson').modal('show');
          },
          error: function(resultat, statut, erreur){
            console.log(resultat);
            alert (statut);
          },
      });
    });
});

function deleteboisson(id){
  $.ajax({
      type: "POST",
      url: "../php/switchcase_repas.php",
      data: "type=3&id="+id,
      success : function(msg, statut){
        window.location="./page_repas.php";
      },
      error: function(resultat, statut, erreur){
        alert (statut);
      },
  });
}
function deleteformule(id){
  $.ajax({
      type: "POST",
      url: "../php/switchcase_repas.php",
      data: "type=5&id="+id,
      success : function(msg, statut){
        window.location="./page_repas.php";
      },
      error: function(resultat, statut, erreur){
        alert (statut);
      },
  });
}
function deleteplat(id){
  $.ajax({
      type: "POST",
      url: "../php/switchcase_repas.php",
      data: "type=4&id="+id,
      success : function(msg, statut){
        window.location="./page_repas.php";
      },
      error: function(resultat, statut, erreur){
        alert (statut);
      },
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
