function Create_Graph(name_canvas,name_graph,data,value_x){
    // Récupérer l'élément canvas
    var canvas = document.getElementById(name_canvas);

    // Récupérer le contexte 2D de la balise canvas
    var context = canvas.getContext("2d");

    // Récupérer la largeur et la hauteur de la balise canvas
    var canvasWidth = canvas.width;
    var canvasHeight = canvas.height;

    // Définir les données du graphique (par exemple, les valeurs de y pour chaque point)
    var data = data;

    // Définir les dimensions du graphique
    var graphWidth = canvasWidth - 100;
    var graphHeight = canvasHeight - 100;

    // Définir les valeurs personnalisées pour l'axe X et Y
    var xValues = value_x;

    // taille du texte
    size_text = 12;
    // Définir la police de caractères et la taille du texte
    context.font = size_text+"px Arial";

    context.strokeStyle = '#000000';

    // Dessiner l'axe horizontal
    context.beginPath();
    context.moveTo(50, canvasHeight - 50);
    context.lineTo(canvasWidth - 50 + size_text, canvasHeight - 50);
    context.stroke();

    // Dessiner l'axe vertical
    context.beginPath();
    context.moveTo(50, canvasHeight - 50);
    context.lineTo(50, 50 - size_text);
    context.stroke();

    // Dessiner les valeurs de texte sur l'axe horizontal
    context.textAlign = "center";
    for (var i = 0; i < data.length; i++) {
        var x = 50 + i * (graphWidth / (data.length - 1));
        var y = canvasHeight - 30;
        context.fillText(xValues[i], x, y);
    }

    // Dessiner les valeurs de texte sur l'axe vertical
    context.textAlign = "right";
    max_value = 0;
    min_value = 0;
    for (var i = 0; i < data.length; i++) {
        if( data[i] > max_value) {
            max_value = data[i];
        }
        if( i == 0) {
            min_value = data[i];
        }
        if( data[i] < min_value) {
            min_value = data[i];
        }
    }
    context.fillText(max_value, 45, 47.5); // Ecrire le Maximum
    context.fillText( parseInt((max_value-min_value)/1.5) , 45, (graphHeight/4)+47.5); // Ecrire le 2/6
    context.fillText( parseInt((max_value-min_value)/2) , 45, (graphHeight/2)+47.5); // Ecrire le Millieu
    context.fillText( parseInt((max_value-min_value)/4) , 45, (graphHeight/1.3)+47.5); // Ecrire le 4/6
    context.fillText(min_value, 45, graphHeight+47.5); // Ecrire le Minimum

    // Dessiner les points de données
    context.fillStyle = "#36a2eb"; // couleur Bleu Clair
    for (var i = 0; i < data.length; i++) {
        x = 50 + i * (graphWidth / (data.length - 1));
        y = canvasHeight - 50 - (data[i] / max_value * graphHeight);;
        context.beginPath();
        context.arc(x, y, 3, 0, 2 * Math.PI); // x,y, taille du pont, 0, 2 * pi
        context.fill();
    }

    // Dessiner les lignes reliant les points
    context.strokeStyle = "#36a2eb"; // couleur Bleu Clair
    context.beginPath();
    for (var i = 0; i < data.length - 1; i++) {
        var x1 = 50 + i * (graphWidth / (data.length - 1));
        var y1 = canvasHeight - 50 - (data[i] / max_value * graphHeight);
        var x2 = 50 + (i + 1) * (graphWidth / (data.length - 1));
        var y2 = canvasHeight - 50 - (data[i + 1] / max_value * graphHeight);
        context.moveTo(x1, y1);
        context.lineTo(x2, y2);
        context.stroke();
    }

    size_text = 20
    context.fillStyle = "#000000";
    context.textAlign = "center";
    // Définir la police de caractères et la taille du texte
    context.font = size_text+"px Arial";
    //context.fillText( name_graph , canvasWidth/2, size_text+10 );

}

function MouseCube(name_canvas,name_graph,data,value_x,uniter) {

    const canvas = document.getElementById(name_canvas); // sélectionner votre canevas

    canvas.addEventListener('mousemove', function(event) {
        const rect = canvas.getBoundingClientRect(); // récupérer la position du canevas
        const mouse_x = event.clientX - rect.left; // calculer la position x de la souris dans le canevas
        const mouse_y = event.clientY - rect.top; // calculer la position y de la souris dans le canevas

        data = data;
        value_x = value_x;

        var context = canvas.getContext("2d");

        // Récupérer la largeur et la hauteur de la balise canvas
        var canvasWidth = canvas.width;
        var canvasHeight = canvas.height;
        // Définir les dimensions du graphique
        var graphWidth = canvas.width - 100;
        var graphHeight = canvas.height - 100;

        // Dessiner les points de données
        for (var i = 0; i < data.length; i++) {
            var cube_x = 50 + i * (graphWidth / (data.length - 1));
            var cube_y = canvasHeight - 50 - (data[i] / max_value * graphHeight);

            var x = 50 + i * (graphWidth / (data.length - 1));
            var y = canvasHeight - 50 - (data[i] / max_value * graphHeight);

            // Si curseur sur le point
            if( mouse_x > x - 5 && mouse_x < x + 5 && mouse_y > y - 5 && mouse_y < y + 5 ){
                //console.log(x+":"+y);

                size_x = 50;
                size_y = 30;

                context.fillStyle = "#000000";
                context.fillRect(x, y-size_y, size_x, size_y);

                // taille du texte
                size_text = 12;
                context.fillStyle = "#FFF000";
                // Définir la police de caractères et la taille du texte
                context.font = size_text+"px Arial";
                context.textAlign = "left";
                context.fillText( data[i]+" "+uniter , x , y-(size_y/4)+5-2 );
                context.fillText( value_x[i] , x , y-(size_y/2)-5+2 );

                // Enregistrer la position du carré créé
                var square_x = x - (size_x / 2);
                var square_y = y;
                var square_width = size_x;
                var square_height = size_y;

            }
        }

        // Si la souris ne survole plus le point, effacer le carré
        if (!square_x || mouse_x < square_x || mouse_x > square_x + square_width || mouse_y < square_y || mouse_y > square_y + square_height) {
            context.clearRect(0, 0, canvas.width, canvas.height);
            // Redessiner le graphique sans le carré
            context.fillStyle = "#000000";
            Create_Graph(name_canvas,name_graph,data,value_x,uniter);
        }

    });


}

function startGraph(name_canvas,name_graph,data,value_x,uniter) {
    Create_Graph(name_canvas,name_graph,data,value_x,uniter);
    MouseCube(name_canvas,name_graph,data,value_x,uniter);
}
