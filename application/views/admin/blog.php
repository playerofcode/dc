    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Add Blog</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a>
                </li>
                <li class="breadcrumb-item active">Add Blog
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
                <h4 class="card-title">Add Blog</h4>
            </div>
            <div class="card-body collapse in p-2">
                <form action="<?php  echo base_url('admin/add_blog');?>" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Blog Category</label>
                    <select name="cat_id" class="form-control">
                      <option value="">Choose Blog Category</option>
                      <?php foreach ($category_list as $key): ?>
                      <option value="<?php echo $key->cat_id;?>" <?php echo  set_select('cat_id',$key->cat_id); ?> ><?php echo $key->cat_name; ?></option>
                      <?php endforeach ?>
                    </select>
                    <?php echo form_error('cat_id'); ?>
                  </div>
                  <div class="form-group">
                    <label>Blog Image</label>
                    <input type="file" name="blog_image" class="form-control">
                     <?php if(isset($blog_image)){echo $blog_image;} ?>
                  </div>
                  <div class="form-group">
                    <label>Blog Title</label>
                    <input type="text" name="blog_title" placeholder="Enter Blog Title" class="form-control" value="<?php echo set_value('blog_title'); ?>">
                    <?php echo form_error('blog_title'); ?>
                  </div>
                  <div class="form-group">
                    <label>Blog Description</label>
                    <textarea name="blog_description"  class="form-control" placeholder="Blog Description Here" id="ckeditor" name="blog_description"><?php echo set_value('blog_description'); ?></textarea>
                    <?php echo form_error('blog_description'); ?>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Add Blog" class="btn btn-success">
                  </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
        </div>
      </div>
    </div>