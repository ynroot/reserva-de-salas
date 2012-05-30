<h1><?php echo __('Página Inicial'); ?></h1>

<?php
	$greeting = "Olá";
	$welcomeMessage = "Seja bem-vindo ao sistema de Reserva de Salas do IME-USP.";
	echo $greeting . ", " . $loggedUser['name'] . ".";
?>
<br /><br />
<?php
	echo $welcomeMessage;
?>
<br /><br />
<?php
	echo $this->Html->link(__('Criar reserva'), array('controller' => 'Reservations', 'action' => 'createReservation'));
	echo "<br />";
	echo "<br />";
	echo "<br />";

	echo $this->Html->link(__('Reservar Sala'), array('controller' => 'Reservations', 'action' => 'chooseDate'));
	echo "<br /><br />";
	echo $this->Html->link(__('Visualizar salas'), array('controller' => 'Rooms', 'action' => 'listRooms'));
	echo "<br />";
	echo $this->Html->link(__('Visualizar recursos'), array('controller' => 'Resources', 'action' => 'listResources'));
	echo "<br />";
	

	if ($loggedUser['user_type'] == "admin") {
		echo $this->Html->link(__('Cadastrar salas'), array('controller' => 'Rooms', 'action' => 'createRoom') );
		echo "<br />";
		echo $this->Html->link(__('Cadastrar recursos'), array('controller' => 'Resources', 'action' => 'createResource') ); 
	}
?>