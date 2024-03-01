<?php

require "connection.php";

$time = $_POST["time"];
$budget = $_POST["budget"];
$type = $_POST["type"];

$query = "SELECT * FROM `gohann` WHERE `time`<=" . $time . " AND `price_max`<=" . $budget. " AND `type` LIKE '%" . $type . "%'";

// $_SESSION['query'] = $query;

// if(isset($_SESSION))

?>
<div class="row">
    <div class="col-12" style="margin-top:12px; margin-bottom: 40px;">
        <div class="row">
            <div class="col-12 position-relative">
                <div class="row">
                    <div class="col-12 position-relative" style="z-index: 5;">
                        <div class="row">
                            <p class="text-center" style="font-weight: 900; font-size: 8vw; color: white; margin-top: 17vw;">TTC 東中野</p>
                        </div>
                    </div>
                    <div class="col-12 position-absolute" style="right:0; z-index: -1;">
                        <div class="row">
                            <img class="" src="img/lily-banse--YHSwy6uqvk-unsplash.jpg" style="width: 100%; height: auto;">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12" style="margin-top: 25vw;">
                <div class="row">
                    <div class="col-lg-2 offset-lg-10 col-5 offset-7">
                        <div class="row">
                            <button class="btn" style=" border-radius: 0;font-size: larger; font-weight: 700; background-color: #8A8A8A;color: white;">フィ-ドバック</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 ms-lg-3 ms-0">
                <div class="row">
                    <p class="fs-5" style="font-weight: 400;">TTC 東中野 学生の</p>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <p class="text-center fs-3" style="font-weight: 700;">ご飯ちゃん</p>
                    <div class="col-10 offset-1 col-lg-8 offset-lg-2 p-lg-3 p-1" style="box-shadow:  0px 0px 4px rgba(0, 0, 0, 0.25)">
                        <div class="row">
                            <div class="col-12 ps-lg-5 mt-2">
                                <div class="row">
                                    <div class="col-lg-3 col-10 offset-1 offset-lg-0 me-lg-5">
                                        <div class="row">
                                            <label class="fs-5" for="" style="font-weight: 600; color: #636363;">何分以内</label>
                                            <select class="form-select mt-2 text-center fs-5" name="" id="time" style=" color: #636363;font-weight: 600;background-color: #D9D9D9;border-color: #D9D9D9; box-shadow: none;">
                                                <option value="1" class="">1分</option>
                                                <option value="2" class="">2分</option>
                                                <option value="3" class="">3分</option>
                                                <option value="4" class="">4分</option>
                                                <option value="5" class="">5分</option>
                                                <option value="6" class="">6分</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-10 offset-1 offset-lg-0 me-lg-5 mt-3 mt-lg-0">
                                        <div class="row">
                                            <label class="fs-5" for="" style="font-weight: 600; color: #636363;">予算</label>
                                            <select class="form-select mt-2 text-center fs-5" name="" id="budget" style=" color: #636363; font-size: 3vw;font-weight: 600;background-color: #D9D9D9;border-color: #D9D9D9; box-shadow: none;">
                                                <?php
                                                $budget_rs = Database::search("SELECT DISTINCT price_max FROM `gohann`");
                                                $budget_rows = $budget_rs->num_rows;

                                                for ($x = 0; $x < $budget_rows; $x++) {
                                                    $budget_data = $budget_rs->fetch_assoc();
                                                    $price_max = $budget_data["price_max"];
                                                ?>
                                                    <option value="<?php echo $price_max; ?>" class=""><?php echo $price_max; ?>円</option>
                                                <?php
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-10 offset-1 offset-lg-0 mt-3 mt-lg-0">
                                        <div class="row">
                                            <label class="fs-5" for="" style="font-weight: 600; color: #636363;">ジャンル</label>

                                            <?php

                                            $categories = array(
                                                '和食' => ['ラーメン', 'つけ麺', '餃子', '中華料理', 'そば', 'うどん', 'もつ焼き', 'ステーキ', '天ぷら', '天丼', '寿司', '海鮮丼', '油そば・まぜそば', 'からあげ', '担々麺', '串揚げ', '創作料理'],
                                                '洋食' => ['ピザ', 'イタリアン', 'パスタ', '洋食', 'ハンバーグ', 'ファミレス', 'ダイニングバー', 'フレンチ', 'ビストロ'],
                                                'アジア・エスニック' => ['インド料理', 'インドカレー', 'アジア・エスニック', 'ベトナム料理', '台湾料理'],
                                                'バー' => ['日本酒バー', 'ビアバー', 'ワインバー', 'バー'],
                                                'カフェ' => ['カフェ', '喫茶店'],
                                                '海鮮' => ['海鮮'],
                                                '飲茶・点心' => ['飲茶・点心'],
                                                'ファーストフード' => ['ドーナツ', '牛丼'],
                                                'その他' => ['弁当', 'コロッケ', '韓国料理', '居酒屋', 'バル', '惣菜・デリ', '日本料理', '食堂', 'おにぎり', 'カレー', 'ホルモン']
                                            );

                                            // Generate HTML select options
                                            echo '<select class="form-select mt-2 text-center fs-5" id="type"  style=" color: #636363;font-weight: 600;background-color: #D9D9D9;border-color: #D9D9D9; box-shadow: none;"  name="category">';
                                            foreach ($categories as $category => $items) {
                                                echo '<optgroup label="' . $category . '">';
                                                foreach ($items as $item) {
                                                    echo '<option value="' . $item . '">' . $item . '</option>';
                                                }
                                                echo '</optgroup>';
                                            }
                                            echo '</select>';

                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mb-4" style="margin-top: 5vh;">
                                <div class="row">
                                    <div class="col-lg-6 offset-lg-3 col-12">
                                        <div class="row">
                                            <div class="col-lg-5 col-10 offset-1 offset-lg-0 mb-2 mb-lg-0">
                                                <div class="row">
                                                    <button class="btn fs-5" style="background-color: #88D527;border-radius: 0; font-weight: 700;" onclick="search();">探してもらう</button>
                                                </div>
                                            </div>

                                            <div class="col-lg-5 col-10 offset-1 offset-lg-1">
                                                <div class="row">
                                                    <button class="btn fs-5" style="background-color: #D35126;border-radius: 0; font-weight: 700;" onclick="clearSearch();">クリア検索</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-10 offset-lg-1 col-12 offset-0 mt-5">
                <div class="row">
                    <div class="col-12 position-relative" style="margin-bottom: 2vw;" id="sortBar" onclick="">
                        <div class="row">
                            <div class="position-absolute mt-lg-1 mt-0" style="z-index: -1;">
                                <div class="row">
                                    <img src="img/burger-bar.png" alt="" style="height: 40px;width: auto;">
                                </div>
                            </div>
                            <div class="position-relative" style="z-index: 5;">
                                <div class="row">
                                    <p class="fs-3" style="margin-left: 60px;font-weight: 600; color: #636363;">並べ替え</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row">
                            <?php
                            $page_no;

                            if (isset($_GET["page"])) {
                                $page_no = $_GET["page"];
                            } else {
                                $page_no = 1;
                            }

                            $actual_product_rs = Database::search($query);
                            $actual_product_rows = $actual_product_rs->num_rows;

                            $products_per_page = 8;
                            $number_of_pages = ceil($actual_product_rows / $products_per_page);

                            $page_results = ($page_no - 1) * $products_per_page;

                            $selected_rs = Database::search($query . " LIMIT " . $products_per_page . " OFFSET " . $page_results . "");
                            $selected_rows = $selected_rs->num_rows;

                            for ($i = 0; $i < $selected_rows; $i++) {
                                $product_data = $selected_rs->fetch_assoc();

                            ?>
                                <div class="col-lg-3 col-12 mb-3 mb-sm-0 mb-lg-3 mb-0 d-flex align-items-stretch">
                                    <div class="card flex-grow-1" style="border-radius: 1vw;background-color: #D9D9D9;">
                                        <img src="./img/food/<?php echo $product_data["img"]; ?>" class="card-img-top" alt="..." style="border-radius: 1vw;">
                                        <div class="card-body">
                                            <h2 class="card-title text-center fs-4" style="font-weight: 600;"><?php echo $product_data["name"]; ?></h2>
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="row">
                                                            <p class="fs-5" style="font-weight: 600;">値段</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="row">
                                                            <p class="fs-5" style="font-weight: 600;">￥<span><?php echo $product_data["price_min"]; ?></span>～<span><?php echo $product_data["price_max"]; ?></span></p>
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="row">
                                                            <p class="" style="font-size: medium; font-weight: 600;">食べログスコア</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="row">
                                                            <p class="" style="font-size: medium; font-weight: 600;"><?php echo $product_data["score"]; ?></p>
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="row">
                                                            <p class="" style="font-size: medium; font-weight: 600; color: #007EA6;">学内おすすめ</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="row">
                                                            <p class="" style="font-size: medium; font-weight: 600;"><?php echo $product_data["rec_count"]; ?>人</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <p class="text-end" style="font-size: medium; font-weight: 600;">定休日　<?php echo $product_data["holiday"]; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php

                            }
                            ?>

                        </div>
                    </div>
                    <div class="offset-lg-3 col-12 col-lg-6 text-center mb-3 mt-lg-4 mt-3">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination pagination-sm justify-content-center">
                                <li class="page-item">
                                    <a class="page-link bg-body" href="<?php

                                                                        if ($page_no <= 1) {
                                                                            echo "#";
                                                                        } else {
                                                                            echo "?page=" . ($page_no - 1);
                                                                        }
                                                                        ?>" aria-label="Previous">
                                        <span class="text-dark" aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <?php
                                for ($x = 1; $x <= $number_of_pages; $x++) {
                                    if ($x == $page_no) {
                                ?>
                                        <li class="page-item active">
                                            <a class="page-link text-dark bg-white" href="<?php
                                                                                            echo "?page=" . $x;
                                                                                            ?>"><?php echo $x; ?></a>
                                        </li>
                                    <?php

                                    } else {
                                    ?>
                                        <li class="page-item ">
                                            <a class="page-link text-dark bg-body" href="<?php
                                                                                            echo "?page=" . $x;
                                                                                            ?>"><?php echo  $x; ?></a>
                                        </li>
                                <?php
                                    }
                                }
                                ?>


                                <li class="page-item">
                                    <a class="page-link  bg-body " href="<?php

                                                                            if ($page_no >= $number_of_pages) {
                                                                                echo "#";
                                                                            } else {
                                                                                echo "?page=" . ($page_no + 1);
                                                                            }
                                                                            ?>" aria-label="Next">
                                        <span aria-hidden="true" class="text-dark">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-12 mt-lg-5 mt-3">
                        <div class="row">
                            <p class="text-center fs-6 mt-4">***写真をイラストです</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "footer.php";
    ?>
</div>
<?php


?>