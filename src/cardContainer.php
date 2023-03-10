<?php
    filterCards();
?>

<div>
    <h2 id="all-cards-header">All Cards</h2>
    <form id="card-search-form" method="get"> 
        <input 
            autocomplete="off" 
            name="card-search" 
            value="<?php echo $GLOBALS['existingSearchTerm'] ?>"
            id="card-search"></input>
        <i class="fa-solid fa-magnifying-glass"></i>

        <select name="card-dropdown" onchange="submitCardForm()" id="card-dropdown">
            <option 
                <?php if ($GLOBALS['existingDropdownValue'] !== "starred") echo "selected='selected'";?>
                value="all">All</option>

            <option 
                <?php if ($GLOBALS['existingDropdownValue'] === "starred") echo "selected='selected'";?>
                value="starred">Starred</option>
        </select>
    </form>
    <?php foreach($allCards as $card): ?>
        <div class="card"
            id="<?php echo $card->getCardId()?>">
                <form method=post class="card-icons" id="<?php echo 'card-icons-' . $card->getCardId() ?>"> 
                    <? if ($card->getFavoriteInd() === 'Y'): ?>
                        <input name="<?php echo 'favorite-input-' . $card->getCardId() ?>"
                            id="<?php echo 'favorite-input-' . $card->getCardId() ?>" hidden>
                        <i class="fa-solid card-icon favorite-card-icon fa-star"
                            onclick="<?php echo 'submitFavorite(' . $card->getCardId() . ')'?>"> </i>
                    <? else: ?>
                        <input name="<?php echo 'favorite-input-' . $card->getCardId() ?>"
                            id="<?php echo 'favorite-input-' . $card->getCardId() ?>" hidden>
                        <i class="card-icon favorite-icon-blank fa-regular fa-star" 
                            onclick="<?php echo 'submitFavorite(' . $card->getCardId() . ')'?>"> </i>
                    <? endif; ?>

                    <input name="<?php echo 'edit-input-' . $card->getCardId() ?>"
                        id="<?php echo 'edit-input-' . $card->getCardId() ?>" hidden>
                    <i class="card-icon fa-solid fa-pen-to-square"
                        onclick="<?php echo 'submitEdit(' . $card->getCardId() . ')'?>"> </i>

                    <input name="<?php echo 'delete-input-' . $card->getCardId() ?>"
                        id="<?php echo 'delete-input-' . $card->getCardId() ?>"hidden>
                    <i title="double click to delete" class="card-icon fa-solid fa-trash"
                        ondblclick="<?php echo 'submitDelete(' . $card->getCardId() . ')'?>"> </i>

                </form>
                <div class="card-content"
                onclick="<?php echo 'clickCard(' . $card->getCardId() . ')'?>"
                >
                    <p class="card-front show-side"><?php echo $card->getCardFront()?> </p>
                    <p class="card-back hide-side"><?php echo $card->getCardBack()?> </p>
                    <div class="tags">

                        <?php foreach($card->getTagList() as $key=>$value): ?>
                            <span class="card-tag"><?php echo $value ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
        </div>
    <?php endforeach; ?>
</div>