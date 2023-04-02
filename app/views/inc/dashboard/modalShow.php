
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="user-info d-flex align-items-center w-100">
            <div class="user-info__img">
                <img class="me-3" src="<?php echo URLROOT ?>/public/upload/<?php echo $user->img; ?>" alt="User Img" width="55" height="55">
            </div>
            <div class="user-info__basic">
                <h5 class="mb-0"><?php echo $user->nom." ".$user->prenom; ?></h5>
                <p class="text-muted mb-0"><?php echo $user->email; ?></p>
            </div>
            
        </div>
        
                  <tr>
                    <th>Username</th>
                    
                  </tr>
                  <tr>
                    <th>SignDate</th>
                    
                  </tr>
                  <tr>
                    <th>LastLogin</th>
                   *
                  </tr>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
