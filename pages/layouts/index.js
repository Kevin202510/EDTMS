$(document).ready(function(){
    $.get(
        "documents/documentsCrud.php",
        { selectAll: "selectAll" },
        function (data, status) {
          var datas = JSON.parse(data);
          $("#totalDocument").text(datas.length);
          $("#totalDocu").text(datas.length);
        }
      )
});