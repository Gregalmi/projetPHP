// :::::::::::::::::::::::::::::::::::::::::PARTIE MES-RECETTES-CREATE::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
console.log("hello world!");

let pageActive = document.getElementsByClassName('nav-link');
let classActive = 'active';
nav-link






function ajouter(identifiant){
   
    let num= [2, 3, 4, 5, 6, 7, 8, 9, 10];
    for (i = 0; i <9 ; i++){ 
    if (identifiant == 'ajouterIngredient' ){
        let mesure = document.getElementById("mesure");
        let inputIngredient = 
              ` <input type="text" name="ingredient`+ num[i] + `" placeholder="ingredient`+ num[i] + `">
                <input type="number" name="quantite`+ num[i] + `" placeholder="quantite">
                <select name="mesure`+ num[i] + `" >
                    <option value="">Veuillez sélectionner un type de mesure:</option>
                    <option value="g">g</option>
                    <option value="ml">ml</option>
                </select>`;
        mesure.insertAdjacentHTML('beforebegin', inputIngredient); 

    }else if(identifiant  == 'ajouterEtape' ){
        let etape = document.getElementById("etape");
        let inputEtape = 
              ` <input  type="text" name="etape`+ num[i] + `" placeholder="etape`+ num[i] + `">`;
        etape.insertAdjacentHTML('beforebegin', inputEtape); 

    }else if(identifiant  == 'ajouterCategorie' ){
        
        let categorie = document.getElementById("categorie");
        let inputCategorie = 
              ` <input  type="text" name="categorie`+ num[i] + `"  placeholder="categorie`+ num[i] + `  ">`;
              categorie.insertAdjacentHTML('beforebegin', inputCategorie); 

            
    }
}



// <input type="text" name="ingredient1" placeholder="ingredient">
// <input type="number" name="quantite-ingredient" placeholder="quantite de l'ingrédient">
// <select name="mesure" id="mesure">
//     <option value="">Veuillez sélectionner un type de mesure:</option>
//     <option value="g">g</option>
//     <option value="ml">ml</option>
// </select>

    
} 