<?php //echo "<pre>"; print_r($servicios); die(); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

	<!-- fontawesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- style cards -->
	<link rel="stylesheet" href="public/css/cards.css"/>

	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
	<!-- <script src="public/Chart.js" ></script>  -->

	<title>Usuarios</title>
  </head>
  <body>   
	<div class="container-fluid">
		<div class="row justify-content-md-center bg-light">
			<div class="col">
				<a class="navbar-brand" href="#"><img src="https://global-uploads.webflow.com/5f5a53e153805db840dae2db/6073fbf151fa4565d48572dc_GitHub_aprender-programaci%25C3%25B3n.jpeg" width="120px" heigth="120px"  class="img-fluid" alt="..."></a>
			</div>
			<div class="col-md-auto py-3 px-lg-8">
				<h1 >Busqueda Usuarios</h1>
			</div>
			<div class="col-md py-3">
				<i class="fas fa-user fa-3x text-secondary"></i>
			</div>
		</div>
		<hr color="#FF851E">
		<br>
		<form id="formSearchUser" onsubmit="searchUsers(this,event)" method="post"> 
		
			<div class="row justify-content-md-center">
				<div class="col">
						<div class="form-group">
							<label for="InputUser"><b>Usuario</b></label>
							<input type="text" class="typeahead form-control" name="InputUser" id="InputUser" autocomplete="off" >							
						<small id="InputUser" class="form-text text-muted">Digite el Usuario a buscar.</small>
						</div>
					</div>
				</div>	
			<div class="row justify-content-md-center">
				<div class="col" >
						<button class="btn btn-success" id="btnConsulta" disabled="disabled" style="width:100%;">Consultar</button>
				</div>
			</div>			
		</form>	
		<!-- Inicio modal Seguimientos -->  
		<div class="modal fade" id="modal_verUsuario" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modal_verUsuarioLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">            
				<div class="modal-content ">
					<div class="modal-header">
						<h5 class="modal-title"><b>Datos Usuario</b></h5>
						<button type="button text-success" class="close" data-dismiss="modal" aria-label="Close">
								<span class="text-dark" aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="row justify-content-md-center" id="datosUsuario"></div>													
					<div class="modal-footer">											
							<button type="button" id="cerrar_seguimiento" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>                        
					</div>
					
				</div>                    
			</div>
		</div>		
		<!-- fin modal -->  
		<br>
		<div id="pieChartContent">
			<canvas id="grafUser"></canvas>
		</div>	
		<br>
		<div class="row justify-content-md-center" id="usuarios" style="overflow-y: scroll; height:300px;">
			

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

		
		

	<!-- typeahead -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
  </body>
</html>
<script>	
	$("#InputUser").typeahead({					
		source: function(query, process) {						
			$('#btnConsulta').prop('disabled', true);
			if($("#InputUser").val().length >= 4){							
				if($("#InputUser").val() == 'doublevpartners'){
					$('#btnConsulta').prop('disabled', true);
					$("#InputUser").val('');
					swal({
						title: "Verificar",
						text: "no se puede buscar el usuario doublevpartners, Intente buscar otro Usuario",
						icon: "error",
					});					
				}else{
					$('#btnConsulta').prop('disabled', false);
				}	
			}
		}	
	});	

	function searchDataUser(login){			
		var dataUser = $("#datosUsuario");
		$.ajax({
				type: 'post',	
				dataType: 'json',			
				url: "<?php echo site_url('searDataUser'); ?>",
				data: {login : login},				
				success: function (e) {																						
						dataUser.find('div').remove();	
						dataUser.append('<div class="card m-2 border-success" style="width: 18rem;"> '+
																	'<a class="img-card">'+
                            				'<img src="'+e.avatar_url+'">'+
                          				'</a>'+
																	'<div class="card-content">'+
                                		'<h4 class="card-title">'+
                                    	'<p> '+ e.login +' </p>'+                                  	
                                		'</h4>'+
                                		'<p class=""> ' + e.id +'</p>'+ 
                                		'<p class=""> ' + e.html_url +'</p>'+ 
                                		'<p class=""> ' + e.node_id +'</p>'+ 
                                		'<p class=""> ' + e.location +'</p>'+ 
                            			'</div>'+																	
																'</div>');												
				}						 
		});	
	}

	function searchUsers(el,event){
		
		event.preventDefault();  
		var usuarios = $("#usuarios");
		var parametros = new FormData($("#formSearchUser")[0]); 				
		$.ajax({
				type: 'post',	
				dataType: 'json',			
				url: "<?php echo site_url('searchUser'); ?>",
				data: parametros,
				contentType:false,
				processData:false,
				success: function (e) {											
					console.log(e.users);					
					console.log(e.numero);					
					if(e.items.length > 0 ){						
						$('#grafUser').remove(); 
						$('iframe.chartjs-hidden-iframe').remove(); 
						$('#pieChartContent').append('<canvas id="grafUser"><canvas>'); 
						let miCanvas = document.getElementById("grafUser").getContext("2d");						
						var chart = new Chart(miCanvas,{
							type : "bar",
							data: {
								labels : e.users,
								datasets : [ 
									{
										width : '100',
										height : '150',
										label : "Grafica de Seguidores",
										backgroundColor: "rgb(51,255,51)",
										borderColor : "rgb(255,255,255)",
										data : e.numero
									}

								]

							}

						});					
						usuarios.find('div').remove();	
						$(e.items).each(function(i, v){																						
								let user = "'"+ v.login +"'";
								usuarios.append('<div class="card m-2 border-success" style="width: 18rem;"> '+
																	'<a class="img-card">'+
                            				'<img src="https://miro.medium.com/v2/resize:fit:720/format:webp/1*HmtkzxNYchDkG3n9IIbCZg.png">'+
                          				'</a>'+
																	'<div class="card-content">'+
                                		'<h4 class="card-title">'+
                                    	'<p> '+ v.login +' </p>'+                                  	
                                		'</h4>'+
                                		'<p class=""> ' + v.id +'</p>'+ 
                                		'<p class=""> ' + v.html_url +'</p>'+ 
                            			'</div>'+
																	'<div class="card-read-more">'+
                                		'<a href="#" onclick="searchDataUser('+user+')" data-toggle="modal" data-target="#modal_verUsuario" class="btn btn-link btn-block">'+
                                    	'Mas..'+
                                		'</a>'+
                            			'</div>'+
																'</div>');
																	
						});
					}else{
						usuarios.find('div').remove();	
						usuarios.append('<div class="alert alert-danger " style="width:80%; height:20%;" role="alert"><i class="fas fa-triangle-exclamation"></i>&nbsp;No Se Encontraron Resultados.</div>');
					} 
				},		
				error: function(e){
						swal({
							title: "Verificar",
							text: e,
							icon: "error",
					});		
				}        
			});	
	}

	
</script>