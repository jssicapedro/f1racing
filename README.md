
# F1 Racing

Projeto para amantes do maior desporto automobilista.

F1 Racing, feel the speed.

Com este projeto pretende-se que todos possam ver as informações das pistas, dos pilotos e das equipas; caso tenha conta poderá ver ainda todos os resultados das corridas da temporada; se for administrador:
* pode criar, editar e apagar pilotos;
* pode criar, editar e apagar equipas;
* pode criar, editar e apagar o calendário das corridas;
* pode criar, editar e apagar resultados;
* pode criar, editar e apagar utilizadores;
## Construído com
Para a criação deste projeto foi usado
- [Laravel](https://laravel.com) (framework de PHP)
- JavaScript, CSS e HTML

## Instalação
### Dependencias
A sua máquina deve ter:
- Uma versão igual ou superior ao php 8.2, caso ainda não tenha pode transferir a partir do [site oficial](https://www.php.net/downloads.php);
- Deve ter tambem o Composer pelo link [getcomposer.org](https://getcomposer.org);
- Por fim deve instalar o Laragon com uma versão igual ou superior á versão 8, utilize o site oficial [Laragon](https://laragon.org/download/);

### Instalar o projeto
Se tudo do tópico anterior correu bem, vamos agora instalar o projeto.
1. Descarregue o repositório e coloque a diretoria na pasta www do laragon;
2. Abra o repositório num editor de texto;
3. Faça uma cópia do ficheiro .env.example
4. Atualize o nome e a palavra-passe da base de dados desse mesmo ficheiro. 
5. Guarde-o com o nome ".env" e sem extenção;
6. Abra um terminal na pasta onde se encontra o projeto
7. Execute
````
 composer install
````
8. Depois da atualização execute 
````
php artisan key:generate
````

> Se algo correr mal ao executar estas linhas de código significa que algo correu mal durante a instalação das dependências. Volte ao tópico anterior.





    
## Base de dados

Para ter a base de dados presente pode importar a base de dados que se encontra neste [link](https://1drv.ms/u/c/bd04186beff654bb/EecQDCETqNtMl_-JSXE6KfQBFEIu7lxz6UZLTwETmd5_Fw?e=HdDd3S).

Ou então pode seguir os seguintes passos:
1. Para que a BD seja criada, execute
````
php artisan migrate:fresh
````

> caso já tenha a base de dados criada e alguns utilizadores, para a atualizar deve escrever
````
php artisan migrate
````

### Inserir dados da base de dados
> o Seeder serve para que todos os elementos da BD sejam possíveis de transferir de maquina para maquina. Assim, não é necessário a exportação diária de toda a base de dados

Para importar todos os dados para a máquina execute
````
php artisan db:seed
````
## Storage
Para que o seu projeto não fique sem imagens deve transferir a pasta presente neste [link](https://1drv.ms/f/c/bd04186beff654bb/ElC5mp8F5A1OrNiW2EUdicABWuqGVa60y1RPLEE03z5maw?e=oCmJHS) e colocar todo o seu conteudo na pasta storage>app>public e executar o comando abaixo:
````
php artisan storage:link
````
| Caso este ultimo código dê erro ir a f1racing>public e apagar a pasta storage e voltar a executar o comando