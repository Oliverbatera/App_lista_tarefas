<?php   



require "../app_lista_tarefas/tarefa.model.php";
require "../app_lista_tarefas/tarefa.service.php";
require "../app_lista_tarefas/conexao.php";

$DadosJson = file_get_contents('Json.json');

$JsonDec = json_decode ($DadosJson);
$Tarefa = $JsonDec->livros;


print_r ($Tarefa);



//foreach($Tarefa as $t){

//	echo $t->Tarefa;

//}




 
?>
	
