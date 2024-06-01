Instruções para rodar o projeto:
Versão do Laravel: 11.9
Versão do node: 20.11.1

- Adicione no .env as configurações do banco, exemplo:
  
DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=sistema_crud

DB_USERNAME=root

DB_PASSWORD=admin


- Rode as migrações usando "php artisan migrate" no terminal
- E o projeto estará pronto para ser usado, usando o php artisan serve
