<h2>Add a Product</h2>
<p>* This indicates a required field.</p>
<form action="/items/create" method="post">
    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
    <table>
        <tr>
            <td><label for="name">Name*:</label></td>
            <td><input type="text" name="name" id="name"></td>
        </tr>
        <tr>
            <td><label for="type">Type*:</label></td>
            <td>
                <select name="type" id="type">
                    <option disabled selected>Please select a type</option>
<?php foreach(esc($types) as $type){
?>                  <option value="<?= esc($type['id']) ?>"><?= esc($type['type_name']) ?></option>
<?php } ?>      </select>
            </td>
        </tr>
        <tr>
            <td><label for="brand">Brand:</label></td>
            <td><input type="text" name="brand" id="brand"></td>
        </tr>
        <tr>
            <td><label for="price">Price*:</label></td>
            <td><input type="number" min="1" name="price" id="price"></td>
        </tr>
        <tr>
            <td><label for="discounted_price">Discounted:</label></td>
            <td><input type="number" name="discounted_price" id="discounted_price"></td>
        </tr>
        <tr>
            <td><label for="stocks">Stocks*:</label></td>
            <td><input type="number" min="1" name="stocks" id="stocks"></td>
        </tr>
    </table>
    <label for="closest_exp_date">Closest expiration date:</label>
    <input type="date" name="closest_exp_date" id="closest_exp_date">
    <input type="submit" value="Add">
</form>