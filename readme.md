## URL https://safe-retreat-65836.herokuapp.com

## For English it's lower.

## Projet 5 Web Dev Openclassrooms: 
Effectuez un stage OU présentez librement un projet personnel.

## Instructions

Pour ce projet, vous développerez l'application de votre choix en utilisant les 5 langages que vous avez appris : HTML, CSS, JS, PHP et SQL. L'approche visuelle et le thème sont entièrement libres.

C'est donc le moment de faire preuve de créativité ! Démontrez votre savoir-faire et dédiez-y un effort substantiel, car ce projet rejoindra votre portfolio. Ce sera, plus que les autres projets, la touche personnelle de votre CV.

## Compétences évaluées
Découper, assembler et programmer les pages
Intégrer les contenus et les effets graphiques
Organiser et manipuler les données
Organiser le code en langage PHP
Sécuriser l'application
Stocker et récupérer les informations dans la base de données en langage SQL
Utiliser les langages de développement web dans un projet personnel
Assurer la conformité de votre application avec les langages PHP, JavaScript, HTML5 et CSS

## Techologies utilisés pour ce projet:
Framework Laravel 6/Vue.js
DB Local = MYSQL
DB Prod = PGSQL + AWS S3 Remote Server
Env Prod = Heroku Free
Librarry = JS Cookie

## Comment déployer ce projet ? 

## En Développement Local : 
Utilisez une BDD MYSQL avec le fichier database/migrations inclus dans Laravel 6, Régler les variables de configurations dans votre .env de Laravel pour la connexion a la BDD.
Ne pas oublié de faire un liens symbolik entre le dossier 'app/storage' et le app/app/public pour pouvoir ajouter des posts(image) avec la commande php artisan storage:link dans la console, Pour afficher les images veuilliez pensez a modifier les liens dans les fichier .blade.php dans le dossier app/views.
Aprés cela vous devriez etre en mesure de pouvoir utiliser Localement l'application.

## En Production:
Pour la production libre a vous d'utiliser ce qui vous sembles le plus simple et intuitif.
De mon coté, j'ai utiliser Heroku comme environnent de deployement 
Car il m’étais plus facile d'utiliser les commandes  CLI GIT + Heroku pour la mise en production.
PS: Si vous utiliser la solution d'Heroku gratuite comme moi, Noter que leurs server ne garde pas en mémoire les photo via le dossier public ou storage, car il possède une mémoire flash qui se met a jour régulièrement.
La solution que j'ai trouver est d'utiliser le Service AWS S3 d'Amazone gratuit pendant 1 ans pour pouvoir stocker les images et les mettres a disposition des utilisateurs. 
Voici les liens de documentations pour ce projet:
Composer : https://getcomposer.org/doc/00-intro.md,
Laravel 6: https://laravel.com/docs/6.x/installation,
Vue.js : https://vuejs.org/v2/guide/,
Heroku deployement: https://devcenter.heroku.com/articles/getting-started-with-laravel,
Heroku + AWS S3 config : https://devcenter.heroku.com/articles/s3,
Amazone AWS S3 : https://docs.aws.amazon.com/s3/index.html,

## En cas de questions:
Noubliez pas bien entendu d'aller voir sur youtube && stackOverflow aussi
-----------------------------------------------------------------------------------------------------------------------------------


## Project 5 Web Dev Openclassrooms: 
Do an internship OR freely present a personal project.

## Instructions

For this project, you will develop the application of your choice using the 5 languages you have learned: HTML, CSS, JS, PHP and SQL. The visual approach and the theme are entirely free.

So it's time to get creative! Demonstrate your know-how and dedicate a substantial effort to it, because this project will join your portfolio. It will be, more than other projects, the personal touch of your CV.

## Competencies assessed
Cutting, assembling and programming pages
Integrate content and graphic effects
Organizing and manipulating data
Organize the code in PHP language
Securing the application
Store and retrieve information in the database in SQL language
Using web development languages in a personal project
Ensure compliance of your application with PHP, JavaScript, HTML5 and CSS languages

## Technologies used for this project:
Framework Laravel 6/Vue.js
Local DB = MYSQL
DB Prod = PGSQL + AWS S3 Remote Server
Env Prod = Heroku Free
Librarry = JS Cookie

## How to deploy this project? 

## In Local Development : 
Use a MYSQL DB with the database/migrations file included in Laravel 6, Set the configuration variables in your Laravel .env for the connection to the DB.
Don't forget to make a symbolic link between the folder 'app/storage' and the app/app/public to be able to add posts(image) with the php command artisan storage:link in the console, To display the images please think to modify the links in the .blade.php files in the app/views folder.
After that you should be able to use the application locally.

## In Production:
For the production you are free to use whatever you want to use, it's the easiest and most intuitive way.
On my side, I've used Heroku as a deployment environment. 
Because it was easier for me to use the CLI GIT + Heroku controls for production start-up.
PS: If you use the free Heroku solution like me, note that their server doesn't keep pictures in memory via the public folder or storage, as it has a flash memory that updates regularly.
The solution I found is to use the free Amazon AWS S3 Service for 1 year to be able to store the images and make them available to users. 
Here are the documentation links for this project:
Dial: https://getcomposer.org/doc/00-intro.md,
Laravel 6: https://laravel.com/docs/6.x/installation,
Vue.js: https://vuejs.org/v2/guide/,
Heroku deployment: https://devcenter.heroku.com/articles/getting-started-with-laravel,
Heroku + AWS S3 config: https://devcenter.heroku.com/articles/s3,
Amazon AWS S3: https://docs.aws.amazon.com/s3/index.html,

## If there are any questions:
Don't forget of course to check out youtube && stackOverflow too


----------------------------------------------------------------------------------------------------------------------------------
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

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- [UserInsights](https://userinsights.com)
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)
- [iMi digital](https://www.imi-digital.de/)
- [Earthlink](https://www.earthlink.ro/)
- [Steadfast Collective](https://steadfastcollective.com/)
- [We Are The Robots Inc.](https://watr.mx/)
- [Understand.io](https://www.understand.io/)
- [Abdel Elrafa](https://abdelelrafa.com)
- [Hyper Host](https://hyper.host)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
