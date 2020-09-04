    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Team Member</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a>
                </li>
                <li class="breadcrumb-item active">Team Member
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="content-body">
<!-- Responsive tables start -->
<div class="row">
    <div class="col-xs-12">
       <?php if($this->session->flashdata('msg')): ?>
        <div class="alert alert-warning text-center"><?php echo $this->session->flashdata('msg');?></div>
        <?php endif;?>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Team Member</h4>
            </div>
            <div class="card-body collapse in p-2">
                <div class="table-responsive">
                    <table class="table mb-0" id="my_table">
                        <thead>
                            <tr>
                                <th>S. No.</th>
                                <th>Member Image</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Facebook</th>
                                <th>Instagram</th>
                                <th>Twitter</th>
                                <th>LinkedIn</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach ($team as $key): ?>
                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><img src="<?php echo base_url($key->member_image);?>" style="height:100px;width:100px;"/></td>
                                <td><?php echo $key->name;?></td>
                                <td><?php echo $key->position;?></td>
                                <td><?php if(!empty($key->facebook)){
                                    echo '<a href="'.$key->facebook.'" target="_blank">Go to Link</a>';
                                }else{echo "Not given";}?></td>
                                <td><?php if(!empty($key->instagram)){
                                   echo '<a href="'.$key->instagram.'" target="_blank">Go to Link</a>';
                                }else{echo "Not given";}?></td>
                                <td><?php if(!empty($key->twitter)){
                                   echo '<a href="'.$key->twitter.'" target="_blank">Go to Link</a>';
                                }else{echo "Not given";}?></td>
                                <td><?php if(!empty($key->linkedin)){
                                   echo '<a href="'.$key->linkedin.'" target="_blank">Go to Link</a>';
                                }else{echo "Not given";}?></td>
                                <td><a href="<?php echo base_url('admin/edit_team/'.$key->id);?>" class="btn btn-warning btn-sm">Edit</a></td>
                                <td><a onclick="return confirm('Are you sure?');"href="<?php echo base_url('admin/delete_team/'.$key->id);?>" class="btn btn-danger btn-sm">Delete</a></td>
                            </tr>
                            <?php $i++;endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Responsive tables end -->
        </div>
      </div>
    </div>