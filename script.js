$(".dd").click(function(){

 if(!$(".row").hasClass("selected")){
    $(this).parent("tr").addClass("selected");
 
 }

});

$(".ssub").click(function(e){

    $(".row.selected").each(function(){
 
      var self = $(this);
      var c_id = self.find("td:eq(0)").text().trim();
      document.cookie = "c_id = "+c_id ;
     
      var e_id = self.find("td:eq(1)").text().trim();
      document.cookie = "e_id = "+e_id ;

      var uname = self.find("td:eq(2)").text().trim();
      document.cookie = "uname = "+uname;

      var item = self.find("td:eq(3)").text().trim();
      document.cookie = "item = "+item ;

      var status = self.find("td:eq(4)").find("select").val();

      document.cookie = "status = "+status ;

      var date = self.find("td:eq(5)").text().trim();
      document.cookie = "date = "+date ;
   }); 


});

// $("#go").click(function(){

//    document.getElementById('t1').style.visibility = "visible" ;
// })

$("#res").click(function(){
   document.getElementById('t1').style.visibility = "hidden" ;
})