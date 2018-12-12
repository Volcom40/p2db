//Pour voir le modal bootstrap qui vas permettre en même temps de faire l'appel ajax
$(document).ready(function() {
    $('.modal_modif').click(function (event) {
      // $('#modal_modif').modal('show');
      $.ajax({
            type: "POST",
            url: "../php/deletetypeactbyid.php",
            data: "type=5&id="+$(this).val(),
            success : function(msg, statut){
              var dataJson = jQuery.parseJSON(msg);
              var user=dataJson.Activity;
              console.log(user);
              $('#Mnom_activite').val(user["0"].nom_activite);
              $('#Msecteur_activite').val(user["0"].secteur_activite);
              $('#Mtel_activite').val(user["0"].tel_activite);
              $('#Mmail_activite').val(user["0"].mail_activite);
              $('#Murl_activite').val(user["0"].url_activite);
              $('#Mdescriptif_activite').val(user["0"].descriptif_activite);
              $('#Madresse_activite').val(user["0"].adresse_activite);
              $('#Mville_activite').val(user["0"].ville_activite);
              $('#Mid').val(user["0"].id_activite);
              $('#modal_modif').modal('show');
            },
            error: function(resultat, statut, erreur){
              alert (statut);
            }
        });

    });

    $('.modal_look').click(function(event){
      $.ajax({
            type: "POST",
            url:  "../php/deletetypeactbyid.php",
            data: "type=3&id="+$(this).val(),
            success : function(msg, statut){
              var dataJson = jQuery.parseJSON(msg);
              var user=dataJson.Activity;
              $('#nom_activite').text(user["0"].nom_activite);
              $('#secteur_activite').text(user["0"].secteur_activite);
              $('#tel_activite').text(user["0"].tel_activite);
              $('#mail_activite').text(user["0"].mail_activite);
              $('#date_activite').text(user["0"].date_activite);
              $('#url_activite').text(user["0"].url_activite);
              $('#descriptif_activite').text(user["0"].descriptif_activite);
              $('#adresse_activite').text(user["0"].adresse_activite);
              $('#ville_activite').text(user["0"].ville_activite);
              $('#modal_look').modal('show');
            },
            error: function(resultat, statut, erreur){
              alert (statut);
            }
        });
    });

    $('.modal_delet_type_activite').click(function (event) {
      var id = $(this).val()
      $.confirm({
          theme: 'supervan',
          title: "Suppression secteur d'activité",
          content: "Êtes-vous sûr de vouloir supprimer ce secteur ?<br><br>Attention cette action supprimera toutes les activités à l'intérieur.",
          buttons: {
              Valider: function(){
                deletetype(id)},
              Annuler: function () {
              }
          }
      });


    });

    $('.delete_confirm').on('click', function () {
      var id = $(this).val();
      $.confirm({
          theme: 'supervan',
          title: "Suppression d'activité",
          content: 'Êtes-vous sûr de vouloir supprimer cette activité ?',
          buttons: {
              Valider: function(){deleteactivite(id)},
              Annuler: function () {
              }
          }
        });
      });

});

function deletetype(id){
  $.ajax({
        type: "POST",
        url: "../php/deletetypeactbyid.php",
        data: "type=1&id="+id,
        success : function(msg, statut){
          window.location="./page_activite.php";
        },
        error: function(resultat, statut, erreur){
          alert (statut);
        }
    });
}

function deleteactivite(id){
  $.ajax({
        type: "POST",
        url: "../php/deletetypeactbyid.php",
        data: "type=2&id="+id,
        success : function(msg, statut){
          window.location="./page_activite.php";
        },
        error: function(resultat, statut, erreur){
          alert (statut);
        }
    });
}
