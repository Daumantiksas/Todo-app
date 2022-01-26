<?php require 'view/_partials/head.view.php'; ?>
<div class="container">
        <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand">My Todo List</a>
            <form class="d-flex">
            
            <a class="btn btn-outline-success"  href="/add-task">Nauja uzduotis</a>
            </form>
        </div>
        </nav>
        
    <ul class="list-group list-group-flush">
        <?php foreach($tasks->allTasks() as $task):?>
        <li class="list-group-item list-group-item-light">
            Data: <?=$task['dueDate'];?></br>
            <?php if($task['status']==1):?>
            <p style="text-decoration: line-through; margin: 0;">Uzduotis:<?=$task['subject'];?></p>
            <?php else :?>
                Uzduotis: <?=$task['subject'];?>
                <?php endif;?>
         
                <?php require 'view/_partials/deleteButton.php'; ?>
                <?php require 'view/_partials/completeButton.php'; ?>
                <button type="button" class="btn btn-outline-success float-end" data-bs-toggle="modal" data-bs-target="#exampleModal<?=$task['id'];?>">
    Salinti
</button>    
<button type="button" class="btn btn-outline-success float-end" data-bs-toggle="modal" data-bs-target="#exampleModal1<?=$task['id'];?>">
    Uzduotis atlikta
</button>    
            
        </li>    
        <?php endforeach;?>
    </ul>
</div>
<?php require "view/_partials/htmlEnd.php";?>


