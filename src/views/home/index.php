<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        
       
        <h2>Home <?php echo $this->data['user']->getUsername(); ?></h2>
    
        <?php require_once("src/components/create.php")?>

        <?php
            $user=$this->data['user'];
            $posts=$this->data['posts'];

            foreach($posts as $p){
                echo $p->getTitle() . '<br>';
            }
        ?>
    </div>
    
</body>
</html>