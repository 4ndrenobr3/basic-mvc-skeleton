## 1. Padrões de Código (PHP-FIG PSR)

Seguir os padrões da [PHP-FIG](https://www.php-fig.org/) garante que seu código seja consistente, legível e interoperável com outras bibliotecas e frameworks.

-   **PSR-12 (Extended Coding Style)**: É o padrão de estilo de código recomendado. Ele define regras para indentação, espaçamento, declaração de classes, métodos, etc. Use um linter como o `PHP_CodeSniffer` para automatizar a verificação.
-   **PSR-4 (Autoloader)**: Define um padrão para o carregamento automático de classes a partir de namespaces, eliminando a necessidade de `require` e `include` manuais. O Composer é a ferramenta padrão para implementar o PSR-4.

## 2. Segurança

A segurança não é opcional. Proteja sua aplicação contra as vulnerabilidades mais comuns.

-   **Prevenção de SQL Injection**: **NUNCA** concatene variáveis diretamente em suas queries SQL. **SEMPRE** use **Prepared Statements** com PDO ou MySQLi. Isso separa os dados da instrução SQL, tornando a injeção impossível.

    ```php
    // CORRETO (PDO)
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    ```

-   **Prevenção de Cross-Site Scripting (XSS)**: **SEMPRE** escape qualquer dado de saída que venha do usuário ou do banco de dados antes de exibi-lo no HTML. Use a função `htmlspecialchars()`.

    ```php
    // CORRETO
    <div><?= htmlspecialchars($user->comment, ENT_QUOTES, 'UTF-8') ?></div>
    ```

-   **Hashing de Senhas**: Use as funções `password_hash()` e `password_verify()` do PHP. Elas utilizam algoritmos de hash fortes e seguros (como o Bcrypt) e incluem um `salt` automaticamente. **NUNCA** armazene senhas em texto plano, MD5 ou SHA1.

-   **Prevenção de CSRF (Cross-Site Request Forgery)**: Para qualquer requisição que altere estado (POST, PUT, DELETE), gere um token único por sessão, inclua-o em um campo oculto no formulário e valide-o no servidor. Frameworks geralmente oferecem isso de forma nativa.

-   **Configuração em Produção**: Em ambiente de produção, desative a exibição de erros para o usuário (`display_errors = Off`) e configure para que os erros sejam registrados em um arquivo de log (`log_errors = On`).

## 3. Gerenciamento de Dependências

-   **Use o Composer**: O Composer é o gerenciador de pacotes padrão do PHP. Use-o para gerenciar todas as bibliotecas de terceiros e para configurar o autoloading (PSR-4).

## 4. Tratamento de Erros e Exceções

-   **Use Exceções**: Para operações que podem falhar (ex: conexão com banco de dados, chamadas de API), utilize blocos `try...catch` para tratar os erros de forma elegante, em vez de deixar o script parar abruptamente.
-   **PDO Error Mode**: Configure o modo de erro do PDO para `PDO::ERRMODE_EXCEPTION` durante o desenvolvimento. Isso fará com que o PDO lance exceções em caso de erros, que podem ser capturadas em um bloco `catch`.

    ```php
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    ```

## 5. Código e Arquitetura

-   **Separação de Responsabilidades**: Não misture lógicas diferentes no mesmo arquivo. Separe o código PHP da lógica de banco de dados, da lógica de negócio e do HTML (apresentação). Padrões como o MVC (Model-View-Controller) ajudam a organizar essa separação.
-   **Mantenha-se Atualizado**: Use sempre uma [versão do PHP com suporte ativo](https://www.php.net/supported-versions.php). Versões mais antigas não recebem atualizações de segurança e perdem em performance.
-   **Evite o `root` do Servidor Web**: Estruture seu projeto para que apenas o diretório `public` seja acessível pelo navegador. Arquivos de configuração, classes e lógica de negócio devem ficar em diretórios não acessíveis publicamente.
