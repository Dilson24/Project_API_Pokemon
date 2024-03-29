
const cargarPokemon = async() =>{
   
    try{
        const respuesta = await fetch("https://pokeapi.co/api/v2/pokemon/");
        console.log(respuesta);
        const datos = await respuesta.json();
        console.log(datos.results);
        let pokemones = '';   
        
        datos.results.forEach(pokemon => {
            console.log(pokemon.name);
            pokemones = pokemones + `
            
            <div id="item" class="${pokemon.name}">
            <button class="btns" id="${pokemon.name}" onclick="${pokemon.name}()">${pokemon.name.toUpperCase()}</button>
            </div>
            `;
            
        });
   
        document.getElementById("contenido").innerHTML = pokemones;
    } catch(error){
        console.log(error);
    }
    
}
cargarPokemon();


function bulbasaur() {
    window.location.href = "Particials/1.html";
};

function ivysaur() {
    window.location.href = "Particials/2.html";
};
function venusaur() {
    window.location.href = "Particials/3.html";
};

function charmander() {
    window.location.href = "Particials/4.html";
};
function charmeleon() {
    window.location.href = "Particials/5.html";
};

function charizard() {
    window.location.href = "Particials/6.html";
};
function squirtle() {
    window.location.href = "Particials/7.html";
};

function wartortle() {
    window.location.href = "Particials/8.html";
};
function blastoise() {
    window.location.href = "Particials/9.html";
};

function caterpie() {
    window.location.href = "Particials/10.html";
};
function metapod() {
    window.location.href = "Particials/11.html";
};

function butterfree() {
    window.location.href = "Particials/12.html";
};
function weedle() {
    window.location.href = "Particials/13.html";
};

function kakuna() {
    window.location.href = "Particials/14.html";
};
function beedrill() {
    window.location.href = "Particials/15.html";
};

function pidgey() {
    window.location.href = "Particials/16.html";
};
function pidgeotto() {
    window.location.href = "Particials/17.html";
};

function pidgeot() {
    window.location.href = "Particials/18.html";
};
function rattata() {
    window.location.href = "Particials/19.html";
};
function raticate() {
    window.location.href = "Particials/20.html";
};
