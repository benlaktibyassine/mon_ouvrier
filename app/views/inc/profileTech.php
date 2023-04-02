<!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $tech->Id_tech?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">info user</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="user-info d-flex align-items-center">
                            <div class="user-info__img">
                                <img class="me-3" src="<?php echo URLROOT ?>/public/upload/<?php echo $tech->img; ?>" alt="User Img" width="55" height="55">
                            </div>
                            <div class="user-info__basic">
                                <h5 class="mb-0"><?php echo $tech->nom." ".$tech->prenom; ?></h5>
                                <p class="text-muted mb-0"><?php echo $tech->email; ?></p>
                            </div>
                        </div>
        <div class="mt-5">
        <table class="table table-hover w-100">
                <tbody>
                  <tr>
                    <th>phone</th>
                    <td><?php echo $tech->phone ?></td>
                  </tr>
                  <tr>
                    <th>ville</th>
                    <td> <?php echo $tech->ville ?></td>
                  </tr>
                  <tr>
                    <th>metier</th>
                    <td><?php echo $tech->metier ?></td>
                  </tr>
                </tbody>
              </table>        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>