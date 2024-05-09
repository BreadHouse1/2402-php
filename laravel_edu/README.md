<!-- root/
	|--	app/ 		       : 컨트롤러나 모델, 미들웨어 등 주요한 처리 클래스가 모여있는 디렉토리
	|--	bootstrap/     : 가장 먼저 실행되는 처리나 autoloading 설정, 퍼포먼스 향상을 위한 cache 등을 배치 (일반적으로 수정 불필요)
	|--	config/		     : 설정 파일을 배치 (composer로 프로젝트를 생성했을 경우 .env로 대체 됨, .env에 없는 설정을 config디렉토리의 설정을 사용)
	|--	database/	     : DB 관련 파일을 배치
	|--	lang/		       : 다국어 파일을 배치
	|--	public/		     : 엔트리 포인트(index.php)가 배치되는 루트로 설정
	|--	resources/	   : 뷰 파일, CSS, JavaScript 파일 등을 배치
	|--	routes/		     : 루트 정의 파일을 배치
	|--	storage/		   : 라라벨이 만드는 파일을 출력하는 위치로, 로그파일이나 캐시 및 컴파일 된 파일등을 배치
	|--	tests/		     : 테스트 코드 파일을 배치
	|--	vendor/		     : composer로 프로젝트를 생성했을 경우 다운로드된 패키지 및 Laravel 본체 코드가 배치, 버전관리에 비포함
  |-- .editorconfig	 : IDE 또는 에디터에서 참고하는 코딩 표준 스타일 설정 파일
  |-- .env 			     : 환경 변수를 지정하는 파일
  |-- .env.example	 : 환경설정 예제 파일
  |-- .gitattributes : git 디렉토리 및 파일 단위로 설정을 적용하는 파일
  |-- .gitignore		 : git 버전 관리 제외 대상 설정 파일
  |-- composer.json	 : 개발자가 편집하는 composer 설정 파일, 프로젝트의 구성과 의존성에 대한 정보
  |-- composer.lock	 : 자동으로 생성되는 composer 설정 파일, 프로젝트의 구성과 의존성에 대한 정보
  |-- package.json	 : 프론트엔드의 파일과 의존성에 대한 정보가 있는 설정 파일
  |-- phpunit.xml		 : 테스트에서 사용하는 PHPUnit 설정 파일 -->

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
