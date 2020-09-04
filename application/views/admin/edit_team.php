    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Edit Team Member</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a>
                </li>
                <li class="breadcrumb-item active">Edit Team Member
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="content-body">
<div class="row">
    <div class="col-xs-12">
       <?php if($this->session->flashdata('msg')): ?>
        <div class="alert alert-warning text-center"><?php echo $this->session->flashdata('msg');?></div>
        <?php endif;?>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Team Member</h4>
            </div>
            <div class="card-body collapse in p-2">
              <?php foreach ($team as $key): ?>
                <form action="<?php  echo base_url('admin/update_team/'.$key->id);?>" method="post" enctype="multipart/form-data">
                  <center><img src="<?php echo base_url($key->member_image);?>" style="height:200px;width:200px;"></center>
                  <div class="form-group">
                    <label>Member Image <span class="text-danger">*</span></label>
                    <input type="file" name="member_image" class="form-control">
                     <?php if(isset($member_image)){echo $member_image;} ?>
                  </div>
                  <div class="form-group">
                    <label>Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" placeholder="Name" class="form-control" value="<?php echo set_value('name',$key->name); ?>" required>
                    <?php echo form_error('name'); ?>
                  </div>
                  <div class="form-group">
                    <label>Position <span class="text-danger">*</span></label>
                    <input type="text" name="position" placeholder="Position" class="form-control" value="<?php echo set_value('position',$key->position); ?>" required>
                    <?php echo form_error('position'); ?>
                  </div>
                  <div class="form-group">
                    <label>Facebook Link</label>
                    <input type="text" name="facebook" placeholder="Facebook Link" class="form-control" value="<?php echo set_value('facebook',$key->facebook); ?>">
                    <?php echo form_error('facebook'); ?>
                  </div>
                  <div class="form-group">
                    <label>Instagram Link</label>
                    <input type="text" name="instagram" placeholder="Instagram Link" class="form-control" value="<?php echo set_value('instagram',$key->instagram); ?>">
                    <?php echo form_error('instagram'); ?>
                  </div>
                  <div class="form-group">
                    <label>Twitter Link</label>
                    <input type="text" name="twitter" placeholder="Twitter Link" class="form-control" value="<?php echo set_value('twitter',$key->twitter); ?>">
                    <?php echo form_error('twitter'); ?>
                  </div>
                  <div class="form-group">
                    <label>LinkedIn Link</label>
                    <input type="text" name="linkedin" placeholder="LinkedIn Link" class="form-control" value="<?php echo set_value('linkedin',$key->linkedin); ?>">
                    <?php echo form_error('linkedin'); ?>
                  </div>
                
                  <div class="form-group">
                    <input type="submit" value="Update Team" class="btn btn-success">
                  </div>
                </form>
                  <?php endforeach ?>
                
            </div>
        </div>
    </div>
</div>
        </div>
      </div>
    </div>