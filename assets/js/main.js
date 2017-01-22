function removeTask(element) {
    element.parentElement.parentElement.parentElement.remove();
}

function showMe (box, el, input) {
  //var vis = (box.checked) ? "block" : "none";
  //var vis = (box.checked) ? "visible" : "hidden";
  //document.getElementById(el).style.display = vis;
  var element = document.getElementById(el);
  if(box.checked){    
    element.removeAttribute("hidden");
    //element.classList.add("open");
    document.getElementById(input).setAttribute("required","");    
  }
  else{
    element.setAttribute("hidden","");
    //element.classList.remove("open");
    document.getElementById(input).removeAttribute("required");
  }
  
}

