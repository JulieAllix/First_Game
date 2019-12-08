// we insert the variables randomName & playerName in the DB
var mysql = require('mysql');

var con = mysql.createConnection({
host: "localhost",
user: "BreakFree",
password: "BreakFree",
database: "BreakFree"
});

con.connect(function(err) {
    if (err) {
        return console.error('error: ' + err.message);
      }
     
      console.log('Connected to the MySQL server.');
    });