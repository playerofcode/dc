    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Hiring</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a>
                </li>
                <li class="breadcrumb-item active">Hiring
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
                <h4 class="card-title">All Hiring Request</h4>
            </div>
            <div class="card-body collapse in p-2">
                <div class="table-responsive">
                    <table class="table mb-0" id="my_table">
                        <thead>
                            <tr>
                                <th>S. No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile Number</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Zipcode</th>
                                <th>Job Title</th>
                                <th>Job Started</th>
                                <th>Job Ended</th>
                                <th>Job Description</th>
                                <th>CV</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach ($hiring as $key): ?>
                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $key->name;?></td>
                                <td><?php echo $key->email;?></td>
                                <td><?php echo $key->mobno;?></td>
                                <td><?php echo $key->address;?></td>
                                <td><?php echo $key->city;?></td>
                                <td><?php echo $key->zipcode;?></td>
                                <td><?php echo $key->job_title;?></td>
                                <td><?php echo $key->job_started;?></td>
                                <td><?php echo $key->job_ended;?></td>
                                <td><?php echo $key->jd;?></td>
                                <td><a href="<?php echo base_url($key->cv);?>" target="_blank">Preview</a></td>
                                <td><a onclick="return confirm('Are you sure?');"href="<?php echo base_url('admin/delete_hiring/'.$key->id);?>" class="btn btn-danger btn-sm">Delete</a></td>
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