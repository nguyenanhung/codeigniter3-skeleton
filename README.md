[![Latest Stable Version](http://poser.pugx.org/nguyenanhung/codeigniter3-skeleton/v)](https://packagist.org/packages/nguyenanhung/codeigniter3-skeleton) [![Total Downloads](http://poser.pugx.org/nguyenanhung/codeigniter3-skeleton/downloads)](https://packagist.org/packages/nguyenanhung/codeigniter3-skeleton) [![Latest Unstable Version](http://poser.pugx.org/nguyenanhung/codeigniter3-skeleton/v/unstable)](https://packagist.org/packages/nguyenanhung/codeigniter3-skeleton) [![License](http://poser.pugx.org/nguyenanhung/codeigniter3-skeleton/license)](https://packagist.org/packages/nguyenanhung/codeigniter3-skeleton) [![PHP Version Require](http://poser.pugx.org/nguyenanhung/codeigniter3-skeleton/require/php)](https://packagist.org/packages/nguyenanhung/codeigniter3-skeleton)

# CodeIgniter v3 Framework - Skeleton Application

The Skeleton version serves the deployment of web applications using the `CodeIgniter v3 Framework`. It has been
repackaged into packages for the purpose of rapid application deployment.

This source is packaged to support both the MVC and HMVC models with BaseControllers and BaseModule classes, making it
easy to deploy, extend quickly, and robust.

## CHANGELOG

The Changelog information is updated at: https://github.com/nguyenanhung/codeigniter3-skeleton/blob/master/CHANGELOG.md

## Install

Run the following command to install the `nguyenanhung/codeigniter3-skeleton` application and deploy a new
project:

```shell
composer create-project nguyenanhung/codeigniter3-skeleton [my-app-name]
```

Replace `[my-app-name]` with the name of your new project directory, for example, `my-website`:

```shell
composer create-project nguyenanhung/codeigniter3-skeleton my-website
```

## Start Application with Native PHP

Start PHP Server:

```shell
composer start
```

Open Service in URL

```shell
http://localhost:8080/
```

## Start Application on Docker

Quickly deploy the application with a pre-built Docker container:

Build the Docker container:

```shell
docker-compose build
```

Start the application on Docker:

```shell
docker-compose up -d
```

Add url to hosts file

```shell
sudo vi /etc/hosts
```

Add the following line:

```shell
127.0.0.1 app.codeigniter3.io
```

Open Service in URL

```shell
http://app.codeigniter3.io/
```

## Screenshot Page

![https://i.imgur.com/eMddCEJ.jpg](https://i.imgur.com/eMddCEJ.jpg)

## Serverless Version

I have released a packaged distribution ready for deployment on Vercel Serverless
here: https://github.com/nguyenanhung/codeigniter3-vercel-skeleton

## Terms & Disclaimer

This skeleton is publicly available as open source, and anyone can use it for their own purposes under
the `GNU GENERAL PUBLIC LICENSE v3 or later`.

I am not responsible for any specific use of this source code.

## Contact

If you have any questions related to the use of this source code, please contact me through the following information:

| Name        | Email                | GitHub        | Facebook      |
|-------------|----------------------|---------------|---------------|
| Hung Nguyen | dev@nguyenanhung.com | @nguyenanhung | @nguyenanhung |
