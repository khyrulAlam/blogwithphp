<section>
  <div class="container">
    <div class="row">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>AUTHOR NAME</th>
            <th>TITLE</th>
            <th style="width:40%">NEWS BODY</th>
            <th>IMAGE</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1; foreach ($rows as $row) { ?>
          <tr>
            <td><?= $i++ ?></td>
            <td><?= $row['author_id']?></td>
            <td><?= $row['title']?></td>
            <td><?= substr(html_entity_decode($row['body'],ENT_QUOTES, 'UTF-8'),0,200)?></td>
            <td><img src="<?= $row['img']?>" width="100"></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</section>
