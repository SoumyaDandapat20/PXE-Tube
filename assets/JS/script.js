function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.getElementById("main").style.gridTemplateColumns = "repeat(3, 35%)";
    document.body.style.backgroundColor = "rgba(121, 167, 208, 0.373)";
    if (window.matchMedia("(max-width: 768px)").matches) { 
      document.getElementById("main").style.gridTemplateColumns = "repeat(1, 50%)";
    }
  }
  
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.getElementById("main").style.gridTemplateColumns = "repeat(4, 25%)";
    document.getElementById("mySidenav").style.display = "inline-block";
    document.body.style.backgroundColor = "rgb(204, 228, 247)";
    
    if (window.matchMedia("(max-width: 768px)").matches) { 
      document.getElementById("main").style.gridTemplateColumns = "repeat(2, 50%)";
      } 

    
    

  }


   // Call listener function at run time
 