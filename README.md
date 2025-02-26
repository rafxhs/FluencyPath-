# FluencyPath – Aprendizado de Inglês Através de Leitura e Escuta

O FluencyPath é uma plataforma interativa desenvolvida para ajudar a melhorar suas habilidades em inglês por meio de leitura e escuta sincronizadas. Baseado na teoria da Aquisição da Linguagem de Stephen Krashen, o sistema utiliza o conceito de input compreensível, proporcionando um aprendizado mais natural e intuitivo.

## 📖 Sobre a Teoria de Krashen
O linguista **Stephen Krashen** defende que aprendemos um idioma de forma natural quando somos expostos a conteúdos ligeiramente mais avançados, mas ainda compreensíveis. Esse método, chamado de **input compreensível**, permite que adquiramos vocabulário e gramática sem precisar memorizar regras, assim como no aprendizado da língua materna.

No FluencyPath, aplicamos essa teoria por meio de:

✅ **Textos e áudios adaptados ao nível do aluno**, garantindo um aprendizado contínuo.
✅ **Sincronização de leitura e escuta**, ajudando na assimilação da pronúncia e estrutura das frases.
✅ **Revisão de palavras em contexto**, permitindo que o aluno veja os termos em diferentes usos, reforçando o aprendizado.

---

## 🛠️ Tecnologias Utilizadas

- **Backend:** Laravel 11 (PHP 8.2+)
- **Frontend:** Tailwind CSS
- **Banco de Dados:** MySQL
- **Gerenciamento de Pacotes:** Composer e NPM

---

## 📥 Como Rodar o Projeto

### 1️⃣ Clone o repositório
Abra o terminal e execute:

```sh
git clone https://github.com/rafxhs/FluencyPath-.git
cd FluencyPath-
```

### 2️⃣ Instale as dependências do Laravel

```sh
composer install
```

### 3️⃣ Configure as variáveis de ambiente
Copie o arquivo de exemplo do Laravel e configure o `.env`:

```sh
cp .env.example .env
```

Edite o arquivo `.env` e configure as credenciais do banco de dados.

### 4️⃣ Gere a chave da aplicação

```sh
php artisan key:generate
```

### 5️⃣ Execute as migrações e popule o banco de dados

```sh
php artisan migrate
```

### 6️⃣ Instale as dependências do frontend

```sh
npm install
```

### 7️⃣ Compile os assets do frontend

```sh
npm run dev
```

### 8️⃣ Inicie o servidor local

```sh
php artisan serve
```

O projeto estará rodando em [http://127.0.0.1:8000](http://127.0.0.1:8000) 🚀

Agora você pode acessar o FluencyPath e explorar suas funcionalidades!


## **👨‍💻 Desenvolvedores**

O **FluencyPath** foi desenvolvido por uma equipe de estudantes da disciplina **Projeto de Desenvolvimento II** durante o semestre **2024.2**.

### **Equipe do Projeto**

- [Erick Souza](https://github.com/ErickSilva-s) – Desenvolvedor Back-end
- [Hanna Sabrynna](https://github.com/hannasabrynna) – Desenvolvedora Full-stack
- [Rafaela Neves](https://github.com/rafxhs) – UI/UX Designer
