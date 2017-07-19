
var express = require('express'),
    bdata = require('./model/mongo');

var app = express();
    app.configure(function () {
      app.use(function(req, res, next) {
        res.header("Access-Control-Allow-Origin", "*");
  //      res.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");

res.header("Access-Control-Allow-Methods", "GET,HEAD,OPTIONS,POST,PUT");
res.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept, Authorization");
next();
      });

    app.use(express.logger('dev'));     /* 'default', 'short', 'tiny', 'dev' */
    app.use(express.bodyParser());
});

app.get('/bdata', bdata.findAll);
app.get('/bdata/:id', bdata.findById);
app.post('/bdata', bdata.addWine);
app.post('/bdatainit', bdata.addDataInitial);
app.post('/bdataup', bdata.updateWine);
app.delete('/bdata/:id', bdata.deleteWine);


app.listen(3000);
console.log('Listening on port 3000...');
