<div class="dark-layover"></div>
  <div id = "close" class="iconic" style= "">
      <div class="modal-header">
          
          <h3>Notice<span style="float:right">&times;</span></h3>
          <hr/>
      </div>
    <div class="modal-body">

      <?php

        foreach($messages as $message){
          echo '<p>'.$message.'</p>';
        }

      ?>
    </div>
  </div>
