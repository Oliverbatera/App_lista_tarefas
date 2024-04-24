<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Lista Tarefas</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	</head>

	<body class = "bg-dark">
	<nav class="navbar navbar-light bg-light ">
			<div class="container">
				
					<img src="img/logo2.png" width="80" height="80" class="d-inline-block align-top" alt="">
					
					<p style = "font-size : 20px"> App Lista Tarefas</p>
				
			</div>
		</nav>

		<?php if( isset($_GET['inclusao']) && $_GET['inclusao'] == 1 ) { ?>
			<div class="bg-success pt-2 text-white d-flex justify-content-center">
				<h5>Tarefa inserida com sucesso!</h5>
			</div>
		<?php } ?>

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item list-group-item-light bg-dark"><a href="index.php">Tarefas pendentes</a></li>
						<li class="list-group-item list-group-item-light active bg-dark "><a href="#">Nova tarefa</a></li>
						<li class="list-group-item list-group-item-light bg-dark"><a href="todas_tarefas.php">Todas tarefas</a></li>
					</ul>
				</div>

				<div class="col-md-9" >
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Nova tarefa</h4>
								<hr />

								<form method="post" action="tarefa_controller.php?acao=inserir">
									<div class="form-group text-write">
										<label class = "text-white">Descrição da tarefa:</label>
										<input type="text" class="form-control text-white bg-dark" name="tarefa" placeholder="Exemplo: Montar o APP teste Dev Atak">
									</div>

									<button class="btn btn-light">Cadastrar</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>