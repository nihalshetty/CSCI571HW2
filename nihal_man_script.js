// creatting the script for admin pages



function displayedit1()
{

	    document.getElementById('confirmdel').style.display="block";
}



function displayed1()
{

     document.getElementById('itemname').style.display="block";
     document.getElementById('itemlabel').style.display="block";
     document.getElementById('itemtypename').style.display="none";
     document.getElementById('itemtypelabel').style.display="none";
     document.getElementById('pricelower').style.display="none";
     document.getElementById('pricelowerlabel').style.display="none";
     document.getElementById('priceupper').style.display="none";
     document.getElementById('priceupperlabel').style.display="none";
}

function displayed2()
{

     document.getElementById('itemname').style.display="none";
     document.getElementById('itemlabel').style.display="none";
     document.getElementById('itemtypename').style.display="block";
     document.getElementById('itemtypelabel').style.display="block";
     document.getElementById('pricelower').style.display="none";
     document.getElementById('pricelowerlabel').style.display="none";
     document.getElementById('priceupper').style.display="none";
     document.getElementById('priceupperlabel').style.display="none";
}

function displayed3()
{

     document.getElementById('itemname').style.display="none";
     document.getElementById('itemlabel').style.display="none";
     document.getElementById('itemtypename').style.display="none";
     document.getElementById('itemtypelabel').style.display="none";
     document.getElementById('pricelower').style.display="block";
     document.getElementById('pricelowerlabel').style.display="block";
     document.getElementById('priceupper').style.display="block";
     document.getElementById('priceupperlabel').style.display="block";
}


function displayed4()
{

     document.getElementById('firstname').style.display="block";
     document.getElementById('firstlabel').style.display="block";
     document.getElementById('lastname').style.display="block";
     document.getElementById('lastlabel').style.display="block";
     document.getElementById('employeetype').style.display="none";
     document.getElementById('employeetypelabel').style.display="none";
     document.getElementById('pricelower').style.display="none";
     document.getElementById('pricelowerlabel').style.display="none";
     document.getElementById('priceupper').style.display="none";
     document.getElementById('priceupperlabel').style.display="none";
}

function displayed5()
{
     document.getElementById('firstname').style.display="none";
     document.getElementById('firstlabel').style.display="none";
     document.getElementById('lastname').style.display="none";
     document.getElementById('lastlabel').style.display="none";
     document.getElementById('employeetype').style.display="block";
     document.getElementById('employeetypelabel').style.display="block";
     document.getElementById('pricelower').style.display="none";
     document.getElementById('pricelowerlabel').style.display="none";
     document.getElementById('priceupper').style.display="none";
     document.getElementById('priceupperlabel').style.display="none";
}


function displayed6()
{
     document.getElementById('firstname').style.display="none";
     document.getElementById('firstlabel').style.display="none";
     document.getElementById('lastname').style.display="none";
     document.getElementById('lastlabel').style.display="none";
     document.getElementById('employeetype').style.display="none";
     document.getElementById('employeetypelabel').style.display="none";
     document.getElementById('pricelower').style.display="block";
     document.getElementById('pricelowerlabel').style.display="block";
     document.getElementById('priceupper').style.display="block";
     document.getElementById('priceupperlabel').style.display="block";
}


function displayed7()
{

     document.getElementById('itemname').style.display="block";
     document.getElementById('itemlabel').style.display="block";
     document.getElementById('itemtypename').style.display="none";
     document.getElementById('itemtypelabel').style.display="none";
     document.getElementById('pricelower').style.display="none";
     document.getElementById('pricelowerlabel').style.display="none";
     document.getElementById('priceupper').style.display="none";
     document.getElementById('priceupperlabel').style.display="none";
     document.getElementById('startdate').style.display="none";
     document.getElementById('startdatelabel').style.display="none";
     document.getElementById('enddate').style.display="none";
     document.getElementById('enddatelabel').style.display="none";
}

function displayed8()
{

     document.getElementById('itemname').style.display="none";
     document.getElementById('itemlabel').style.display="none";
     document.getElementById('itemtypename').style.display="block";
     document.getElementById('itemtypelabel').style.display="block";
     document.getElementById('pricelower').style.display="none";
     document.getElementById('pricelowerlabel').style.display="none";
     document.getElementById('priceupper').style.display="none";
     document.getElementById('priceupperlabel').style.display="none";
     document.getElementById('startdate').style.display="none";
     document.getElementById('startdatelabel').style.display="none";
     document.getElementById('enddate').style.display="none";
     document.getElementById('enddatelabel').style.display="none";
}


function displayed9()
{

     document.getElementById('itemname').style.display="none";
     document.getElementById('itemlabel').style.display="none";
     document.getElementById('itemtypename').style.display="none";
     document.getElementById('itemtypelabel').style.display="none";
     document.getElementById('pricelower').style.display="block";
     document.getElementById('pricelowerlabel').style.display="block";
     document.getElementById('priceupper').style.display="block";
     document.getElementById('priceupperlabel').style.display="block";
     document.getElementById('startdate').style.display="none";
     document.getElementById('startdatelabel').style.display="none";
     document.getElementById('enddate').style.display="none";
     document.getElementById('enddatelabel').style.display="none";
}


function displayed10()
{

     document.getElementById('itemname').style.display="none";
     document.getElementById('itemlabel').style.display="none";
     document.getElementById('itemtypename').style.display="none";
     document.getElementById('itemtypelabel').style.display="none";
     document.getElementById('pricelower').style.display="none";
     document.getElementById('pricelowerlabel').style.display="none";
     document.getElementById('priceupper').style.display="none";
     document.getElementById('priceupperlabel').style.display="none";
     document.getElementById('startdate').style.display="block";
     document.getElementById('startdatelabel').style.display="block";
     document.getElementById('enddate').style.display="block";
     document.getElementById('enddatelabel').style.display="block";
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

//using AJAX
function showHint2(str) 
{
      if (str.length==0) 
      { 
        document.getElementById("firstlabel").innerHTML="";
        return;
      }
      var xmlhttp=new XMLHttpRequest();
      xmlhttp.onreadystatechange=function() {

      if (xmlhttp.readyState==4 && xmlhttp.status==200) 
      {
        document.getElementById("firstlabel").innerHTML=xmlhttp.responseText;
      }
  }
  xmlhttp.open("GET","gethint2.php?q="+str,true);
  xmlhttp.send();

}

function showHint3(str) 
{
      if (str.length==0) 
      { 
        document.getElementById("lastlabel").innerHTML="";
        return;
      }
  
      var xmlhttp=new XMLHttpRequest();
      xmlhttp.onreadystatechange=function() {

      if (xmlhttp.readyState==4 && xmlhttp.status==200)
       {
           document.getElementById("lastlabel").innerHTML=xmlhttp.responseText;
       }
  }
  xmlhttp.open("GET","gethint3.php?q="+str,true);
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
                 var event2 = document.getElementById("itemtypename");
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

function updatetypesale()
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
           var event2 = document.getElementById("itemtypename");
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

function updateemp()
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
                 var event2 = document.getElementById("employeetype");
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
  xmlhttp.open("GET","getemptype.php?q="+str,true);
  xmlhttp.send();

}



// validation begins here


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


function myitemtypenamevalid(x)
{

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


function mypricelowervalid(x){
     var val=x.value.trim();
     var phone=/[^0-9]/;

      // phone
       if(!(val))
        {
                        //checking whether the field is empty
                        document.getElementById("pricelowerlabel").style.visibility= "visible";
                        document.getElementById("pricelowerlabel").innerHTML= "    Field cannot be blank";
                        //document.getElementById("pricelowerlabel").style.display= "block";

        }
        else if( (val.length < 0) && (val.length) >10 )
        {
                       document.getElementById("pricelowerlabel").style.visibility= "visible";
                       document.getElementById("pricelowerlabel").innerHTML= "    Invalid:length should be (0-10).";
                       //document.getElementById("pricelowerlabel").style.display= "block";  
        }
       else if(val.match(phone))
         {
                     document.getElementById("pricelowerlabel").style.visibility= "visible";
                     document.getElementById("pricelowerlabel").innerHTML= "    Invalid: Use Numeric only.";
                     //document.getElementById("pricelowerlabel").style.display= "block";   

         }
         else
         {
                     document.getElementById("pricelowerlabel").style.display= "none"; 
         }
      
      

}

function mypriceuppervalid(x){
     var val=x.value.trim();
     var phone=/[^0-9]/;

      // phone
       if(!(val))
        {
                        //checking whether the field is empty
                        document.getElementById("priceupperlabel").style.visibility= "visible";
                        document.getElementById("priceupperlabel").innerHTML= "    Field cannot be blank";
                       // document.getElementById("priceupperlabel").style.display= "block";

        }
        else if( (val.length < 0) && (val.length) >10 )
        {
                       document.getElementById("priceupperlabel").style.visibility= "visible";
                       document.getElementById("priceupperlabel").innerHTML= "    Invalid:length should be (0-10).";
                       //document.getElementById("priceupperlabel").style.display= "block";  
        }
       else if(val.match(phone))
         {
                     document.getElementById("priceupperlabel").style.visibility= "visible";
                     document.getElementById("priceupperlabel").innerHTML= "    Invalid: Use Numeric only.";
                    // document.getElementById("priceupperlabel").style.display= "block";   

         }
         else
         {
                    document.getElementById("priceupperlabel").style.display= "none"; 
         }
      
      

}


// first name valid

function myfirstnamevalid(x){

    var val=x.value.trim();
    var firstname=/[^a-zA-z]/


        if(!(val))
        {
               //checking whether the field is empty
              document.getElementById("firstlabel").style.visibility= "visible";
              document.getElementById("firstlabel").innerHTML= "    Field cannot be blank";
              //document.getElementById("firstlabel").style.display= "block";

        }
        else if( (val.length < 0) && (val.length) >10 )
         {
               document.getElementById("firstlabel").style.visibility= "visible";
               document.getElementById("firstlabel").innerHTML= "    Invalid:length should be (0-10).";
               //document.getElementById("firstlabel").style.display= "block";  
          }
       else if(val.match(firstname))
         {
                 document.getElementById("firstlabel").style.visibility= "visible";
                 document.getElementById("firstlabel").innerHTML= "    Invalid: Use only Alphabets.";
                // document.getElementById("firstlabel").style.display= "block";
        }
        else
        {
                 document.getElementById("firstlabel").style.display= "none";
        }
       
}

// last name valid
function mylastnamevalid(x){

    var val=x.value.trim();
    var lastname=/[^a-zA-z]/


        if(!(val))
        {
               //checking whether the field is empty
              document.getElementById("lastlabel").style.visibility= "visible";
              document.getElementById("lastlabel").innerHTML= "    Field cannot be blank";
              //document.getElementById("lastlabel").style.display= "block";

        }
        else if( (val.length < 0) && (val.length) >10)
         {
               document.getElementById("lastlabel").style.visibility= "visible";
               document.getElementById("lastlabel").innerHTML= "    Invalid:length should be (0-10).";
              // document.getElementById("lastlabel").style.display= "block";  
        }
         else if(val.match(lastname))
         {  
                 document.getElementById("lastlabel").style.visibility= "visible";
                 document.getElementById("lastlabel").innerHTML= "    Invalid: Use only Alphabets.";
                 //document.getElementById("lastlabel").style.display= "block";
         }
        else
        {
                 document.getElementById("lastlabel").style.display= "none";
        }

            

}


function myphonevalid1(x){
     var val=x.value.trim();
     var phone=/[^0-9]/;

      
      
      // employee type

         if(!(val))
        {
                        //checking whether the field is empty
                        document.getElementById("typelabel").style.visibility= "visible";
                        document.getElementById("typelabel").innerHTML= "    Field cannot be blank";
                        //document.getElementById("typelabel").style.display= "block";

        }
        else if( (val.length < 0) && (val.length) >10 )
        {
                       document.getElementById("typelabel").style.visibility= "visible";
                       document.getElementById("typelabel").innerHTML= "    Invalid:length should be (0-10).";
                       //document.getElementById("typelabel").style.display= "block";  
        }
       else if(val.match(phone))
         {
                      document.getElementById("typelabel").style.visibility= "visible";
                      document.getElementById("typelabel").innerHTML= "    Invalid: Use Numeric only.";
                      // document.getElementById("typelabel").style.display= "block";   

         }
         else
         {
                    document.getElementById("typelabel").style.display= "none"; 
         }


        


}

