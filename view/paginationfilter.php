<div class="pagination flex justify-center mt-8">

  <ul class="flex list-none m-0 p-0 gap-2">
    <?php

    if ($page > 1) {
    ?>
      <li>
        <a href="index.php?act=locsanpham&size=<?= $filterSize ?>&color=<?= $filterColor ?>&price=<?= $filterPrice ?>&page=<?= $page - 1 ?>" class="block py-2 px-4 bg-white border border-gray-300 rounded-[50%] text-gray-700 hover:bg-gray-200 active:bg-blue-500 active:text-white font-medium">
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
        <a href="index.php?act=locsanpham&size=<?= $filterSize ?>&color=<?= $filterColor ?>&price=<?= $filterPrice ?>&page=<?= $i ?>" class="block py-2 px-4  border border-gray-300 rounded-[50%] text-gray-700   active:text-white font-medium <?= ($i == $page) ? 'bg-blue-500 text-white' : 'bg-white hover:bg-gray-200' ?>">
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
        <a href="index.php?act=locsanpham&size=<?= $filterSize ?>&color=<?= $filterColor ?>&price=<?= $filterPrice ?>&page=<?= $page + 1 ?>" class="block py-2 px-4 bg-white border border-gray-300 rounded-[50%] text-gray-700 hover:bg-gray-200 active:bg-blue-500 active:text-white font-medium">
          <i class="fa-solid fa-angle-right"></i>
        </a>
      </li>
    <?php
    }
    ?>
  </ul>
</div>