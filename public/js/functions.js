function mostrar($capa){
	if(document.getElementById($capa).style.display == "block"){
		document.getElementById($capa).style.display = "none";
	}else{
		document.getElementById($capa).style.display = "block";
	}
}

function borrarImagen(elemento){
	
	//Vaciamos el campo
	document.getElementById(elemento).value="";
	
	//Quitamos la previsualizacion
	switch(elemento){
    	case "image-post": 	document.getElementById("preview-image").innerHTML = ''; break;
    	case "video-post": 	document.getElementById("preview-video").innerHTML = ''; break;
    	case "gif-post": 	document.getElementById("preview-gif").innerHTML = '';break;
    }

    //Sino queda ninguna imagen quito la prev
    if(document.getElementById("image-post").value=="" && document.getElementById("video-post").value=="" &&  document.getElementById("gif-post").value=="")
		document.getElementById('preview').style.display = "none";
}
 

$(".input-upload").change(function(e){

  // Creamos el objeto de la clase FileReader
  let reader = new FileReader();
  let elemento = this.id;

  // Leemos el archivo subido y se lo pasamos a nuestro fileReader
  reader.readAsDataURL(e.target.files[0]);

  // Le decimos que cuando este listo ejecute el código interno
  reader.onload = function(){
    
    let file; let preview;

    switch(elemento){
    	case "image-post": 	preview = document.getElementById('preview-image');
    						file = document.createElement('img');
    						break;
    	case "video-post": 	preview = document.getElementById('preview-video');
    						file = document.createElement('video');
    						break;
    	case "gif-post": 	preview = document.getElementById('preview-gif');
    						file = document.createElement('img');
    						break;
    }
    document.getElementById('preview').style.display = "block";
    file.src = reader.result;
    //console.log( reader);
    preview.append(file);
  };
});

/*$(document).ready(function() { 
 
	if (window.File && window.FileList && window.FileReader) { 
 
	    $(".input-upload").on("change", function(e) { 
	 
	     var files = e.target.files, 
	 
	     filesLength = files.length; 
	 
	     for (var i = 0; i < filesLength; i++) { 
	 
	     var f = files[i] 
	 
	     var fileReader = new FileReader(); 
	 
	     fileReader.onload = (function(e) { 
	 
	      var file = e.target; 
	 
	      $("<span class=\"pip\">" + 
	 
	      "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" + 
	 
	      "<br/><span class=\"remove\">Remove image</span>" + 
	 
	      "</span>").insertAfter("#files"); 
	 
	      $(".remove").click(function(){ 
	 
	      $(this).parent(".pip").remove(); 
	 
	      }); 
	 
	     }); 
	 
	     fileReader.readAsDataURL(f); 
	 
	     } 
	 
	    }); 
 
    } else { 
 
    	alert("Your browser doesn't support to File API") 
 
    } 
 
});*/