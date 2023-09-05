function hapustable(){
var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "dbgudang"
});

con.connect(function(hapus) {
  if (hapus) throw hapus;
  var sql = "DELETE FROM barangkeluar WHERE id";
  con.query(sql, function (hapus, result) {
    if (hapus) throw hapus;
    console.log("Berhasil Hapus: " + result.affectedRows);
  });
});
}