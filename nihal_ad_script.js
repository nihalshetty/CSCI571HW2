// creatting the script for admin pages


function displayedit()
{
    document.getElementById('firstnew').style.display="inline";
    document.getElementById('lastnew').style.display="inline";
    document.getElementById('usernew').style.display="block";
    document.getElementById('passnew').style.display="block";
    document.getElementById('typenew').style.display="block";
    document.getElementById('emnew').style.display="block";
    document.getElementById('phnew').style.display="block";
    document.getElementById('birnew').style.display="block";
    document.getElementById('gennew').style.display="block";
    document.getElementById('agnew').style.display="block";
    document.getElementById('addnew').style.display="block";
    document.getElementById('paynew').style.display="block";
    
}


function displayedit1()
{
	 document.getElementById('confirmdel').style.display="block";
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





// food type update
function updateemptype()
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
                       var event2 = document.getElementById("emptype");
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

function updateemptypenew()
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
               var event2 = document.getElementById("typenew");
              
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


//javascript validation starts  here

//username validation




function myaccnamevalid(x)
{

  var val = x.value.trim();
  var check=/[^a-zA-z 0-9]/;
  var check1=/^[^a-zA-z]/;
  var check2 = /[0-9]/;
   
   if(val.match(check))
   {  
       //checking for special character
       document.getElementById("userlabel").style.visibility= "visible";
       document.getElementById("userlabel").innerHTML= "    Invalid: Use Alpha-Numeric.";
       //document.getElementById("userlabel").style.display= "block";

   }
   else if (val.match(check1))
   {
      
       //checking for first digit to be aplhabet
       document.getElementById("userlabel").style.visibility= "visible";
       document.getElementById("userlabel").innerHTML= "   Invalid: Use Alpha-Numeric.";
       //document.getElementById("userlabel").style.display= "block";

   }
   else if(!(val))
   {     
        //checking whether the field is empty
        document.getElementById("userlabel").style.visibility= "visible";
        document.getElementById("userlabel").innerHTML= "    Field cannot be blank";
        //document.getElementById("userlabel").style.display= "block";

   }
   else if( (val.length < 0) && (val.length) >9 )
   {
        document.getElementById("userlabel").style.visibility= "visible";
        document.getElementById("userlabel").innerHTML= "    Invalid:length should be (0-9).";
        // document.getElementById("userlabel").style.display= "block";  
   }
   else if(val.match(check2))
   {    
        document.getElementById("userlabel").style.display= "none";
   }
   else
   {
       document.getElementById("userlabel").style.visibility= "visible";
       document.getElementById("userlabel").innerHTML= "    Invalid: Use Alpha-Numeric.";
       // document.getElementById("userlabel").style.display= "block";
   }
  

}

function fullnamevalid(x)
{

    var val=x.value.trim();
    var firstname=/[^a-zA-z]/


        if(!(val))
        {
            //checking whether the field is empty
            document.getElementById("fulllabel").style.visibility= "visible";
            document.getElementById("fulllabel").innerHTML= "    Field cannot be blank";
            // document.getElementById("fulllabel").style.display= "block";

        }
        else if( (val.length < 0) && (val.length) >10 )
         {
            document.getElementById("fulllabel").style.visibility= "visible";
            document.getElementById("fulllabel").innerHTML= "    Invalid:length should be (0-10).";
           // document.getElementById("fulllabel").style.display= "block";  
          }
       else if(val.match(firstname))
         {           
            document.getElementById("fulllabel").style.visibility= "visible";
            document.getElementById("fulllabel").innerHTML= "    Invalid: Use only Alphabets.";
            //  document.getElementById("fulllabel").style.display= "block";
        }
        else
        {
            document.getElementById("fulllabel").style.display= "none";
        }
       
}



// passsword valid 
function mypasswordvalid(x)
{

    var val= x.value.trim(); 
    var passw=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
   
        if(!(val))
         {    
              //checking whether the field is empty
              document.getElementById("passlabel").style.visibility= "visible";
              document.getElementById("passlabel").innerHTML= "    Field cannot be blank";
              // document.getElementById("passlabel").style.display= "block";      
         }
        else if( (val.length < 0) && (val.length) >7 )
        {
           document.getElementById("passlabel").style.visibility= "visible";
           document.getElementById("passlabel").innerHTML= "    Invalid:length should be (0-7 ).";
           // document.getElementById("passlabel").style.display= "block";  
        }
       else if(val.match(passw))
        {
            //checking for password
            document.getElementById("passlabel").style.display= "none";

        }
      else
       {
            document.getElementById("passlabel").style.visibility= "visible";
            document.getElementById("passlabel").innerHTML= "    Invalid: Use Alpha-Numeric & one Spcl Char,Upper & Lower case Letter";
           // document.getElementById("passlabel").style.display= "block";
       }             
    

}


// first name valid

function myfirstnamevalid(x)
{

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
           // document.getElementById("firstlabel").style.display= "block";  
       }
      else if(val.match(firstname))
       {               
           document.getElementById("firstlabel").style.visibility= "visible";
           document.getElementById("firstlabel").innerHTML= "    Invalid: Use only Alphabets.";
           //document.getElementById("firstlabel").style.display= "block";
       }
      else
       {
            document.getElementById("firstlabel").style.display= "none";
       }
       
}

// last name valid
function mylastnamevalid(x)
{

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




function myemailvalid(x)
{
  
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      
      if( re.test(x.value))
      {
          document.getElementById("emaillabel").style.display= "none";

      }
      else
      {
          document.getElementById("emaillabel").style.visibility= "visible";
          document.getElementById("emaillabel").innerHTML= "    Enter a valid Email Address";
         // document.getElementById("emaillabel").style.display= "block";

      }

}


function myphonevalid(x){
     var val=x.value.trim();
     var phone=/[^0-9]/;

      // phone
       if(!(val))
        {
            //checking whether the field is empty
            document.getElementById("phonelabel").style.visibility= "visible";
            document.getElementById("phonelabel").innerHTML= "    Field cannot be blank";
            //  document.getElementById("phonelabel").style.display= "block";

        }
        else if( (val.length < 0) && (val.length) >10 )
        {
           document.getElementById("phonelabel").style.visibility= "visible";
           document.getElementById("phonelabel").innerHTML= "    Invalid:length should be (0-10).";
           //document.getElementById("phonelabel").style.display= "block";  
        }
       else if(val.match(phone))
         {
             document.getElementById("phonelabel").style.visibility= "visible";
             document.getElementById("phonelabel").innerHTML= "    Invalid: Use Numeric only.";
             // document.getElementById("phonelabel").style.display= "block";   

         }
         else
         {
            document.getElementById("phonelabel").style.display= "none"; 
         }
      
      

}


function validatebirth(){

   

        
         var e = document.getElementById("months");
         var f = document.getElementById("days");
         var g =document.getElementById("years");
         var month = e.options[e.selectedIndex].value;
         var days = f.options[f.selectedIndex].value;
         var year = g.options[g.selectedIndex].value;

          var month1 = e.options[e.selectedIndex].text;
          if(month==0 || days==0 || year ==0)
          {
                        document.getElementById("birthlabel").style.visibility= "visible";
                        document.getElementById("birthlabel").innerHTML= "    Field cannot be blank";
                        document.getElementById("birthlabel").style.display= "block";
                        checktostore=0;
          }
          else
          {
                        document.getElementById("birthlabel").style.display= "none";
                        checktostore=1;
          }

          //validatecountry();
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
                        // document.getElementById("typelabel").style.display= "block";  
        }
       else if(val.match(phone))
         {
                     document.getElementById("typelabel").style.visibility= "visible";
                     document.getElementById("typelabel").innerHTML= "    Invalid: Use Numeric only.";
                     //document.getElementById("typelabel").style.display= "block";   

         }
         else
         {
                     document.getElementById("typelabel").style.display= "none"; 
         }


        


}



function myaddressvalid(x){
       var val=x.value.trim();


         if(!(val))
        {
                        //checking whether the field is empty
                        document.getElementById("addresslabel").style.visibility= "visible";
                        document.getElementById("addresslabel").innerHTML= "    Field cannot be blank";
                        //document.getElementById("addresslabel").style.display= "block";

        }
        else if( (val.length < 0) && (val.length) >20 )
        {
                       document.getElementById("addresslabel").style.visibility= "visible";
                       document.getElementById("addresslabel").innerHTML= "    Invalid:length should be (0-20).";
                       //document.getElementById("addresslabel").style.display= "block";  
       }
        else
        {

                         document.getElementById("addresslabel").style.display= "none";

        }


}


function mycityvalid(x){
        var val=x.value.trim();
        var city=/^[a-zA-Z\u0080-\u024F\s\/\-\)\(\`\.\"\']+$/;
           

            if(!(val))
            {
                        //checking whether the field is empty
                        document.getElementById("citylabel").style.visibility= "visible";
                        document.getElementById("citylabel").innerHTML= "    Field cannot be blank.";
                        //document.getElementById("citylabel").style.display= "block";

            }
            else if(val.match(city))
            {               
                        document.getElementById("citylabel").style.display= "none";
            }

            
            else
            {                   
                        document.getElementById("citylabel").style.visibility= "visible";
                        document.getElementById("citylabel").innerHTML= "    Invalid: Use Alphabets and Space Between Separate Words.";
                        //document.getElementById("citylabel").style.display= "block";
                  
            }

}




function myzipcodevalid(x){
     var val=x.value.trim();
     var zip=/[^0-9]/;

     
       if(!(val))
        {
                        //checking whether the field is empty
                        document.getElementById("ziplabel").style.visibility= "visible";
                        document.getElementById("ziplabel").innerHTML= "    Field cannot be blank";
                       //document.getElementById("ziplabel").style.display= "block";

        }
        else if( (val.length <0) && (val.length) >5 )
        {
                       document.getElementById("ziplabel").style.visibility= "visible";
                       document.getElementById("ziplabel").innerHTML= "    Invalid:length should be (0-5).";
                       //document.getElementById("ziplabel").style.display= "block";  
         }
       else if(val.match(zip))
         {
                     document.getElementById("ziplabel").style.visibility= "visible";
                     document.getElementById("ziplabel").innerHTML= "    Invalid:Use Numerals.";
                     //document.getElementById("ziplabel").style.display= "block";   

         }
         else
         {
                      document.getElementById("ziplabel").style.display= "none"; 
         }

                validatebirth();
}


function validatecountry()
{        
          var e = document.getElementById("country");
          var country = e.options[e.selectedIndex].value;
          var country1 = e.options[e.selectedIndex].text;
          if(country==0)
          {
                        document.getElementById("countrylabel").style.visibility= "visible";
                        document.getElementById("countrylabel").innerHTML= "    Field cannot be blank";
                        document.getElementById("countrylabel").style.display= "block";
                        checktostore=0;
          }
          else
          {
                         document.getElementById("countrylabel").style.display= "none";
                         checktostore=1;
          }

         // validatecheckboxone();
}


function myphonevalid2(x)
{
     var val=x.value.trim();
     var phone=/[^0-9]/;

     
     
         // age

         if(!(val))
        {
                        //checking whether the field is empty
                        document.getElementById("agelabel").style.visibility= "visible";
                        document.getElementById("agelabel").innerHTML= "    Field cannot be blank";
                       //document.getElementById("agelabel").style.display= "block";

        }
        else if( (val.length < 0) && (val.length) >10 )
        {
                       document.getElementById("agelabel").style.visibility= "visible";
                       document.getElementById("agelabel").innerHTML= "    Invalid:length should be (0-10).";
                       //document.getElementById("agelabel").style.display= "block";  
        }
       else if(val.match(phone))
         {
                     document.getElementById("agelabel").style.visibility= "visible";
                     document.getElementById("agelabel").innerHTML= "    Invalid: Use Numeric only.";
                     // document.getElementById("agelabel").style.display= "block";   

         }
         else
         {
                    document.getElementById("agelabel").style.display= "none"; 
         }


}


function myconfirmvalid(x)
{

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
                 //document.getElementById("confirmlabel").style.display= "block";
        }
        else
        {
                document.getElementById("confirmlabel").style.display= "none";
        }
       
}



function myphonevalid3(x)
{
     var val=x.value.trim();
     var phone=/[^0-9]/;

         // age

         if(!(val))
        {
                        //checking whether the field is empty
                        document.getElementById("paylabel").style.visibility= "visible";
                        document.getElementById("paylabel").innerHTML= "    Field cannot be blank";
                        //document.getElementById("paylabel").style.display= "block";

        }
        else if( (val.length < 0) && (val.length) >10 )
        {
                       document.getElementById("paylabel").style.visibility= "visible";
                       document.getElementById("paylabel").innerHTML= "    Invalid:length should be (0-10).";
                       //document.getElementById("paylabel").style.display= "block";  
        }
       else if(val.match(phone))
         {
                     document.getElementById("paylabel").style.visibility= "visible";
                     document.getElementById("paylabel").innerHTML= "    Invalid: Use Numeric only.";
                     //document.getElementById("paylabel").style.display= "block";   

         }
         else
         {
                     document.getElementById("paylabel").style.display= "none"; 
         }
}



