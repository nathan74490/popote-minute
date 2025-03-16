



async function getData() {          // Fonction asynchrone pour récupérer les données de l'API et les afficher dans le menu
    const url = "http://localhost/popote-minute/api.php?acceuil";
    try {
        const response = await fetch(url);
        if (!response.ok) {
            throw new Error(`Response status: ${response.status}`);
        }

        const json = await response.json();
        console.log(json)
        for (let i = 0; i < json.length; i++) {
            document.getElementById("menu").innerHTML += `<li onclick="loadPage('${json[i]}')">${json[i]}</li>`;
        }
    } catch (error) {
        console.error(error.message);
    }
}
getData();


let param = new URLSearchParams(window.location.search);        // Récupère les paramètres de l'URL
let path = window.location.pathname;        // Récupère le chemin de l'URL
if (path == "/popote-minute/" && param == "") {      // Si l'URL est la page d'accueil
    console.log("home")
    loadPage("homepage");          // Charge la page 1
} else {            // Si l'URL est une autre page
    console.log("autre")
    const valeur = param.get('page');           // Récupère la valeur du paramètre "page"
    console.log(valeur);
    loadPage(valeur);
}
async function loadPage(id) {           // Fonction asynchrone pour charger le contenu de la p
    console.log(id)  
    const url = `http://localhost/popote-minute/api.php?page=${id}`
    console.log(url)
    try {          
        const response = await fetch(url);
        if (!response.ok) {
            throw new Error(`Response status: ${response.status}`);
        }
        const json = await response.json();
        console.log(json)
        document.getElementById("body").innerHTML = `<p>${json.content}</p>`;
        const params = new URLSearchParams(window.location.search);
        params.set('newParam', json.content);
        window.history.replaceState(null, '', '?' + 'page=' + id);
    } catch (error) {
        console.error(error.message);
    }

}