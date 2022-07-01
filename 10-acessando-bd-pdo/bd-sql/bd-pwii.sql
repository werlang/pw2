-- cria tabela
CREATE TABLE users (
  id int(11) AUTO_INCREMENT PRIMARY KEY,
  name varchar(45),
  email varchar(45),
  password varchar(45)
);

-- não esquecer de separar as linhas com ;
-- quando quiser executar cada linha separado, usar CTRL + ENTER

INSERT INTO users (name, email, password)
VALUES ('Pablo Werlang', 'pablowerlang@ifsul.edu.br', 'blabla');

UPDATE users SET password = 'asdf1234' WHERE name = 'Pablo Werlang';

SELECT * FROM users;

DELETE FROM users WHERE id != 53 ;