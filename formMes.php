<?php
  if(!isset($_SESSION['userID'])){
    header("Location:loging.php");
  }
?>


<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  
    <div class="modal-dialog ">
      <div class="modal-content bg-dark">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">ติดต่อผู้กลาง</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="">
          <div class="modal-body ">
            <h6 class=" mb-3">ถึง <?php echo $result['agentFullname'];?></h6>
            <div class=" mb-3">
              <label for="topic" class="form-label">หัวข้อเรื่อง</label>
              <input type="text" class="form-control rounded-radius loginform" id="topic" placeholder="หัวข้อเรื่อง">
            </div>

            <div class="mb-3">
                  <label for="detail" class="form-label ">รายละเอียด</label>
                  <textarea style="resize: none;" class="form-control loginform" name="detail" id="detail" rows="5"></textarea>
                  </div>
          </div>
          <div class="modal-footer">

            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  
</div>