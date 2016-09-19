/*
=============================================
          RESOURCE SEARCH
============================================= 
*/
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById('myInput');
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName('tr');

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName('td')[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = '';
      } else {
        tr[i].style.display = 'none';
      }
    } 
  }
}

/*
=============================================
          RESOURCE VALIDATION
============================================= 
*/
function larasubmit()
      {
        var title = document.getElementById('title');
        var slug  = document.getElementById('slug');
        if(title.value == '')
        {
          document.getElementById('titleerror').innerHTML = '*Please Enter a Title';
          document.getElementById('title').focus();
          document.getElementById('title').style.borderColor = '#FF0000';
          return false;
        }
        else if(title.value.length <= 3)
        {
          document.getElementById('titleerror').innerHTML = '*Title Must be atleast 3 characters';
          document.getElementById('title').focus();
          document.getElementById('title').style.borderColor = '#FF0000';
          return false;
        }
        else
        {
          document.getElementById('title').style.borderColor = '#008106';
        }
        if(slug.value == '')
        {
          document.getElementById('slugerror').innerHTML = '*Please Enter Slug';
          document.getElementById('slug').focus();
          document.getElementById('slug').style.borderColor = '#FF0000';
          return false;
        }
        else if(slug.value.length <= 3)
        {
          document.getElementById('slugerror').innerHTML = '*Slug Must be atleast 3 characters';
          document.getElementById('slug').focus();
          document.getElementById('slug').style.borderColor = '#FF0000';
          return false;
        }
        else
        {
          document.getElementById('slug').style.borderColor = '#008106';
        }
        return true;

      }