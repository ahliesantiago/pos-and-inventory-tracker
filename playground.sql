USE store_pos;

-- UPDATE types
-- SET type_name = "Personal care"
-- WHERE type_name = "Personal car";

-- INSERT INTO types (type_name, created_at, updated_at)
-- VALUES ("GCash transaction", now(), now());

-- SELECT * FROM types;

-- SELECT * FROM store_pos.items;
-- INSERT INTO items (item_name, type_id, brand, price, discounted_price, current_stocks, closest_expiration_date, created_at, updated_at)
-- VALUES ("Test Item", 1, "Test Brand", 20, 18, 5, "2024-05-01 00:00:00", now(), now());

-- SELECT * FROM items;

SELECT * FROM types
LEFT JOIN items
ON types.id = items.type_id;
-- WHERE item_name LIKE '%te%';

-- INSERT INTO cart (is_discounted, is_paid, is_checked_out, created_at, updated_at)
-- values (0, 0, 0, now(), now());

-- delete from cart_items where id > 15;
-- update cart set total_price = 35 where id = 2;

-- INSERT INTO cart_items (cart_id, item_id, price_during_purchase, quantity, total_price, created_at, updated_at)
-- values (2, 5, 20, 2, 40, now(), now());

SELECT * FROM cart
LEFT JOIN cart_items
ON cart.id = cart_items.cart_id
LEFT JOIN items
ON cart_items.item_id = items.id
WHERE cart.is_checked_out = 0;

-- SELECT * from cart_items;
-- SELECT SUM(total_price) FROM cart_items
-- WHERE cart_id = 2;