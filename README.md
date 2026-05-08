# 🤖 Moodle Block AI — Assistente IA

Plugin de bloco para o Moodle que permite ao usuário fazer perguntas em linguagem natural e receber respostas geradas por IA (Google Gemini).

---

## 📋 Sobre o projeto

Este plugin foi desenvolvido como atividade explorátoria do moodle, com o objetivo de integrar uma IA generativa ao ambiente Moodle por meio de um bloco customizado.

O usuário digita uma pergunta em uma caixa de texto e, ao clicar em **Enviar**, o plugin realiza uma requisição à API do Google Gemini e exibe a resposta na página.

---

## ⚙️ Tecnologias utilizadas

- **Moodle 4.1** 
- **PHP 8.1** 
- **Google Gemini API** — IA generativa para geração das respostas
- **Apache2**
- **MySQL**

---

## 🚀 Como instalar

1. Clone o repositório dentro da pasta de blocos do Moodle:

```bash
git clone https://github.com/isadoramel0/moodle-blockAI-basic.git /var/www/html/moodle/blocks/iabloco
```

2. Crie o arquivo `api.php` na raiz do plugin com sua chave da API:

```php
<?php
define('GEMINI_API_KEY', 'SUA_CHAVE_AQUI');
```

> ⚠️ Este arquivo **não** está no repositório por segurança. Você precisa criá-lo manualmente.

3. Ajuste as permissões:

```bash
sudo chown -R www-data:www-data /var/www/html/moodle/blocks/iabloco
```

4. Acesse o Moodle como administrador — o sistema detectará o novo plugin automaticamente e solicitará a instalação.

5. Após instalar, adicione o bloco **Assistente IA** em qualquer página do Moodle via **Ativar edição > Adicionar bloco**.

---

## 📁 Estrutura do plugin

```
blocks/iabloco/
├── block_iabloco.php       # Classe principal do bloco
├── ask.php                 # Processa a pergunta e chama a API
├── version.php             # Versão do plugin
├── api.php        # Chave da API (não versionado)
├── .gitignore
└── lang/
    ├── en/
    │   └── block_iabloco.php
    └── pt_br/
        └── block_iabloco.php
```

---
