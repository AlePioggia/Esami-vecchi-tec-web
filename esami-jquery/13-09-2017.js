$(document).ready(function(){
    /*Intestazione di riga*/
    $("table tr:nth-of-type(2)>th, table tr:nth-of-type(3)>th, table tr:nth-of-type(4)>th, table tr:nth-of-type(5)>th, table tr:nth-of-type(6)>th").click(function(){
        $(this).css("background-color", "#0F0");
        $(this).nextAll().each(function() {
                $(this).css("background-color", "#0F0");
        });
        $(this).click(function() {
            $(this).css("background-color", "white");
            $(this).nextAll().each(function() {
                    $(this).css("background-color", "white");
                    $(this).nextAll().css("background-color", "white");
            });
        });
    });
    /*Intestazione di colonna*/
    $("table tr:first-of-type th").click(function() {
        const selected = $(this).index();
        $(this).css("background-color", "red");
        $("table tr:not(first-of-type) td:nth-of-type(" + selected + ")").css("background-color", "red");
        $("table tr:first-of-type>td").css("background-color", "white");
        $(this).click(function() {
            $(this).css("background-color", "white");
            $("table tr:not(first-of-type) td:nth-of-type(" + selected + ")").css("background-color", "white");
        });
    });
  });