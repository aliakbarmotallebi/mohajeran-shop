require('./bootstrap');



import Alpine from 'alpinejs';
window.Alpine = Alpine
Alpine.start();

import swal from 'sweetalert2';
window.Swal = swal;

import Num2persian from "num2persian";

import select2 from 'select2';
select2();