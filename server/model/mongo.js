var mongo = require('mongodb');

var Server = mongo.Server,
    Db = mongo.Db,
    BSON = mongo.BSONPure;

    var server = new Server('localhost', 27017, {auto_reconnect: true});
    db = new Db('vbus', server);

    db.open(function(err, db) {


        if(!err) {
            console.log("Connected to 'winedb' database");
            db.collection('bdata', {strict:true}, function(err, collection) {
                if (err) {
                    console.log("The 'wines' collection doesn't exist. Creating it with sample data...");
                    var a = [1, 2, 3, 4, 5];
                    a.forEach(function(entry) {
                        console.log(entry);
                    });
                    populateDB();
                }

            });
        }
    });

    exports.findById = function(req, res) {
        var id = req.params.id;
        console.log('Retrieving wine: ' + id);
        db.collection('bdata', function(err, collection) {
            collection.findOne({'_id':new BSON.ObjectID(id)}, function(err, item) {
                res.send(item);
            });
        });
    };

    exports.findAll = function(req, res) {
    db.collection('bdata', function(err, collection) {
        collection.find().toArray(function(err, items) {
            res.send(items);
        });
    });
};

exports.addDataInitial = function(req, res) {

    //https://www.google.co.in/maps/@19.04,73.07,13z

    var bdata = {};
    bdata.busno = 3;
    bdata.lat = 19.04;
    bdata.lng = 73.07;

    console.log('Adding 5 bus data: ' + JSON.stringify(bdata));
    db.collection('bdata', function(err, collection) {
        collection.insert(bdata, {safe:true}, function(err, result) {
            if (err) {
                res.send({'error':'An error has occurred'});
            } else {
                console.log('Success: ' + JSON.stringify(result[0]));
                res.send(result[0]);
            }
        });
    });

}

exports.addWine = function(req, res) {
    var wine = req.body;
    console.log('Adding wine: ' + JSON.stringify(wine));
    db.collection('bdata', function(err, collection) {
        collection.insert(wine, {safe:true}, function(err, result) {
            if (err) {
                res.send({'error':'An error has occurred'});
            } else {
                console.log('Success: ' + JSON.stringify(result[0]));
                res.send(result[0]);
            }
        });
    });
}

exports.updateWine = function(req, res) {

    var bus_no = req.query.busno;
    var bdata = {};
    bdata.busno = req.query.busno;
    bdata.lat = req.query.lat;
    bdata.lng = req.query.lng;

    //console.log('updating bus 2 location: ' + JSON.stringify(bdata));

    db.collection('bdata', function(err, collection) {
        collection.update({'busno':bus_no}, bdata, {safe:true}, function(err, result) {

            if (err) {
                res.send({'error':'An error has occurred'});
            } else {
                console.log('Success: ' + JSON.stringify(result[0]));
                res.send(result[0]);
            }
        });
    });

/*
    db.collection('bdata', function(err, collection) {
        collection.update({'_id':new BSON.ObjectID(id)}, wine, {safe:true}, function(err, result) {
            if (err) {
                console.log('Error updating wine: ' + err);
                res.send({'error':'An error has occurred'});
            } else {
                console.log('' + result + ' document(s) updated');
                res.send(wine);
            }
        });
    });
    */
}

exports.deleteWine = function(req, res) {
    var id = req.params.id;
    console.log('Deleting wine: ' + id);
    db.collection('bdata', function(err, collection) {
        collection.remove({'_id':new BSON.ObjectID(id)}, {safe:true}, function(err, result) {
            if (err) {
                res.send({'error':'An error has occurred - ' + err});
            } else {
                console.log('' + result + ' document(s) deleted');
                res.send(req.body);
            }
        });
    });
}

/*--------------------------------------------------------------------------------------------------------------------*/
// Populate database with sample data -- Only used once: the first time the application is started.
// You'd typically not find this code in a real-life app, since the database would already exist.
var populateDB = function() {

    var wines = [
    {
        busno: 7,
        lng: 14,
        lat: 15
    }];

    db.collection('bdata', function(err, collection) {
        collection.insert(wines, {safe:true}, function(err, result) {});
    });

};

/*
db.bdata.remove( { "_id" : ObjectId("58f5a4d36633bb1b6cec4174") } )
db.bdata.aggregate( { "_id" : ObjectId("58f5ae53f7f1211f9d766c42") } )
*/
