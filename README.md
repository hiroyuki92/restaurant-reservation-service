# coachtech レストラン予約アプリ

## 環境構築
**Dockerビルド**
1. `git clone git@github.com:hiroyuki92/restaurant-reservation-service.git`
2. `cd restaurant-reservation-service`     クローンしたディレクトリに移動する
3. DockerDesktopアプリを立ち上げる
4. `docker-compose up -d --build`

**Laravel環境構築**
1. `docker-compose exec php bash`
2. `composer install`
3. 「.env.example」ファイルをコピーして 「.env」ファイルに命名を変更。
```bash
cp .env.example .env
```
4. 「.env.testing.example」ファイルをコピーして 「.env.testing」ファイルに命名を変更。
```bash
cp .env.testing.example .env.testing
```
5. .envに以下の環境変数を追加
``` text
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
```
6. .env.testingに以下の環境変数を追加
``` text
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=demo_test
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
```
7. 各環境のアプリケーションキーを生成
``` bash
php artisan key:generate        # .env用
php artisan key:generate --env=testing  # .env.testing用
```

8. マイグレーションとシーディングの実行
``` bash
php artisan migrate --seed
```  
　実行すると以下の初期データが作成されます  
  - ランダムな一般ユーザー  
	ダミーユーザーが10人生成されます。  
	メールアドレスや名前はランダムに設定されています。  
	パスワード: password

9. テストの実行
``` bash
php artisan test
```

## 使用技術(実行環境)
- **PHP** 8.3.20
- **Laravel** 8.83.29
- **MySQL** 8.0.26（Dockerコンテナ）
- **Nginx** 1.27.4（Dockerコンテナ）


## ER図
```mermaid
erDiagram
    USERS {
        bigint id PK
        string name
        string email
        string password
        enum role
        datetime created_at
        datetime updated_at
    }
    
    RESTAURANTS {
        bigint id PK
        bigint area_id FK
        bigint genre_id FK
        string name
        text description
        string image_url
        datetime created_at
        datetime updated_at
    }
    
    AREAS {
        bigint id PK
        string name
        datetime created_at
        datetime updated_at
    }
    
    GENRES {
        bigint id PK
        string name
        datetime created_at
        datetime updated_at
    }
    
    RESERVATIONS {
        bigint id PK
        bigint user_id FK
        bigint restaurant_id FK
        datetime reservation_time
        int number_of_people
        datetime created_at
        datetime updated_at
    }
    
    FAVORITES {
        bigint id PK
        bigint user_id FK
        bigint restaurant_id FK
        datetime created_at
        datetime updated_at
    }
    
    %% リレーションシップの定義
    USERS ||--o{ RESERVATIONS : ""
    RESTAURANTS ||--o{ RESERVATIONS : ""
    RESTAURANTS ||--o{ FAVORITES : ""
    USERS ||--o{ FAVORITES : ""
    AREAS ||--o{ RESTAURANTS : ""
    GENRES ||--o{ RESTAURANTS : ""

