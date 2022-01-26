
    <div class="modal fade" id="exampleModal<?=$task['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel<?=$task['id'];?>"><h2>Demesio!!</h2></h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
        <div class="modal-body">
        <h4>Ar tikrai norite salinti?</h4>
        </div>
            <div class="modal-footer">
            <a type="button" href="delete-task/id/<?=$task['id'];?>" class="btn btn-outline-success float-end" >Salinti</a>
            <button type="button" class="btn btn-outline-success float-end" data-bs-dismiss="modal">Atsaukti</button>
            </div>
    </div>
    </div>
    </div>




