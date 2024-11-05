# Projeto Web Servidor
Projeto feito para disciplina de Web Servidor.
A aplicação consiste em um sistema de gestão de pacientes por médicos de uma clínica inventada.

# Relatório:
- Rogerio Jesuino Ferraz Rocha, desenvolveu o CRUD de pacientes, possibilitando cadastro de novos pacientes, edição de pacientes cadastrados, visualização dos pacientes em lista e esclusão de pacientes cadastrados.
- Igor Muzel, desenvolveu o acesso dos médicos as listas de pacientes correspondente, através de uma tela de login.
- Hebert Mateus Portela, desenvolveu o cadastro de novos médicos na aplicação, possibilitando assim que médicos cadastrados realizem o login e assim ter acesso aos pacientes.

# Instruções de instalação:
Para acessar a aplicação de forma completa, serão necessários instalações de algumas ferramentas.

- XAMPP
  
  Para a intalação do XAMPP, acesse o link (https://www.apachefriends.org/pt_br/index.html), ou busque por "XAMPP" no google ou outra ferramenta de busca.
  Em seguida, faça o download do XAMPP para o sistema operacional utilizado, seguindo os passos de instalação que são sugeridos pelo instalador.
  
- Navegador

  Para acessar a aplicação, será utilizado um navegador internet, portanto, faça o download do navegador de sua preferência (Chrome, Edge, Opera, etc).

- SCRIPT

  Faça o download do arquivo com SCRIPT do banco de dados que será utilizado (arquivo encontra-se neste repositório e possui o nome de "script_banco_dados.sql").

# Instruções de utilização:
Após realizar o download das ferramentas indicadas, siga os seguintes passos para utilizar a aplicação:

1. Acesse o "XAMPP Control Panel.
   
2. Inicie o Apache e o MySQL, conforme a imagem abaixo
   ![image](https://github.com/user-attachments/assets/69ca5158-8dfd-4897-876b-293a3c15feb5)

3. No navegador, acesse o endereco (http://localhost/phpmyadmin/)
   
4. Após acessar, na barra lateral localizada a esquerda, será possível visualizar os banco de dados existentes que foram instalados com o XAMPP. Contudo, será necessário criar um novo banco de dados.
   Para criar o banco de dados:
   - Clique sobre a opção "Novo", localizada na na barra lateral esquerda, logo acima dos banco de dados existentes.
   - Coloque o nome do banco de dados "web-servidor", exatamente como está escrito e então crie o banco.
   - Clique sobre o novo  banco cadastrado.
     ![Imagem do WhatsApp de 2024-11-05 à(s) 10 51 20_34635dfa](https://github.com/user-attachments/assets/d56b08e9-ac11-4882-93a0-9544ff6e524d)
   - Agora, na barra de ferramentas localizada na parte superior da tela, clique na opção "Importar".
     ![Imagem do WhatsApp de 2024-11-05 à(s) 10 51 34_b42e3eea](https://github.com/user-attachments/assets/8ff190f4-f9ed-4ca0-b66b-70a952606653)

   - Selecione o arquivo de script do banco de dados (script_banco_dados.sql) que foi feito o download e execute.
   - Você deverá ver que foram criadas 3 tabelas no banco. Uma tabela chamada "medicos", outra chamada "medico_paciente" e a terceira chamada "pacientes".

   Pronto, o banco de dados está criado e configurado!

5. Após criar o banco de dados, será necessário clonar o repositório.
   OBS: o repositório deverá ser clonado dentro da pasta "xampp\htdocs".
   
6. Depois de clonar o repositório, acesse a aplicação através do link (http://localhost/gestaoMedicos/public/index.php).
   
# Informações sobre a aplicação:

A primeira página encontrada ao acessar deverá ser a página de LOGIN. Nela é possível realizar o login do médico cadastrado no sistema.
Caso não possua cadastro, clique em cadastro.

Ao clicar em cadastro, será redirecionado para o formulário de cadastro, onde serão pedidas algumas informações para indentificação do médico. Após se cadastrar, será redirecionado novamente para a tela de login, onde agora serão pedidos o email e a senha do médico (informados no cadastro).

Ao realizar o login corretamente, irá acessar de fato a lista do pacientes do médico que está acessando.
Primeiramente essa lista deve se encontrar vazia. Entretanto, é possível cadastrar novos pacientes clicando sobre o botão destinado ao cadastro.

Com pacientes cadastrados, será possível visualizar as informações de seus pacientes em forma de lista, bem como será possível editar informações de pacientes e até excluir pacientes da lista.

Para sair do acesso do médico, clique sobre o botão de LOGOUT.

# Agradecimentos
Agradecemos ao professor Diego Roberto Antunes pela solicitação do trabalho e pelo suporte, nos permitindo colocar em prática e assim nos desenvolver cada vez mais.
Também agradecemos aos integrantes do grupo, pelo apoio e dedicação de todos!
