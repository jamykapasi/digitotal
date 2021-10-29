<style>
.dashboard-stat{
	border-radius: 10px !important;
}
</style>
<br>
<br>
<?php 

$totalUsers = $this->db->count("tbl_users");

?>

<div class="row">
  <div class="col-md-3">
    <div class="dashboard-card">
      <div class="bg-primary text-light p-4">
        <div class="dashboard-card-icon">
          <i class="fa fa-user fa-3x " aria-hidden="true"></i>
        </div>
      </div>
      <div class="card-content">
        <p class="title">Total Users</p>
        <p class="description"><?php echo $totalUsers;?></p>
      </div>
    </div>
  </div>

</div>