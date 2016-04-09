              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest Members</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger" id="memberBaru"></span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                  <?php foreach ($user->result() as $row):?>
                    <li>
                      <?php if($row->foto==null)
                      {
                        echo "<img  src=".base_url("upload/user/user.png")." alt=".$row->username.">";
                      }
                      else
                      {
                        echo "<img src=".base_url("upload/user/$row->foto")." alt=".$row->username.">";

                      };?>
                      <a class="users-list-name" href="#"><?=$row->username;?></a>
                      <span class="users-list-date"><?=dateindo($row->tanggal_daftar);?></span>
                    </li>	
                 
                  <?php endforeach;?>
                   </ul>    
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="#" id="loadUser" class="uppercase">View All Users</a>
                </div>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
<script type="text/javascript">
  $(document).ready(function  () {
      
    $('#loadUser').click(function  () {
      $('#konten').load('<?php echo base_url("pxadmin/page_member");?>')
    })
  })
</script>