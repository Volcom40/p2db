//Pour voir le modal bootstrap qui vas permettre en même temps de faire l'appel ajax
$(document).ready(function() {
    $('.modalModif_adulte').click(function (event) {
        $.ajax({
            type: "POST",
            url: "../php/switchcase_search.php",
            data: "type=1&id="+$(this).val(),
            success : function(msg, statut){
              var dataJson = jQuery.parseJSON(msg);
              var user=dataJson.AllUsers;
                $('#Mnom_adulte').val(user["0"]. nom_personne);
                $('#Mprenom_adulte').val(user["0"].prenom_personne);
                $('#Memail_adulte').val(user["0"].mail_adulte);
                $('#Mtel_adulte').val(user["0"].phone_adulte);
                var situation = user["0"].situationfamiliale_adulte;
                setSelectedIndex(document.getElementById("Mselect2_adulte"), situation);
                $('#Mgroupe_adulte').val(user["0"].nom_groupe);
                $('#Mprofession_adulte').val(user["0"].entreprise_adulte);
                $('#Mdarrive_adulte').val(user["0"].arrive_conciergerie);
                $('#Mddepart_adulte').val(user["0"].depart_conciergerie);
                $('#Mattentes_adulte').val(user["0"].attente_conciergerie);
                $('#Mhpetitdej_adulte').val(user["0"].hdejeuner_conciergerie);
                $('#Mhdiner_adulte').val(user["0"].hdiner_conciergerie);
                $('#Mgouts_adulte').val(user["0"].gouts_conciergerie);
                $('#Mconnaisance_adulte').val(user["0"].connaisetablissement_conciergerie);
                $('#Mraison_adulte').val(user["0"].raisonvenue_conciergerie);
                var regime = user["0"].regime_conciergerie;
                setSelectedIndex(document.getElementById("Mselect_adulte"), regime);
                $('#Mloisirs_adulte').val(user["0"].loisir_conciergerie);
                $('#Maime_adulte').val(user["0"].aimeaimepas_conciergerie);
                $('#Mpostal_adulte').val(user["0"].codepostal_adulte);
                $('#Mcodepostal').val(user["0"].codepostal_adulte);
                $('#Mcommune').val(user["0"].ville_adulte);
                $('#Madresse').val(user["0"].adresse_adulte);
                $('#Mid').val(user["0"].id_personne);
                $('#modalModif_adulte').modal('show');
            },
            error: function(resultat, statut, erreur){
              console.log(resultat);
              alert (statut);
            },
        });

    });

    $('.modalLook_adulte').click(function(event){

      $('#Mid').val($(this).val());
      $.ajax({
            type: "POST",
            url: "../php/switchcase_search.php",
            data: "type=1&id="+$(this).val(),
            success : function(msg, statut){
              var dataJson = jQuery.parseJSON(msg);
              var user = dataJson.AllUsers;
              $('#Lnom_adulte').text(user["0"].nom_personne);
              $('#Lprenom_adulte').text(user["0"].prenom_personne);
              $('#Lemail_adulte').text(user["0"].mail_adulte);
              $('#Ltel_adulte').text(user["0"].phone_adulte);
              $('#Lsituation_adulte').text(user["0"]. situationfamiliale_adulte);
              $('#Lgroupe_adulte').text(user["0"].nom_groupe);
              $('#Lprofession_adulte').text(user["0"].entreprise_adulte);
              $('#Ldarrive_adulte').text(user["0"].arrive_conciergerie);
              $('#Lddepart_adulte').text(user["0"].depart_conciergerie);
              $('#Lattentes_adulte').text(user["0"].attente_conciergerie);
              $('#Lhpetitdej_adulte').text(user["0"].hdejeuner_conciergerie);
              $('#Lhdiner_adulte').text(user["0"].hdiner_conciergerie);
              $('#Lgouts_adulte').text(user["0"].gouts_conciergerie);
              $('#Loriginevenue_adulte').text(user["0"].connaisetablissement_conciergerie);
              $('#Lraisonvenue_adulte').text(user["0"].raisonvenue_conciergerie);
              $('#Lregime_adulte').text(user[0].regime_conciergerie);
              $('#Lloisirs_adulte').text(user["0"].loisir_conciergerie);
              $('#Laime_adulte').text(user["0"].aimeaimepas_conciergerie);
              $('#Lcodepostal_adulte').text(user["0"].codepostal_adulte);
              $('#Lville_adulte').text(user["0"].ville_adulte);
              $('#Ladresse_adulte').text(user["0"].adresse_adulte);
              $('#modalLook_adulte').modal('show');
            },
            error: function(resultat, statut, erreur){
              console.log(resultat);
            },
        });
    });

    $('.delete_confirm').on('click', function () {
     var id = $(this).val();
      $.confirm({
          theme: 'supervan',
          title: 'Suppression client',
          content: 'Êtes-vous sûr de vouloir supprimer cet utilisateur ?',
          buttons: {
              Valider: function () {deleteuser(id);},
              Annuler: function () {
              }
          }
      });
    });

    $('.modalModif_enfant').click(function (event) {
        $.ajax({
            type: "POST",
            url: "../php/switchcase_search.php",
            data: "type=5&id="+$(this).val(),
            success : function(msg, statut){
              var dataJson = jQuery.parseJSON(msg);
              var user = dataJson.AllUsers;
              $('#Mnom_enfant').val(user["0"]. nom_personne);
              $('#Mprenom_enfant').val(user["0"].prenom_personne);
              $('#Mgroupe_enfant').val(user["0"].nom_groupe);
              $('#Mhpetitdej_enfant').val(user["0"].hdejeuner_conciergerie);
              $('#Mhdiner_enfant').val(user["0"].hdiner_conciergerie);
              $('#Mgouts_enfant').val(user["0"].gouts_conciergerie);
              var regime = user["0"].regime_conciergerie;
              setSelectedIndex(document.getElementById("Mselect_enfant"), regime);
              $('#Mloisirs_enfant').val(user["0"].loisir_conciergerie);
              $('#Maime_enfant').val(user["0"].aimeaimepas_conciergerie);
              $('#Meid').val(user["0"].id_personne);
              $('#modalModif_enfant').modal('show');
            },
            error: function(resultat, statut, erreur){
              console.log(resultat);
              alert (statut);
            },
        });

    });

    $('.modalLook_enfant').click(function(event){
      $.ajax({
            type: "POST",
            url: "../php/switchcase_search.php",
            data: "type=5&id="+$(this).val(),
            success : function(msg, statut){
              console.log(msg);
              var dataJson = jQuery.parseJSON(msg);
              var user=dataJson.AllUsers;
              $('#Lnom_enfant').text(user["0"]. nom_personne);
              $('#Lprenom_enfant').text(user["0"].prenom_personne);
              $('#Lgroupe_enfant').text(user["0"].nom_groupe);
              $('#Lhpetitdej_enfant').text(user["0"].hdejeuner_conciergerie);
              $('#Lhdiner_enfant').text(user["0"].hdiner_conciergerie);
              $('#Lgouts_enfant').text(user["0"].gouts_conciergerie);
              $('#Lloisirs_enfant').text(user["0"].loisir_conciergerie);
              $('#Laime_enfant').text(user["0"].aimeaimepas_conciergerie );
              $('#Lregime_enfant').text(user["0"].regime_conciergerie );
              $('#modalLook_enfant').modal('show');
            },
            error: function(resultat, statut, erreur){
              console.log(resultat);
            },
        });
    });

    $('.export_all_mail').click(function(){
      $('#modalLook_mail').modal('show');
    });

    $('.export_csv').click(function(){
      $('#table_mail').tableExport({type:'csv',escape:'false', separation:';'});
    });

    $('.export_client_adulte').click(function(){
      $.print("#info_adulte");
    });

    $('.export_client_enfant').click(function(){
      $.print("#info_enfant");
    });
});

function deleteuser(id){
  $.ajax({
        type: "POST",
        url: "../php/switchcase_search.php",
        data: "type=2&id="+id,
        success : function(msg, statut){
          window.location="./page_rechercheclient.php";
        },
        error: function(resultat, statut, erreur){
          alert (statut);
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
