// creatting the script for admin pages


function displayedit()
{
      document.getElementById('ingnew').style.display="block";
      document.getElementById('spicenew').style.display="block";
      document.getElementById('tynew').style.display="block";
      document.getElementById('pricenew').style.display="block";
      document.getElementById('sidenew').style.display="block";
      document.getElementById('addnew').style.display="block";
      document.getElementById('itemnew').style.display="block";
        
}


function displayedit1()
{
	    document.getElementById('confirmdel').style.display="block";
}

function displayedit2()
{

      document.getElementById('itemtypenew').style.display="block";
      document.getElementById('descnew').style.display="block";
    

}


function displayedit3()
{
     document.getElementById('itemnew').style.display="block";
     document.getElementById('startnew').style.display="block";
     document.getElementById('endnew').style.display="block";
    

}

//using AJAX
function showHint(str) 
{
    if (str.length==0) 
    { 
      document.getElementById("itemlabel").innerHTML="";
      return;
    }
  
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
    
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
     {
        document.getElementById("itemlabel").innerHTML=xmlhttp.responseText;
     }
  }
  xmlhttp.open("GET","gethint.php?q="+str,true);
  xmlhttp.send();

}

function showHint1(str) 
{
    if (str.length==0) 
    { 
      document.getElementById("itemtypelabel").innerHTML="";
      return;
    }
    
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
    
    if (xmlhttp.readyState==4 && xmlhttp.status==200) 
    {
        document.getElementById("itemtypelabel").innerHTML=xmlhttp.responseText;
    }
  
  }
  xmlhttp.open("GET","gethint1.php?q="+str,true);
  xmlhttp.send();
}

function checktime() 
{
   var xmlhttp=new XMLHttpRequest();
   xmlhttp.onreadystatechange=function() {
    
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
     {
       //document.getElementById("lastlabel").innerHTML=xmlhttp.responseText;
     }
  }
  xmlhttp.open("GET","timeup.php?q="+str,true);
  xmlhttp.send();

}

// food type update
function updatetype()
{
  var str="ok";
  var text;
  
 
  if (window.XMLHttpRequest) 
  {
     xmlhttp=new XMLHttpRequest();
  }
  else 
  { 
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  xmlhttp.onreadystatechange=function() {
    
    if (xmlhttp.readyState==4 && xmlhttp.status==200) 
    {
          text= xmlhttp.responseText;
           
          
          if(text=="")
           {
               //document.getElementById('desiglb').innerHTML="could not load data";   
           } 
           else
           {
               var list = text.split("|");
               var i=0;
               var val=[];
               var event2 = document.getElementById("typeid");
               for(i=0;i<list.length-1;i++)
                 {
                  
                    val= list[i].split(",");
                    
                    optElement = document.createElement( "option" );
                    optElement.text = val[1];
                    optElement.value = val[0];
                    optElement.id = val[0];
                    event2.add( optElement );
                  }
           }
     }
  }
  xmlhttp.open("GET","getfoodtype.php?q="+str,true);
  xmlhttp.send();

}


function updatetypenew()
{
var str="ok";
  var text;
  
 
  if (window.XMLHttpRequest) {
    
    xmlhttp=new XMLHttpRequest();
  } else { 
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
     text= xmlhttp.responseText;
       
      
    if(text=="")
       {
      //document.getElementById('desiglb').innerHTML="could not load data";
      
       
       } 
       else
       {
       var list = text.split("|");
       var i=0;
       var val=[];
       var event2 = document.getElementById("tynew");
       for(i=0;i<list.length-1;i++)
         {
          
          val= list[i].split(",");
          
          optElement = document.createElement( "option" );
  optElement.text = val[1];
  optElement.value = val[0];
         optElement.id = val[0];
  event2.add( optElement );
          }
       }
  }
  }
  xmlhttp.open("GET","getfoodtype.php?q="+str,true);
  xmlhttp.send();
}


function updatesale()
{
var str="ok";
  var text;
  
 
  if (window.XMLHttpRequest) {
    
    xmlhttp=new XMLHttpRequest();
  } else { 
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
     text= xmlhttp.responseText;
       
      
    if(text=="")
       {
      //document.getElementById('desiglb').innerHTML="could not load data";
      
       
       } 
       else
       {
       var list = text.split("|");
       var i=0;
       var val=[];
       var event2 = document.getElementById("itemname");
       for(i=0;i<list.length-1;i++)
         {
          
          val= list[i].split(",");
          
          optElement = document.createElement( "option" );
  optElement.text = val[1];
  optElement.value = val[0];
         optElement.id = val[0];
  event2.add( optElement );
          }
       }
  }
  }
  xmlhttp.open("GET","getfood.php?q="+str,true);
  xmlhttp.send();
}

function updatesalenew()
{
  var str="ok";
  var text;
  
 
  if (window.XMLHttpRequest)
   {
    
      xmlhttp=new XMLHttpRequest();
   } 
   else
   { 
       xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
   }
  
  xmlhttp.onreadystatechange=function() {
    
    if (xmlhttp.readyState==4 && xmlhttp.status==200) 
    {
       text= xmlhttp.responseText;
       
      
      if(text=="")
       {
          //document.getElementById('desiglb').innerHTML="could not load data";
      
       
       } 
      else
       {
           var list = text.split("|");
           var i=0;
           var val=[];
           var event2 = document.getElementById("itemnew");
           for(i=0;i<list.length-1;i++)
             {
              
                  val= list[i].split(",");
                  
                  optElement = document.createElement( "option" );
                  optElement.text = val[1];
                  optElement.value = val[0];
                  optElement.id = val[0];
                  event2.add( optElement );
              }
        }
     }
  }
  xmlhttp.open("GET","getfood.php?q="+str,true);
  xmlhttp.send();
}

function existupdatesale()
{  //alert("i am here");
  var str="ok";
  var text;
  
 
  if (window.XMLHttpRequest) 
  {
    
     xmlhttp=new XMLHttpRequest();
  } 
  else 
  { 
     xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

  xmlhttp.onreadystatechange=function() {

    if (xmlhttp.readyState==4 && xmlhttp.status==200)
     {
         text= xmlhttp.responseText;
       
        //alert(text); 
          if(text=="")
             {
            //document.getElementById('desiglb').innerHTML="could not load data";
             // alert("i m here 2");
             
             } 
             else
             {
                   var list = text.split("|");
                   var i=0;
                   var val=[];
                   var event2 = document.getElementById("itemname");
                   for(i=0;i<list.length-1;i++)
                     {
                      
                          val= list[i].split(",");
                          //alert(val);
                          optElement = document.createElement( "option" );
                          optElement.text = val[1];
                          optElement.value = val[0];
                          optElement.id = val[0];
                          event2.add( optElement );
                      }
                          updatesalenew();
             }
      }
  }
  xmlhttp.open("GET","getexistfood.php?q="+str,true);
  xmlhttp.send();

}






//validation starts here


function myitemnamevalid(x)
{

    var val=x.value.trim();
    var firstname=/[^a-zA-z]/


        if(!(val))
        {
               //checking whether the field is empty
               document.getElementById("itemlabel").style.visibility= "visible";
               document.getElementById("itemlabel").innerHTML= "    Field cannot be blank";
               //document.getElementById("itemlabel").style.display= "block";

        }
        else if( (val.length < 0) && (val.length) >10 )
         {
                 document.getElementById("itemlabel").style.visibility= "visible";
                 document.getElementById("itemlabel").innerHTML= "    Invalid:length should be (0-10).";
                 //document.getElementById("itemlabel").style.display= "block";  
         }
        else if(val.match(firstname))
         {
                
                 document.getElementById("itemlabel").style.visibility= "visible";
                 document.getElementById("itemlabel").innerHTML= "    Invalid: Use only Alphabets.";
                 //document.getElementById("itemlabel").style.display= "block";
        }
       else
        {
                 document.getElementById("itemlabel").style.display= "none";
        }
       
}


function mytypvalid(x){
     var val=x.value.trim();
     var phone=/[^0-9]/;

      // phone
       if(!(val))
        {
                        //checking whether the field is empty
                        document.getElementById("typlabel").style.visibility= "visible";
                        document.getElementById("typlabel").innerHTML= "    Field cannot be blank";
                       //document.getElementById("typlabel").style.display= "block";

        }
        else if( (val.length < 0) && (val.length) >10 )
        {
                       document.getElementById("typlabel").style.visibility= "visible";
                       document.getElementById("typlabel").innerHTML= "    Invalid:length should be (0-10).";
                       //document.getElementById("typlabel").style.display= "block";  
        }
       else if(val.match(phone))
         {
                     document.getElementById("typlabel").style.visibility= "visible";
                     document.getElementById("typlabel").innerHTML= "    Invalid: Use Numeric only.";
                     //document.getElementById("typlabel").style.display= "block";   

         }
         else
         {
                    document.getElementById("typlabel").style.display= "none"; 
         }
      
      

}


function myingvalid(x){

  var val = x.value.trim();
  var check=/[^a-zA-z 0-9]/;
  var check1=/^[^a-zA-z]/;
  var check2 = /[0-9]/;
   
   if(val.match(check))
   {  
       //checking for special character
       document.getElementById("inglabel").style.visibility= "visible";
       document.getElementById("inglabel").innerHTML= "    Invalid: Use Alpha-Numeric.";
       //document.getElementById("inglabel").style.display= "block";

   }
   else if (val.match(check1))
   {
      
       //checking for first digit to be aplhabet
       document.getElementById("inglabel").style.visibility= "visible";
       document.getElementById("inglabel").innerHTML= "    Invalid: Use Alpha-Numeric.";
      // document.getElementById("inglabel").style.display= "block";

   }
   else if(!(val))
   {     
         //checking whether the field is empty
        document.getElementById("inglabel").style.visibility= "visible";
        document.getElementById("inglabel").innerHTML= "    Field cannot be blank";
        // document.getElementById("inglabel").style.display= "block";

   }
   else if( (val.length < 0) && (val.length) >20 )
   {
           document.getElementById("inglabel").style.visibility= "visible";
           document.getElementById("inglabel").innerHTML= "    Invalid:length should be (0-20s).";
           //document.getElementById("inglabel").style.display= "block";  
   }
   else if(val.match(check2))
   {    
           document.getElementById("inglabel").style.display= "none";


   }
   else
   {
           document.getElementById("inglabel").style.visibility= "visible";
           document.getElementById("inglabel").innerHTML= "    Invalid: Use Alpha-Numeric.";
           // document.getElementById("inglabel").style.display= "block";
   }
  

}


function mypricevalid(x){
     var val=x.value.trim();
     var phone=/[^0-9]/;

      // phone
       if(!(val))
        {
                        //checking whether the field is empty
                        document.getElementById("pricelabel").style.visibility= "visible";
                        document.getElementById("pricelabel").innerHTML= "    Field cannot be blank";
                       // document.getElementById("pricelabel").style.display= "block";

        }
        else if( (val.length < 0) && (val.length) >10 )
        {
                     document.getElementById("pricelabel").style.visibility= "visible";
                     document.getElementById("pricelabel").innerHTML= "    Invalid:length should be (0-10).";
                     //document.getElementById("pricelabel").style.display= "block";  
        }
       else if(val.match(phone))
         {
                     document.getElementById("pricelabel").style.visibility= "visible";
                     document.getElementById("pricelabel").innerHTML= "    Invalid: Use Numeric only.";
                     //document.getElementById("pricelabel").style.display= "block";   

         }
         else
         {
                     document.getElementById("pricelabel").style.display= "none"; 
         }
      
      

}


function mysidevalid(x){

    var val=x.value.trim();
    var lastname=/[^a-zA-z]/


        if(!(val))
        {
               //checking whether the field is empty
              document.getElementById("sidelabel").style.visibility= "visible";
              document.getElementById("sidelabel").innerHTML= "    Field cannot be blank";
             //document.getElementById("sidelabel").style.display= "block";

        }
        else if( (val.length < 0) && (val.length) >10)
         {
               document.getElementById("sidelabel").style.visibility= "visible";
               document.getElementById("sidelabel").innerHTML= "    Invalid:length should be (0-10).";
               //document.getElementById("sidelabel").style.display= "block";  
        }
         else if(val.match(lastname))
         {
                
                 document.getElementById("sidelabel").style.visibility= "visible";
                 document.getElementById("sidelabel").innerHTML= "    Invalid: Use only Alphabets.";
                  //document.getElementById("sidelabel").style.display= "block";
         }
        else
        {

                  document.getElementById("sidelabel").style.display= "none";
        }

           //validateaddon();  

}

function validateaddon(){

   

         
         var e = document.getElementById("country");
         var country = e.options[e.selectedIndex].value;
          var country1 = e.options[e.selectedIndex].text;
          if(country==0)
          {
                        document.getElementById("addonlabel").style.visibility= "visible";
                        document.getElementById("addonlabel").innerHTML= "    Field cannot be blank";
                       // document.getElementById("addonlabel").style.display= "block";
                        checktostore=0;
          }
          else
          {
                   document.getElementById("addonlabel").style.display= "none";
                   checktostore=1;
          }

         // validatecheckboxone();
}


function myitemnamevalid1(x){

    var val=x.value.trim();
    var firstname=/[^a-zA-z]/


        if(!(val))
        {
               //checking whether the field is empty
              document.getElementById("fulllabel").style.visibility= "visible";
              document.getElementById("fulllabel").innerHTML= "    Field cannot be blank";
              //document.getElementById("fulllabel").style.display= "block";

        }
        else if( (val.length < 0) && (val.length) >10 )
         {
               document.getElementById("fulllabel").style.visibility= "visible";
               document.getElementById("fulllabel").innerHTML= "    Invalid:length should be (0-10).";
               //document.getElementById("fulllabel").style.display= "block";  
          }
       else if(value.match(firstname))
         {
                
                 document.getElementById("fulllabel").style.visibility= "visible";
                 document.getElementById("fulllabel").innerHTML= "    Invalid: Use only Alphabets.";
                 //document.getElementById("fulllabel").style.display= "block";
        }
        else
        {
                    document.getElementById("fulllabel").style.display= "none";
        }
       
}


function myaddonvalid(x){

    var val=x.value.trim();
    var lastname=/[^a-zA-z]/


        if(!(val))
        {
               //checking whether the field is empty
              document.getElementById("addonlabel").style.visibility= "visible";
              document.getElementById("addonlabel").innerHTML= "    Field cannot be blank";
              //document.getElementById("addonlabel").style.display= "block";

        }
        else if( (val.length < 0) && (val.length) >10)
         {
                 document.getElementById("addonlabel").style.visibility= "visible";
                 document.getElementById("addonlabel").innerHTML= "    Invalid:length should be (0-10).";
                 //document.getElementById("addonlabel").style.display= "block";  
        }
         else if(val.match(lastname))
         {
                
                 document.getElementById("addonlabel").style.visibility= "visible";
                 document.getElementById("addonlabel").innerHTML= "  Invalid: Use only Alphabets.";
                 // document.getElementById("addonlabel").style.display= "block";
         }
        else
        {

               document.getElementById("addonlabel").style.display= "none";
        }

           validateaddon();  

}


function myconfirmvalid(x){

    var val=x.value.trim();
    var firstname=/[^a-zA-z]/


        if(!(val))
        {
             //checking whether the field is empty
            document.getElementById("confirmlabel").style.visibility= "visible";
            document.getElementById("confirmlabel").innerHTML= "    Field cannot be blank";
            //document.getElementById("confirmlabel").style.display= "block";

        }
        else if( (val.length < 0) && (val.length) >10 )
         {
             document.getElementById("confirmlabel").style.visibility= "visible";
             document.getElementById("confirmlabel").innerHTML= "    Invalid:length should be (0-10).";
             //document.getElementById("confirmlabel").style.display= "block";  
          }
       else if(val.match(firstname))
         { 
                 document.getElementById("confirmlabel").style.visibility= "visible";
                 document.getElementById("confirmlabel").innerHTML= "    Invalid: Use only Alphabets.";
                 // document.getElementById("confirmlabel").style.display= "block";
        }
        else
        {
                 document.getElementById("confirmlabel").style.display= "none";
        }
       
}



function myitemtypenamevalid(x){

    var val=x.value.trim();
    var firstname=/[^a-zA-z]/


        if(!(val))
        {
               //checking whether the field is empty
              document.getElementById("itemtypelabel").style.visibility= "visible";
              document.getElementById("itemtypelabel").innerHTML= "    Field cannot be blank";
              //document.getElementById("itemtypelabel").style.display= "block";

        }
        else if( (val.length < 0) && (val.length) >10 )
         {
               document.getElementById("itemtypelabel").style.visibility= "visible";
               document.getElementById("itemtypelabel").innerHTML= "    Invalid:length should be (0-10).";
               //document.getElementById("itemtypelabel").style.display= "block";  
          }
       else if(val.match(firstname))
         {          
               document.getElementById("itemtypelabel").style.visibility= "visible";
               document.getElementById("itemtypelabel").innerHTML= "    Invalid: Use only Alphabets.";
               //document.getElementById("itemtypelabel").style.display= "block";
        }
        else
        {
               document.getElementById("itemtypelabel").style.display= "none";
        }
       
}

function myitemtypedescvalid(x){

    var val=x.value.trim();
    var firstname=/[^a-zA-z]/


        if(!(val))
        {
             //checking whether the field is empty
            document.getElementById("typdesclabel").style.visibility= "visible";
            document.getElementById("typdesclabel").innerHTML= "    Field cannot be blank";
            //document.getElementById("fulllabel").style.display= "block";

        }
        else if( (val.length < 0) && (val.length) >10 )
         {
             document.getElementById("typdesclabel").style.visibility= "visible";
             document.getElementById("typdesclabel").innerHTML= "    Invalid:length should be (0-10).";
             //document.getElementById("fulllabel").style.display= "block";  
          }
       else if(val.match(firstname))
         { 
                 document.getElementById("typdesclabel").style.visibility= "visible";
                 document.getElementById("typdesclabel").innerHTML= "    Invalid: Use only Alphabets.";
                 // document.getElementById("fulllabel").style.display= "block";
        }
        else
        {
                    //document.getElementById("fulllabel").style.display= "none";
        }
       
}


function myitemtypenamevalid1(x){

    var val=x.value.trim();
    var firstname=/[^a-zA-z]/


        if(!(val))
        {
             //checking whether the field is empty
            document.getElementById("fulllabel").style.visibility= "visible";
            document.getElementById("fulllabel").innerHTML= "    Field cannot be blank";
            //document.getElementById("fulllabel").style.display= "block";

        }
        else if( (val.length < 0) && (val.length) >10 )
         {
             document.getElementById("fulllabel").style.visibility= "visible";
             document.getElementById("fulllabel").innerHTML= "    Invalid:length should be (0-10).";
             //document.getElementById("fulllabel").style.display= "block";  
          }
       else if(val.match(firstname))
         {
                 document.getElementById("fulllabel").style.visibility= "visible";
                 document.getElementById("fulllabel").innerHTML= "    Invalid: Use only Alphabets.";
                 // document.getElementById("fulllabel").style.display= "block";
        }
        else
        {
                 //document.getElementById("fulllabel").style.display= "none";
        }
       
}


function myspicevalid(x){

    var val=x.value.trim();
    var lastname=/[^a-zA-z]/


        if(!(val))
        {
             //checking whether the field is empty
            document.getElementById("spicylabel").style.visibility= "visible";
            document.getElementById("spicylabel").innerHTML= "    Field cannot be blank";
            //document.getElementById("spicylabel").style.display= "block";

        }
        else if( (val.length < 0) && (val.length) >10)
         {
             document.getElementById("spicylabel").style.visibility= "visible";
             document.getElementById("spicylabel").innerHTML= "    Invalid:length should be (0-10).";
             //document.getElementById("spicylabel").style.display= "block";  
        }
         else if(val.match(lastname))
         {
                
              document.getElementById("spicylabel").style.visibility= "visible";
              document.getElementById("spicylabel").innerHTML= "    Invalid: Use only Alphabets.";
              //document.getElementById("spicylabel").style.display= "block";
         }
        else
        {

               document.getElementById("spicylabel").style.display= "none";
        }

           //validateaddon();  

}

