class Persona {
    constructor(nome, cognome, dataDiNascita) {
        this.nome = nome;
        this.cognome = cognome;
        this.dataDiNascita = dataDiNascita;
    }

    infoPersonaConsole() {
        console.log("nome: " + this.nome + ", cognome: " + this.cognome + ", data di nascita: " + this.dataDiNascita);
    }

    infoPersonaDOM() {
        let code = `
            <div class=card>
            <h2>${this.nome} ${this.cognome}</h2>
            <p>${this.dataDiNascita}<span>x</span></p>
            </div>
        `;
        $("div.people").append(code);
    }
}

$(document).ready(function(){
    let people = [];
    $("button").click(function(e){
        e.preventDefault();
        if($("label:nth-of-type(1) input").val().length > 1
        && $("label:nth-of-type(2) input").val().length > 1
        && $("label:nth-of-type(3) input").val() != 0) {
            let persona = new Persona($("label:nth-of-type(1) input").val(), $("label:nth-of-type(2) input").val(), $("label:nth-of-type(3) input").val());
            persona.infoPersonaDOM();
            persona.infoPersonaConsole();
            people.push(persona);
        } else{
            alert("Hai sbagliato l'inserimento, pirla");
        }
        $("span").click(function(e) {
            console.log(people);
            people.pop();
            console.log(people);
        });
    });
});