<div class="pagination flex justify-center mt-8">
  <ul class="pagination-ul flex list-none m-0 p-0 gap-2">
    <?php

    if ($page > 1) {
    ?>
      <li>
        <a href="index.php?act=<?= $act ?>&iddanhmuc=<?= $iddanhmucFilter ?>&keyword=<?= $keyword ?>&iddonhang=<?= $iddonhang ?>&page=<?= $page - 1 ?>" class="previos-pagination">
          <i class="fa-solid fa-angle-left"></i>
        </a>
      </li>
    <?php
    }
    ?>
    <?php
    for ($i = 1; $i <= $totalPage; $i++) {
    ?>
      <li>
        <a href="index.php?act=<?= $act ?>&iddanhmuc=<?= $iddanhmucFilter ?>&keyword=<?= $keyword ?>&iddonhang=<?= $iddonhang ?>&page=<?= $i ?>" class="number-pagination" style="<?= ($i == $page) ? 'background-color: #3B82F6; color: #fff;' : 'background-color: #fff;' ?>">
          <?= $i ?>
        </a>
      </li>
    <?php
    }
    ?>
    <?php
    if ($page < $totalPage) {
    ?>
      <li>
        <a href="index.php?act=<?= $act ?>&iddanhmuc=<?= $iddanhmucFilter ?>&keyword=<?= $keyword ?>&iddonhang=<?= $iddonhang ?>&page=<?= $page + 1 ?>" class="next-pagination">
          <i class="fa-solid fa-angle-right"></i>
        </a>
      </li>
    <?php
    }
    ?>
  </ul>
</div>