<?php
	include_once 'sharedFunctions.php';
	echo $this->Html->script('list_activation_requests');  
?>
<h1><?php echo __('Lista de usuários aguardando ativação'); ?></h1>

<table id="usersTable">
<?php
	function orderParameter($attribute, $actualOrder) {
		$parameter = 'User.' . $attribute . ' ASC';

		if ($parameter != $actualOrder)
			return $parameter;
		
		return 'User.' . $attribute . ' DESC'; 
	}

	$parameter = orderParameter('name', $actualOrder);
	$linkName = $this->Html->link(__('Nome'), array('controller' => 'Users', 'action' => 'listActivationRequests', $parameter));
	
	$parameter = orderParameter('nusp', $actualOrder);
	$linkNusp = $this->Html->link(__('Número USP'), array('controller' => 'Users', 'action' => 'listActivationRequests', $parameter));
	
	$parameter = orderParameter('email', $actualOrder);
	$linkEmail = $this->Html->link(__('E-Mail'), array('controller' => 'Users', 'action' => 'listActivationRequests', $parameter));
	
	$parameter = 'ASC';
	if ($parameter == $profileOrder)
		$parameter = 'DESC';
	$linkProfile = $this->Html->link(__('Perfil'), array('controller' => 'Users', 'action' => 'listActivationRequests', 'User.name ASC', $parameter));

	
	$header = array(
		array(
			array($this->Form->Input('selectAll', array('type' => 'checkbox', 'label' => '', 'class' => 'selectAll')), array('class' => 'header checkbox')),
			array($linkName, array('class' => 'header')),
			array($linkNusp, array('class' => 'header')),
			array($linkEmail, array('class' => 'header')),
			array($linkProfile, array('class' => 'header'))
		)
	);
	echo $this->Html->tableCells($header);
	

	echo $this->Form->Create('User', array('class' => 'submittableForm'));
	
	$cells = array();
	foreach ($usersWaitingActivation as $userWaitingActivation) {
		$userWaitingActivation['User']['profile'] = getTranslatedProfile($userWaitingActivation);
		
		$linkToProfile = $this->Html->link($userWaitingActivation['User']['name'], array('controller' => 'Users', 'action' => 'viewProfile', $userWaitingActivation['User']['id']));
		
		$cells[] = array($this->Form->Input($userWaitingActivation['User']['id'] . '.isChecked', array('type'=>'checkbox', 'label' => '', 'class' => 'selectableBySelectAll')),
						 $linkToProfile,
						 $userWaitingActivation['User']['nusp'],
						 $userWaitingActivation['User']['email'],
						 $userWaitingActivation['User']['profile']
				   );
	}

	echo $this->Html->tableCells($cells);
?>
</table>

<div id="dialog-confirm" style="display:none"></div>

<table>
<?php
	echo "<tr><td>" . $this->Form->Submit(__('Ativa'), array('class' => 'needConfirmation')) . "</td>"; 
	echo "<td>" . $this->Form->Submit(__('Rejeita'), array('class' => 'needConfirmation')) . "</td>";
	echo "<td>" . $this->Form->Input('action', array('type' => 'hidden', 'name' => 'action')) . "</td></tr>";

	echo $this->Form->End();
?>
</table>

<?php
	echo $this->element('back');
?>