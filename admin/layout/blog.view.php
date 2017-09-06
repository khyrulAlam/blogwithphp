<section>
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-md-8">
        <form class="" action="" method="post">
          <div class="form-group">
            <select class="form-control" name="category_id">
              <option value="">Select Category</option>
              <?php if($ctg){ foreach($ctg as $rctg ){?>
              <option value="<?= $rctg['id']?>"><?= $rctg['category_name']?></option>
              <?php } } ?>
            </select>
          </div>
          <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="title">
          </div>
          <div class="form-group">
            <textarea name="body" rows="8" cols="80" class="form-control" placeholder="description"></textarea>
          </div>
          <div class="form-group">
            <input type="text" name="tag" class="form-control" placeholder="tag">
          </div>
          <div class="form-group">
            <label class="custom-file">
              <input type="file" class="custom-file-input" name="img">
              <span class="custom-file-control"></span>
            </label>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
