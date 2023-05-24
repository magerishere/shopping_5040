## Shopping Testing Example for 5040

Please follow the step for running project

* pull from github
* run: php artisan .env.example .env
* set database credentials
* run migration with factories: php artisan migrate --seed
* run your machine localhost and go to address of your project: php artisan serve
* please set correct url in .env APP_URL and ASSET_URL
* For use mail sender please fill the MAIL credentials in .env
* For load js css admin panel go to resources/back and run: npm i && npm run build
* for load js css front go to resources/front and run: npm i && npm run build
* go to /admin and login as admin (credentials exists in UserSeeder)
* Done!
