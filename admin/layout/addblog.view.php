<section>
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-md-8">
        <?php if(isset($data['error'])){?>
        <div class="alert alert-danger" role="alert">
          <span style="font-size:13px"><?= $data['error'];?></span>
        </div>
        <?php } ?>
        <?php if(isset($data['sucs'])){?>
        <div class="alert alert-success" role="alert">
          <span style="font-size:13px"><?= $data['sucs'];?></span>
        </div>
        <?php } ?>
        <form class="" action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <select class="form-control" name="category_id" required>
              <option value="">Select Category</option>
              <?php if($ctg){ foreach($ctg as $rctg ){?>
              <option value="<?= $rctg['id']?>"><?= $rctg['category_name']?></option>
              <?php } } ?>
            </select>
          </div>
          <div class="form-group">
            <input type="hidden" name="author_name" value="<?= $_SESSION['author_name']?>">
          </div>
          <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="title" required>
          </div>
          <div class="form-group">
            <textarea name="body" rows="8" cols="80" class="form-control" placeholder="description" required></textarea>
          </div>
          <div class="form-group">
            <input type="text" name="tag" class="form-control" placeholder="tag">
          </div>
          <div class="form-group">
            <label for="pimg"></label>
            <input type="file" name="img" id="pimg" class="form-control" required>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-lg btn-outline-success btn-block">ADD NEWS</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<script src="//cdn.ckeditor.com/4.7.2/full/ckeditor.js"></script>
<script>
	CKEDITOR.replace( 'body' );
</script>
