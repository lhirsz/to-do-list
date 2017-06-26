<?php

/**
 * Odczytywanie danych z JavaScript / Ajax.
 */	
if(isset($_GET))
	{
		
	/**
	* Inicjacja klasy i stworzenie nowego obiektu $todo .
	*/
	require "todo_class.php";
	$todo = new ToDoList();
	
		/**
		* Wywołanie po załadowaniu strony onload w sektorze body.
		*/
		if ((isset($_GET['onload'])))
			{
			$getrows = $todo->GetRows();
			}
		/**
		* Wywołanie usunięcią rekordu przez przekazane id z ajaxa.
		*/	
		if ((isset($_GET['deleterow'])))
			{
			$id =$_GET['id'];
			$deleterow = $todo->DeleteRow($id);
			$getrows = $todo->GetRows();
			}
		/**
		*  Wywołanie dodania rekordu.
		*/
		if ((isset($_GET['addrow'])))
			{
			if (trim($_GET['text']) != ""){
			$text =$_GET['text'];
			$text = strip_tags($text);
			$addrow = $todo->SetRow($text);
			}
			$getrows = $todo->GetRows();
			}
		/**
		*  Wywołanie edycji rekordu / zmiana statusu.
		*/
		if ((isset($_GET['editrow'])))
			{
			$status =$_GET['status'];
			$id = $_GET['id'];
			$editrow = $todo->EditRow($id, $status);
			$getrows = $todo->GetRows();
			}	
	}
?>

