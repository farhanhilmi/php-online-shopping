<?php
include './layout/header.php';
?>

<main id="main">
  <section class="table-grid">
    <div id="contentData"></div>

    <div class="crud-box">
      <form role="form" method="POST" id="formAdd" enctype="multipart/form-data">
        <div class="form-group">
          <label for="exampleInputPassword1">Image</label>
          <div class="custom-file">
            <input type="file" name="img" class="custom-file-input" id="customFile" required>
            <label class="custom-file-label" for="customFile" style="overflow: hidden;">Choose file</label>
          </div>
        </div>
        <div class="form-group ">
          <label for="exampleInputEmail1">Description</label>
          <textarea name="description" id="description" class="form-control" placeholder="Enter description"></textarea required>
        </div>
        <button type="submit" name="save" id="save" class="btn btn-sm">Submit</button>
      </form>
    </div>
  </section>


  <div class="modal fade" id="modalDialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" id="modalContent">

      </div>
    </div>
  </div>

</main>



<?php
include './layout/footer.php';
?>
<script src="js/dataBanner.js"></script>