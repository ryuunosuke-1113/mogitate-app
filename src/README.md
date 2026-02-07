# 商品管理アプリ（Mogitate）

Laravel と Docker を使って作成した、シンプルな商品管理アプリです。
商品を登録・編集・削除し、一覧で管理できます。

## 使用技術
- Laravel
- PHP
- Docker / Docker Compose
- MySQL
- Nginx

## 機能一覧
- 商品一覧表示
- 商品登録
- 商品編集
- 商品削除
- 商品画像アップロード
- バリデーション表示

## 画面イメージ
※ ここに後でスクリーンショットを追加予定

## 環境構築手順

```bash
git clone https://github.com/ryuunosuke-1113/mogitate-app.git
cd mogitate-app
cp src/mogitate/.env.example src/mogitate/.env
docker compose up -d
docker compose exec php php artisan key:generate
docker compose exec php php artisan migrate
