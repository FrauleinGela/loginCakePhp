<html>
    <head>
<title> 
                   <?php echo $title_for_layout; ?></title>
        <link href='http://fonts.googleapis.com/css?family=Raleway:600' rel='stylesheet' type='text/css'>
            <?php echo $this->Html->css('homestyle'); ?>
    </head>
    <body>
        <div class="content-login">
            Hello User.
            <?php echo $this->Html->link( "Logout",   array('action'=>'logout') );   ?>
        </div>  
        
    </body>    
</html>