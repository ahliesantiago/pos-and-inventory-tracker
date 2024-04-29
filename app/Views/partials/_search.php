<?php foreach(esc($results) as $item){
?>                  <option value="<?= esc($item['item_name']) ?>" data-id="<?= esc($item['id']) ?>"><?= esc($item['item_name']) ?> — ₱<?= esc($item['price']) ?> — <?= esc($item['current_stocks']) ?> available</option>
<?php } ?>