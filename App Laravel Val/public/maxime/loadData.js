let div = document.createElement('div'); // Créer un élément div
div.classList.add("container"); // Définir l'identifiant de l'élément div
div.id = "all_data";
document.body.appendChild(div); // Ajouter l'élément div au corps de la page

all_data = document.getElementById("all_data");

// Charger les données depuis le fichier JSON
fetch('data.json')
  .then(response => response.json())
  .then(data => {
    // Parcourir chaque élément de la liste
    i = 1;
    data.forEach(element => {
        // Créer l'élément canvas
        let canvas = document.createElement('canvas');
        canvas.style.backgroundColor = 'white';

        canvas.width = 400;
        canvas.height = 200;
        canvas.id = i;

        // Créer l'élément script
        let script = document.createElement('script');
        script.textContent = `startGraph("${i}","${element.name}",[${element.data}],${element.value_x},"${element.unity}");`;

let div = document.createElement("div");
div.classList.add('card');
all_data.appendChild(div);

let h2_name = document.createElement("h2");
let h2_text = document.createTextNode(element.name);

let btn = document.createElement("button");
btn.classList.add('button');
let btn_text = document.createTextNode("Télécharger");

        // Ajouter les éléments à l'élément all_data
	div.appendChild(h2_name);
	h2_name.appendChild(h2_text);
        div.appendChild(canvas);
        div.appendChild(script);

	div.appendChild(btn);
	btn.appendChild(btn_text);

        i += 1;
    });
  })
