var cal = document.getElementById("Calendrier"); // La div qui contient le calendrier
var color = ""; // Couleur pour les réservations
var txtCal = "";  // Stocke tout le HTML qui sera affiché à la fin
var nombreJoursMois = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
var semaines = 0;
var localDate = new Date();
var annee = localDate.getFullYear();

/** Renvoie le nom du mois à partir de son numéro
* @param {number} nbMois Numéro du mois dans l'année [0;11]
* @returns Nom du mois
*/
function getMoisFromNb(nbMois) {
    var listeMois = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
    return listeMois[nbMois];
}

var moisN = getMoisFromNb(moisN);

if (annee % 4 == 0 && annee != 1900) { // Si l'année est bisextile 
    nombreJoursMois[1] = 29;
}

var nombreJours = nombreJoursMois[moisN]; // On stocke le nombre de jours du mois actuel
var today = localDate.getDate() + " " + mois + " " + annee;

var depart = date;
depart.setDate(1); // On veut faire partir le calendrier au jour 1 pour ensuite : 
depart = depart.getDay(); // Commencer au jour de la semaine correspondant au 1er du mois

if (annee != localDate.getFullYear() || moisN != localDate.getMonth()) { // Pour ne pas avoir le chiffre en rouge quand on navigue dans les mois
    today = mois + " " + annee;
}

// On affiche le début du cal avec le nom des jours de la semaine
txtCal += '<table class="mx-auto" id="cal_calendrier"><tbody id="cal_body"><tr><th colspan="7"><img id="cal_imgL" src="../img/FlecheGauche.png" onclick="prev()"><p id="today">' + today + '</p><img id="cal_imgR" src="../img/FlecheDroite.png" onclick="next()"></th></tr>';
txtCal += '<tr class="cal_j_semaines"><th>Dim</th><th>Lun</th><th>Mar</th><th>Mer</th><th>Jeu</th><th>Ven</th><th>Sam</th></tr><tr>';

for (var i = 1; i <= depart; i++) { // On affiche la fin du mois précédent
    color = codeCouleur((nombreJoursMois[0] - depart + i), moisN, annee, "75");

    if (moisN == 0) {
        txtCal += '<td class="cal_jours_av_ap" ' + color + 'onclick="redirection(' + (nombreJoursMois[0] - depart + i) + ', \'' + getMoisFromNb(moisN - 1) + '\', ' + annee + ')">' + (nombreJoursMois[0] - depart + i) + '</td>';
    } else {
        txtCal += '<td class="cal_jours_av_ap" ' + color + 'onclick="redirection(' + (nombreJoursMois[moisN - 1] - depart + i) + ', \'' + getMoisFromNb(moisN - 1) + '\', ' + annee + ')">' + (nombreJoursMois[moisN - 1] - depart + i) + '</td>';
    }
    semaines++;
}

for (var i = 1; i <= nombreJours; i++) { // On affiche les n° des jours
    color = codeCouleur(i, (moisN + 1), annee, "");

    if (semaines == 0) { // Si c'est la première semaine
        txtCal += '<tr>'; // On ouvre le 'tr'
    }
    if (localDate.getDate() == i && moisN == localDate.getMonth() && annee == localDate.getFullYear()) { // Si c'est aujourd'hui, on applique un style different
        txtCal += '<td id="cal_aujourdhui" ' + color + 'onclick="redirection(' + i + ', \'' + mois + '\', ' + annee + ')">' + i + '</td>';
    }
    else { // Sinon normal
        txtCal += '<td ' + color + 'onclick="redirection(' + i + ', \'' + mois + '\', ' + annee + ')">' + i + '</td>';
    }
    semaines++;
    if (semaines == 7) { // Dernière semaine
        txtCal += '</tr>'; // On ferme le 'tr'
        semaines = 0;
    }
}

for (i = 1; semaines != 0; i++) { // On affiche le début du mois suivant
    color = codeCouleur(i, (moisN + 2), annee, "75");
    txtCal += '<td class="cal_jours_av_ap" ' + color + 'onclick="redirection(' + i + ', \'' + getMoisFromNb(moisN + 1) + '\', ' + annee + ')">' + i + '</td>';
    semaines++;
    if (semaines == 7) {
        txtCal += '</tr>';
        semaines = 0;
    }
}

txtCal += '</tbody></table>'; // On ferme le tableau
cal.innerHTML = txtCal; // On affiche le calendrier dans sa DIV (cal)

