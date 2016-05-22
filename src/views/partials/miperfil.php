<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	
</head>

<div id="contenedor">
		<div id="data">
		  <div class="row card-panel light-green lighten-5 z-depth-3">
			<div class="col s12 flow-text">
			  <div>
				  <div class="col s6 card-content">
					  <h2 class="red-text text-darken-4 card-title">Datos Personales</h2>
					  <ul class="indigo-text text-darken-4" >
						<li>Name: <span class="blue-text text-darken-6"><?php echo $nombre?></span></li> 
						<li>Apellido: <span class="blue-text text-darken-6"><?php echo $apellido?></span></li>
						<li>e-m@il: <span class="blue-text text-darken-6"><?php echo $email?></span></li>
						<li>Teléfono (+34): <span class="blue-text text-darken-6"><?php echo $telefono?></span></li>
						<div class="section">
						<li>Dirección:</li>
						<li><div class="col s7 card-content"><ul class="indigo-text text-darken-4" >
							<li><h6><i class="tiny material-icons">label</i> Calle: <span class="blue-text text-darken-6"><?php echo $calle?></span></h6></li>
							<li><h6><i class="tiny material-icons">label</i> CP: <span class="blue-text text-darken-6"><?php echo $cp?></span></h6></li>
							<li><h6><i class="tiny material-icons">label</i> Ciudad: <span class="blue-text text-darken-6"><?php echo $ciudad?></span></h6></li>
							<li><h6><i class="tiny material-icons">label</i> Población: <span class="blue-text text-darken-6"><?php echo $poblacion?></span></h6></li>
						 </ul></div></li>
						 </div>
						<div class="col s7 m7 section"> 
						<li>Subastas Activas: <span class="blue-text text-darken-6"> 2 </span></li>
						<li>Pujas Activas: <span class="blue-text text-darken-6"> 2 </span></li>
					    </div>
					  </ul>
				  </div>
				  
				 <div class="card-image right ">
					<img src="/assets/images/add_user.png">
					<fieldset>
						<legend class="blue-text text-darken-6">Subir Nueva Foto:</legend>
						<form  action="#">
						<div class="file-field input-field card-reveal">
							<div class="btn">
								<span>Browse..</span>
								<input type="file">
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text">
							</div>
						</div>
						</form>
					 </fieldset>
				  </div>				   
			 </div>

			  
		     </div>
		  </div>
		</div>
	  </div>
		
	
		
		
	<div id= "derecont ">
	   
	   <div class="puja_subasta">
		  
		  <h1 id="mispujas" class="teal-text text-darken-4">Mis Pujas:</h1>
			   
		  <div class="row">
			<div class="col s12 m7">
			  <div class="card z-depth-2">
				  <div class="card-image left">
				   <img src="/assets/images/smartw6.png">	  
				  </div>
				  <div class="card-content ">
					  <span class="red-text text-darken-4 card-title">Producto: X</span>
					  <ul class="indigo-text text-darken-4" >
						<li>Estado de la Subasta:<span class="blue-text text-darken-6"> Activa</span></li> 
						<li>Puja Ganadora: <span class="blue-text text-darken-6"> 3,00 €</span></li>
						<li>Mi Ultima Puja: <span class="blue-text text-darken-6">1,00 €</span></li>
						<li>Tiempo Restante: <span class="blue-text text-darken-6"> 00:03:45</span></li>
						<li>He Ganado: <span class="blue-text text-darken-6">Aún No </span></li>
					  </ul>
				  </div>
				</div>
			</div>
		  </div>
		  
		  <div class="row">
			<div class="col s12 m7">
			  <div class="card z-depth-2">
				  <div class="card-image left">
				   <img src="/assets/images/smartw4.png">	  
				  </div>
				  <div class="card-content ">
					  <span class="red-text text-darken-4 card-title">Producto: X</span>
					  <ul class="indigo-text text-darken-4" >
						<li>Estado de la Subasta:<span class="blue-text text-darken-6"> Activa</span></li> 
						<li>Puja Ganadora: <span class="blue-text text-darken-6"> 3,00 €</span></li>
						<li>Mi Ultima Puja: <span class="blue-text text-darken-6">1,00 €</span></li>
						<li>Tiempo Restante: <span class="blue-text text-darken-6"> 00:03:45</span></li>
						<li>He Ganado: <span class="blue-text text-darken-6">Aún No </span></li>
					  </ul>
				  </div>
				</div>
			</div>
		  </div>
		  
	  </div> 		  
	

	  <div class="puja_subasta">
			
		  <h1 id="missubastas" class="teal-text text-darken-4">Mis Subastas:</h1>
			   
		  <div class="row">
			<div class="col s12 m7">
			  <div class="card z-depth-2">
				  <div class="card-image left">
				   <img src="/assets/images/smartw4.png">	  
				  </div>
				  <div class="card-content">
					  <span class="red-text text-darken-4 card-title">Producto: X</span>
					  <ul class="indigo-text text-darken-4" >
						<li>Estado de la Subasta:<span class="blue-text text-darken-6"> Activa</span></li> 
						<li>Puja Mínima: <span class="blue-text text-darken-6"> 3,00 €</span></li>
						<li>Cantidad Ganadora: <span class="blue-text text-darken-6">5,00 €</span></li>
						<li>Tiempo Restante: <span class="blue-text text-darken-6"> 00:03:45</span></li>
						<li>Total Acumulado: <span class="blue-text text-darken-6">350,00 €</span></li>
					  </ul>
				  </div>
				</div>
			</div>
		  </div>		  
	
			   
		  <div class="row">
			<div class="col s12 m7">
			  <div class="card z-depth-2">
				  <div class="card-image left">
				   <img src="/assets/images/smartw6.png">	  
				  </div>
				  <div class="card-content">
					  <span class="red-text text-darken-4 card-title">Producto: X</span>
					  <ul class="indigo-text text-darken-4" >
						<li>Estado de la Subasta:<span class="blue-text text-darken-6"> Activa</span></li> 
						<li>Puja Mínima: <span class="blue-text text-darken-6"> 3,00 €</span></li>
						<li>Cantidad Ganadora: <span class="blue-text text-darken-6">5,00 €</span></li>
						<li>Tiempo Restante: <span class="blue-text text-darken-6"> 00:03:45</span></li>
						<li>Total Acumulado: <span class="blue-text text-darken-6">350,00 €</span></li>
					  </ul>
				  </div>
				</div>
			</div>
		  </div>		  
	
	</div>
  </div>				
				
 </div>	