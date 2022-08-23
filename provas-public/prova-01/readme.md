# Prova 1

* Script para criação do banco de dados está em [db](db/bd-prova-01.sql).
* Estrutura de pastas (MVC) são fornecidos, e constam a [classe Connect](source/Database/Connect.php), [constantes de conexão com db](source/Boot/Config.php), e [Classe Student](source/School/Student.php).
* Os métodos que deverão ser implementados nas questões estão em vazios dentro da classe **Student**.
* Métodos descritos a seguir:

  1. [insert](source/School/Student.php#L30): Esse método, toda vez que evocado, será responsável por inserir os atributos da classe em um registro de estudante na tabela *students* no banco de dados. O id inserido na tabela deverá ser guardado no atributo `$id` da classe;

  2. [findByName](source/School/Student.php#L48): Esse método, que recebe por parâmetro um nome de estudante, toda vez que é evocado, busca na tabela *students* no banco de dados o nome do estudante. Caso encontrado, os atributos da classe devem ser carregados com as informações do estudante que retornaram da consulta. Caso não encontrado, uma mensagem deve ser emitida dizendo: “Estudante não encontrado!”;

  3. [update](source/School/Student.php#L70): Esse método será responsável por realizar a atualização dos dados de um determinado estudante na tabela *students*. Aqui a atualização deve ser realizada nos atributos name e email apenas. O id do estudante a ser alterado deverá ser obtido do atributo $id da instância da classe. Não esqueça que a cláusula WHERE deverá estar presente no comando.

* Além dos métodos acima, também devem ser implementados os scripts descritos a seguir:

  1. [student-insert.php](student-insert.php): Instancie um objeto a partir da classe *Student*, depois evoque o método *insert*. O objetivo aqui é inserir um registro na tabela *students*. Por fim, mostre o objeto instanciado com `var_dump()`.

  2. [student-find.php](student-find.php): Instancie um objeto a partir da classe *Student*, depois evoque o método `findByName`. Aqui o objetivo é encontrar um estudante informando um nome. Por fim, mostre o objeto instanciado com `var_dump()`.

  3. [student-update.php](student-update.php): Instancie um objeto a partir da classe *Student*, evoque o método `update` para alterar as informações (nome e e-mail) de um determinado estudante. Por fim, mostre o objeto instanciado com `var_dump()`. **A implementação do método update que consta no link demonstra um update capaz de alterar quaisquer atributos enviados, não somente nome e email**.
