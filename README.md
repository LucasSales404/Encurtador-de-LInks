<p align="center">
  <img src="public/images/logo.png" alt="Logo SnapLink" width="200"/>
</p>



# **SnapLink - Encurtador de Links**

[![Laravel](https://img.shields.io/badge/Laravel-10.x-red?logo=laravel)](https://laravel.com/)
[![TailwindCSS](https://img.shields.io/badge/TailwindCSS-3.x-06B6D4?logo=tailwindcss)](https://tailwindcss.com/)
[![Docker](https://img.shields.io/badge/Docker-20.x-2496ED?logo=docker)](https://www.docker.com/)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](LICENSE)

---

O SnapLink está disponível na **[Render]([https://render.com/](https://snaplink-vkvv.onrender.com/))**.

---


## **📖 Sobre o projeto**

O **SnapLink** é um encurtador de links gratuito, moderno e **100% responsivo**.
Com ele você pode:

* 🔗 **Encurtar links** de forma rápida
* 📊 **Acompanhar estatísticas** de cliques em tempo real
* 🗂 **Gerenciar todos os links** criados
* 📱 **Usar em qualquer dispositivo**

---

## **🚀 Tecnologias utilizadas**

* **Backend:** [Laravel](https://laravel.com/) (PHP)
* **Frontend:** [TailwindCSS](https://tailwindcss.com/), JavaScript
* **Banco de dados:** [MySQL](https://www.mysql.com/)
* **Containerização:** [Docker](https://www.docker.com/)
* **Hospedagem:** [Render](https://render.com/)

---

## **🛠 Como executar localmente**

### **Pré-requisitos**

* [Docker](https://www.docker.com/) & Docker Compose
* [Git](https://git-scm.com/) instalado

### **Passo a passo**

```bash
# Clonar o repositório
git clone https://github.com/SEU-USUARIO/snaplink.git

# Acessar a pasta do projeto
cd snaplink

# Copiar variáveis de ambiente
cp .env.example .env

# Subir os containers
docker-compose up -d

# Instalar dependências
docker exec -it snaplink-app composer install
docker exec -it snaplink-app php artisan key:generate
```

Acesse no navegador:
👉 **[http://localhost:8080](http://localhost:8080)**

---
