<html>
    <head>
<title> 
                   <?php echo $title_for_layout; ?></title>
        <link href='http://fonts.googleapis.com/css?family=Raleway:600' rel='stylesheet' type='text/css'>
            <?php echo $this->Html->css('homestyle'); ?>
    </head>
    <body>
        <div class="content-login">
        <div class="errors"> <?php echo $this->Session->flash('invalid'); ?></div>
            <?php echo $this->Form->create('User',array('action' => 'login')); ?>
            <?php echo $this->Form->input('username', array('label' => 'username'));?>
            <?php echo $this->Form->input('password', array('label' => 'password'));?>
            <?php echo $this->Form->end('Log in') ;  ?>
        <div class="lock"> <?php echo $this->Session->flash('lock'); ?></div>
        </div>
    </body>    
</html>
