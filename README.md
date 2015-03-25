# mTrade
This is a simple market trade processor built with Fat-Free PHP micro-framework and using Highcharts on the front end. It consumes trade messages via the endpoint, stores the messages in the database, and displays a Pie Chart showing the distribution of traded currencies. Given the data that is received, any number of charts and data analysis is possible.


SETUP:

You will need Composer to install the dependencies: 

https://getcomposer.org/doc/00-intro.md

1) Clone the repository.

2) Run composer install.

3) Set up DB with trades table (see sql/sample.sql for trades table).

4) Edit the DB configuration in config/config.ini with your DB name, User and Password.

Your endpoint for POSTed messages will be:

your-site-url/your-mTrade-directory/Exchange

Messages should be posted in the following example JSON format:

{"userId": "134256", "currencyFrom": "EUR", "currencyTo": "GBP", "amountSell": 1000, "amountBuy": 747.10, "rate": 0.7471, "timePlaced" : "24-10-15 10:27:44", "originatingCountry" : "FR"}

To view the data, you will visit:

your-site-url/your-mTrade-directory/

