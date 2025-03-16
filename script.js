getData();


console.log("fichier js ok");
async function getData() {          // Fonction asynchrone pour récupérer les données de l'API et les afficher dans le menu
    const url = "http://localhost/coursPHP/api.php";
    try {
        const response = await fetch(url);
        if (!response.ok) {
            throw new Error(`Response status: ${response.status}`);
        }

        const json = await response.json();
        console.log(json);
        for (let i = 0; i < json.length; i++) {
            console.log(josn[i])
            document.getElementById("menu").innerHTML += `<li onclick="loadPage('${json[i]}')">${json[i]}</li>`;
        }
    } catch (error) {
        console.error(error.message);
    }
}
