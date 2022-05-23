<section class="promo">
        <h2 class="promo__title">Нужен стафф для катки?</h2>
        <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
        <ul class="promo__list">
            <?php
            $i = 0;
            foreach ($category_ru as $ctg)
            {

                echo "<li class='promo__item promo__item--$category_eng[$i]'>
                                 <a class='promo__link' href='pages/all-lots.html'>$ctg[name]</a>
                       </li>";
                $i++;
            }
            ?>
        </ul>
    </section>
    <section class="lots">
        <div class="lots__header">
            <h2>Открытые лоты</h2>
        </div>
        <ul class="lots__list">
            <?php
            foreach ($adv_info as $adv) {

                echo "<li class='lots__item lot'>
                        <div class='lot__image'>
                            <img src='$adv[image]' width='350' height='260' alt='' name='lot_img'>
                        </div>
                        <div class='lot__info'>
                        <span class='lot__category' name='lot_ctg'>$adv[cat]</span>
                            <h3 class='lot__title'><a class='text-link' href='lot.php?$adv[id]'>$adv[lot]</a></h3>
                                 <div class='lot__state'>
                                      <div class='lot__rate'>
                                         <span class='lot__amount'>Стартовая цена</span>
                                         <span class='lot__cost' name='lot_price'>".price($adv['start_price'])."</span>
                                      </div>
                                        <div class='lot__timer timer'>
                                           ". interval() ."
                                        </div>
                                    </div>
                                 </div>
                            </li>";
            }
            ?>
        </ul>
    </section>
