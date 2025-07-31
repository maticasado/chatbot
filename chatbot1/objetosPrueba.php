<?php 
 include("persona.class.php");

 $persona1 = new Persona(47826529,"Matias", "Casado", null);
 var_dump($persona1);
 print"<br><br>";

 $persona1->presentacion();

 print"<br><br>";
 
 $persona2= new Persona(47826528,"Francisco", "Pansa", null);
 var_dump($persona1);
 print"<br><br>";

 $persona2->presentacion();
?> 