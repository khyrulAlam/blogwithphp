<section>
  <div class="container">
    <div class="row">

      <div class="col-md-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">ADD NEW AUTHOR</li>
        </ol>
        <form action="" method="post">
          <input type="text" class="form-control" name="author_name" placeholder="Author Name">
          <input type="submit" class="btn btn-info form-control" value="SUBMIT">
        </form>
      </div>
      <div class="col-md-6">
        <table class="table table-bordered">
          <thead class="thead-default">
            <tr>
              <th>ID</th>
              <th>NAME</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>

            <?php if($row){ $i=1; foreach ($row as $value ) {?>
            <tr>
              <th scope="row"><?= $i++ ?></th>
              <td><?= $value['author_name'] ?></td>
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
