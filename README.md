<div align="center">

# 🐾 MyPet
**Open-source web game inspired by mpets.mobi — care for your pet and make friends!**

![PHP](https://img.shields.io/badge/PHP-%3E%3D8.0-777BB4?style=flat-square&logo=php&logoColor=white)
![License](https://img.shields.io/github/license/flirsys/mypet?style=flat-square)
![Stars](https://img.shields.io/github/stars/flirsys/mypet?style=flat-square)
![Last Commit](https://img.shields.io/github/last-commit/flirsys/mypet?style=flat-square)
</div>

---

## 🎮 О проекте
**MyPet** — это браузерная игра о питомцах с открытым исходным кодом, вдохновлённая [mpets.mobi](https://mpets.mobi). Ухаживай за своим питомцем и общайся с другими игроками.

Проект написан на чистом PHP и подходит как для локального запуска, так и для деплоя на свой сервер.

---

## ✨ Фичи
- 🐶 **Питомцы** — создай своего уникального питомца и ухаживай за ним
- 💬 **Социальные взаимодействия** — общайся с другими игроками
- ⚡ **Лёгкий деплой** — работает на любом сервере с PHP 8+
- 🔓 **Открытый код** — полностью под лицензией AGPL-3.0

---

## 🚀 Быстрый старт

### Требования
- PHP >= 8.0
- Apache или Nginx

### Установка
```bash
# 1. Клонируй репозиторий
git clone https://github.com/flirsys/mypet
cd mypet

# 2. Создай папку для базы данных
mkdir -p core/db

# 3. Запусти сервер (пример для PHP built-in server)
php -S localhost:8080
```

Или запусти через **Apache/Nginx** — убедись, что корень сайта указывает на папку проекта.

После запуска открой в браузере: `http://localhost:8080`

---

## 📁 Структура проекта
```
mypet/
├── action/     # Обработчики действий
├── core/       # Ядро приложения
│   └── db/     # База данных (создать вручную)
├── icl/        # Вспомогательные модули
├── pages/      # Страницы игры
├── view/       # CSS/Imgs
├── index.php   # Точка входа
└── .htaccess   # Настройки Apache
```

---


## 📄 Лицензия
Распространяется под лицензией **AGPL-3.0**. Подробнее см. [LICENSE](./LICENSE).

---

<div align="center">
Сделано с ❤️ от [FLIRSYS](https://github.com/flirsys)

⭐ Понравился проект? Поставь звёздочку!
</div>
Буду рад любой помощи!
Если нашёл баг или есть идея — открывай [Issue](https://github.com/flirsys/mypet/issues)!