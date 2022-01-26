<?php require 'view/_partials/head.view.php'; ?>
<div class="container">
   <div class="card">
   <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand">My Todo List</a>
            
        </div>
        </nav>
       <form method="POST">
           <div class="form-group">
               <input type="text" class="form-control" placeholder="Užduoties pavadinimas" name="subject">
           </div>
           <div class="form-group">
               <select class="form-control" name="priority">
                   <option selected disabled>Prioritetas</option>
                   <option value="1">1</option>
                   <option value="2">2</option>
                   <option value="3">3</option>
               </select>
           </div>
     </div>  
          <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Atlikimo data:</span>
                <input type="date" class="form-control" name="dueDate" aria-label="Username" aria-describedby="basic-addon1">
        </div>
     
     <div class="form-group">
         <button class="btn btn-primary" type="submit" name="save">Saugoti</button>
     </div>
        </form>
  
</div>
<?php require "view/_partials/htmlEnd.php";?>


