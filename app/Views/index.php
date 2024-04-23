<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" type="text/css" href="/stylesheets/index.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Register</title>
</head>
<body>
    <h1>Today is: <?= esc($date) ?></h1>
    <div id="cart">
        <form action="" method="post" id="search">
            <input type="text" placeholder="Type in the product name..." id="search-bar">
            <input type="submit" id="add" value="Add">
            <input type="submit" id="clear" value="Clear">
        </form>
        <div id="order">
            <table>
                <tr>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th></th>
                </tr>
                <tr>
                    <td class="item-name"><?= 'tba' ?></td>
                    <td class="qty"><?= 'tba' ?></td>
                    <td class="price">₱ <?= 'tba' ?></td>
                    <td class="delete-button"><a href="<?= 'tba' ?>">x</a></td>
                </tr>
                <tr>
                    <td class="item-name">Cloud9</td>
                    <td class="qty">1</td>
                    <td class="price">₱ 9.00</td>
                    <td class="delete-button"><a href="">x</a></td>
                </tr>
                <tr>
                    <td class="item-name">Top Coffee (3s)</td>
                    <td class="qty">1</td>
                    <td class="price">₱ 15.00</td>
                    <td class="delete-button"><a href="">x</a></td>
                </tr>
                <tr>
                    <td class="item-name">Pepsi (1.5L)</td>
                    <td class="qty">1</td>
                    <td class="price">₱ 80.00</td>
                    <td class="delete-button"><a href="">x</a></td>
                </tr>
                <tr>
                    <td class="item-name">Smirnoff</td>
                    <td class="qty">3</td>
                    <td class="price">₱ 270.00</td>
                    <td class="delete-button"><a href="">x</a></td>
                </tr>
                <tr>
                    <td class="item-name">Oyster Sauce 30g</td>
                    <td class="qty">2</td>
                    <td class="price">₱ 14.00</td>
                    <td class="delete-button"><a href="">x</a></td>
                </tr>
                <tr>
                    <td class="item-name">Oyster Sauce 60g</td>
                    <td class="qty">2</td>
                    <td class="price">₱ 20.00</td>
                    <td class="delete-button"><a href="">x</a></td>
                </tr>
                <tr>
                    <td class="item-name">Evaporada - Alaska (small)</td>
                    <td class="qty">1</td>
                    <td class="price">₱ 14.00</td>
                    <td class="delete-button"><a href="">x</a></td>
                </tr>
                <tr>
                    <td class="item-name">Great Taste White</td>
                    <td class="qty">5</td>
                    <td class="price">₱ 55.00</td>
                    <td class="delete-button"><a href="">x</a></td>
                </tr>
                <tr>
                    <td class="item-name">Great Taste Choco</td>
                    <td class="qty">5</td>
                    <td class="price">₱ 50.00</td>
                    <td class="delete-button"><a href="">x</a></td>
                </tr>
            </table>
        </div>
        <form action="" method="" id="checkout">
            <label><input type="checkbox" id="is_discounted">Discounted</label>
            <label><input type="checkbox" id="is_paid">Paying</label>
            <input type="submit" value="Check out" id="checkout-button">
        </form>
    </div>

    <div id="inventory">
        <form action="" id="">
            <input type="submit" value="Add New Product">
        </form>
        <form action="" id="">
            <input type="submit" value="Edit Product">
        </form>
        <form action="" id="">
            <input type="submit" value="Add Stocks">
        </form>
    </div>
</body>
</html>