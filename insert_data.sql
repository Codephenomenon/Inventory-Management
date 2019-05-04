/*
// Author: Daniel Clayton
// Run this script in phpMyAdmin to populate data in cms database
// Creates categories and inventory products
*/

USE cms;

/* -Categories- */
INSERT INTO category (category_name)
VALUES ('Shirts');

INSERT INTO category (category_name)
VALUES ('Jackets');

INSERT INTO category (category_name)
VALUES ('Pants');

INSERT INTO category (category_name)
VALUES ('Shoes');

/* -Inventory- */
INSERT INTO inventory (item_name, item_description, item_cost, item_img, item_category, item_amount)
VALUES ('Slim-Fit European Jacket', 'Inspired by Air Force and Army jackets, this slim-fit jacket provides the perfect modern cut.', 60.61, 'slim-fit-jacket.jpg', 2, 19);

INSERT INTO inventory (item_name, item_description, item_cost, item_img, item_category, item_amount)
VALUES ('Flight Jacket', 'Created with a smooth Indian Orange lining, this Olive Green flight jacket has an easy comfortable fit.', 55.43, 'olive-flight-jacket.jpg', 2, 22);

INSERT INTO inventory (item_name, item_description, item_cost, item_img, item_category, item_amount)
VALUES ('Light Windbreaker Jacket', 'This weather resistant, front-zip jacket is perfect to keep warm on windy days.', 42.29, 'light-windbreaker.jpg', 2, 36);
