<?php
require_once('../../config.php');
$data = mysqli_query($koneksi, "SELECT * FROM tbl_products WHERE id_product = '$_POST[id]'");
$product = mysqli_fetch_array($data);
?>

<div class="modal-header">
  <h5 class="modal-title" id="exampleModalLongTitle">Update Product</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">

  <form role="form" method="POST" id="formEdit" enctype="multipart/form-data">
    <div class="form-group ">
      <label for="exampleInputEmail1">Product Name</label>
      <input type="hidden" value="<?php echo $product['id_product'] ?>" name="id_product">
      <input type="text" name="name" value="<?php echo $product['name'] ?>" id="product" class="form-control">
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <input type="hidden" name="id">
        <label for="exampleInputPassword1">Image</label>
        <div class="custom-file">
          <input type="file" name="img" class="custom-file-input" id="customFile" value="<?php echo $product['img'] ?>">
          <label class="custom-file-label" for="customFile" style="overflow: hidden;">Choose file</label>
        </div>
      </div>
      <div class="form-group col-md-6">
        <label for="exampleFormControlSelect1">Category</label>
        <select class="form-control" name="id_category" id="id_category">
          <option selected disabled>Choose Category</option>
          <option selected value="<?php echo $product['id_category'] ?>"><?php echo $product['id_category'] ?></option>
          <?php
          $data = mysqli_query($koneksi, "SELECT * FROM tbl_categories");
          while ($row = mysqli_fetch_array($data)) {
          ?>
            <option value="<?php echo $row['id_category'] ?>"><?php echo $row['name'] ?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label for="exampleInputEmail1">Price</label>
        <input type="number" name="price" placeholder="1000" value="<?php echo $product['price'] ?>" id="price" class="form-control">
      </div>
      <div class="form-group col-md-6">
        <label for="exampleInputEmail1">QTY</label>
        <input type="number" name="qty" placeholder="Quantity of items" value="<?php echo $product['qty'] ?>" id="qty" class="form-control">
      </div>
    </div>
    <div class="form-group ">
      <label for="exampleInputEmail1">Description</label>
      <textarea type="text" name="description" id="description" class="form-control" placeholder="Type description here"><?php echo $product['description'] ?></textarea>
    </div>
    <div class="modal-footer">
      <button type="submit" name="save" class="btn btn-outline-info btn-sm">Submit</button>
    </div>
  </form>
</div>