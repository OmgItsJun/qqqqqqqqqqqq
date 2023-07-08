CREATE TABLE inbound_transact (
  id INT AUTO_INCREMENT PRIMARY KEY,
  supplier_name VARCHAR(255),
  address VARCHAR(255),
  country_code VARCHAR(10),
  contact_information VARCHAR(255),
  email_address VARCHAR(255),
  product_name VARCHAR(255),
  description TEXT,
  units INT,
  quantity INT,
  amount DECIMAL(10, 2),
  currency VARCHAR(3),
  payment_method VARCHAR(20),
  terms_of_payment VARCHAR(50),
  ordered_by VARCHAR(255),
  order_date DATE,
  message TEXT
);