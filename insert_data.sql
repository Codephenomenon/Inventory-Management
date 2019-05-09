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
VALUES ('Grey Linen Men\'s Dress Shoe', 'Classic Preston dress shoes for when casual doesn\'t cut it.', 99.97, 'grey-linen-shoes.jpg', 4, 15);

INSERT INTO inventory (item_name, item_description, item_cost, item_img, item_category, item_amount)
VALUES ('Vans Ward Lo Suede Sneaker', 'Skate park and casual street style women\'s low top sneakers.', 59.95, 'ward-suede-sneaker.jpg', 4, 15);

INSERT INTO inventory (item_name, item_description, item_cost, item_img, item_category, item_amount)
VALUES ('Perfect Fit Pant', 'Women\'s stretch pants made of soft jersey-knit.', 39.95, 'womens-sweatpants.jpg', 3, 31);

INSERT INTO inventory (item_name, item_description, item_cost, item_img, item_category, item_amount)
VALUES ('Mid Rise Stretch Pant', 'Comfortable and stylish work dress pants in a slim fit.', 73.49, 'mid-rise-stretch.jpg', 3, 22);

INSERT INTO inventory (item_name, item_description, item_cost, item_img, item_category, item_amount)
VALUES ('Tuscon Pant', 'Rugged durability on bronson fabric featuring a slim fit.', 34.56, 'tuscon-pants.jpg', 3, 30);

INSERT INTO inventory (item_name, item_description, item_cost, item_img, item_category, item_amount)
VALUES ('Velocity Navy Dress Pant', 'Engineered for long active days of work or travel, with comfort in mind.', 61.28, 'velocity-navy-dresspants.jpg', 3, 37);

INSERT INTO inventory (item_name, item_description, item_cost, item_img, item_category, item_amount)
VALUES ('DuluthFlex Fire Hose Cargo Pant', 'Strong and flexible cargo pants that are long lasting and durable.', 46.79, 'mens-duluflex-cargo.jpg', 3, 40);

INSERT INTO inventory (item_name, item_description, item_cost, item_img, item_category, item_amount)
VALUES ('Slim-Fit European Jacket', 'Inspired by Air Force and Army jackets, this slim-fit jacket provides the perfect modern cut.', 60.61, 'slim-fit-jacket.jpg', 2, 19);

INSERT INTO inventory (item_name, item_description, item_cost, item_img, item_category, item_amount)
VALUES ('Flight Jacket', 'Created with a smooth Indian Orange lining, this Olive Green flight jacket has an easy comfortable fit.', 55.43, 'olive-flight-jacket.jpg', 2, 22);

INSERT INTO inventory (item_name, item_description, item_cost, item_img, item_category, item_amount)
VALUES ('Light Windbreaker Jacket', 'This weather resistant, front-zip jacket is perfect to keep warm on windy days.', 42.29, 'light-windbreaker.jpg', 2, 36);

INSERT INTO inventory (item_name, item_description, item_cost, item_img, item_category, item_amount)
VALUES ('Dakine Juniper Jacket', 'Made with weather resistant material, this stylish womens jacket is a steal.', 38.50, 'dakine-juniper-jacket.jpg', 2, 15);

INSERT INTO inventory (item_name, item_description, item_cost, item_img, item_category, item_amount)
VALUES ('Notch-collar Blazer', 'A stylish office blazer with a notched collar.', 52.00, 'black-low-cut-jacket.jpg', 2, 12);

INSERT INTO inventory (item_name, item_description, item_cost, item_img, item_category, item_amount)
VALUES ('Santenau Untuckit T-shirt', 'Soft fabric with a slim fit, sizes run small.', 22.45, 'santenau-untuckit-red-tshirt.jpg', 1, 25);

INSERT INTO inventory (item_name, item_description, item_cost, item_img, item_category, item_amount)
VALUES ('Guiness T-shirt', 'The greatest beer of all time now on a t-shirt', 20.99, 'guiness-shirt.jpg', 1, 20);

INSERT INTO inventory (item_name, item_description, item_cost, item_img, item_category, item_amount)
VALUES ('Cats For Peace T-shirt', 'Our feline friends have come together for world peace.', 20.99, 'cats-4-peace.jpg', 1, 33);

INSERT INTO inventory (item_name, item_description, item_cost, item_img, item_category, item_amount)
VALUES ('Octopus T-shirt', 'The lord of the deep sea on a cotton shirt.', 24.30, 'octopus-shirt.jpg', 1, 28);

INSERT INTO inventory (item_name, item_description, item_cost, item_img, item_category, item_amount)
VALUES ('PBS Nerd T-shirt', 'Show off your love of the public broadcasting service.', 25.49, 'pbs-nerd.jpg', 1, 25);

INSERT INTO inventory (item_name, item_description, item_cost, item_img, item_category, item_amount)
VALUES ('Victory Possum T-shirt', 'Assert your dominance with this victorious marsupial', 22.60, 'victory-possum.jpg', 1, 14);

/* -Orders- */
INSERT INTO orders (customer_name, customer_address, order_total, time_placed)
VALUES ('Joe Bricker', '2134 East Wellington Street, Howard Beach', 145.19, '2019-01-03');

INSERT INTO order_items (order_id, item_id, item_name, item_cost)
VALUES (1, 8, 'Slim-Fit European Jacket', 60.61);

INSERT INTO order_items (order_id, item_id, item_name, item_cost)
VALUES (1, 10, 'Light Windbreaker Jacket', 42.29);

INSERT INTO order_items (order_id, item_id, item_name, item_cost)
VALUES (1, 10, 'Light Windbreaker Jacket', 42.29);

INSERT INTO orders (customer_name, customer_address, order_total, time_placed)
VALUES ('Lorena Hill', '51 Newbridge Dr. Altamonte Springs', 106.43, '2019-01-12');

INSERT INTO order_items (order_id, item_id, item_name, item_cost)
VALUES (2, 15, 'Cats For Peace T-shirt', 20.99);

INSERT INTO order_items (order_id, item_id, item_name, item_cost)
VALUES (2, 17, 'PBS Nerd T-shirt', 25.49);

INSERT INTO order_items (order_id, item_id, item_name, item_cost)
VALUES (2, 2, 'Vans Ward Lo Suede Sneaker', 59.95);
