<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" type="text/css" href="/stylesheets/index.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="/js/index.js"></script>
    <title>Cash Register</title>
</head>
<body>
    <h1>Today is: <?= esc($date) ?></h1>

    <div id="popup"></div>
    <div id="cart">
        <form action="/cart/add" method="post" id="search">
            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
            <div id="suggestions">
                <div id="text-container">
                    <input type="text" placeholder="Type in the product name..." list="itemSearch" id="search-bar" name="product_name">
                    <datalist id="itemSearch"></datalist>
                </div>
            </div>
            <input type="submit" id="add" value="Add">
        </form>
        <button id="clear">Clear</button>

        <div id="order">
            <p>Loading...</p>
        </div>
        
        <form action="/cart/checkout" method="" id="checkout">
            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
            <label><input type="checkbox" id="is_discounted">Discounted</label>
            <label><input type="checkbox" id="is_paid">Paying</label>
            <input type="submit" value="Check out" id="checkout-button">
            <input type="submit" value="Discard" id="discard-button">
        </form>
    </div>

    <div id="inventory">
        <button data-link="/items/new">Add New Product</button>
        <button data-link="/items/edit">Edit Product</button>
        <button data-link="/inventory/add">Add Stocks</button>
    </div>
</body>
</html>