               <?php
               include 'inc/connect.php';
                $sq = mysqli_query($con, "SELECT * FROM session WHERE status = 'online' ORDER BY time DESC");
                while ($s = mysqli_fetch_assoc($sq)) {
                ?>
                <div class="channel flex-column">
                <a onclick="getchat(<?php echo $s['user_id'];?>)" data-toggle="tab">
                  <div class="d-flex  ">
                     <img class="avatar avatar-sm status status-offline mr-3 bg-success rounded-circle" src="uploads/<?php echo $s['image']; ?>">
                    <h6 class="mb-2 lh-100"><?php echo $s['fname']; ?></h6>
                    <p class="ml-3"></p>
                  </div>
                <!--   <div class="d" style=" float: right; margin-left: 1px;">
                    <img src="on.png" style="height: 10px; width: auto;">
                  </div> -->
                </a>
                </div>
              <?php } ?>