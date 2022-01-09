$(function () {
    $("button").click(function(){
        let code=`<label>Larghezza colonne: <input type="number"></label>`;
        let selection = $("input");
        for(let i = 0; i < selection.val(); i++) {
           $(".row div:nth-of-type(2) div").append(code);
        }
        $(".row div:nth-of-type(2) div").append(`<button type="button" class="btn2">Genera colonne</button>`);
        $(".btn2").click(function() {
          let sum = 0;
          $(".row div:nth-of-type(2) div input").each(function(){
            sum = sum + parseInt($(this).val());
          });
          console.log(sum);
          if(sum == 12) {
            $("div.container-fluid").append(`<div><label>Larghezza colonne: <input type="number"></label></div>`);
          }
        });
      });
});