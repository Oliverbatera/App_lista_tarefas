<?php

	require "../../app_lista_tarefas/tarefa.model.php";
	require "../../app_lista_tarefas/tarefa.service.php";
	require "../../app_lista_tarefas/conexao.php";


	$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

	if($acao == 'inserir' && $acao <> 'NULL') {
		$tarefa = new Tarefa();
		$tarefa->__set('tarefa', $_POST['tarefa']);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->inserir();

		header('Location: nova_tarefa.php?inclusao=1');
       

		$tarefa = new Tarefa();
		$conexao = new Conexao();
		$tarefaService = new TarefaService($conexao, $tarefa);
		
		
		$tarefa->__set('Tarefa', $_POST['tarefa']);
			  
		
		$jsonData = json_encode($tarefa);

		
		$filePath = 'arquivo.json';
		file_put_contents($filePath, $jsonData);


		
	
	} else if($acao == 'recuperar') {
		
		$tarefa = new Tarefa();
		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefas = $tarefaService->recuperar();

	} else if($acao == 'pesquisar') {
		
		//if(!isset($_POST['pesquisar'])){ echo 'nao existe'; die();}
		
		$tarefa = new Tarefa();
		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefas = $tarefaService->pesquisar($_POST['pesquisar']);
		

		
	} else if($acao == 'atualizar') {

		$tarefa = new Tarefa();
		$tarefa->__set('id', $_POST['id'])
			->__set('tarefa', $_POST['tarefa']);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		if($tarefaService->atualizar()) {
			
			if( isset($_GET['pag']) && $_GET['pag'] == 'index') {
				header('location: index.php');	
			} else {
				header('location: todas_tarefas.php');
			}
		}


	} else if($acao == 'remover') {

		$tarefa = new Tarefa();
		$tarefa->__set('id', $_GET['id']);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->remover();

		if( isset($_GET['pag']) && $_GET['pag'] == 'index') {
			header('location: index.php');	
		} else {
			header('location: todas_tarefas.php');
		}

		
		$tarefa = new Tarefa();
		$conexao = new Conexao();
		$tarefaService = new TarefaService($conexao, $tarefa);
		
		
		$tarefa->__set('Tarefa', $_POST['id'])
		       ->__set('Tarefa', $_POST['id_status'])
			   ->__set('Tarefa', $_POST['tarefa']);
		
		
		$jsonData = json_encode($tarefa);

		
		$filePath = 'arquivo.json';
		file_put_contents($filePath, $jsonData);
		//unlink('arquivo.json');
	
	} else if($acao == 'marcarRealizada') {

		$tarefa = new Tarefa();
		$tarefa->__set('id', $_GET['id'])->__set('id_status', 2);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->marcarRealizada();

		if( isset($_GET['pag']) && $_GET['pag'] == 'index') {
			header('location: index.php');	
		} else {
			header('location: todas_tarefas.php');
		}
	
	} else if($acao == 'recuperarTarefasPendentes') {
		$tarefa = new Tarefa();
		$tarefa->__set('id_status', 1);
		
		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefas = $tarefaService->recuperarTarefasPendentes();
	}


?>