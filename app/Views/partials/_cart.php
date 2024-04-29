            <table>
                <tr>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th></th>
                </tr>
<?php
if(count($cart_items) == 0){
?>          <p>Cart is empty.</p>
<?php
}else{
    foreach($cart_items as $item){
?>              <tr>
                    <td class="item-name"><?= $item['item_name'] ?></td>
                    <td class="qty">
                        <form action="/cart/<?=$item['cart_id']?>/edit_qty/<?= $item['cart_item_id'] ?>" method="post">
                            <p><?= $item['quantity'] ?></p>
                        </form>
                    </td>
                    <td class="price">₱ <?= $item['item_total_price'] ?></td>
                    <td class="delete-button">
                        <form action="cart/<?=$item['cart_id']?>/delete_item/<?=$item['cart_item_id']?>" method="post">
                            <input type="submit" value="x">
                        </form>
                    </td>
                </tr>
<?php } ?>
                <tr id="total">
                    <td id="space"></td>
                    <td id="total_heading">Total:</td>
                    <td>₱ <?= $cart_items[0]['cart_total_price'] ?></td>
                    <td></td>
                </tr>
            </table>
<?php } ?>