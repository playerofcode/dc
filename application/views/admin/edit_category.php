    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Edit Blog Category</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a>
                </li>
                <li class="breadcrumb-item active">Edit  Blog Category
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
                <h4 class="card-title">Edit Blog Category</h4>
            </div>
            <div class="card-body collapse in p-2">
              <?php foreach ($category as $key): ?>
                <form action="<?php  echo base_url('admin/update_blog_category');?>" method="post">
                  <div class="form-group">
                    <input type="text" name="cat_name" class="form-control" placeholder="Enter Blog Category Name" value="<?php echo $key->cat_name;?>">
                  </div>
                  <input type="hidden" name="cat_id" value="<?php echo $key->cat_id;?>">
                  <div class="form-group">
                    <input type="submit" value="Update Category" class="btn btn-success">
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