[![](https://startgov.com.br/wp-content/uploads/2023/11/LOGO_VETOR.png)](https://www.startgov.com.br)

# Plataforma de Gestão de Fornecedores

Este é um projeto de teste para a StartGov que consiste em uma plataforma para o cadastro e gerenciamento de fornecedores, utilizando Laravel para o backend e Vue.js para o frontend.

## Tecnologias Utilizadas

O projeto é construído com as seguintes tecnologias:

- **Backend**:
  - PHP / Laravel
  - MySQL
  - Pest (Testes Automatizados)
- **Frontend**:
  - Vue.js
  - Vite
  - Tailwind CSS
  - Axios
  - Zod
  - Maska
- **Ambiente de Desenvolvimento**:
  - Docker
  - Docker Compose

## Pré-requisitos

Antes de começar, certifique-se de ter o Docker e o Docker Compose instalados em sua máquina.

- [Docker](https://docs.docker.com/get-docker/)
- [Docker Compose](https://docs.docker.com/compose/install/)

## Como Rodar o Projeto

Siga os passos abaixo para configurar e executar o ambiente de desenvolvimento.

1.  **Clone o repositório:**

    ```sh
    git clone https://github.com/belloLucas/teste-desenvolvedor-php-fullstack.git
    cd teste-desenvolvedor-php-fullstack
    ```

2.  **Configurar Variáveis de Ambiente:**

    Copie os arquivos de exemplo `.env.example` para criar seus próprios arquivos `.env`.

    Para o backend:

    ```sh
    cp backend/.env.example backend/.env
    ```

    Para o frontend:
    O arquivo [frontend/.env](frontend/.env) já deve estar configurado, mas certifique-se de que `VITE_API_URL` aponta para o endereço do seu backend (`http://localhost:8000/api`).

3.  **Subir os contêineres com Docker Compose:**

    Este comando irá construir as imagens e iniciar os serviços do backend, frontend e banco de dados.

    ```sh
    docker-compose up -d --build
    ```

4.  **Instalar dependências do Backend e gerar a chave da aplicação:**

    Execute os seguintes comandos para entrar no contêiner do backend e instalar as dependências do Composer e gerar a chave do Laravel.

    ```sh
    docker-compose exec backend composer install
    docker-compose exec backend php artisan key:generate
    ```

5.  **Executar as Migrations do Banco de Dados:**

    Para criar as tabelas no banco de dados, execute o comando de migration do Laravel.

    ```sh
    docker-compose exec backend php artisan migrate
    ```

## Rodando os Testes

O backend utiliza [Pest](https://pestphp.com/) para os testes de unidade e de funcionalidade. Para executar a suíte de testes, utilize o seguinte comando:

```sh
docker-compose exec backend php artisan test
```

## Acessando a Aplicação

Após seguir todos os passos, a aplicação estará disponível nos seguintes endereços:

- **Frontend (Vue.js):** [http://localhost:5173](http://localhost:5173)
- **Backend (API Laravel):** [http://localhost:8000](http://localhost:8000)

Agora você pode acessar a interface do frontend no seu navegador para interagir com a aplicação.
