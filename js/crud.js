
    const AddAButton = document.getElementById('show_auteur_form');
    const AddPButton = document.getElementById('show_package_form');
    const AddVButton = document.getElementById('show_version_form');
      

    const auteurForm = document.getElementById('auteur_form');
    const packageForm = document.getElementById('package_form');
    const versionForm = document.getElementById('version_form');

    document.getElementById('show_auteur_form').addEventListener('click', function() {
        console.log('test');
        
        auteurForm.classList.remove('hidden'); 
        versionForm.classList.add('hidden'); 
        packageForm.classList.add('hidden'); 
    });
     

    AddPButton.addEventListener('click', function() {
        console.log('test');
        packageForm.classList.remove('hidden'); 
        versionForm.classList.add('hidden'); 
        auteurForm.classList.add('hidden'); 
    });


    AddVButton.addEventListener('click', function() {
        console.log('test');
        versionForm.classList.remove('hidden'); 
        packageForm.classList.add('hidden');
        auteurForm.classList.add('hidden');
    });





    var xhr = new XMLHttpRequest(); 

    xhr.open("GET", "http://localhost/echchabli-hamza-sql/data/CRUD.php?action=getAuteur", true);

    xhr.onload = function() {  
        console.log(xhr.responseText);
        if (xhr.status == 200) {
            fillSelect(JSON.parse(xhr.responseText)['data']); 
          
            
        } else {
            console.error('Error: ' + xhr.status);
            console.log('w');
        }
    };

    xhr.send(); 

    function fillSelect(liste) {



        let sel=document.getElementById('drop_Down');

        liste.forEach(element => {
            let op=document.createElement('option');
            op.textContent=element.nom;
            sel.appendChild(op);
        });       
    }




    var Pack = new XMLHttpRequest(); 

    Pack.open("GET", "http://localhost/echchabli-hamza-sql/data/CRUD.php?action=getPackages", true);
    //    console.log('pack');
       
    Pack.onload = function() {  
        console.log(xhr.responseText);
        if (xhr.status == 200) {
            fillPackageSelect(JSON.parse(Pack.responseText)['data']); 
          
            
        } else {
            console.error('Error: ' + xhr.status);
            console.log('w');
        }
    };

    Pack.send(); 

    function fillPackageSelect(arr) {



        let p=document.getElementById('Package_drop_Down');

        arr.forEach(element => {
            let o=document.createElement('option');
            o.textContent=element.nom;
            p.appendChild(o);
        });       
    }
    
    
    