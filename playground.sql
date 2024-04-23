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