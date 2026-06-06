# mockcase
# 環境構築
  1. リポジトリをクローン  
	git clone git@github.com:kiuchi-11/mockcase.git
  
  3. Dockerコンテナをビルド  
	docker-compose up -d --build  
  
  4. Laravel環境構築  
	docker-compose exec php bash  
	composer install  
	cp .env.example .env  
	php artisan key:generate  
	php artisan migrate:fresh --seed  

# 開発環境
	商品一覧画面：http://localhost/
	phpMyAdmin：http://localhost:8080/

# 使用技術
	PHP 8.1.34  
	Laravel 8.83.29  
	MySQL 8.0.26  
	nginx 1.21.1  

# ER図               
                ┌─────────────────────┐
                │        users        │
                ├─────────────────────┤
                │ PK id               │
                │ name                │
                │ email               │
                │ password            │
                │ image_path          │
                │ postal_code         │
                │ address             │
                │ building            │
                └──────────┬──────────┘
                           │1
                           │
                           │N
                           ▼

                ┌─────────────────────┐
                │      products       │
                ├─────────────────────┤
                │ PK id               │
                │ FK user_id          │
                │ FK condition_id     │
                │ image_path          │
                │ name                │
                │ brand_name          │
                │ description         │
                │ price               │
                │ is_sold             │
                └──────┬────────┬─────┘
                       │        │
                     N │        │ N
                       │        │
                       ▼        ▼

        ┌──────────────────┐  ┌──────────────────┐
        │product_categories│  │    conditions    │
        ├──────────────────┤  ├──────────────────┤
        │ PK id            │  │ PK id            │
        │ FK product_id    │  │ name             │
        │ FK category_id   │  └──────────────────┘
        └────────┬─────────┘
                 │N
                 │
                 │1
                 ▼

        ┌──────────────────┐
        │    categories    │
        ├──────────────────┤
        │ PK id            │
        │ name             │
        └──────────────────┘


users 1 ─── N favorites N ─── 1 products

        ┌──────────────────┐
        │    favorites     │
        ├──────────────────┤
        │ PK id            │
        │ FK user_id       │
        │ FK product_id    │
        │ created_at       │
        └──────────────────┘