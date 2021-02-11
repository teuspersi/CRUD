<?php
	$acao = 'recuperarTarefasPendentes';
	require 'tarefa.controller.php';
?>


<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>To-do list</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

		<script>
			function editar(id, txtTarefa) {
				//criando form
				let form = document.createElement('form')
				form.action = 'index.php?pag=index&acao=atualizar'
				form.method = 'post'
				form.className='row justify-content-center mb-0'

				//criando input
				let inputTarefa = document.createElement('input')
				inputTarefa.type = 'text'
				inputTarefa.name = 'tarefa'
				inputTarefa.className = 'col-9 form-control-sm'
				inputTarefa.value = txtTarefa

				//criando input hidden pro id da tarefa
				let inputId = document.createElement('input')
				inputId.type = 'hidden'
				inputId.name = 'id'
				inputId.value = id

				//criando button pra envio do form
				let button = document.createElement('button')
				button.type = 'submit'
				button.className = 'col-2 btn btn-sm btn-info ml-1'
				button.innerHTML = 'Editar'

				//criando a arvore de elementos com os inputs e o button dentro do form
				form.appendChild(inputTarefa)
				form.appendChild(inputId)
				form.appendChild(button)

				//selecionando div tarefa
				let tarefa = document.getElementById('tarefa_'+id)

				//limpando o texto da tarefa
				tarefa.innerHTML=''

				//incluindo o form na tarefa
				tarefa.insertBefore(form, tarefa[0])
			}

			function remover(id) {
				location.href = 'index.php?pag=index&acao=remover&id='+id
			}

			function marcarRealizada(id) {
				location.href = 'index.php?pag=index&acao=marcarRealizada&id='+id
			}
		</script>
	</head>

	<body>
		<nav class="navbar navbar-dark" style="background-color: #16425B;">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					To-do list
				</a>
			</div>
		</nav>

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item active"><a href="#">Tarefas pendentes</a></li>
						<li class="list-group-item"><a href="nova_tarefa.php">Nova tarefa</a></li>
						<li class="list-group-item"><a href="todas_tarefas.php">Todas as tarefas</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Tarefas pendentes</h4>
								<hr />

								<? foreach($tarefas as $indice => $tarefa) { ?>

									<div class="row mb-3 d-flex align-items-center tarefa">
										<div class="col-sm-9" id="tarefa_<?= $tarefa['id'] ?>"> 
											<?= $tarefa['tarefa'] ?>
										</div>
										<div class="col-sm-3 mt-2 d-flex justify-content-between">
											<i class="fas btn fa-trash-alt fa-lg text-danger" onclick="remover(<?= $tarefa['id'] ?>)"></i>
											<i class="fas btn fa-edit fa-lg text-info" onclick="editar(<?= $tarefa['id'] ?>, '<?= $tarefa['tarefa'] ?>')"></i>
											<i class="fas btn fa-check-square fa-lg text-success" onclick="marcarRealizada(<?= $tarefa['id'] ?>)"></i>
										</div>
									</div>

								<? } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>