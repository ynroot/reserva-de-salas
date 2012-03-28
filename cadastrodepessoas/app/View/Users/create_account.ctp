<?php
	echo $this->Html->script('create_account'); 
?>
<h1>Criar conta</h1>

<?php
	echo $this->Form->Create('User');
	echo $this->Form->Input('nusp', array('label' => 'Número USP', 'options' => array('class' => 'mandatory') ) );
	echo $this->Form->Input('name', array('label' => 'Nome', 'options' => array('class' => 'mandatory') ) );
	echo $this->Form->Input('email', array('label' => 'E-mail', 'options' => array('class' => 'mandatory') ) );
	echo $this->Form->Input('password', array('label' => 'Senha', 'options' => array('class' => 'mandatory') ) );
	echo $this->Form->Input('passwordConfirmation', array('label' => 'Confirmação da senha', 'type' => 'password', 'options' => array('class' => 'mandatory') ) );
	echo $this->Form->Input('photo', array('label' => 'Foto', 'type' => 'file'));
	echo $this->Form->Input('userType', array('label' => 'Tipo de usuário', 'options' => array('Employee' => 'Empregado', 'Student' => 'Estudante', 'Professor' => 'Professor') ,'type' => 'radio', 'class' => 'userTypeRadio'));
?>

<div id="Employee" class="userType">
	<?php
		echo $this->Form->Create('Employee');
		echo $this->Form->Input('occupation', array('label' => 'Trabalho', 'options' => array('class' => 'mandatory') ) );
	?>
</div>

<div id="Student" class="userType">
	<?php
		echo $this->Form->Create('Student');
		echo $this->Form->Input('course', array('label' => 'Curso', 'options' => array('class' => 'mandatory') ) );
	?>
</div>
	
<div id="Professor" class="userType">
	<?php
		echo $this->Form->Create('Professor');
		echo $this->Form->Input('department', array('label' => 'Departamento', 'options' => array('class' => 'mandatory') ) );
		echo $this->Form->Input('webpage', array('label' => 'Página na Web'));
		echo $this->Form->Input('lattes', array('label' => 'Currículo Lattes'));
	?>
</div>
	
<?php
	echo $this->Form->End('Criar conta');
?>