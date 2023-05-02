1)Show all customers in the database.
SELECT * FROM `customers`;

2)Show all products in the database.
SELECT * FROM `products`;

3)Show all orders in the database.
SELECT * FROM `orders`;

4)Show all order items in the database.
SELECT * FROM `order_items`;

5)Show the customer with ID 1.
SELECT * FROM `customers` 
WHERE customer_id = 1;

6)Show the product with ID 2.
SELECT * FROM `products` 
WHERE product_id = 2;

7)Show the order with ID 3.
SELECT * FROM `orders` 
WHERE order_id = 3;

8)Show the order item for order ID 1 and product ID 1.
SELECT * FROM `order_items`
 WHERE order_id = 1 AND product_id = 1;


9)Show the total number of customers in the database.
SELECT COUNT(*) 
FROM customers;

10)Show the total number of products in the database.
SELECT COUNT(*) 
FROM products;

11)Show the total number of orders in the database.
SELECT COUNT(*) 
FROM orders;

12)Show the total number of order items in the database.
SELECT COUNT(*) 
FROM order_items;

13)Show the average price of products in the database.
SELECT AVG(product_id) 
FROM products 
WHERE product_id;

14)Show the maximum price of products in the database.
SELECT MAX(price) as max_price 
FROM products;

15)Show the minimum price of products in the database.
SELECT MIN(price) as max_price 
FROM products;

16)Show the total inventory of all products.
SELECT SUM(inventory) 
FROM products;

17)Show the orders for customer with ID 2.
SELECT * FROM `orders` WHERE customer_id = 2;

18)Show the order items for order with ID 4.
SELECT * FROM `order_items` WHERE order_id = 4;

19)Show the total amount spent by customer with ID 1.
SELECT SUM(total) 
FROM orders 
WHERE customer_id = 1;

20)Show the total number of order items for order with ID 2.
SELECT SUM(quantity)
FROM order_items 
WHERE order_id = 2;

21)Show the product with the highest price.
SELECT MAX(price) FROM products;

22)Show the customer who has spent the most money.
SELECT first_name,MAX(orders.total) 
FROM customers 
INNER JOIN orders ON customers.customer_id = orders.order_id;

23)Show the customer who has placed the most orders.
  SELECT  MAX(order.total) FROM customers                                      
                                             
24)Show the product with the most inventory.
SELECT MAX(inventory) FROM products;

25)Show the order with the highest total.
SELECT customer_id, COUNT(DISTINCT order_id ), MAX(total)
 FROM orders GROUP BY customer_id 
 ORDER BY MAX(total) 
 DESC LIMIT 1;

26)Show the total revenue for the month of January 2022.
SELECT SUM(total) AS revenue 
FROM orders 
WHERE order_date 
BETWEEN '2022-01-01' AND '2022-01-31';

27)Show the total revenue for each month in 2022.
SELECT DATE_FORMAT(order_date, '%Y-%m') AS month, SUM(total) AS revenue 
FROM Orders 
WHERE YEAR(order_date) = 2022 
GROUP BY DATE_FORMAT(order_date, '%Y-%m');

28)Show the average total spent per order.
SELECT AVG(total) AS average_total_spent_per_order 
FROM orders;

29)Show the average price of products with more than 50 units in inventory.
SELECT AVG(price) AS average_price 
FROM products 
WHERE inventory > 50;

30)Show the number of orders placed each day in January 2022.
SELECT order_date, COUNT(*) AS number_of_orders 
FROM orders 
WHERE order_date 
BETWEEN '2022-01-01' AND '2022-01-31' 
GROUP BY order_date;

31)Show the number of orders placed each hour of the day.
SELECT DAYNAME(order_date) AS DAY ,COUNT(*) AS num_orders 
FROM orders 
GROUP BY DAY;

32)Show the number of orders placed on each day of the week.
SELECT DAYNAME(order_date) AS DAY ,COUNT(*) AS num_orders 
FROM orders 
GROUP BY DAY;

33)Show the top 5 customers by total amount spent.
SELECT customers.customer_id, customers.first_name, customers.last_name, SUM(orders.total) AS total_spent 
FROM customers 
JOIN orders ON customers.customer_id = orders.customer_id 
GROUP BY customers.customer_id, customers.first_name, customers.last_name 
ORDER BY total_spent
DESC LIMIT 5;

34)Show the top 5 products by total revenue.
SELECT products.product_id, products.name, SUM(order_items.quantity * order_items.price) AS total_revenue 
FROM products JOIN order_items ON products.product_id = order_items.product_id 
GROUP BY products.product_id, products.name 
ORDER BY total_revenue     
DESC LIMIT 5;

35)Show the customers who have never placed an order.
SELECT customers.customer_id, customers.first_name 
FROM customers 
LEFT JOIN orders ON customers.customer_id = orders.customer_id 
WHERE orders.order_id IS NULL;

36)Show the products that have never been ordered.
SELECT * FROM products 
LEFT JOIN order_items ON products.product_id = order_items.product_id 
WHERE order_items.product_id IS NULL;

37)Show the customers who have placed more than 2 orders.
 SELECT customers.customer_id, customers.first_name, 
 COUNT(orders.order_id) AS num_orders 
 FROM customers 
 JOIN orders ON customers.customer_id = orders.customer_id 
 GROUP BY customers.customer_id, customers.first_name HAVING COUNT(orders.order_id)>2;

38)Show the products that have a price between $10 and $20.
SELECT product_id,name, price 
FROM products 
WHERE price BETWEEN 10 AND 20;

39)Show the orders placed in the month of January 2022, sorted by order date.
SELECT * FROM orders 
WHERE order_date >= '2022-01-01' AND order_date < '2022-02-01' 
ORDER BY order_date;

40)Show the order items for the order placed on January 2, 2022.
SELECT order_id 
FROM orders 
WHERE order_date LIKE '2022-01-02%';

41)Show the orders placed by customer with ID 1, sorted by order date.
SELECT * FROM orders WHERE customer_id = 1 ORDER BY order_date;

42)Show the customer who has placed the most orders in January 2022.
SELECT customer_id, COUNT(*) as num_orders 
FROM orders WHERE MONTH(order_date) = 1 AND YEAR(order_date) = 2022 
GROUP BY customer_id 
ORDER BY num_orders 
DESC LIMIT 1;

43)Show the products that have been ordered at least once, sorted by product name.
SELECT products.product_id, products.name 
FROM products JOIN order_items ON products.product_id = order_items.product_id 
GROUP BY products.product_id, products.name 
ORDER BY products.name;

44)Show the customers who live in California or Texas.
SELECT customer_id, first_name, email, state 
FROM customers WHERE state IN ('California', 'Texas');

45)Show the orders that were placed on January 1, 2022, and have a total greater than $20.
SELECT order_id, customer_id, order_date,total 
FROM orders 
WHERE order_date >= '2022-01-01' AND total > 20;


46)Show the products that have less than 10 units in inventory.
SELECT product_id, name, price, inventory FROM products WHERE inventory < 10;


47)Show the customers who have spent more than $100.
SELECT customers.customer_id, customers.first_name 
FROM customers JOIN orders ON customers.customer_id = orders.customer_id 
GROUP BY customers.customer_id 
HAVING SUM(total) > 100;


48)Show the customers who have an email address that ends with '@example.com'.
SELECT customer_id, first_name, email 
FROM customers WHERE email LIKE '%@example.com';

49)Show the orders placed by customers who live in New York.
SELECT orders.order_id, orders.order_date, customers.customer_id, customers.first_name, customers.city 
FROM orders JOIN customers ON orders.customer_id = customers.customer_id 
WHERE customers.city = 'New York';

//50)Show the products that have been ordered at least 5 times, sorted by total revenue.
SELECT p.product_id, p.name, 
SUM(oi.quantity) AS total_ordered, 
SUM(oi.price * oi.quantity) AS total_revenue 
FROM Products p 
INNER JOIN Order_Items oi ON p.product_id = oi.product_id 
GROUP BY p.product_id 
HAVING total_ordered >= 5 
ORDER BY total_revenue 
DESC;




















