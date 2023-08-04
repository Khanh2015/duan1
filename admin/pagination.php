<style>
  .pagination {
    display: flex;
    justify-content: center;
    margin: 32px;
  }

  .pagination-ul {
    display: flex;
    list-style-type: none;
    margin: 0;
    padding: 0;
    gap: 8px;
  }

  .number-pagination,
  .previos-pagination,
  .next-pagination {
    display: block;
    padding: 8px 16px;
    background: #fff;
    border: 1px solid #ccc;
    border-radius: 50%;
    color: gray;
    font-weight: 500;
  }

  .number-pagination:hover,
  .previos-pagination:hover,
  .next-pagination:hover {
    background: #ccc;
  }

  .number-pagination:active,
  .previos-pagination:active,
  .next-pagination:active {
    background: #0099FF;
    color: #fff
  }
</style>
<div class="pagination flex justify-center mt-8">

  <ul class="pagination-ul flex list-none m-0 p-0 gap-2">
    <?php

    if ($page > 1) {
    ?>
      <li>
        <a href="index.php?act=<?= $act ?>&page=<?= $page - 1 ?>" class="previos-pagination block py-2 px-4 bg-white border border-gray-300 rounded-[50%] text-gray-700 hover:bg-gray-200 active:bg-blue-500 active:text-white font-medium">
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
        <a href="index.php?act=<?= $act ?>&page=<?= $i ?>" class="number-pagination block py-2 px-4  border border-gray-300 rounded-[50%] text-gray-700   active:text-white font-medium <?= ($i == $page) ? 'bg-blue-500 text-white' : 'bg-white hover:bg-gray-200' ?>">
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
        <a href="index.php?act=<?= $act ?>&page=<?= $page + 1 ?>" class="next-pagination block py-2 px-4 bg-white border border-gray-300 rounded-[50%] text-gray-700 hover:bg-gray-200 active:bg-blue-500 active:text-white font-medium">
          <i class="fa-solid fa-angle-right"></i>
        </a>
      </li>
    <?php
    }
    ?>
  </ul>
</div>