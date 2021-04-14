<?php
require_once('../../config.php');
$data = mysqli_query($koneksi, "SELECT * FROM tbl_top_banner WHERE id = '$_POST[id]'");
$row = mysqli_fetch_array($data);
?>

<div class="modal-header">
  <h5 class="modal-title" id="exampleModalLongTitle">Delete Data</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  <div class="form-group ">
    <p>Delete this banner?</p>
  </div>
  <div class="form-group">
    <input type="hidden" value="<?php echo $row['id'] ?>" name="id" id="id_bannerDelete">
  </div>
</div>
<div class="modal-footer">
  <button type="button" id="btnDelete" name="submit" class="btn btn-outline-danger btn-sm">Delete</button>
</div>