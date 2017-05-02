/* Gestion des matches avec des requêtes AJAX */

var lesEquipes; // tableau des équipes

// Chargement et affichage de la liste des équipes
function listeEquipes() {
    $.getJSON( "listeEquipes.php", function(data) {
        var body = $('body');
        for(equipe of data) {
            var h2 = $('<h2>').text(equipe);
            var span = $('<span>').text('+').addClass('bouton');

            var tab = $('#aCloner').clone(true).removeAttr('id');
            
            span.click(changeEquipe);
            h2.append(span);
            body.append(h2);
            body.append(tab);
        }  
    });
}

function changeEquipe() {
    var tab = $(this).parent().next();
    
    if($(this).text() == "+") {
        tab.show();
        $(this).text("-");
        if(tab.children().last().children().length == 0) {
        
            var equipe = $(this).parent().text().slice(0,-1);
            
            $.getJSON("listeMatches.php?equipe=" + equipe, function(data) {
                for (let match of data) {
                    
                    var tr = $('<tr>');
                    tr.click(unDialog);
                    var date = new DateHeure(match.date_heure);

                    var tdDate = $('<td>').text(date.laDate());
                    tr.append(tdDate);

                    var tdHeure = $('<td>').text(date.lHeure());
                    tr.append(tdHeure);

                    var tdAdv = $('<td>').text(match.equipe_adverse);
                    tr.append(tdAdv);
                    
                    var domicile = $('<p>').text(match.domicile_exterieur).hide();
                    tr.addClass(((domicile.text() == '0') ? "exterieur" : "domicile"));          
                    tr.append(domicile);
                    
                    var journee = $('<p>').text(match.num_journee).hide();
                    tr.append(journee);

                    tab.children().last().append(tr);
                }
            });
        }
    } else {
        tab.hide();
        $(this).text("+");
    }
}

function unDialog() {
    var dialogue = $('#dialog-form');
    
    if(dialogue.find('.ui-button').length == 0) {
        dialogue.append($('<button>')
                .addClass("ui-button ui-widget ui-corner-all")
                .text("Valider")
                .css("float", "right")
                .css("margin-top", "10px")
                /*.onClick(validerMatch)*/);
        dialogue.append($('<button>')
                .addClass("ui-button ui-widget ui-corner-all")
                .text("Annuler")
                .css("float", "right")
                .css("margin-top", "10px")
                /*.onClick(function(){$(this).parent().dialog("close")})*/);
    }
        
    dialogue.find('#date').val($(this).children().eq(0).text());
    dialogue.find('#heure').val($(this).children().eq(1).text());
    dialogue.find('legend').children().eq(0).text($(this).parent().parent().prev().text().slice(0,-1));
    dialogue.find('legend').children().eq(1).text($(this).children().eq(2).text());
    
    
    if($(this).children().eq(3).text() == 0)
        dialogue.find('#domicile').prop('checked', false);
    else 
        dialogue.find('#domicile').prop('checked', true);
    
    dialogue.find('legend').children().last().text($(this).children().eq(4).text());
    
    dialogue.dialog({width:600,height:220,resizable:false,draggable:false});
}

$(document).ready(function () {
    listeEquipes();
});
