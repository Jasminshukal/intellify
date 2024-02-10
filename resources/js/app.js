import './bootstrap';
import Swal from 'sweetalert2';



window.myFunction = function(ev) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById(ev).submit();
        }
      });
 }


const element =document.getElementsByClassName('show-alert');
for (var i = 0; i < element.length; i++) {
    element[i].addEventListener('click', (e) => {
        // var dataAttribute = document.getAttribute('data-form-id');
        const dataValue = e.target.dataset;
        alert(dataValue['value']);

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
          }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(dataValue['value']).submit();
            }
          });
    });
 }
