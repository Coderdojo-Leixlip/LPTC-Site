<?php
	session_start();
	require_once("../../includes/dbconnect.php");
	require_once("../../includes/functions.php");
	require_once("../../includes/permissons.php");
	require_once("../../includes/addon_manager.php");
    require_once("../../includes/addon_api.php");
    //Run all the addons
    $manager = new Manager();
    $manager->loadAddons();
    $api = new api();
    $api->do_actions("isAllowed");
    //
	$p = new Permissons($_SESSION["rank"], $connection);
	$type = "page";
	if(isset($_POST['Delete'])){
		$p->hasPermisson(["Page_Delete"]);
		$stmt = $connection->prepare("Select Name From Pages Where id = ?");
		$stmt->bind_param("i", $_POST['Delete']);
		$stmt->execute();
		$stmt->bind_result($name);
		$stmt->fetch();
		$stmt->close();
		$stmt = $connection->prepare("Delete From Pages Where id = ?");
		$stmt->bind_param("i", $_POST['Delete']);
		$stmt->execute();
		$stmt->close();
		unlink("../../{$name}.php");
		$action = "deleted";
		insertActivity($connection, $name, $_SESSION['id'], NULL, $type, $action);
		header("Location: ../pages.php");
	}else{
		$p->hasPermisson(["Page_Create", "Page_Edit"]);
		if($_POST['template'] != "None"){
			$loc = "../../Content/templates/{$_POST['template']}";
			$template = file_get_contents($loc);
			$varibles = array();
			$varibles['title'] = $_POST['Title'];
			$varibles['content'] = $_POST['Content'];
			foreach($varibles as $key => $value){
				$template = str_replace('{{ ' . $key . ' }}', $value, $template);
			}
		}else{
			$template = $_POST['Content'];
		}
		$dir = '../../' . $_POST['Title'] . '.php';
		if(isset($_POST['old'])){
			unlink("../../{$_POST['old']}.php");
		}
		$newpage = fopen($dir, "w");
		fwrite($newpage, $template);
		fclose($newpage);
		$stmt = $connection->prepare("Insert INTO Pages (id, Name, Template, UserId, Created, Modified, Parent, PageOrder) Values (?, ?, ?, ?, ?, ?, ?, ?) ON Duplicate Key Update Name=Values(Name), Template=Values(Template), UserId=Values(UserId), Modified=Values(Modified), Parent=Values(Parent), PageOrder=Values(PageOrder)");
		$time = NULL;
		if($_POST['parent'] == ''){
			$_POST['parent'] = NULL;
		}
		$stmt->bind_param("ississii", $_POST['id'], $_POST['Title'], $_POST['template'], $_SESSION["id"], $time, $time, $_POST['parent'], $_POST['order']);
		$stmt->execute();
		$stmt->close();
		$id = $connection->insert_id;
		$action = $_POST['id'] == "" ? "created" : "modified";
		if($action == "created"){
			$api->do_actions("createdPage");
		}
 		insertActivity($connection, $_POST['Title'], $_SESSION['id'], intval($id), $type, $action);
		header("Location: " . $dir);
	}
?> 