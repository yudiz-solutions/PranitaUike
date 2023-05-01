1) Show all customers in the database.
SELECT * FROM `customers`;

2)Show all products in the database.
SELECT * FROM `products`;

3)Show all orders in the database.
SELECT * FROM `orders`;

4)Show all order items in the database.
SELECT * FROM `order_items`;

5)Show the customer with ID 1.
SELECT * FROM `customers` WHERE customer_id = 1;

6)Show the product with ID 2.
SELECT * FROM `products` WHERE product_id = 2;

7)Show the order with ID 3.
SELECT * FROM `orders` WHERE order_id = 3;

8)Show the order item for order ID 1 and product ID 1.
SELECT * FROM `order_items` WHERE order_id = 1 AND product_id = 1;


9)Show the total number of customers in the database.
SELECT COUNT(*) FROM customers;

10)Show the total number of products in the database.
SELECT COUNT(*) FROM products;


11)Show the total number of orders in the database.
SELECT COUNT(*) FROM orders;

12)Show the total number of order items in the database.
SELECT COUNT(*) FROM order_items;


13)Show the average price of products in the database.
SELECT AVG(product_id) FROM products WHERE product_id;


14)Show the maximum price of products in the database.
SELECT MAX(price) as max_price FROM products;


15)Show the minimum price of products in the database.
SELECT MIN(price) as max_price FROM products;


16)Show the total inventory of all products.
SELECT SUM(inventory) FROM products;

17)Show the orders for customer with ID 2.
SELECT * FROM `orders` WHERE customer_id = 2;


18)Show the order items for order with ID 4.
SELECT * FROM `order_items` WHERE order_id = 4;

19)Show the total amount spent by customer with ID 1.
SELECT SUM(total) FROM orders WHERE customer_id = 1;

20)Show the total number of order items for order with ID 2.
SELECT SUM(quantity) FROM order_items WHERE order_id = 2;

21)Show the product with the highest price.
SELECT MAX(price) FROM products;

22)Show the customer who has spent the most money.
SELECT first_name,MAX(orders.total) FROM customers INNER JOIN orders ON customers.customer_id = orders.order_id;

23)Show the customer who has placed the most orders.
  SELECT  MAX(order.total) FROM customers                                      
                                             
24)Show the product with the most inventory.
SELECT MAX(inventory) FROM products;

25)Show the order with the highest total.
SELECT customer_id, COUNT(DISTINCT order_id ), MAX(total) FROM orders GROUP BY customer_id ORDER BY MAX(total) DESC LIMIT 1;

26)Show the total revenue for the month of January 2022.


27)Show the total revenue for each month in 2022.
28)Show the average total spent per order.
29)Show the average price of products with more than 50 units in inventory.
30)Show the number of orders placed each day in January 2022.
31)Show the number of orders placed each hour of the day.
32)Show the number of orders placed on each day of the week.
33)Show the top 5 customers by total amount spent.
34)Show the top 5 products by total revenue.
35)Show the customers who have never placed an order.
36)Show the products that have never been ordered.
37)Show the customers who have placed more than 2 orders.
38)Show the products that have a price between $10 and $20.













