<?php

	//include("server.php");
			
			
			
/*INSERT INTO `llx_socpeople`(`datec`,`tms`,`fk_soc`,`lastname`,`firstname`,`address`,`zip`,`town`,`birthday`,`phone`,`fk_user_creat`,`fk_user_modif`)
VALUES('2017-04-26 10:36:53','2017-04-26 10:42:20',35,'Murer', 'Rudy', 'quelque part en France', '26400', 'Eurre', '1997-11-03', '0699999999',1,1);
*/




function header()
{
	$('#truc').css("background-color","#318CE7");

}

	function mycss() {
	
   $('h1').css("color","blue");
   $("table").css("border","2px solid black");
   $("tbody").css("border","1px solid black");
   $("td").css("border","1px solid black");
   $("th").css("border","1px solid black");
   
   
    
}
   


function navbar() {

  $('.sidenav')
  .css("height","100%")
  .css("width","0")
  .css("position","fixed")
  .css("z-index,1")
  .css("top",0)
  .css("left",0)
  .css("background-color","#318CE7")
  .css("overflow-x", "hidden")
  .css("transition","0.5s")
  .css("padding-top","60px");
  /*
 $('.sidenav > a')
     .css("padding","8px 8px 8px 32px")
     .css("text-decoration","none")
     .css("font-size","25px")
     .css("color","#FEFEFE")
     .css("display","block")
     .css("transition","0.3s");*/
    
    
}





  
  


$(document).ready(function () {
    

	alert("JS ACTIVATED");
    mycss();

    navbar();
	
    header();


    

});
</script>