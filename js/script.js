console.log('test');

document.getElementById("serachIcon").addEventListener("click", function() {
    var value = document.getElementById("ProductInput").value  ;
    var xhr = new XMLHttpRequest(); 

    xhr.open("GET", "http://localhost/echchabli-hamza-sql/data/CRUD.php?action=getByAuteurOrNom&value=" + encodeURIComponent(value), true);

    xhr.onload = function() {
        if (xhr.status == 200) {
            filldisplayP(JSON.parse(xhr.responseText)['data']); 
            console.log('w');
            
        } else {
            console.error('Error: ' + xhr.status);
        }
    };

    xhr.send();  
});

function filldisplayP(res) {
    let d=document.getElementById('displayP')
        d.innerHTML="";
        console.log('w1');
         
        res.forEach(element => {
            console.log('w2');
            let card = document.createElement('div');
            card.classList.add('package-card');
            card.innerHTML=`
                   
                   <h3>${element.nom}</h3>
                   <p><strong>Description:</strong> ${element.descriptionn}.</p>
                   <p><strong>Auteur:</strong>${element.auteur}</p>
                   <div class="versions">
                       <strong>Versions:</strong><span class="version-item">${element.versio.replace(/o/g, " / ")}</span></div>
                     
            `;
             d.appendChild(card);
        });
       
        
         
    
}
