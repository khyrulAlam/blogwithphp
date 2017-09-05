<section>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">ADD NEW CATEGORY</li>
        </ol>
          <form class="" action="" method="post">
              <input type="text" class="form-control" name="category_name">
              <input type="submit"  class="btn btn-info form-control" value="SUBMIT">
          </form>
      </div>
      <div class="col-md-6">
        <table class="table table-bordered">
          <thead class="thead-default">
            <tr>
              <th>ID</th>
              <th>CATEGORY NAME</th>
              <th class="text-center">ACTION</th>
            </tr>
          </thead>
          <tbody>
            <?php if($rows){ $i=1; foreach($rows as $row){?>
            <tr>
              <th scope="row"><?= $i++?></th>
              <td><?= $row['category_name']?></td>
              <td class="text-center">
                <i class="fa fa-pencil-square-o text-success"></i>
                <i class="fa fa-trash-o text-danger"></i>
              </td>
            </tr>
          <?php } } ?>
          </tbody>
        </table>

      </div>
    </div>
  </div>
</section>
