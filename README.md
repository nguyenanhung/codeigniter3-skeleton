[![Latest Stable Version](http://poser.pugx.org/nguyenanhung/codeigniter3-skeleton/v)](https://packagist.org/packages/nguyenanhung/codeigniter3-skeleton) [![Total Downloads](http://poser.pugx.org/nguyenanhung/codeigniter3-skeleton/downloads)](https://packagist.org/packages/nguyenanhung/codeigniter3-skeleton) [![Latest Unstable Version](http://poser.pugx.org/nguyenanhung/codeigniter3-skeleton/v/unstable)](https://packagist.org/packages/nguyenanhung/codeigniter3-skeleton) [![License](http://poser.pugx.org/nguyenanhung/codeigniter3-skeleton/license)](https://packagist.org/packages/nguyenanhung/codeigniter3-skeleton) [![PHP Version Require](http://poser.pugx.org/nguyenanhung/codeigniter3-skeleton/require/php)](https://packagist.org/packages/nguyenanhung/codeigniter3-skeleton)

# CodeIgniter v3 Framework - Skeleton Application

Bản Skeleton phục vụ triển khai ứng dụng web bằng `CodeIgniter v3 Framework`. Được đóng gói lại thành packages nhằm mục đích triển khai ứng dụng nhanh chóng.

Source này được đóng gói để hỗ trợ cả mô hình MVC, HMVC với các lớp BaseControllers và BaseModule, dễ triển khai, mở rộng nhanh chóng và mạnh mẽ

## CHANGELOG

Thông tin Changelog được cập nhật tại https://github.com/nguyenanhung/codeigniter3-skeleton/blob/master/CHANGELOG.md

## Install

Chạy command sau để tiến hành cài đặt ứng dụng `nguyenanhung/codeigniter3-skeleton` và triển khai 1 dự án mới

```shell
composer create-project nguyenanhung/codeigniter3-skeleton [my-app-name]
```

Thay thế `[my-app-name]` bằng thư mục dự án mới cần triển khai, ví dụ: `my-website`

```shell
composer create-project nguyenanhung/codeigniter3-skeleton my-website
```

## Start Application

Triển khai ứng dụng nhanh với Docker được build sẵn

1. Build docker

```shell
docker-compose build
```

2. Khởi chạy ứng dụng

```shell
docker-compose up -d
```

3. Add url to hosts file

```shell
sudo vi /etc/hosts
```

thêm dòng

```shell
127.0.0.1 app.codeigniter3.io
```

4. Open Service in URL

```shell
http://app.codeigniter3.io/
```

5. Screenshot Page

![https://i.imgur.com/eMddCEJ.jpg](https://i.imgur.com/eMddCEJ.jpg)

## Điều khoản & Từ chối trách nhiệm

Bộ skeleton này được public dưới dạng open source, bất cứ ai cũng có thể sử dụng open source này cho mục đích của riêng mình dưới giấy phép `GNU GENERAL PUBLIC LICENSE v3 or later`.

Tôi không chịu trách nghiệm về việc bộ source này có thể được sử dụng cho các mục đích riêng biệt nào đó

## Liên hệ

Nếu có câu hỏi nào liên quan đến việc sử dụng bộ source này, vui lòng liên hệ tới thông tin sau đây

| Name        | Email                | Skype            | Facebook      |
|-------------|----------------------|------------------|---------------|
| Hung Nguyen | dev@nguyenanhung.com | nguyenanhung5891 | @nguyenanhung |
