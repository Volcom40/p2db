// voici la fonction qui permet de générer les menus de la page d'accueil,
// si le nombre de menu est impaire il en génère un invisible pour le client,
// input image/txt/descriptif/ importent les images et le texte et les liens

function creationmenu(){

var inputimage = ["../img/jean-floue.jpg","../img/jean-floue.jpg","../img/jean-floue.jpg",,"../img/jean-floue.jpg","../img/jean-floue.jpg","../img/jean-floue.jpg"];
var inputtxt =["Créer Compte Client","Consulter Compte Client","Gestion Activité","Gestion Matériel","Gestion Repas"];
var html = "";
var descriptif =["Création de famille/membre","Consulter/Editer famille","Accès au gestionnaire activité","Accès au gestionnaire logement","Accès au gestionnaire materiel","Acces au gestionnaire des repas",];
var lien =["../pages/page_ajoutclient.php","../pages/page_rechercheclient.php","../pages/page_activite.php","../pages/page_materiel.php","../pages/page_repas.php","../pages/page_repas.php"];
html += '<div class="row justify-content-around ">';

for(var i =0; i< inputtxt.length;i++){

    html += '<div onclick="document.location.href=\'' + lien[i] +'\'" class="col-xs-8  col-sm-8 col-sd-5 col-lg-5 img1 rounded mb-3 mt-4 btn">';
    html += '<div class="text-center text-white overflow-hidden rounded border border-white m-4">';
    html += '<h2 class="display-5 ">' + inputtxt[i] + '</h2>';
    html += '<p class="lead"> '+ descriptif[i] +'.</p>';
    html += '</div>';
    html += '</div>';

}
if (inputtxt.length%2 == 1){
        html += '<div class=" col-xs-8 col-sm-8 col-sd-5 col-lg-5 hidden">';
        html += '</div>';
    }
html += '</div>';

document.getElementById('menus').innerHTML = html;

};
