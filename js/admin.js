$(document).ready(function () {
    $("input[name=giornoGara]").on('input', function () {
        var input = $(this);
        var val = input.val();
        var reg = new RegExp('^\\d{4}\\-(0?[1-9]|1[012])\\-(0?[1-9]|[12][0-9]|3[01])$');
        var res = reg.test(val);
        if (res) {
            input.removeClass("invalid");
            document.getElementById("applicaModificheGara").disabled = false;
        }
        else {
            input.addClass("invalid");
            document.getElementById("applicaModificheGara").disabled = true;
        }
    });
    $('#descrizione').on('input', function () {
        var input = $(this);
        var val = input.val();
        var res = val.length < 500;
        if (res) {
            input.removeClass("invalid");
            document.getElementById("inserisciNews").disabled = false;
        }
        else {
            input.addClass("invalid");
            document.getElementById("inserisciNews").disabled = true;
        }
    });
    $('#indirizzo').on('input', function () {
        var input = $(this);
        var val = input.val();
        var expression = /https?:\/\/(www\.)?[-a-zA-Z0-9@:%_\+.~#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=]*)?/gi;
        var regex = new RegExp(expression);
        var res = regex.test(val);
        if (res) {
            input.removeClass("invalid");
            document.getElementById("inserisciNews").disabled = false;
        }
        else {
            input.addClass("invalid");
            document.getElementById("inserisciNews").disabled = true;
        }
    });
    $('#data').on('input', function () {
        var input = $(this);
        var val = input.val();
        var reg = new RegExp('^\\d{4}\\-(0?[1-9]|1[012])\\-(0?[1-9]|[12][0-9]|3[01])$');
        var res = reg.test(val);
        if (res) {
            input.removeClass("invalid");
            document.getElementById("inserisciNews").disabled = false;
        }
        else {
            input.addClass("invalid");
            document.getElementById("inserisciNews").disabled = true;
        }
    });


    var url = window.location.href.split("?");
    if (url[1] == "cosa=azione" || url[1] == "azione=inserimentoRisultati") {
        $('#ins').addClass("active");
    } else if (url[1] == "azione=modificaGare") {
        $('#mod').addClass("active");
    } else {
        $('#insN').addClass("active");
    }





});
